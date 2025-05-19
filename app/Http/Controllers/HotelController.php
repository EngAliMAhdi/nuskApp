<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = User::whereIn('role', ['User', 'Lawyer'])->orderBy('id', 'desc')->get();
        $data = Hotel::orderBy('id', 'desc')->get();

        return view('admin.Hotel.index', compact('data'));
    }
    // public function index1()
    // {
    //     // $data = User::whereIn('role', ['User', 'Lawyer'])->orderBy('id', 'desc')->get();
    //     $data = Hotel::orderBy('id', 'desc')->get();

    //     return view('admin.Hotel.index1', compact('data'));
    // }
    public function indexDelete()
    {
        // $data = User::whereIn('role', ['User', 'Lawyer'])->onlyTrashed()->get();
        $data = Hotel::onlyTrashed()->get();
        return view('admin.Hotel.index-delete', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'city' => 'required',
        ]);
        $user1 = Auth::user();
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hotels', 'public');
            $data['images'] = $path;
        }
        $data['added_by'] = $user1->id;
        $hotel = Hotel::create($data);

        if ($hotel) {
            $users = User::whereIn('role', ['admin', 'superadmin'])->where('active', 1)->get();
            foreach ($users as $user) {
                $data1 = [
                    'title' => ' تم اضافة فندق جديد بواسطة' . $user1->username,
                    'body' => "create_Hotel",
                    'target' => 'hotel',
                    'link' => route('hotels.index', ['user_id' => $user->id]),
                    'target_id' => $user->id,
                    'sender' => $user1->id,
                ];
                $user->notify(new LocalNotification($data1));
            }
            return redirect()->route('hotels.index')->with('success', 'تم إضافة البيانات بنجاح');
        }
        return redirect()->back()->with('error', 'خطأ في أضافة البيانات');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Hotel::findOrFail($id);
        return view('admin.Hotel.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $data = Hotel::findOrFail($id);

        return view('admin.Hotel.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([

                'name' => 'required',
                'city' => 'required',
            ]);
            DB::beginTransaction();

            $data = $request->except('_token');

            if (!$request->hasFile('image')) {
                unset($data['images']);
            } else {
                $path = $request->file('image')->store('hotels', 'public');
                $data['images'] = $path;
            }

            $data['updated_by'] = Auth::id();
            $data['updated_at'] = now();
            Hotel::where('id', $id)->update($data);

            DB::commit();
            return redirect()->route('hotels.index')->with(['success' => 'تم تعديل البيانات بنجاح']);
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفواً حدث خطأ  ' . $th->getMessage()])->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $User = Hotel::findOrFail($request->id);
        if (!$User) {
            return redirect()->back()->with(['error' => 'عفواً لا توجد بيانات']);
        }
        $request->validate([
            'reason' => 'required|string',
        ]);
        $User->updated_by = Auth::id();
        $User->delete_reason = $request->reason;
        $User->active = 0;
        $User->save();
        $User->delete();
        return redirect()->route('hotels.index')->with(['success' => 'تم حذف البيانات بنجاح']);
    }
    public function restore($id)
    {
        Hotel::withTrashed()->find($id)->restore();

        $User = Hotel::findOrFail($id);
        if (!$User) {
            return redirect()->route('hotels.indexDelete')->with(['error' => 'عفواً لا توجد بيانات']);
        }
        $User->updated_by = Auth::id();
        $User->delete_reason = "";
        $User->active = 1;
        $User->save();
        return redirect()->route('hotels.indexDelete')->with(['success' => 'تم استرجاع البيانات بنجاح']);
    }
}
