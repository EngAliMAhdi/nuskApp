<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('Company.index');
    }
    public function packages()
    {
        // Logic to list all packages
        return view('Company.Packages.index');
    }

    public function create()
    {
        return view('Company.Packages.create');
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
    public function booking()
    {
        return view('Company.Booking.index');
    }
    public function peopleBooking($id)
    {
        $data = Booking::find($id)->people;
        return view('Company.Booking.people', compact('data'));
    }
}
