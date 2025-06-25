<?php

namespace App\Livewire;

use App\Models\Driver;
use App\Models\Transport;
use Livewire\Component;
use Livewire\WithPagination;

class TransportPage extends Component
{
    use WithPagination;

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

        $data = $query->paginate(10);
        return view('livewire.transport-page', compact('data'));
    }
}
