<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceItem;

class PriceItemSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            ['title' => '1 fő', 'price_value' => 15000, 'unit' => 'Ft/éj', 'category' => 'felnott', 'sort_order' => 1],
            ['title' => '2-3 fő', 'price_value' => 12000, 'unit' => 'Ft/fő/éj', 'category' => 'felnott', 'sort_order' => 2],
            ['title' => '4-5 fő', 'price_value' => 10000, 'unit' => 'Ft/fő/éj', 'category' => 'felnott', 'sort_order' => 3],
            ['title' => '6-7 fő', 'price_value' => 9000, 'unit' => 'Ft/fő/éj', 'category' => 'felnott', 'sort_order' => 4],
            ['title' => '8+ fő', 'price_value' => 8000, 'unit' => 'Ft/fő/éj', 'category' => 'felnott', 'sort_order' => 5],

            ['title' => 'Gyermek ár (10 éves kor alatt)', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'egyeb', 'sort_order' => 6],
            ['title' => 'Nappali vendég (felnőtt)', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'egyeb', 'sort_order' => 7],
            ['title' => 'Nappali vendég (gyermek)', 'price_value' => 4000, 'unit' => 'Ft/fő/éj', 'category' => 'egyeb', 'sort_order' => 8],
            ['title' => 'Klíma használat', 'price_value' => 2000, 'unit' => 'Ft/nap', 'category' => 'egyeb', 'sort_order' => 9],
            ['title' => 'Rugalmas érkezés', 'price_value' => 1000, 'unit' => 'Fő/óra', 'category' => 'egyeb', 'sort_order' => 10],

            ['title' => '1 éjszaka', 'price_value' => 7000, 'unit' => 'Ft', 'category' => 'futes', 'sort_order' => 11],
            ['title' => '2 éjszaka', 'price_value' => 5000, 'unit' => 'Ft/éj', 'category' => 'futes', 'sort_order' => 12],
            ['title' => '3+ éjszaka', 'price_value' => 3000, 'unit' => 'Ft/éj', 'category' => 'futes', 'sort_order' => 13],

            ['title' => 'Szauna használat', 'price_value' => 3000, 'unit' => 'Ft/óra', 'category' => 'extra', 'sort_order' => 14],
            ['title' => 'Fazekas bemutató', 'price_value' => 15000, 'unit' => 'Ft/óra', 'category' => 'extra', 'sort_order' => 15],
            ['title' => 'Sátrazás', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'extra', 'sort_order' => 16],
        ];

        foreach ($prices as $price) {
            PriceItem::firstOrCreate(['title' => $price['title']], $price);
        }
    }
}
