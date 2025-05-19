<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\Message;
use App\Http\Controllers\PartmentController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {

    return view('user.auth.login');
});
// Route::get('/hotel', function () {

//     return view('admin.Hotel.create11');
// })->name('httt');
// Route::get('/user', function () {

//     return view('admin.User.create11');
// })->name('httt1');
// Route::get('/', [UserController::class, 'index1'])->name('hotels.index1');


Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'User') {
            return redirect()->route('user.dashboard');
        }
    }
    return view('admin.auth.login');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

    Route::get('/notifications/mark-all-read', [UserController::class, 'markAllNotificationsAsRead'])->name('notifications.markAllRead');

    Route::get('/notifications/{id}/read', function ($id) {
        $notification = Auth::user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back()->with('success', 'تم تعليم الإشعار كمقروء.');
    })->name('notifications.read');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'check_role:User']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
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
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::POST('login', [LoginController::class, 'login'])->name('admin.login');
});
Route::group(['prefix' => 'user', 'middleware' => 'guest'], function () {
    Route::get('/login', [UserLoginController::class, 'showLogin'])->name('login.user');
    Route::POST('login', [UserLoginController::class, 'login'])->name('user.login');
});
