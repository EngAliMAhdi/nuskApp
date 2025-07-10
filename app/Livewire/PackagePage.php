<?php

namespace App\Livewire;

use App\Models\OtherService;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PackagePage extends Component
{
    use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];

    public function updateStatus($id, $newStatus)
    {
        $item = Package::findOrFail($id);
        $item->status = $newStatus;
        $item->save();

        session()->flash('message', 'تم تحديث الحالة بنجاح');
        return redirect()->route('packages.index');
    }

    public function deleteItem($id)
    {
        $data = Package::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            if (Auth::user()->role == 'company') {
                return redirect()->route('packages1.index');
            }
            return redirect()->route('packages.index');
        }
    }
    public function render()
    {
        $query = Package::with(['hotel', 'room'])->latest();
        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }
        if (Auth::user()->role == 'company') {
            $query->where('created_by', Auth::user()->id);
        }

        $data = $query->paginate(10);
        return view('livewire.package-page', compact('data'));
    }
}
