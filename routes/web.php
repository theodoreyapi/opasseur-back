<?php

use App\Http\Controllers\PaymentWaveController;
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
Route::get('opasseur', function () {
    return view('opasseur');
});
Route::get('pays', function () {
    return view('pays');
});
Route::get('hotels', function () {
    return view('hotels');
});
Route::get('hotel-detail', function () {
    return view('hotel-detail');
});
Route::get('rooms', function () {
    return view('rooms');
});
Route::get('reservation', function () {
    return view('reservation');
});
Route::get('paiement', function () {
    return view('paiement');
});
Route::get('promo', function () {
    return view('promo');
});
Route::get('abonnement', function () {
    return view('abonnement');
});
Route::get('avis', function () {
    return view('avis');
});
Route::get('page-legale', function () {
    return view('page-legale');
});
Route::get('roles', function () {
    return view('roles');
});
Route::get('admins', function () {
    return view('admins');
});
Route::get('notifications', function () {
    return view('notifications');
});
Route::get('settings', function () {
    return view('settings');
});

Route::get('/payment/wave/success/{id}', [PaymentWaveController::class, 'success'])
    ->name('wave.success');
Route::get('/payment/wave/error/{id}', [PaymentWaveController::class, 'error'])
    ->name('wave.error');

Route::get('/politique', function () {
    return view('politique');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
