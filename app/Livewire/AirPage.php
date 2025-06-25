<?php

namespace App\Livewire;

use App\Models\AirTransports;
use Livewire\Component;
use Livewire\WithPagination;

class AirPage extends Component
{
        use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = AirTransports::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('air.index');
        }
    }
    public function render()
    {
        $query = AirTransports::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('airplane', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.air-page', compact('data'));
    }
}
