<?php

use App\Http\Controllers\Admin\PriceItemController;
use App\Http\Controllers\Admin\SiteSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/arak', [PriceItemController::class, 'index'])->name('admin.prices.index');
Route::put('/admin/arak/update-all', [PriceItemController::class, 'updateAll'])->name('admin.prices.updateAll');
Route::put('/admin/beallitasok/update-all', [SiteSettingController::class, 'updateAll'])->name('admin.settings.updateAll');
Route::get('/admin/szobak', [\App\Http\Controllers\Admin\RoomContentController::class, 'index'])->name('admin.rooms.index');
Route::put('/admin/szobak/update-all', [\App\Http\Controllers\Admin\RoomContentController::class, 'updateAll'])->name('admin.rooms.updateAll');