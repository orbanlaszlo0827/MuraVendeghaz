<?php

use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\PriceItemController;
use App\Http\Controllers\Admin\RoomContentController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::get('/admin', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)->name('login.attempt');

Route::post('logout' , function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/arak', [PriceItemController::class, 'index'])->name('admin.prices.index');
    Route::put('/admin/arak/update-all', [PriceItemController::class, 'updateAll'])->name('admin.prices.updateAll');
    Route::put('/admin/beallitasok/update-all', [SiteSettingController::class, 'updateAll'])->name('admin.settings.updateAll');
    Route::get('/admin/szobak', [RoomContentController::class, 'index'])->name('admin.rooms.index');
    Route::put('/admin/szobak/update-all', [RoomContentController::class, 'updateAll'])->name('admin.rooms.updateAll');

    Route::resource('/admin/galeria', GalleryImageController::class)
        ->only(['index', 'store', 'destroy'])
        ->names([
            'index' => 'admin.gallery.index',
            'store' => 'admin.gallery.store',
            'destroy' => 'admin.gallery.destroy'
        ]);

    Route::patch('/admin/galeria/{id}/kategoria', [GalleryImageController::class, 'updateCategory'])->name('admin.gallery.updateCategory');

    Route::get('/admin/vezerlopult', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});