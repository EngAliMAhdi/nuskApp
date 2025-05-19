<?php

namespace App\Http\Controllers;

use App\Models\Partment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Partment::orderBy('id', 'desc')->get();

        return view('admin.Partment.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Partment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $User = Partment::findOrFail($request->id);
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
        return redirect()->route('partment.index')->with(['success' => 'تم حذف البيانات بنجاح']);
    }
    public function restore($id)
    {
        Partment::withTrashed()->find($id)->restore();

        $User = Partment::findOrFail($id);
        if (!$User) {
            return redirect()->route('partment.indexDelete')->with(['error' => 'عفواً لا توجد بيانات']);
        }
        $User->updated_by = Auth::id();
        $User->delete_reason = "";
        $User->active = 1;
        $User->save();
        return redirect()->route('partment.indexDelete')->with(['success' => 'تم استرجاع البيانات بنجاح']);
    }
}
