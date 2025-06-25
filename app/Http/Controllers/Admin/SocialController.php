<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    // Display the social links (index)
    public function index()
    {
        $data = SocialLink::first();
        return view('admin.Social.index', compact('data'));
    }

    // Show the form for editing the social links
    public function edit($id)
    {
        $data = SocialLink::findOrFail($id);
        return view('admin.Social.edit', compact('data'));
    }

    // Update the social links
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'x' => 'nullable|string',
            'instagram' => 'nullable|string',
            'whatsapp' => 'nullable|string',
        ]);
        $social = SocialLink::findOrFail($id);
        $social->update($request->only(['phone', 'email', 'facebook', 'x', 'instagram', 'whatsapp']));
        return redirect()->route('social.index')->with('success', 'تم تحديث وسائل التواصل بنجاح');
    }
}
