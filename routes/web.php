<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HoteController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OpasseurController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PaymentWaveController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('oublie', function () {
    return view('oublie');
});
Route::get('otp', function () {
    return view('otp');
});
Route::get('reset', function () {
    return view('reset-password');
});

Route::resource('opasseurs', OpasseurController::class);
Route::resource('hote', HoteController::class);
Route::resource('pays', PaysController::class);
Route::resource('hotels', HotelsController::class);
Route::resource('reservation', ReservationController::class);
Route::resource('paiement', PaiementController::class);
Route::resource('promo', PromoController::class);
Route::resource('abonnement', AbonnementController::class);
Route::resource('roles', RoleController::class);
Route::resource('admins', AdminController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('settings', SettingController::class);

Route::get('hotel-detail', function () {
    return view('hotel-detail');
});
Route::get('rooms', function () {
    return view('rooms');
});
Route::get('avis', function () {
    return view('avis');
});
Route::get('page-legale', function () {
    return view('page-legale');
});

Route::get('/payment/wave/success/{id}', [PaymentWaveController::class, 'success'])
    ->name('wave.success');
Route::get('/payment/wave/error/{id}', [PaymentWaveController::class, 'error'])
    ->name('wave.error');

Route::get('/politique', function () {
    return view('politique');
});
Route::get('index', function () {
    return view('dashboard');
});
