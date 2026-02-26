<?php

use App\Http\Controllers\PaymentWaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment/wave/success', [PaymentWaveController::class, 'success'])
    ->name('wave.success');
Route::get('/payment/wave/error', [PaymentWaveController::class, 'error'])
    ->name('wave.error');

Route::get('/politique', function () {
    return view('politique');
});
