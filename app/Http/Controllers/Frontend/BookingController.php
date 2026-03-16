<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PriceItem;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class BookingController
{
    public function index()
    {
        $forcedHeating = SiteSetting::where('key', 'forced_heating_enabled')->value('value') == '1';
        $acEnabled = SiteSetting::where('key', 'ac_option_enabled')->value('value') == '1';

        return view('frontend.booking', compact('forcedHeating', 'acEnabled'));
    }
    public function calculatePrice(Request $request)
    {
        try {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);

        if ($nights <= 0) {
            return response()->json(['success' => false]);
        }

        $numAdults = $request->adults > 8 ? 8 : $request->adults;
        $numAdults = $numAdults % 2 != 0 && $numAdults > 1 ? $numAdults - 1 : $numAdults;
        
        $adultPrice = PriceItem::where('name', $numAdults . '_felnott')->value('price_value') ?? 15000;
        $childPrice = PriceItem::where('name', 'gyermek')->value('price_value') ?? 6000;
        
        $heatingKey = $nights < 3 ? $nights : 3;
        $heatingPrice = PriceItem::where('name', $heatingKey . 'ej_futes')->value('price_value') ?? 7000;
        
        $climatePrice = PriceItem::where('name', 'klima')->value('price_value') ?? 2000;

        $forcedHeating = SiteSetting::where('key', 'forced_heating_enabled')->value('value') == '1';
        $acEnabled = SiteSetting::where('key', 'ac_option_enabled')->value('value') == '1';

        $adultTotal = $adultPrice * $nights * $request->adults;
        $childTotal = $childPrice * $nights * $request->children;
        
        $wantsHeating = $forcedHeating ? true : $request->wants_heating;
        $wantsAc = $acEnabled ? $request->wants_ac : false;

        $heatingTotal = $wantsHeating ? ($heatingPrice * $nights) : 0;
        $acTotal = $wantsAc ? ($climatePrice * $nights) : 0;

        $totalPrice = $adultTotal + $childTotal + $heatingTotal + $acTotal;

        if ($nights == 1) {
            $adultTotal *= 1.25;
            $childTotal *= 1.25;
            $heatingTotal *= 1.25;
            $acTotal *= 1.25;
            $totalPrice *= 1.25;
        }

        return response()->json([
            'success' => true,
            'nights' => $nights,
            'adult_total' => number_format($adultTotal, 0, ',', '.'),
            'child_total' => number_format($childTotal, 0, ',', '.'),
            'heating_total' => number_format($heatingTotal, 0, ',', '.'),
            'ac_total' => number_format($acTotal, 0, ',', '.'),
            'total_price' => number_format($totalPrice, 0, ',', '.')
        ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false, 
                'error' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
        }
    }
}