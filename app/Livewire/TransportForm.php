<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Transport;
use App\Models\TransportDriver;
use App\Models\TransportService;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class TransportForm extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $drivers = [];

    public $id;
    public $show0 = true;
    public $show = false;


    public $services;

    public $rooms = [];

    public function addService()
    {
        $this->rooms[] = [
            'name' => '',
            'price' => '',
        ];
    }

    public function removeService($index)
    {
        unset($this->rooms[$index]);
        $this->rooms = array_values($this->rooms);
    }


    public function saveService()
    {
        foreach ($this->rooms as $room) {
            TransportService::create([
                'name' => $room['name'],
                'price' => $room['price'],
                'transport_id' => $this->id,
            ]);
        }
        $this->show0 = false;
        $this->show = false;
        session()->flash('success', 'تم حفظ وسيلة النقل بنجاح!');
        return redirect()->route('transport.index');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'price' => 'required|string',
        ]);

        $user = Auth::user();

        $data = [
            'name' => $this->name,
            'price' => $this->price,
        ];
        $data = Transport::create($data);
        foreach ($this->drivers as $driver) {
            TransportDriver::create([
                'transport_id' => $data->id,
                'driver_id' => $driver
            ]);
        }
        $this->id = $data->id;

        $this->show = true;
        if ($data) {
            $users = User::whereIn('role', ['admin', 'superadmin'])
                ->where('active', 1)
                ->get();

            foreach ($users as $u) {
                $notif = [
                    'title' => 'تم إضافة وسيلة نقل جديدة بواسطة ' . $user->username,
                    'body' => 'create_transport',
                    'target' => 'transport',
                    'link' => route('transport.index', ['transport_id' =>  $this->id]),
                    'target_id' => $u->id,
                    'sender' => $user->id,
                ];
                $u->notify(new LocalNotification($notif));
            }
            $this->show0 = false;
            Session::flash('success', 'تم إضافة وسيلة النقل بنجاح.');
        } else {
            Session::flash('error', 'حدث خطأ أثناء الإضافة.');
        }
    }
    public function render()
    {
        $drivers1 = Driver::all();
        return view('livewire.transport-form', compact('drivers1'));
    }
}
