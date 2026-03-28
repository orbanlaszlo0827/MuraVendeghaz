<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceItem;

class PriceItemSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            ['title' => '1 fő', 'price_value' => 15000, 'unit' => 'Ft/éj', 'name' => '1_felnott','category' => 'Felnőtt árak', 'sort_order' => 1],
            ['title' => '2-3 fő', 'price_value' => 12000, 'unit' => 'Ft/fő/éj', 'name' => '2_felnott', 'category' => 'Felnőtt árak', 'sort_order' => 2],
            ['title' => '4-5 fő', 'price_value' => 10000, 'unit' => 'Ft/fő/éj', 'name' => '4_felnott', 'category' => 'Felnőtt árak', 'sort_order' => 3],
            ['title' => '6-7 fő', 'price_value' => 9000, 'unit' => 'Ft/fő/éj', 'name' => '6_felnott', 'category' => 'Felnőtt árak', 'sort_order' => 4],
            ['title' => '8+ fő', 'price_value' => 8000, 'unit' => 'Ft/fő/éj', 'name' => '8_felnott', 	'category' =>	"Felnőtt árak",	'sort_order'=>5],

            ['title' => 'Gyermekeknek', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'name' => 'gyermek', 'category' => 'Egyéb', 'sort_order' => 6],
            ['title' => 'Nappali Vendég (felnőtt)', 'price_value' => 6000, 'unit' => 'Ft/fő/nap', 'name' => 'nappaliFelnott', 'category' => 'Egyéb', 'sort_order' => 7],
            ['title' => 'Nappali Vendég (gyermek)', 'price_value' => 4000, 'unit' => 'Ft/fő/nap', 'name' => 'nappaliGyermek', 'category' => 'Egyéb', 'sort_order' => 8],
            ['title' => 'Klíma Használat', 'price_value' => 2000, 'unit' => 'Ft/nap', 'name' => 'klima', 	'category'=>'Egyéb','sort_order'=>9],
            ['title' => 'Rugalmas Érkezés', 'price_value' => 1000, 'unit' => 'Ft/fő/óra', 'name' => 'rugalmas_erkezes', 	'category'=>'Egyéb','sort_order'=>10],

            ['title' => 'Szauna használat', 'price_value' => 3000, 'unit' => 'Ft/óra',	'name'=>'szauna','category'=>'Extra','sort_order'=>11],
            ['title' => 'Fazekas bemutató', 'price_value' => 15000, 'unit' => 'Ft/óra', 'name' => 'fazekas', 'category' => 'Extra', 'sort_order' => 12],
            ['title' => 'Sátrazás', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'name' => 'sator', 'category' => 'Extra', 'sort_order' => 13],

            ['title' => '1 éjszaka', 'price_value' => 7000, 'unit' => 'Ft', 'name' => '1ej_futes', 'category' => 'Fűtési felár', 'sort_order' => 14],
            ['title' => '2 éjszaka', 'price_value' => 5000, 'unit' => 'Ft/éj', 'name' => '2ej_futes', 'category' => 'Fűtési felár', 'sort_order' => 15],
            ['title' => '3+ éjszaka', 'price_value' => 3000, 'unit' => 'Ft/éj',	'name'=>'3ej_futes','category'=>'Fűtési felár','sort_order'=>16],

        ];

        foreach ($prices as $price) {
            PriceItem::firstOrCreate(['title' => $price['title']], $price);
        }
    }
}
