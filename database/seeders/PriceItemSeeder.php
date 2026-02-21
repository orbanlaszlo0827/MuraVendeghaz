<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceItem;

class PriceItemSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            ['title' => '1 fő', 'price_value' => 15000, 'unit' => 'Ft/éj', 'category' => '1_felnott', 'sort_order' => 1],
            ['title' => '2-3 fő', 'price_value' => 12000, 'unit' => 'Ft/fő/éj', 'category' => '2_3felnott', 'sort_order' => 2],
            ['title' => '4-5 fő', 'price_value' => 10000, 'unit' => 'Ft/fő/éj', 'category' => '4_5felnott', 'sort_order' => 3],
            ['title' => '6-7 fő', 'price_value' => 9000, 'unit' => 'Ft/fő/éj', 'category' => '6_7felnott', 'sort_order' => 4],
            ['title' => '8+ fő', 'price_value' => 8000, 'unit' => 'Ft/fő/éj', 'category' => '8_felnott', 'sort_order' => 5],

            ['title' => 'Gyermek ár (10 éves kor alatt)', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'gyermek', 'sort_order' => 6],
            ['title' => 'Nappali vendég (felnőtt)', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'nappaliFelnott', 'sort_order' => 7],
            ['title' => 'Nappali vendég (gyermek)', 'price_value' => 4000, 'unit' => 'Ft/fő/éj', 'category' => 'nappaliGyermek', 'sort_order' => 8],
            ['title' => 'Klíma használat', 'price_value' => 2000, 'unit' => 'Ft/nap', 'category' => 'klima', 'sort_order' => 9],
            ['title' => 'Rugalmas érkezés', 'price_value' => 1000, 'unit' => 'Fő/óra', 'category' => 'rugalmas_erkezes', 'sort_order' => 10],

            ['title' => '1 éjszaka', 'price_value' => 7000, 'unit' => 'Ft', 'category' => '1ej_futes', 'sort_order' => 11],
            ['title' => '2 éjszaka', 'price_value' => 5000, 'unit' => 'Ft/éj', 'category' => '2ej_futes', 'sort_order' => 12],
            ['title' => '3+ éjszaka', 'price_value' => 3000, 'unit' => 'Ft/éj', 'category' => '3+ej_futes', 'sort_order' => 13],

            ['title' => 'Szauna használat', 'price_value' => 3000, 'unit' => 'Ft/óra', 'category' => 'szauna', 'sort_order' => 14],
            ['title' => 'Fazekas bemutató', 'price_value' => 15000, 'unit' => 'Ft/óra', 'category' => 'fazekas', 'sort_order' => 15],
            ['title' => 'Sátrazás', 'price_value' => 6000, 'unit' => 'Ft/fő/éj', 'category' => 'sátor', 'sort_order' => 16],
        ];

        foreach ($prices as $price) {
            PriceItem::firstOrCreate(['title' => $price['title']], $price);
        }
    }
}
