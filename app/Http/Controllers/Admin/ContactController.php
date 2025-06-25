<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a paginated list of inquiries, showing only the first 50 chars of the message
    public function index()
    {
        $data = Inquiry::orderBy('id', 'desc')->paginate(10);
        return view('admin.Contact.index', compact('data'));
    }

    // Show the full message for a specific inquiry
    public function show($id)
    {
        $item = Inquiry::findOrFail($id);
        return view('admin.Contact.show', compact('item'));
    }
} 