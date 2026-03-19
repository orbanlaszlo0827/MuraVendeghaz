<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\SiteSetting;
use App\Services\PriceCalculatorService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController
{
    public function index()
    {
        $forcedHeating = SiteSetting::where('key', 'forced_heating_enabled')->value('value') == '1';
        $acEnabled = SiteSetting::where('key', 'ac_option_enabled')->value('value') == '1';

        $bookings = Booking::whereIn('status', ['pending', 'confirmed'])
            ->where('check_out', '>=', now()->format('Y-m-d'))
            ->get();

        $bookedDates = [];
        foreach ($bookings as $booking) {
            $from = Carbon::parse($booking->check_in)->addDay()->format('Y-m-d');
            $to = Carbon::parse($booking->check_out)->subDay()->format('Y-m-d');

            if ($from <= $to) {
                $bookedDates[] = [
                    'from' => $from,
                    'to' => $to,
                ];
            }
        }

        return view('frontend.booking', compact('forcedHeating', 'acEnabled', 'bookedDates'));
    }
     function calculatePrice(Request $request, PriceCalculatorService $calculator)
    {
        $request->validate([
            'check_in' => 'required|date|after_or_equal:' . now()->addDays(3)->toDateString(),
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        $result = $calculator->calculate(
            $request->check_in,
            $request->check_out,
            $request->adults,
            $request->children,
            $request->boolean('wants_heating'),
            $request->boolean('wants_ac')
        );

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'error' => $result['error'] ?? 'Ismeretlen hiba történt a kalkuláció során.'
            ]);
        }

        return response()->json([
            'success' => true,
            'nights' => $result['nights'],
            'adult_total' => number_format($result['adult_total'], 0, ',', '.'),
            'child_total' => number_format($result['child_total'], 0, ',', '.'),
            'heating_total' => number_format($result['heating_total'], 0, ',', '.'),
            'ac_total' => number_format($result['ac_total'], 0, ',', '.'),
            'total_price' => number_format($result['total_price'], 0, ',', '.')
        ]);
    }
    public function store(Request $request, PriceCalculatorService $calculator)
    {
        $request->validate([
            'check_in'  => 'required|date|after_or_equal:' . now()->addDays(3)->toDateString(),
            'check_out' => 'required|date|after:check_in',
            'adults'    => 'required|integer|min:1',
            'children'  => 'required|integer|min:0',
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:50',
            'email'     => 'required|email|max:255',
            'terms'     => 'accepted',
        ]);

        // ÚJRASZÁMOLÁS!!
        $priceResult = $calculator->calculate(
            $request->check_in,
            $request->check_out,
            $request->adults,
            $request->children,
            $request->boolean('heating'),
            $request->boolean('climate')
        );

        if (!$priceResult['success']) {
            return back()->with('error', 'Érvénytelen dátumok lettek megadva.')->withInput();
        }

        DB::transaction(function () use ($request, $priceResult) {
            
            $guest = Guest::updateOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'phone' => $request->phone
                ]
            );

            $notes = $request->comment;

            Booking::create([
                'guest_id'       => $guest->id,
                'check_in'       => $request->check_in,
                'check_out'      => $request->check_out,
                'adults'         => $request->adults,
                'children'       => $request->children,
                'wants_ac'       => $request->boolean('climate'),
                'wants_heating'  => $request->boolean('heating'),
                'total_price'    => $priceResult['total_price'],
                'status'         => 'pending',
                'internal_notes' => $request->comment,
            ]);
        });

        return redirect()->route('booking.success')->with('success', 'Sikeresen rögzítettük a foglalást!');
    }
}