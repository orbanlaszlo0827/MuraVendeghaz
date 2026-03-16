<?php

namespace App\Services;

use App\Models\PriceItem;
use Carbon\Carbon;

class PriceCalculatorService
{
    public function calculatePrice($comingDate, $leavingDate, $numAdults, $numChildren, $isHeatingNeeded, $isClimateNeeded) 
    {
        $checkIn = Carbon::parse($comingDate);
        $checkOut = Carbon::parse($leavingDate);
        $nightsSum = $checkIn->diffInDays($checkOut);

        $adultKey = $numAdults > 8 ? 8 : $numAdults;
        
        if ($nightsSum <= 0 || $adultKey <= 0) {
            return 0;
        }

        if ($adultKey % 2 != 0) {
            $adultKey -= 1;
        }
        
        $adultPriceItem = PriceItem::where('name', $adultKey . '_felnott')->first();
        $adultPrice = $adultPriceItem ? $adultPriceItem->price : 15000;

        $childPriceItem = PriceItem::where('name', 'gyermek')->first();
        $childPrice = $childPriceItem ? $childPriceItem->price : 6000;

        $totalPrice = ($adultPrice * $nightsSum * $numAdults) + ($childPrice * $numChildren * $nightsSum);

        if ($isHeatingNeeded) {
            $heatingKey = $nightsSum < 3 ? $nightsSum : 3;
            $heatingPriceItem = PriceItem::where('name', $heatingKey . 'ej_futes')->first();
            $heatingPrice = $heatingPriceItem ? $heatingPriceItem->price : 7000;
            
            $totalPrice += ($heatingPrice * $nightsSum);
        }

        if ($isClimateNeeded) {
            $climatePriceItem = PriceItem::where('name', 'klima')->first();
            $climatePrice = $climatePriceItem ? $climatePriceItem->price : 2000;
            
            $totalPrice += ($climatePrice * $nightsSum);
        }

        if ($nightsSum == 1) {
            $totalPrice *= 1.25; 
        }

        return round($totalPrice);
    }
}