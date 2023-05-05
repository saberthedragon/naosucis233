<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Playground extends Component
{
    public $count = 0; // Referenced in blade file
    public $message = ""; // Lined to wire:model via two-way data-binding

    protected $queryString = ["message" => ["except" => ""]];

    public function increment()
    {
        $this->count++;
    } // End of "Increment"

    public function decrement()
    {
        $this->count--;
    } // End of "Decrement"


    // Mount() is psuedo-deprecated in Livewire v2; Was used to 'preserve date' / do "Update Me First" type of code

    //    public function mount(){
    // code here

    //    }


    public function render() // This is where "State" is held ;)
    {

        return view('livewire.playground'); // 
    } // End of Render()
}
