<?php

namespace App\Services;

use App\Models\PriceItem;
use App\Models\SiteSetting;
use Carbon\Carbon;

class PriceCalculatorService
{
    private $adultPricesPerNights = [
    1 => 15000,  // 1 person/night
    2 => 12000,  // 2-3 people/night
    3 => 12000,
    4 => 10000,  // 4-5 people/night
    5 => 10000,
    6 => 9000,   // 6-7 people/night
    7 => 9000,
    8 => 8000,   // 8+ people/night
    ];

    private $heatingPricesPerNights = [
        1 => 7000,   // 1 night heating
        2 => 5000,   // 2 nights heating
        3 => 3000,   // 3 nights heating
    ];

    private $childPricePerNights = 6000;  // 1 child/night
    private $climatePricePerDays = 2000;  // 1 day climate control


    public function calculatePrice($comingDate, $leavingDate, $numAdults, $numChildren, $isHeatingNeeded, $isClimateNeeded) {

    global $adultPricesPerNights, $heatingPricesPerNights, $childPricePerNights, $climatePricePerDays;

    $comingParts = explode("-", $comingDate);
    $leavingParts = explode("-", $leavingDate);
    $nightsSum = (int)$leavingParts[2] - (int)$comingParts[2];

    $totalPrice = $adultPricesPerNights[$numAdults] * $nightsSum * $numAdults + $childPricePerNights * $numChildren * $nightsSum;

    if ($isHeatingNeeded) {
        if ($nightsSum < 3) {
            $totalPrice += $this->heatingPricesPerNights[$nightsSum] * $nightsSum;
        } else {
            $totalPrice += $this->heatingPricesPerNights[3] * $nightsSum;
        }
    }

    if ($isClimateNeeded) {
        $totalPrice += $this->climatePricePerDays * $nightsSum;
    }

    if ($nightsSum == 1) {
        $totalPrice *= 1.25;
    }

    return $totalPrice;
}

}