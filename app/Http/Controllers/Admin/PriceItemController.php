<?php

namespace App\Http\Controllers\Admin;

use App\Models\PriceItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PriceItemController
{
    public function index()
    {
        $prices = PriceItem::orderBy('sort_order', 'asc')->get();
        $settings = SiteSetting::All();
        $categories = [];
        
        return view('admin.edit_prices', compact('prices', 'settings', 'categories'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'prices' => 'required|array',
            'prices.*.price_value' => 'required|numeric|min:0',
        ]);

        foreach ($request->prices as $id => $data) {
            $priceItem = PriceItem::find($id);
            if ($priceItem) {
                $priceItem->update([
                    'price_value' => $data['price_value']
                ]);
            }
        }

        return redirect()->route('admin.prices.index')->with('success', 'Az árak sikeresen frissítve!');
    }
}
