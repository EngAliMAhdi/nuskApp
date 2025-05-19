<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Transport;
use App\Models\User;
use App\Models\Vehicle;
use App\Notifications\LocalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    public function driverIndex()
    {
        return view('admin.Driver.index');
    }
    public function driverCreate()
    {
        return view('admin.Driver.create');
    }
    public function driverStore(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('license_file')) {
            $path = $request->file('license_file')->store('hotels', 'public');
            $data['license_file'] = $path;
        }
        $driver = Driver::create($data);
        $user1 = Auth::user();
        if ($driver) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => ' تم اضافة فندق جديد بواسطة' . $user1->username,
                    'body' => "create_drivers",
                    'target' => 'driver',
                    'link' => route('drivers.index', ['driver_id' => $driver->id]),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('drivers.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }
    public function driverEdit($id)
    {
        $data = Driver::find($id);
        return view('admin.Driver.edit', compact('data'));
    }
    public function driverUpdate(Request $request, $id)
    {
        $data = $request->except('_token');
        if ($request->hasFile('license_file')) {
            $path = $request->file('license_file')->store('hotels', 'public');
            $data['license_file'] = $path;
        } else {
            unset($data['license_file']);
        }
        Driver::where('id', $id)->update($data);

        return redirect()->route('drivers.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
    public function transportIndex()
    {
        return view('admin.Transport.index');
    }
    public function transportCreate()
    {
        $drivers1 = Driver::all();
        return view('admin.Transport.create', compact('drivers1'));
    }
    public function transportEdit($id)
    {
        return view('admin.Transport.edit', compact('id'));
    }
    public function vehicleIndex()
    {
        return view('admin.Vehicle.index');
    }
    public function vehicleCreate()
    {
        $transport = Transport::all();

        return view('admin.Vehicle.create', compact('transport'));
    }
    public function vehicleStore(Request $request)
    {
        $data = $request->all();
        $vehicle = Vehicle::create($data);
        $user1 = Auth::user();
        if ($vehicle) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => '  تم اضافة فندق جديد بواسطة ' . $user1->username,
                    'body' => "create_drivers",
                    'target' => 'driver',
                    'link' => route('drivers.edit', $vehicle->id),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('vehicles.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }
    public function vehicleEdit($id)
    {
        $data = Vehicle::find($id);
        $transport = Transport::all();

        return view('admin.Vehicle.edit', compact('data', 'transport'));
    }
    public function vehicleUpdate(Request $request, $id)
    {
        $data = $request->except('_token');

        Vehicle::where('id', $id)->update($data);

        return redirect()->route('vehicles.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
