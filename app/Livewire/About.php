<?php

namespace App\Livewire;

use App\Models\AnimalList;
use Livewire\Component;

class About extends Component
{
    public $data;
    
    public function render()
    {
         $this->data = AnimalList::where('animal_lists.isActive',1)
        ->leftJoin('animal_list_statuses', 'animal_list_statuses.animal_id','=','animal_lists.dog_id_unique')
        ->whereIn('animal_list_statuses.status',[1,3])
        ->where('animal_list_statuses.isActive',1)
        ->select('animal_lists.*')
        ->get(); 
        return view('livewire.about');
    }
}
