<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Display a listing of the About entries
    public function index()
    {
        $abouts = About::orderBy('id', 'desc')->get();
        return view('admin.About.index', compact('abouts'));
    }

    // Show the form for creating a new About entry
    public function create()
    {
        return view('admin.About.create');
    }

    // Store a newly created About entry in storage
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'question_en' => 'nullable|string',
            'answer_en' => 'nullable|string',
        ]);
        About::create($request->only(['question', 'answer', 'question_en', 'answer_en']));
        return redirect()->route('about.index')->with('success', 'تمت الإضافة بنجاح');
    }

    // Show the form for editing the specified About entry
    public function edit($id)
    {
        $data = About::findOrFail($id);
        return view('admin.About.edit', compact('data'));
    }

    // Update the specified About entry in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'question_en' => 'nullable|string',
            'answer_en' => 'nullable|string',
        ]);
        $about = About::findOrFail($id);
        $about->update($request->only(['question', 'answer', 'question_en', 'answer_en']));
        return redirect()->route('about.index')->with('success', 'تم التحديث بنجاح');
    }

    // Remove the specified About entry from storage
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
        return redirect()->route('about.index')->with('success', 'تم الحذف بنجاح');
    }
} 