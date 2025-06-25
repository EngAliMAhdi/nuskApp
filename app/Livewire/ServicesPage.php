<?php

namespace App\Livewire;

use App\Models\OtherService;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesPage extends Component
{
    use WithPagination;
    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = OtherService::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('services.index');
        }
    }
    public function render()
    {
        $query = OtherService::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.services-page', compact('data'));
    }
}
