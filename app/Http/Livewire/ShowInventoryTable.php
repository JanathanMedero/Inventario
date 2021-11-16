<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInventoryTable extends Component
{

    use WithPagination;

    public $search = "";

    public function render()
    {
        $products = Product::where('id', 'like', '%' .$this->search . '%')->orderBy('id', 'DESC')->
        orWhere('department', 'like', '%' . $this->search . '%')->paginate(15);

        return view('livewire.show-inventory-table', compact('products'));
    }
}
