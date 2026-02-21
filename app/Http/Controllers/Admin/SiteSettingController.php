<?php

namespace App\Http\Controllers\Admin;

//use App\Models\PriceItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController
{
    public function updateAll(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $key => $data) {
            $setting = SiteSetting::find($key);
            if ($setting) {
                $setting->update([
                    'value' => $data
                ]);
            }
        }

        return redirect()->route('admin.prices.index')->with('success', 'A beállítások sikeresen frissítve!');
    }
}
