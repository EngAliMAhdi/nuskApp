<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Component;
use Livewire\WithPagination;

class AboutPage extends Component
{
    use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];


    public function deleteItem($id)
    {
        $data = About::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('about.index');
        }
    }
    public function render()
    {
        $query = About::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('question', 'like', '%' . $this->name . '%');
        }

        $data = $query->paginate(10);
        return view('livewire.about-page', compact('data'));
    }
}
