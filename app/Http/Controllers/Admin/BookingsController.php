<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;

class BookingsController
{
    public function index()
    {
        $bookings = Booking::with('guest')->latest()->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'A foglalás sikeresen törölve lett.');
    }
}