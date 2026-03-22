<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController
{
    public function index()
    {
        $bookings = Booking::with('guest')->latest()->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }
    public function show(Booking $booking)
    {
        $booking->load('guest');
        
        return view('admin.bookings.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:50',
            'check_in'       => 'required|date',
            'check_out'      => 'required|date|after:check_in',
            'adults'         => 'required|integer|min:1',
            'children'       => 'required|integer|min:0',
            'total_price'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,confirmed,cancelled',
            'guest_comment'  => 'nullable|string',
            'internal_notes' => 'nullable|string',
        ]);

        $booking->guest->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $booking->update([
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'adults'         => $request->adults,
            'children'       => $request->children,
            'wants_heating'  => $request->boolean('wants_heating'),
            'wants_ac'       => $request->boolean('wants_ac'),
            'total_price'    => $request->total_price,
            'status'         => $request->status,
            'guest_comment'  => $request->guest_comment,
            'internal_notes' => $request->internal_notes,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás és a vendég adatai sikeresen frissítve lettek!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás sikeresen törölve lett.');
    }
}