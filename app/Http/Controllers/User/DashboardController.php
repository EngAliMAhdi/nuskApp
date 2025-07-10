<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = Booking::where('user_id', Auth::id())->get();
        return view('user.auth.profile', compact('data'));
    }

    public function booking($id)
    {
        $package = Package::find($id);
        return view('user.booking', ['package' => $package]);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ], [
            'current_password.required' => 'يجب إدخال كلمة المرور الحالية',
            'new_password.required' => 'يجب إدخال كلمة المرور الجديدة',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
    }
    public function storeAccount(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'current_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('accounts', 'public');
            $validated['image'] = $path;
        }

        $user->account()->updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        return redirect()->back()->with('success', 'تم حفظ معلومات الحساب بنجاح');
    }
    public function payment($id)
    {
        $booking = Booking::find($id);
        return view('user.payment', compact('booking'));
    }
    public function cancel($id)
    {

        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->back()->with('error', 'الحجز غير موجود.');
        }
        if ($booking->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'لا يمكنك إلغاء حجز ليس لك.');
        }
        if ($booking->status == 'cancelled') {
            return redirect()->back()->with('error', 'هذا الحجز تم إلغاؤه بالفعل.');
        }
        if ($booking->status != 'pending') {
            return redirect()->back()->with('error', 'لا يمكنك إلغاء هذا الحجز لأنه في حالة غير قابلة للإلغاء.');
        }

        $booking->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'تم إلغاء الحجز بنجاح.');
    }
}
