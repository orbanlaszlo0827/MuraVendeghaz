<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'contact_email', 'value' => 'info@muravendeghaz.hu', 'description' => 'A weboldalon megjelenő kapcsolattartási email cím.'],
            ['key' => 'contact_phone', 'value' => '+36 30 123 4567', 'description' => 'A weboldalon megjelenő telefonszám.'],
            ['key' => 'forced_heating_enabled', 'value' => '0', 'description' => 'Kikényszerített fűtési szezon. Ha aktív, akkor a fűtési felár kötelezően hozzáadódik az árhoz.'],
            ['key' => 'ac_option_enabled', 'value' => '1', 'description' => 'Klíma opció aktív. Ha aktív, a vendég kiválaszthatja a foglalásnál, hogy kér-e klímát.'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
