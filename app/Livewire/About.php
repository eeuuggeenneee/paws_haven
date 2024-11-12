<?php

namespace App\Livewire;

use App\Models\AnimalList;
use Livewire\Component;

class About extends Component
{
    public $data;
    
    public function render()
    {
        $this->data = AnimalList::where('isActive',1)->get();  
        return view('livewire.about');
    }
}
