<?php

namespace App\Livewire;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Service;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class HotelEdit extends Component
{
    use WithFileUploads;

    public $name;
    public $city;
    public $image;
    public $hotelId;
    public $show0 = true;
    public $show = false;
    public $show1 = false;

    public $services;
    public $services1;
    public $id;
    public $price;

    public $rooms0 = [];
    public $rooms = [];
    public $rooms1 = [];
    public $rooms2 = [];

    public function mount($id)
    {
        $this->id = $id;
        $data = Hotel::find($this->id);
        $this->name = $data->name;
        $this->city = $data->city;
        $this->image = $data->image;
        foreach ($data->services as $index => $serv) {
            $this->rooms0[$index] = [
                'name' => $serv->name,
                'price' => $serv->price,
                'sale_price' =>  $serv->sale_price,
                'id' => $serv->id,

            ];
        }
        foreach ($data->rooms as $index => $serv) {
            $this->rooms2[$index] = [
                'name' => $serv->name,
                'price' => $serv->cost_price,
                'id' => $serv->id,
                'type' => $serv->type,
                'number' => $serv->number,
                'beds' => $serv->beds_count,
                'sale_price' =>  $serv->sale_price,
                'service' => $serv->services->pluck('service_id')
            ];
        }
    }

    public function addRoom()
    {
        $this->rooms[] = [
            'name' => '',
            'hotel_id' => '',
            'price' => '',
            'sale_price' => '',
        ];
    }


    public function removeRoom($index)
    {
        unset($this->rooms[$index]);
        $this->rooms = array_values($this->rooms);
    }


    public function addRoom1()
    {
        $this->rooms1[] = [
            'type' => '',
            'number' => '',
            'beds' => '',
            'price' => '',
            'sale_price' => '',
            'service' => []
        ];
    }
    public function removeRoom1($index)
    {
        unset($this->rooms1[$index]);
        $this->rooms1 = array_values($this->rooms1);
    }

    public function updateRoom2($index)
    {
        if (!isset($this->rooms2[$index])) {
            session()->flash('error', 'الغرفة غير موجودة!');
            return;
        }

        $roomData = $this->rooms2[$index];
        if (empty($roomData['id'])) {
            session()->flash('error', 'لا يمكن تحديث غرفة بدون معرف!');
            return;
        }
        $room = Room::find($roomData['id']);

        if (!$room) {
            session()->flash('error', 'لم يتم العثور على الغرفة!');
            return;
        }
        $room->update([
            'type' => $roomData['type'] ?? '',
            'number' => $roomData['number'] ?? '',
            'beds' => $roomData['beds'] ?? 0,
            'price' => $roomData['price'] ?? 0,
            'sale_price' => $roomData['sale_price'] ?? 0,
        ]);
        if (!empty($roomData['service']) && is_array($roomData['service'])) {
            $room->services()->sync($roomData['service']);
        }

        session()->flash('success', 'تم تحديث بيانات الغرفة والخدمات بنجاح!');
        return redirect()->route('hotels.edit', ['id' => $this->id]);
    }



    public function saveRoom()
    {
        foreach ($this->rooms1 as $room) {
            $newRoom  = Room::create([
                'type' => $room['type'],
                'cost_price' => $room['price'],
                'beds_count' => $room['beds'],
                'number' => $room['number'],
                'sale_price' => $room['sale_price'],
                'hotel_id' => $this->id,
                'added_by' => Auth::id(),
            ]);
        }
        if (!empty($room['service'])) {
            $newRoom->services()->sync($room['service']);
        }
        $this->show = false;
        $this->show1 = false;
        session()->flash('success', 'تم حفظ الفندق بنجاح!');

        return redirect()->route('hotels.index');
    }
    public function removeService1($index)
    {
        unset($this->rooms0[$index]);
        $this->rooms0 = array_values($this->rooms0);
        Service::where('id', $index)->delete();
        session()->flash('success', 'تم الحذف  بنجاح!');
        return redirect()->route('hotels.edit', ['id' => $this->id]);
    }
    public function updateService1($index)
    {
        if (!isset($this->rooms0[$index])) {
            session()->flash('error', 'الخدمة غير موجودة!');
            return;
        }
        $data = $this->rooms0[$index];
        Service::where('id', $data['id'])->update([
            'name' => $data['name'] ?? '',
            'price' => $data['price'] ?? 0,
            'sale_price' => $data['sale_price'] ?? 0,
        ]);

        session()->flash('success', 'تم تحديث الخدمة بنجاح!');
        return redirect()->route('hotels.edit', ['id' => $this->id]);
    }

    public function saveSerivce()
    {
        foreach ($this->rooms as $room) {
            Service::create([
                'name' => $room['name'],
                'price' => $room['price'],
                'sale_price' => $room['sale_price'],
                'hotel_id' => $this->id,
                'added_by' => Auth::id(),
            ]);
        }
        $this->services = Service::where('hotel_id', $this->id)->get();
        $this->show0 = false;
        $this->show = false;
        $this->show1 = true;
        session()->flash('success', 'تم حفظ الغرف بنجاح!');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'city' => 'required|string',
        ]);

        $user = Auth::user();

        $data = [
            'name' => $this->name,
            'city' => $this->city,
        ];

        if ($this->image) {
            $path = $this->image->store('hotels', 'public');
            $data['images'] = $path;
        } else {
            unset($data['images']);
        }

        Hotel::where('id', $this->id)->update($data);
        $this->show0 = false;
        $this->show = true;

        Session::flash('success', 'تم إضافة الفندق بنجاح.');
    }
    public function render()
    {
        return view('livewire.hotel-edit');
    }
}
