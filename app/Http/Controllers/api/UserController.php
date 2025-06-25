<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends BaseController
{
    public function sendSms1($email, $code)
    {
        $subject = "رمز التحقق OTP";
        $message = "رمز التحقق الخاص بك هو: $code";
        $headers = "From: eng.aliosama.mah@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        // dd($email);
        if (mail($email, $subject, $message, $headers)) {
            echo "تم إرسال الرمز بنجاح. تحقق من بريدك.";
        } else {
            echo "فشل في إرسال البريد.";
        }
    }
    public function resentCode(Request $request)
    {
        $otp = rand(100000, 999999);
        if (env('APP_MODE') == 'test') {
            $otp = '123456';
        } else {
            $response = $this->sendSms1($request->phone, $otp);
        }
        User::where('phone', $request->phone)->update([
            'code' => $otp
        ]);
        return $this->sendResponse([], 'تم إعادة ارسال كود التحقق للموبايل');
    }
    public function login(Request $request)
    {
        $login = $request->input('email');
        $password = $request->input('password');

        $credentials = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $login, 'password' => $password]
            : ['phone' => $login, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->code) {
                return $this->sendError([], 'الرجاء التحقق من رقم الموبايل');
            }

            $token = $user->createToken('auth-token')->plainTextToken;
            $data['token'] = $token ?? null;
            $data['user'] = [
                'id' => $user->id,
                'name' => $user->username,
                'email' => $user->email,
                'phone' => $user->phone,
            ];
            return $this->sendResponse($data, 'Login Successfully');
        } else {
            return $this->sendError([], 'Error in login');
        }
    }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }

        $user = Auth::user();


        $user->password = bcrypt($request->password);
        $user->save();

        return $this->sendResponse([], 'تم إعادة تعيين كلمة المرور بنجاح');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $otp = rand(1000, 9999);
        $data = $request->all();
        if (env('APP_MODE') == 'test') {
            $otp = '123456';
        }
        $data['code'] = $otp;
        $data['date'] = date('Y-m-d');
        $data['role'] = 'user';
        $user = User::create($data);
        if (!$user) {
            return $this->sendResponse([], 'Error in rgister');
        }
        // event(new Registered($user));
        // Auth::login($user);
        // $token = $user->createToken('auth-token')->plainTextToken;
        // $info['token'] = $token ?? null;
        // $info['user'] = [
        //     'id' => $user->id,
        //     'name' => $user->username,
        //     'email' => $user->email,
        //     'phone' => $user->phone,
        // ];
        return $this->sendResponse([], 'تم إنشاء الحساب بنجاح يرجى تحقق من رقم الهاتف');
    }
    public function verifyPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required',
        ]);

        $user = User::where('phone', $request->phone)
            ->where('code', $request->otp)
            ->first();

        if (!$user) {
            return $this->sendError([], 'Invalid phone number or verification code.', 422);
        }

        $user->update([
            'code' => null,
        ]);
        $token = $user->createToken('auth-token')->plainTextToken;
        $info['token'] = $token ?? null;
        $info['user'] = [
            'id' => $user->id,
            'name' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
        ];

        return $this->sendResponse($info, 'تم التحقق من رقم الهاتف بنجاح.');
    }
    public function store1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $otp = rand(100000, 999999);
        $data = $request->except(['city', 'registration_number', 'license_number']);
        if (env('APP_MODE') == 'test') {
            $otp = '123456';
        }
        $data['code'] = $otp;
        $data['date'] = date('Y-m-d');
        $data['role'] = 'company';
        $user = User::create($data);
        if (!$user) {
            return $this->sendResponse([], 'Error in rgister');
        }
        //event(new Registered($user));
        $validator = Validator::make($request->all(), [
            'city' => 'required|string|max:255',
            'registration_number' => 'file|required|mimes:jpg,jpeg,png,pdf|max:2048',
            'license_number' => 'file|required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $data1 = $request->only(['city', 'registration_number', 'license_number', 'username', 'email']);
        $data1['user_id'] = $user->id;
        if ($request->hasFile('registration_number')) {
            $data1['registration_number'] = $request->file('registration_number')->store('uploads/companies', 'public');
        }
        if ($request->hasFile('license_number')) {
            $data1['license_number'] = $request->file('license_number')->store('uploads/companies', 'public');
        }
        $user->company()->create($data1);
        if (!$user->company) {
            return $this->sendResponse([], 'Error in rgister company');
        }

        //Auth::login($user);
        //$token = $user->createToken('auth-token')->plainTextToken;
        $info['token'] = $token ?? null;
        $info['user'] = [
            'id' => $user->id,
            'name' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
        ];
        return $this->sendResponse([], 'تم إنشاء حساب بنجاح الرجاء التحقق من رقم');
    }
    public function update(Request $request)
    {
        $id = Auth::id();
        if (!$id) {
            return $this->sendError('Error  token');
        }
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $data = $request->except(['_token']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        try {
            User::where('id', $id)->update($data);
            return $this->sendResponse([], 'تم تحديث البيانات بنجاح');
        } catch (Exception $th) {
            return $this->sendError('Error update profile');
        }
    }
    public function accountStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'current_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'dob' => 'required|date',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $data = $request->all();
        $user = Auth::user();
        if (!$user) {
            return $this->sendError('User not authenticated');
        }
        $data['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/accounts', 'public');
        }
        $account = $user->account;

        if ($account) {
            $account->update($data);
        } else {
            $account = $user->account()->create($data);
        }

        if (!$account) {
            return $this->sendError('خلل في حفظ البيانات');
        }


        return $this->sendResponse([], 'تم حفظ البيانات بنجاح');
    }
    public function getAccount()
    {
        $user = Auth::user();
        if (!$user) {
            return $this->sendError('User not authenticated');
        }
        $account = $user->account;
        if (!$account) {
            return $this->sendError('Account not found');
        }
        return $this->sendResponse($account, 'تم جلب بيانات الحساب بنجاح');
    }
    public function profile()
    {
        $id = Auth::id();
        if (!$id) {
            return $this->sendError('Error  token');
        }
        $user = User::find($id);
        $data = [
            'id' => $user->id,
            'name' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
        ];
        return $this->sendResponse($data, 'get info profile Successfully');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken();

        if (!$token) {
            return $this->sendError([], 'No active token found');
        }

        if ($token->delete()) {
            return $this->sendResponse([], 'Logged out successfully');
        } else {
            return $this->sendError('Logout failed', 500);
        }
    }
    public function getTerm()
    {
        $data = [
            'term' => "📜 شروط الاستخدام
1. إنشاء الحساب:
يجب أن تكون فوق 18 سنة
تقديم معلومات دقيقة وصحيحة
الحفاظ على سرية بيانات الدخول
2. الحجوزات والدفع:
الأسعار قابلة للتغيير حتى تأكيد الحجز
الإلغاء خلال 24 ساعة لاسترداد المبلغ كاملًا
بعد 24 ساعة: خصم 30% من المبلغ
3. السلوكيات الممنوعة:
استخدام التطبيق لأغراض غير مشروعة
انتحال شخصية آخرين
إساءة استخدام نظام الحجوزات
4. مسؤولية المستخدم:
التأكد من صحة بيانات السفر (تواريخ انتهاء الجوازات)
الالتزام بمواعيد الرحلات والبرامج
⚖️ البنود العامة
نتحفظ الحق في تحديث الشروط مع إشعار مسبق
يتم حل النزاعات عبر محاكم المملكة العربية السعودية
للاستفسارات: privacy@alharamain.com / +966 36 355 7789",
        ];
        return $this->sendResponse($data, 'get term successfully');
    }
    public function getPrivacy()
    {
        $data = [
            'privacy' => "🔒 سياسة الخصوصية
1. البيانات التي نجمعها:
المعلومات الشخصية (الاسم، الجنسية، بيانات جواز السفر)
بيانات الحجز (الرحلات، الفنادق، وسائل النقل)
بيانات الدفع (محفوظة مشفرة عبر بوابة آمنة)
بيانات الاستخدام (سجل التصفح، التفاعل مع الخدمات)
2. كيفية استخدام البيانات:
تلبية طلبات الحجوزات والخدمات
تحسين تجربة المستخدم
التواصل بشأن تحديثات الرحلات
الأغراض الأمنية والاحتيال
3. مشاركة البيانات:
مع شركائنا المعتمدين (الفنادق، شركات النقل)
مع الجهات الحكومية عند الضرورة القانونية
لا نبيع بياناتك لأطراف خارجية
4. حقوق المستخدم:
طلب نسخة من بياناتك
تصحيح المعلومات غير الدقيقة"
        ];
        return $this->sendResponse($data, 'get privacy successfully');
    }
}
