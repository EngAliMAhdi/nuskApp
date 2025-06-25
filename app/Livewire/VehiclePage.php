<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclePage extends Component
{
    use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = Vehicle::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('vehicles.index');
        }
    }
    public function render()
    {
        $query = Vehicle::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.vehicle-page', compact('data'));
    }
}
