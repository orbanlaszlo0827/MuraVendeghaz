<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PriceItem;
use App\Models\SiteSetting;

class PageController
{
    public function prices_contact()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $adultPrices = PriceItem::where('category', 'Felnőtt árak')->get();
        $otherPrices = PriceItem::where('category', 'Egyéb')->get();
        $extraPrices = PriceItem::where('category', 'Extra')->get();
        $heatingPrices = PriceItem::where('category', 'Fűtési felár')->get();

        $priceDescriptions = [
            'Gyermekeknek'   => '10 éves kor alatt',
            'Nappali Vendég (felnőtt)'    => 'Szállás igénybevétele nélkül',
            'Nappali Vendég (gyermek)'    => 'Szállás igénybevétele nélkül',
            'Klíma Használat'    => 'Hűtésre / lakóegység',
            'Rugalmas Érkezés' => 'Korábbi érkezés vagy későbbi távozás esetén, előzetes egyeztetés alapján.',
        ];

        return view('frontend.prices_contact', compact(
            'settings', 
            'adultPrices', 
            'otherPrices', 
            'extraPrices', 
            'heatingPrices',
            'priceDescriptions'
        )); 
    }
}
