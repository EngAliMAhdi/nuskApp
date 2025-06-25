<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\VisitClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin()
    {

        return view('user.auth.login');
    }
    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('login')->with('error', 'عفوا بيانات التسجيل غير صحيحة !!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = env('APP_MODE') == 'test' ? '123456' : rand(1000, 9999);
        $user = User::create([
            'username' => $validatedData['username'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'code' => $otp,
            'date' => now()->format('Y-m-d'),
            'role' => 'user',
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الحساب')->withInput();
        }
        return view('user.auth.otp', ['phone' => $validatedData['phone']]);
    }

    public function storeCompany(Request $request)
    {
        // التحقق من بيانات المستخدم
        $validatedUser = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = env('APP_MODE') == 'test' ? '123456' : rand(100000, 999999);

        $user = User::create([
            'username' => $validatedUser['username'],
            'phone' => $validatedUser['phone'],
            'email' => $validatedUser['email'],
            'password' => bcrypt($validatedUser['password']),
            'code' => $otp,
            'date' => now()->format('Y-m-d'),
            'role' => 'company',
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء المستخدم')->withInput();
        }

        $validatedCompany = $request->validate([
            'city' => 'required|string|max:255',
            'registration_number' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'license_number' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $companyData = [
            'city' => $validatedCompany['city'],
            'user_id' => $user->id,
        ];

        if ($request->hasFile('registration_number')) {
            $companyData['registration_number'] = $request->file('registration_number')->store('uploads/companies', 'public');
        }

        if ($request->hasFile('license_number')) {
            $companyData['license_number'] = $request->file('license_number')->store('uploads/companies', 'public');
        }

        $user->company()->create($companyData);

        if (!$user->company) {
            return redirect()->back()->with('error', 'فشل تسجيل بيانات الشركة')->withInput();
        }


        return view('user.auth.otp', ['phone' => $validatedUser['phone']]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|array|size:6', // code يجب أن يكون array
            'code.*' => 'required|string|size:1' // كل خانة يجب أن تكون رقم واحد فقط
        ]);
        // $codeArray = $request->code;
        $code = implode('', $request->input('code'));
        $user = User::where('phone', $request->phone)
            ->where('code', $code)
            ->first();

        if ($user) {
            $user->update(['code' => null]);
            return redirect()->route('home')->with('success', 'تم التحقق من رقم الهاتف بنجاح');
        }

        return redirect()->route('home')->with('error', 'رمز التحقق غير صحيح أو رقم الهاتف غير مسجل')->withInput();
    }
}
