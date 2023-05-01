<?php

namespace App\Http\Livewire\Interactive;

use Livewire\Component;

class Products extends Component
{
    public $search = "";
    public $sortBy = "name";
    public $direction = "asc";
    public $per_page = 10;
    public bool $perPageAll = true;


    protected $queryString = [
        "search" => ["except" => ""],
        "sortBy" => ["except" => ""],
        "direction" => ["except" => ""],
    ];

    public function doSort($field, $direction)
    {
        $this->sortBy = $field;
        $this->direction = $direction;
    }

    public function render()
    {

        $results =  \App\Models\Product::query()->paginate($this->per_page); // Put in new function? Use  "LengthAwarePaginator" version? 


        $products =  \App\Models\Product::with('reviews')
            ->where('name', 'like', "%$this->search%")
            ->orWhere('item_number', 'like', "%$this->search%")
            ->orderBy($this->sortBy, $this->direction);



        return view('livewire.interactive.products', ['products' => $products->paginate(10)]);
    }
}
