<?php

namespace App\Services;

use App\Models\PriceItem;
use App\Models\SiteSetting;
use Carbon\Carbon;

class PriceCalculatorService
{
    public function calculate(string $checkInDate, string $checkOutDate, int $adults, int $children, bool $wantsHeating, bool $wantsAc): array
    {
        $checkIn = Carbon::parse($checkInDate);
        $checkOut = Carbon::parse($checkOutDate);
        $nights = $checkIn->diffInDays($checkOut);

        if ($nights <= 0) {
            return ['success' => false];
        }

        $numAdults = $adults > 8 ? 8 : $adults;
        $numAdults = $numAdults % 2 != 0 && $numAdults > 1 ? $numAdults - 1 : $numAdults;
        
        $adultPrice = PriceItem::where('name', $numAdults . '_felnott')->value('price_value') ?? 15000;
        $childPrice = PriceItem::where('name', 'gyermek')->value('price_value') ?? 6000;
        
        $heatingKey = $nights < 3 ? $nights : 3;
        $heatingPrice = PriceItem::where('name', $heatingKey . 'ej_futes')->value('price_value') ?? 7000;
        
        $climatePrice = PriceItem::where('name', 'klima')->value('price_value') ?? 2000;

        $forcedHeating = SiteSetting::where('key', 'forced_heating_enabled')->value('value') == '1';
        $acEnabled = SiteSetting::where('key', 'ac_option_enabled')->value('value') == '1';

        $adultTotal = $adultPrice * $nights * $adults;
        $childTotal = $childPrice * $nights * $children;
        
        $finalWantsHeating = $forcedHeating ? true : $wantsHeating;
        $finalWantsAc = $acEnabled ? $wantsAc : false;

        $heatingTotal = $finalWantsHeating ? ($heatingPrice * $nights) : 0;
        $acTotal = $finalWantsAc ? ($climatePrice * $nights) : 0;

        $totalPrice = $adultTotal + $childTotal + $heatingTotal + $acTotal;

        if ($nights == 1) {
            $adultTotal *= 1.25;
            $childTotal *= 1.25;
            $heatingTotal *= 1.25;
            $acTotal *= 1.25;
            $totalPrice *= 1.25;
        }

        return [
            'success' => true,
            'nights' => $nights,
            'adult_total' => $adultTotal,
            'child_total' => $childTotal,
            'heating_total' => $heatingTotal,
            'ac_total' => $acTotal,
            'total_price' => $totalPrice
        ];
    }
}