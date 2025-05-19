<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        // User::create([
        //     'username' => 'admin',
        //     'role' => 'superadmin',
        //     'password' => bcrypt('password'),
        //     'email' => 'admin@adimn.com',
        //     'date' => date('Y-m-d')
        // ]);
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with(['error' => 'عفوا بيانات التسجيل غير صحيحة !!']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
