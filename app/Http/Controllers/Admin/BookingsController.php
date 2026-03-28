<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController
{
    public function index(Request $request)
    {
        // Alap lekérdezés a vendégekkel
        $query = Booking::with('guest')->latest();

        if ($request->has('trashed') && $request->trashed == 'only') {
            $query->onlyTrashed();
        }

        $bookings = $query->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }
    public function restore($id)
    {
        $booking = Booking::onlyTrashed()->findOrFail($id);
        
        $booking->restore();

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás sikeresen visszaállítva a lomtárból!');
    }
    public function show(Booking $booking)
    {
        $booking->load('guest');
        
        return view('admin.bookings.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date|after:check_in',
            'adults'         => 'required|integer|min:1',
            'children'       => 'required|integer|min:0',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,confirmed,cancelled',
            'guest_comment'  => 'nullable|string',
            'internal_notes' => 'nullable|string',
        ]);

        $booking->guest->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $booking->update([
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'adults'         => $request->adults,
            'children'       => $request->children,
            'wants_heating'  => $request->boolean('wants_heating'),
            'wants_ac'       => $request->boolean('wants_ac'),
            'total_price'    => $request->total_price,
            'status'         => $request->status,
            'guest_comment'  => $request->guest_comment,
            'internal_notes' => $request->internal_notes,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás és a vendég adatai sikeresen frissítve lettek!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás sikeresen törölve lett.');
    }

    public function calendar()
    {
        $bookings = Booking::with('guest')
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $events = [];
        foreach ($bookings as $booking) {
            
            $bgColor = $booking->status == 'confirmed' ? '#198754' : '#ffc107'; 
            $textColor = $booking->status == 'confirmed' ? '#ffffff' : '#000000';

            $events[] = [
                'id'    => $booking->id,
                'title' => $booking->guest->name . ' (' . ($booking->adults + $booking->children) . ' fő)',
                
                'start' => \Carbon\Carbon::parse($booking->check_in)->format('Y-m-d\T14:00:00'),
                
                'end'   => \Carbon\Carbon::parse($booking->check_out)->format('Y-m-d\T10:00:00'),
                
                'allDay'=> false, 
                
                'color' => $bgColor,
                'textColor' => $textColor,
                'url'   => route('admin.bookings.show', $booking->id),
            ];
        }

        return view('admin.bookings.calendar', compact('events'));
    }
}