<?php

namespace App\Livewire;

use App\Models\Partment;
use Livewire\Component;
use Livewire\WithPagination;

class PartmentPage extends Component
{
    use WithPagination;

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
        $data = $query->paginate(10);
        return view('livewire.partment-page', compact('data'));
    }
}
