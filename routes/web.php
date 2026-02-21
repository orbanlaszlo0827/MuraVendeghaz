<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PriceItemController;

// Az oldal megjelenítése (A form)
Route::get('/admin/arak', [PriceItemController::class, 'index'])->name('admin.prices.index');

// A form beküldése (Tömeges mentés)
Route::put('/admin/arak/update-all', [PriceItemController::class, 'updateAll'])->name('admin.prices.updateAll');