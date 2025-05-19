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

class TransportEdit extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $drivers = [];

    public $id;
    public $show0 = true;
    public $show = false;


    public $services;
    public $rooms1 = [];
    public $rooms = [];
    public function mount($id)
    {
        $this->id = $id;
        $data = Transport::find($this->id);
        $this->name = $data->name;
        $this->price = $data->price;
        $this->drivers = $data->drivers->pluck('driver_id');
        foreach ($data->services as $index => $serv) {
            $this->rooms[$index] = [
                'name' => $serv->name,
                'price' => $serv->price,
                'id' => $serv->id,
            ];
        }
    }
    public function removeService1($index)
    {
        unset($this->rooms[$index]);
        $this->rooms = array_values($this->rooms);
        TransportService::where('id', $index)->delete();
        session()->flash('success', 'تم الحذف  بنجاح!');
        return redirect()->route('transport.edit', ['id' => $this->id]);
    }
    public function addService()
    {
        $this->rooms1[] = [
            'name' => '',
            'price' => '',
            'id' => '',
        ];
    }

    public function removeService($index)
    {
        unset($this->rooms1[$index]);
        $this->rooms1 = array_values($this->rooms1);
    }



    public function saveService()
    {
        foreach ($this->rooms1 as $room) {
            TransportService::create([
                'name' => $room['name'],
                'price' => $room['price'],
                'transport_id' => $this->id,
            ]);
        }
        $this->show0 = true;
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

        Transport::where('id', $this->id)->update($data);
        TransportDriver::where('transport_id', $this->id)->delete();
        foreach ($this->drivers as $driver) {
            TransportDriver::create([
                'transport_id' => $this->id,
                'driver_id' => $driver
            ]);
        }
        $this->show0 = false;
        $this->show = true;
    }
    public function render()
    {

        $drivers1 = Driver::all();
        return view('livewire.transport-edit', compact('drivers1'));
    }
}
