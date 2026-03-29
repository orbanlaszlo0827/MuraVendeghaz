<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PriceItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PageController
{
    public function prices_contact()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $adultPrices = PriceItem::where('category', 'Felnőtt árak')->get();
        $otherPrices = PriceItem::where('category', 'Egyéb')->get();
        $extraPrices = PriceItem::where('category', 'Extra')->get()->keyBy('name');
        $heatingPrices = PriceItem::where('category', 'Fűtési felár')->get();

        $priceDescriptions = [
            'Gyermekeknek'   => '10 éves kor alatt',
            'Nappali Vendég (felnőtt)'    => 'Szállás igénybevétele nélkül',
            'Nappali Vendég (gyermek)'    => 'Szállás igénybevétele nélkül',
            'Klíma Használat'    => 'Hűtésre / lakóegység',
            'Rugalmas Érkezés' => 'Korábbi érkezés vagy későbbi távozás esetén, előzetes egyeztetés alapján.',
        ];

        $colors = ['primary', 'danger', 'info', 'success', 'dark', 'warning'];

        $otherPrices->map(function ($price, $index) use ($colors) {
            $price->border_color = $colors[$index % count($colors)];
            
            return $price;
        });

        return view('frontend.prices_contact', compact(
            'settings', 
            'adultPrices', 
            'otherPrices', 
            'extraPrices', 
            'heatingPrices',
            'priceDescriptions'
        )); 
    }
    public function contactSubmit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        $adminEmail = SiteSetting::where('key', 'contact_email')->value('value');

        Mail::raw("Új üzenet érkezett a weboldalról!\n\nNév: {$data['name']}\nEmail: {$data['email']}\nÜzenet: \n{$data['message']}", function ($message) use ($data, $adminEmail) {
            $message->to($adminEmail)
                    ->subject('Új kapcsolatfelvétel: ' . $data['name'])
                    ->replyTo($data['email']);
        });

        return back()->with('success', 'Köszönjük! Az üzenetet sikeresen elküldtük, hamarosan válaszolunk.');
    }
}
