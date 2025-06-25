<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\AirTransportsController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\Message;
use App\Http\Controllers\OtherServicesController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PartmentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return Redirect::back();
})->name('change.language');
Route::middleware('set_lang')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/packages', [HomeController::class, 'packages'])->name('package.index');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
    Route::get('/terms', [HomeController::class, 'term'])->name('term.index');
    Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy.index');
    Route::post('/inquiry', [HomeController::class, 'store'])->name('inquiry.store');
    Route::get('/create/user', [HomeController::class, 'register'])->name('subscribe');
    Route::post('/create/user', [UserLoginController::class, 'store'])->name('account.store');
    Route::post('/create/company', [UserLoginController::class, 'store1'])->name('account.store1');
    Route::get('/verify-otp', [UserLoginController::class, 'otp'])->name('otp');
    Route::post('/verify-otp', [UserLoginController::class, 'verify'])->name('verify.otp');
    Route::get('/package/{id}/info', [HomeController::class, 'package'])->name('package.show');
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check_role:superadmin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/delete', [UserController::class, 'indexDelete'])->name('user.indexDelete');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::POST('/userstore', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');

    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotel/delete', [HotelController::class, 'indexDelete'])->name('hotels.indexDelete');
    Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::POST('/hotelstore', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotel/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::post('/hotel/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotel/delete', [HotelController::class, 'destroy'])->name('hotels.delete');
    Route::get('/hotel/{id}/restore', [HotelController::class, 'restore'])->name('hotels.restore');

    Route::get('/partments', [PartmentController::class, 'index'])->name('partment.index');
    Route::get('/partment/delete', [PartmentController::class, 'indexDelete'])->name('partment.indexDelete');
    Route::get('/partments/create', [PartmentController::class, 'create'])->name('partment.create');
    Route::POST('/partmentstore', [PartmentController::class, 'store'])->name('partment.store');
    Route::get('/partment/{id}/edit', [PartmentController::class, 'edit'])->name('partment.edit');
    Route::post('/partment/{id}', [PartmentController::class, 'update'])->name('partment.update');
    Route::delete('/partment/delete', [PartmentController::class, 'destroy'])->name('partment.delete');
    Route::get('/partment/{id}/restore', [PartmentController::class, 'restore'])->name('partment.restore');
    Route::get('/drivers', [TransportController::class, 'driverIndex'])->name('drivers.index');
    Route::get('/drivers/create', [TransportController::class, 'driverCreate'])->name('drivers.create');
    Route::post('/drivers/store', [TransportController::class, 'driverStore'])->name('drivers.store');
    Route::get('/drivers/{id}/edit', [TransportController::class, 'driverEdit'])->name('drivers.edit');
    Route::post('/drivers/{id}', [TransportController::class, 'driverUpdate'])->name('drivers.update');
    Route::get('/transport', [TransportController::class, 'transportIndex'])->name('transport.index');
    Route::get('/transport/create', [TransportController::class, 'transportCreate'])->name('transport.create');
    Route::get('/transport/{id}/edit', [TransportController::class, 'transportEdit'])->name('transport.edit');

    Route::get('/vehicles', [TransportController::class, 'vehicleIndex'])->name('vehicles.index');
    Route::get('/vehicles/create', [TransportController::class, 'vehicleCreate'])->name('vehicles.create');
    Route::post('/vehicles/store', [TransportController::class, 'vehicleStore'])->name('vehicles.store');
    Route::get('/vehicles/{id}/edit', [TransportController::class, 'vehicleEdit'])->name('vehicles.edit');
    Route::post('/vehicles/{id}', [TransportController::class, 'vehicleUpdate'])->name('vehicles.update');

    Route::get('/air', [AirTransportsController::class, 'airIndex'])->name('air.index');
    Route::get('/air/create', [AirTransportsController::class, 'airCreate'])->name('air.create');
    Route::post('/air/store', [AirTransportsController::class, 'airStore'])->name('air.store');
    Route::get('/air/{id}/edit', [AirTransportsController::class, 'airEdit'])->name('air.edit');
    Route::post('/air/{id}/update', [AirTransportsController::class, 'airUpdate'])->name('air.update');

    Route::get('/services', [OtherServicesController::class, 'serIndex'])->name('services.index');
    Route::get('/services/create', [OtherServicesController::class, 'serCreate'])->name('services.create');
    Route::post('/services/store', [OtherServicesController::class, 'serStore'])->name('services.store');
    Route::get('/services/{id}/edit', [OtherServicesController::class, 'serEdit'])->name('services.edit');
    Route::post('/services/{id}/update', [OtherServicesController::class, 'serUpdate'])->name('services.update');

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/packages/store', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');
    Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::post('/packages/{id}/update', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');

    // Discount routes
    Route::get('/discount', [PackageController::class, 'showDiscount'])->name('discount.index');
    Route::get('/discount/edit', [PackageController::class, 'editDiscount'])->name('discount.edit');
    Route::post('/discount/{id}/update', [PackageController::class, 'updateDiscount'])->name('discount.update');

    // Bouquet routes
    Route::get('/bouquet', [PackageController::class, 'serIndex'])->name('bouquet.index');
    Route::get('/bouquet/create', [PackageController::class, 'serCreate'])->name('bouquet.create');
    Route::post('/bouquet/store', [PackageController::class, 'serStore'])->name('bouquet.store');
    Route::get('/bouquet/{id}/edit', [PackageController::class, 'serEdit'])->name('bouquet.edit');
    Route::post('/bouquet/{id}/update', [PackageController::class, 'serUpdate'])->name('bouquet.update');

    // Booking routes
    Route::get('/booking', [PackageController::class, 'booking'])->name('booking1.index');
    Route::get('/booking/{id}/people', [PackageController::class, 'peopleBooking'])->name('package.pepole');

    Route::get('/notifications/mark-all-read', [UserController::class, 'markAllNotificationsAsRead'])->name('notifications.markAllRead');

    Route::get('/notifications/{id}/read', function ($id) {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back()->with('success', 'تم تعليم الإشعار كمقروء.');
    })->name('notifications.read');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/about', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.delete');

    Route::get('/social', [SocialController::class, 'index'])->name('social.index');
    Route::get('/social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::post('/social/{id}', [SocialController::class, 'update'])->name('social.update');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'check_role:user', 'set_lang']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/booking/{id}', [UserDashboardController::class, 'booking'])->name('booking.index');
    Route::post('/profile/update', [UserDashboardController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/profile/password/update', [UserDashboardController::class, 'updatePassword'])->name('user.password.update');
    Route::post('/profile/account/store', [UserDashboardController::class, 'storeAccount'])->name('user.account.store');

    Route::get('/booking/{id}/payment', [UserDashboardController::class, 'payment'])->name('user.payment');

    Route::post('/paypal/process', [PayPalController::class, 'processTransaction'])->name('paypal.process');
    Route::post('/paypal/capture', [PayPalController::class, 'captureTransaction'])->name('paypal.capture');
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('user.logout');


    Route::get('/notifications/{id}/read', function ($id) {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back()->with('success', 'تم تعليم الإشعار كمقروء.');
    })->name('notifications.read1');
});

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'showLogin'])->name('login.admin');
    Route::POST('login', [LoginController::class, 'login'])->name('admin.login');
});
Route::group(['prefix' => 'user', 'middleware' => ['guest', 'set_lang']], function () {
    Route::get('/login', [UserLoginController::class, 'showLogin'])->name('login');
    Route::POST('login', [UserLoginController::class, 'login'])->name('user.login');
});
