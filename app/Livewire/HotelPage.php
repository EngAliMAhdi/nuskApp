<?php

namespace App\Livewire;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class HotelPage extends Component
{
    use WithPagination;

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
        $data = $query->paginate(10);
        return view('livewire.hotel-page', compact('data'));
    }
}
