<?php

namespace App\Livewire;

use App\LuxuryLevel;
use App\Models\AirTransports;
use App\Models\Bouquet;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\OtherService;
use App\Models\Package;
use App\Models\Room;
use App\Models\Transport;
use App\Models\User;
use App\Notifications\LocalNotification;
use App\PackageType;
use App\TargetGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackageForm extends Component
{
    use WithFileUploads;

    public $name, $description, $type, $image, $time_arrival, $distance_hotel,
        $time_departure, $time_return, $stop_points, $notes;
    public $place_departure, $hotel_id, $room_id;
    public $transport_type, $transport_id, $transportOptions = [];
    public $seats, $selected_services = [], $duration_days, $base_price;
    public $valid_from, $valid_to, $is_halal = false;
    public $rooms = [];

    public function updatedTransportType($value)
    {
        if ($value === 'App\Models\LandTransport') {
            $this->transportOptions = Transport::all();
        } elseif ($value === 'App\Models\AirTransport') {
            $this->transportOptions = AirTransports::all();
        } else {
            $this->transportOptions = [];
        }

        $this->transport_id = null;
    }
    public function updatedHotelId($value)
    {
        $this->rooms = Room::where('hotel_id', $value)->get();
        $this->room_id = null;
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

        ]);

        $image = null;
        if ($this->image) {
            $path = $this->image->store('package', 'public');
            $image = $path;
        }
        $package = Package::create([
            'name' => $this->name,
            'description' => $this->description,
            'bouquet_id' => $this->type,
            'image' => $image,
            'place_departure' => $this->place_departure,
            'time_arrival' => $this->time_arrival,
            'time_departure' => $this->time_departure,
            'time_return' => $this->time_return,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'transport_type' => $this->transport_type,
            'transport_id' => $this->transport_id,
            'seats' => $this->seats,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->room_id ?? null,
            'distance_hotel' => $this->distance_hotel ?? null,
            'duration_days' => $this->duration_days ?? 1,
            'base_price' => $this->base_price ?? 0.00,
            'stop_points' => $this->stop_points ?? null,
            'notes' => $this->notes ?? null,

        ]);

        // // Handle selected services
        // if (!empty($this->selected_services)) {
        //     foreach ($this->selected_services as $service1) {
        //         $service = OtherService::find($service1);
        //         $package->services()->attach($service['id'], [
        //             'quantity' => $service['quantity'] ?? 1,
        //             'extra_price' => $service['sale_price'] ?? 0.00,
        //         ]);
        //     }
        // }

        session()->flash('success', 'تم إنشاء الباقة بنجاح');
        return redirect()->route('packages.index'); // عدل حسب مسارك
    }

    public function render()
    {
        return view('livewire.package-form', [
            'hotels' => Hotel::all(),
            'packageTypes' => Bouquet::all(),
            'services' => OtherService::all(),
        ]);
    }
}
