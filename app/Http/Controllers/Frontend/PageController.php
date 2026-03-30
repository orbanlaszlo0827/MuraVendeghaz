<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PriceItem;
use App\Models\RoomContent;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function rooms()
    {
        $rooms = RoomContent::all()->keyBy('section_name');

        $roomFeatures = [
            [
                'icon'  => 'bi-moon-stars-fill',
                'color' => 'info',
                'title' => 'Zavartalan alvás',
                'desc'  => 'Redőny, sötétítő függöny és szúnyogháló minden ablakon.'
            ],
            [
                'icon'  => 'bi-plug-fill',
                'color' => 'warning',
                'title' => 'Töltés & Áram',
                'desc'  => 'Konnektorok közvetlenül minden ágy mellett.'
            ],
            [
                'icon'  => 'bi-cup-fill',
                'color' => 'success', 
                'title' => 'Teljes konyha',
                'desc'  => 'Edények 12 főre, kapszulás kávéfőző, kenyérpirító.'
            ],
            [
                'icon'  => 'bi-snow',
                'color' => 'info', 
                'title' => 'Kellemes klíma',
                'desc'  => 'Természetes hűvös nyáron + Légkondi a közös terekben.'
            ],
            [
                'icon'  => 'bi-emoji-smile-fill',
                'color' => 'danger', 
                'title' => 'Legkisebbeknek',
                'desc'  => 'Etetőszék, rácsos ágy és játéksarok biztosított.'
            ],
            [
                'icon'  => 'bi-layers-fill',
                'color' => 'success', 
                'title' => 'Textíliák',
                'desc'  => 'Friss ágyneműhuzatot és törölközőt adunk.'
            ],
            [
                'icon'  => 'bi-thermometer-high',
                'color' => 'primary', 
                'title' => 'Fűtés',
                'desc'  => 'Radiátorok minden fő helyiségben a téli napokra.'
            ],
            [
                'icon'  => 'bi-wifi',
                'color' => 'black', 
                'title' => 'Kapcsolat',
                'desc'  => 'Ingyenes, stabil Wifi a ház teljes területén.'
            ],
            
        ];

        return view('frontend.rooms', compact('rooms', 'roomFeatures'));
    }
}
