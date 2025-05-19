<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Transport;
use Livewire\Component;

class TransportPage extends Component
{
    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = Transport::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('transport.index');
        }
    }
    public function render()
    {
        $query = Transport::orderBy('id', 'desc');

        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        $data = $query->get();
        return view('livewire.transport-page', compact('data'));
    }
}
