<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class DriverPage extends Component
{
    use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = Driver::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('drivers.index');
        }
    }
    public function render()
    {
        $query = Driver::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.driver-page', compact('data'));
    }
}
