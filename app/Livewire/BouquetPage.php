<?php

namespace App\Livewire;

use App\Models\Bouquet;
use Livewire\Component;
use Livewire\WithPagination;

class BouquetPage extends Component
{
    use WithPagination;
    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = Bouquet::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('bouquet.index');
        }
    }
    public function render()
    {
        $query = Bouquet::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.bouquet-page', compact('data'));
    }
}
