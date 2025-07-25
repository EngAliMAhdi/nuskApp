<?php

use App\Http\Controllers\api\PackageController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\TravelBookingController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/check-token', function (Request $request) {
    return response()->json(['user' => $request->user()]);
});


Route::post('user/register', [UserController::class, 'store']);
Route::post('company/register', [UserController::class, 'store1']);

Route::post('/verify/phone', [UserController::class, 'verifyPhone']);
Route::post('resent/otp', [UserController::class, 'resentCode']);
Route::post('forget/password', [UserController::class, 'resentCode']);
Route::get('/terms', [UserController::class, 'getTerm']);
Route::get('/privacy', [UserController::class, 'getPrivacy']);
Route::get('/send/{i}/{code}', [UserController::class, 'sendSms1']);

Route::get('/bouquets', [PackageController::class, 'bouquets']);
Route::get('/bouquet/{id}/packages', [PackageController::class, 'backages']);
Route::get('/package/{id}', [PackageController::class, 'backages1']);
Route::get('/social', [PackageController::class, 'social']);



Route::post('/login', [UserController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/account/store', [UserController::class, 'accountStore']);
    Route::post('/change/password', [UserController::class, 'updatePassword']);
    Route::get('/account/info', [UserController::class, 'getAccount']);
    Route::post('/booking', [PackageController::class, 'booking']);
    Route::post('/booking/cancel/{id}', [PackageController::class, 'cancel']);
    Route::get('/my-booking', [PackageController::class, 'booking1']);

    // Travel Booking API Routes
    Route::get('/travel-bookings', [TravelBookingController::class, 'index']);
    Route::post('/travel-bookings', [TravelBookingController::class, 'create']);
    Route::get('/travel-bookings/{id}', [TravelBookingController::class, 'show']);
    Route::post('/travel-bookings/{id}/cancel', [TravelBookingController::class, 'cancel']);
    Route::get('/travel-bookings/form/data', [TravelBookingController::class, 'getFormData']);

    Route::post('/profile/update', [UserController::class, 'update']);
    Route::get('/logout', [UserController::class, 'logout']);
});
