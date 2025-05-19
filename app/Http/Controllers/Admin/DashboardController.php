<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientRequest;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\Lawyer;
use App\Models\Partment;
use App\Models\Transport;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $data['user'] = User::count();
        $data['hotel'] = Hotel::count();
        $data['partment'] = Partment::count();
        $data['drivers'] = Driver::count();
        $data['transport'] = Transport::count();
        $data['vehicles'] = Vehicle::count();

        return view('admin.index',  compact('data'));
    }
}
