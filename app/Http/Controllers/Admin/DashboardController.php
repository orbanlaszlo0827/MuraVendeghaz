<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Carbon\Carbon;

class DashboardController
{
    public function index()
    {
        $pendingBookingsCount = Booking::where('status', 'pending')->count();

        $monthlyIncome = Booking::whereMonth('created_at', now()->month)
                               ->whereYear('created_at', now()->year)
                               ->where('status', 'confirmed')
                               ->sum('total_price');

        $today = today();
        $currentGuest = Booking::with('guest')
                               ->where('check_in', '<=', $today)
                               ->where('check_out', '>=', $today)
                               ->where('status', 'confirmed')
                               ->first();

        $guestName = null;
        $guestId = null;
        $currentGuestCount = 0;

        if ($currentGuest) {
            $guestName = $currentGuest->guest->name;
            $guestId = $currentGuest->id; 
            $currentGuestCount = $currentGuest->adults + $currentGuest->children;
        }

        //diagram

        $chartLabels = [];
        $chartData = [];

        $huMonths = [1=>'Január', 2=>'Február', 3=>'Március', 4=>'Április', 5=>'Május', 6=>'Június', 7=>'Július', 8=>'Augusztus', 9=>'Szeptember', 10=>'Október', 11=>'November', 12=>'December'];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonthsNoOverflow($i);
            
            $chartLabels[] = $huMonths[$date->month];

            $sum = Booking::whereMonth('created_at', $date->month)
                          ->whereYear('created_at', $date->year)
                          ->where('status', 'confirmed')
                          ->sum('total_price');

            $chartData[] = (int) $sum;
        }

        return view('admin.dashboard', compact(
            'monthlyIncome', 
            'pendingBookingsCount', 
            'guestName', 
            'currentGuestCount', 
            'guestId',
            'chartLabels',
            'chartData'
        ));
    }
}