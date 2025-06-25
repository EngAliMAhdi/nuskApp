<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bouquet;
use App\Models\Discount;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index()
    {
        // Logic to list all packages
        return view('admin.Packages.index');
    }
    public function showDiscount()
    {
        $data = Discount::first();
        return view('admin.Discount.index', compact('data'));
    }
    public function editDiscount()
    {
        $data = Discount::first();
        return view('admin.Discount.edit', compact('data'));
    }
    public function updateDiscount(Request $request, $id)
    {
        $data = $request->except(['_token']);
        Discount::where('id', $id)->update($data);
        return redirect()->route('discount.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function create()
    {
        return view('admin.Packages.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new package
        // Validate and save the package data
    }

    public function show($id)
    {
        // Logic to display a specific package
        return view('packages.show', compact('id'));
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific package
        return view('packages.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific package
        // Validate and update the package data
    }

    public function destroy($id)
    {
        // Logic to delete a specific package
    }

    // bouquet
    public function serIndex()
    {
        return view('admin.Bouquet.index');
    }
    public function serCreate()
    {
        return view('admin.Bouquet.create');
    }
    public function serStore(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('bouquet', 'public') ?? null;

        $driver = Bouquet::create($data);
        $user1 = Auth::user();
        if ($driver) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => ' تم اضافة نوع باقة جديد بواسطة' . $user1->username,
                    'body' => "create_drivers",
                    'target' => 'driver',
                    'link' => route('drivers.index', ['driver_id' => $driver->id]),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('bouquet.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }
    public function serEdit($id)
    {
        $data = Bouquet::find($id);
        return view('admin.Bouquet.edit', compact('data'));
    }
    public function serUpdate(Request $request, $id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bouquet', 'public');
        } else {
            unset($data['image']);
        }
        Bouquet::where('id', $id)->update($data);

        return redirect()->route('bouquet.index')->with('success', 'تم تحديث البيانات بنجاح');
    }
    public function booking()
    {
        return view('admin.Booking.index');
    }
    public function peopleBooking($id)
    {
        $data = Booking::find($id)->people;
        return view('admin.Booking.people', compact('data'));
    }
}
