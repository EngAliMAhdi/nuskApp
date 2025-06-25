<?php

namespace App\Livewire;

use App\Models\Hotel;
use App\Models\Partment;
use App\Models\PartmentImage;
use App\Models\Room;
use App\Models\Service;
use App\Models\User;
use App\Notifications\LocalNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartmentForm extends Component
{
    use WithFileUploads;

    public $name;
    public $city;
    public $description;
    public $image = [];
    public $hotelId;
    public $show0 = true;
    public $show = false;
    public $show1 = false;

    public $services;
    public $services1;

    public $rooms = [];
    public $rooms1 = [];

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
            'service' => []
        ];
    }
    public function removeRoom1($index)
    {
        unset($this->rooms1[$index]);
        $this->rooms1 = array_values($this->rooms1);
    }

    public function saveRoom()
    {
        foreach ($this->rooms1 as $room) {
            $newRoom  = Room::create([
                'type' => $room['type'],
                'cost_price' => $room['price'],
                'beds_count' => $room['beds'],
                'number' => $room['number'],
                'hotel_id' => $this->hotelId,
                'added_by' => Auth::id(),
            ]);
        }
        if (!empty($room['service'])) {
            $newRoom->services()->attach($room['service']);
        }
        $this->show = false;
        $this->show1 = false;
        session()->flash('success', 'تم حفظ الشقة بنجاح!');

        return redirect()->route('partment.index');
    }
    public function saveSerivce()
    {
        foreach ($this->rooms as $room) {
            Service::create([
                'name' => $room['name'],
                'price' => $room['price'],
                'sale_price' => $room['price'],
                'hotel_id' => $this->hotelId,
                'added_by' => Auth::id(),
            ]);
        }
        $this->services = Service::where('hotel_id', $this->hotelId)->get();
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
            'added_by' => $user->id,
            'description' => $this->description

        ];



        $hotel = Partment::create($data);
        foreach ($this->image as $img) {
            $path = $img->store('uploads', 'public');
            PartmentImage::create([
                'partment_id' => $hotel->id,
                'image' => $path
            ]);
        }
        $this->hotelId = $hotel->id;
        $this->show = true;
        if ($hotel) {
            $users = User::whereIn('role', ['admin', 'superadmin'])
                ->where('active', 1)
                ->get();

            foreach ($users as $u) {
                $notif = [
                    'title' => 'تم إضافة فندق جديد بواسطة ' . $user->username,
                    'body' => 'create_Hotel',
                    'target' => 'hotel',
                    'link' => route('hotels.index', ['user_id' => $u->id]),
                    'target_id' => $u->id,
                    'sender' => $user->id,
                ];
                $u->notify(new LocalNotification($notif));
            }
            $this->show0 = false;
            Session::flash('success', 'تم إضافة الفندق بنجاح.');
        } else {
            Session::flash('error', 'حدث خطأ أثناء الإضافة.');
        }
    }
    public function render()
    {
        return view('livewire.partment-form');
    }
}
