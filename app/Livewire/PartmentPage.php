<?php

namespace App\Livewire;

use App\Models\Partment;
use Livewire\Component;

class PartmentPage extends Component
{
    public $name;
    public $city;

    public function render()
    {
        $query = Partment::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }
        if ($this->city) {
            $query->where('city', $this->city);
        }
        $data = $query->get();
        return view('livewire.partment-page', compact('data'));
    }
}
