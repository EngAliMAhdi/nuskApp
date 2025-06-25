<?php

namespace App\Http\Controllers;

use App\Models\OtherService;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherServicesController extends Controller
{
    public function serIndex()
    {
        return view('admin.Services.index');
    }
    public function serCreate()
    {
        return view('admin.Services.create');
    }
    public function serStore(Request $request)
    {
        $data = $request->all();

        $driver = OtherService::create($data);
        $user1 = Auth::user();
        if ($driver) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => ' تم اضافة خدمة أخرى جديد بواسطة' . $user1->username,
                    'body' => "create_drivers",
                    'target' => 'driver',
                    'link' => route('drivers.index', ['driver_id' => $driver->id]),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('services.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }
    public function serEdit($id)
    {
        $data = OtherService::find($id);
        return view('admin.Services.edit', compact('data'));
    }
    public function serUpdate(Request $request, $id)
    {
        $data = $request->except('_token');

        OtherService::where('id', $id)->update($data);

        return redirect()->route('services.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
