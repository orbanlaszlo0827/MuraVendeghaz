<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SiteSetting;
use App\Services\PriceCalculatorService;
use Illuminate\Http\Request;

class BookingController
{
    public function index()
    {
        $forcedHeating = SiteSetting::where('key', 'forced_heating_enabled')->value('value') == '1';
        $acEnabled = SiteSetting::where('key', 'ac_option_enabled')->value('value') == '1';

        return view('frontend.booking', compact('forcedHeating', 'acEnabled'));
    }
     function calculatePrice(Request $request, PriceCalculatorService $calculator)
    {
        $request->validate([
            'check_in' => 'required|date',
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
            return response()->json(['success' => false]);
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
}