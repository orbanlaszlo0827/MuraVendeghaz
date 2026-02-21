<?php

namespace App\Http\Controllers\Admin;

use App\Models\PriceItem;
use Illuminate\Http\Request;

class PriceItemController
{
    // 1. Megjeleníti az oldalt
    public function index()
    {
        // Lekérjük az árakat a beállított sorrendben
        $prices = PriceItem::orderBy('sort_order', 'asc')->get();
        
        return view('admin.edit_prices', compact('prices'));
    }

    // 2. Tömeges frissítés (A Bulk Update logika)
    public function updateAll(Request $request)
    {
        // Validáljuk, hogy tényleg tömböt kaptunk-e
        $request->validate([
            'prices' => 'required|array',
            'prices.*.price_value' => 'required|numeric|min:0', // Csak pozitív szám lehet
        ]);

        // Végigmegyünk a kapott tömbön (A $id az adatbázis ID, a $data a módosított adat)
        foreach ($request->prices as $id => $data) {
            $priceItem = PriceItem::find($id);
            if ($priceItem) {
                $priceItem->update([
                    'price_value' => $data['price_value']
                ]);
            }
        }

        // Visszairányítjuk az admint egy siker-üzenettel
        return redirect()->route('admin.prices.index')->with('success', 'Az árak sikeresen frissítve!');
    }
}
