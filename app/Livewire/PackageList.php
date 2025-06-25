<?php

namespace App\Livewire;

use App\Models\Bouquet;
use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class PackageList extends Component
{
    use WithPagination;
    public $selectedBouquet = null;

    public function selectBouquet($id)
    {
        $this->selectedBouquet = $id;
    }

    public function render()
    {
        $bouquets = Bouquet::all();
        $packages = Package::when($this->selectedBouquet, function ($query) {
            $query->where('bouquet_id', $this->selectedBouquet);
        })->paginate(10);

        return view('livewire.package-list', compact('bouquets', 'packages'));
    }
}
