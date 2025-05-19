<?php

namespace App\Livewire;

use App\Models\Hotel;
use Livewire\Component;

class HotelPage extends Component
{
    public $name;
    public $city;

    public function render()
    {
        $query = Hotel::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }
        if ($this->city) {
            $query->where('city', $this->city);
        }
        $data = $query->get();
        return view('livewire.hotel-page', compact('data'));
    }
}
