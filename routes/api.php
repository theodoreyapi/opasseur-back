<?php

use App\Http\Controllers\Api\ApiFavorites;
use App\Http\Controllers\Api\ApiAuth;
use App\Http\Controllers\Api\ApiCondition;
use App\Http\Controllers\Api\ApiHotels;
use App\Http\Controllers\Api\ApiNotification;
use App\Http\Controllers\Api\ApiPayments;
use App\Http\Controllers\Api\ApiProfile;
use App\Http\Controllers\Api\ApiPromosCodes;
use App\Http\Controllers\Api\ApiReservations;
use App\Http\Controllers\Api\ApiReview;
use App\Http\Controllers\Api\ApiRooms;
use App\Http\Controllers\Api\ApiSubscriptionPayments;
use App\Http\Controllers\Api\ApiSubscriptionPlans;
use App\Http\Controllers\Api\ApiUserSubscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication
Route::prefix('auth')->group(function () {
    Route::post('/register', [ApiAuth::class, 'register']);
    Route::post('/register-one', [ApiAuth::class, 'registerOne']);
    Route::post('/login', [ApiAuth::class, 'login']);
    Route::post('/logout', [ApiAuth::class, 'logout']);
    Route::post('/update/{id}', [ApiAuth::class, 'update']);
    Route::post('/password/forgot', [ApiAuth::class, 'forgotPassword']);
    Route::post('/password/reset', [ApiAuth::class, 'resetPassword']);
    Route::post('/password/otp', [ApiAuth::class, 'verifyOtp']);
    Route::post('/resend/otp', [ApiAuth::class, 'resendOtp']);
});

// User Profile
Route::prefix('users')->group(function () {
    Route::get('/profile/{id}', [ApiProfile::class, 'profile']);
    Route::put('/profile/{id}', [ApiProfile::class, 'updateProfile']);
    Route::put('/password/{id}', [ApiProfile::class, 'changePassword']);
    Route::delete('/account/{id}', [ApiProfile::class, 'account']);
    Route::put('/code', [ApiProfile::class, 'updateCode']);
    Route::post('/code/check', [ApiProfile::class, 'checkCode']);
});

// Hotels and Rooms
Route::prefix('hotels')->group(function () {
    // ✅ Routes statiques en PREMIER
    Route::get('/', [ApiHotels::class, 'getAllHotels']);
    Route::post('/', [ApiHotels::class, 'createHotel']);
    Route::post('/search', [ApiHotels::class, 'searchHotels']);

    // ✅ Routes /rooms statiques avant les routes dynamiques /{id}
    Route::get('/rooms', [ApiRooms::class, 'getAllRooms']);
    Route::post('/rooms', [ApiRooms::class, 'createRoom']);
    Route::get('/rooms/{room_id}', [ApiRooms::class, 'getRoom']);
    Route::delete('/rooms/{room_id}', [ApiRooms::class, 'deleteRoom']);
    Route::put('/rooms/{room_id}', [ApiRooms::class, 'updateRoom']);
    Route::patch('/rooms/{room_id}/availability', [ApiRooms::class, 'updateRoomAvailability']);

    // ⚠️ Routes dynamiques /{id} en DERNIER
    Route::get('/{id}', [ApiHotels::class, 'getHotelById']);
    Route::put('/{id}', [ApiHotels::class, 'updateHotel']);
    Route::delete('/{id}', [ApiHotels::class, 'deleteHotel']);
    Route::get('/{hotel_id}/rooms', [ApiRooms::class, 'getHotelRooms']);
});

// Reservations and Payments
Route::prefix('reservations')->group(function () {
    Route::post('/', [ApiReservations::class, 'createReservation']);
    Route::get('/{id}', [ApiReservations::class, 'getReservation']);
    Route::post('/search', [ApiReservations::class, 'searchReservations']);
    // Supprimer chez le client mais visible chez l'admin
    Route::delete('/{id}', [ApiReservations::class, 'deleteReservation']);

    // Manager
    Route::get('/room/{id}', [ApiReservations::class, 'getRoomReservations']);
    Route::patch('/{id}/confirm', [ApiReservations::class, 'confirmReservation']);
    Route::patch('/{id}/cancel', [ApiReservations::class, 'cancelReservation']);

    // Payments
    Route::post('/payments/initiate', [ApiPayments::class, 'initiatePayment']);
    Route::post('/payments/callback', [ApiPayments::class, 'handlePaymentCallback']);
    Route::get('/payments/{id}', [ApiPayments::class, 'getPayment']);
});

// Promo Codes
Route::prefix('promos')->group(function () {
    Route::get('/check/{code}', [ApiPromosCodes::class, 'getPromo']);
    // Generer un autre code promo si le code n'est pas totalement utilise
});

// Favorites
Route::prefix('favorites')->group(function () {
    Route::post('/', [ApiFavorites::class, 'addFavorite']);
    Route::get('/{user_id}', [ApiFavorites::class, 'getFavorites']);
    Route::delete('/', [ApiFavorites::class, 'removeFavorite']);
});

// Subscriptions
Route::prefix('subscriptions')->group(function () {
    Route::get('/', [ApiSubscriptionPlans::class, 'getSubscriptions']);
    Route::post('/subscribe', [ApiUserSubscriptions::class, 'subscribe']);
    Route::get('/me/{user_id}', [ApiUserSubscriptions::class, 'getMySubscription']);
    Route::post('/cancel', [ApiUserSubscriptions::class, 'cancelSubscription']);

    // Payments
    Route::post('/payments/initiate', [ApiSubscriptionPayments::class, 'initiatePayment']);
    Route::post('/payments/callback', [ApiSubscriptionPayments::class, 'handlePaymentCallback']);
    Route::get('/payments/history/{user_id}', [ApiSubscriptionPayments::class, 'getPaymentHistory']);
});

// Notifications
Route::prefix('notifications')->group(function () {
    Route::get('/{user_id}', [ApiNotification::class, 'getNotifications']);
    Route::post('/mark-as-read', [ApiNotification::class, 'markAsRead']);
    Route::delete('/{id}', [ApiNotification::class, 'deleteNotification']);
});

// Politiques
Route::prefix('politique')->group(function () {
    Route::get('/mention', [ApiCondition::class, 'getMention']);
    Route::get('/security', [ApiCondition::class, 'getSecurity']);
    Route::get('/condition', [ApiCondition::class, 'getCondition']);
});

// Reviews
Route::prefix('reviews')->group(function () {
    Route::get('/hotel/{id}', [ApiReview::class, 'getReviewByHotel']);
    Route::post('/hotel/{id}', [ApiReview::class, 'addReviewByHotel']);
    Route::delete('/hotel/{id}', [ApiReview::class, 'deleteReviewByHotel']);
});
