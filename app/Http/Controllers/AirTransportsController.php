<?php

namespace App\Http\Controllers;

use App\Models\AirTransports;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AirTransportsController extends Controller
{
    public function airIndex()
    {
        return view('admin.Air.index');
    }
    public function airCreate()
    {
        return view('admin.Air.create');
    }
    public function airStore(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('airplane_image')) {
            $path = $request->file('airplane_image')->store('airplane', 'public');
            $data['airplane_image'] = $path;
        }
        $driver = AirTransports::create($data);
        $user1 = Auth::user();
        if ($driver) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => ' تم اضافة طائرة جديدة بواسطة' . $user1->username,
                    'body' => "create_drivers",
                    'target' => 'driver',
                    'link' => route('drivers.index', ['driver_id' => $driver->id]),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('air.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }
    public function airEdit($id)
    {
        $data = AirTransports::find($id);
        return view('admin.Air.edit', compact('data'));
    }
    public function airUpdate(Request $request, $id)
    {
        $data = $request->except('_token');
        if ($request->hasFile('airplane_image')) {
            $path = $request->file('airplane_image')->store('airplane', 'public');
            $data['airplane_image'] = $path;
        } else {
            unset($data['airplane_image']);
        }
        AirTransports::where('id', $id)->update($data);

        return redirect()->route('air.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
