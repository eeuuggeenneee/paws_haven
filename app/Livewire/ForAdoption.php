<?php

namespace App\Livewire;

use League\Flysystem\MountManager;
use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;

class ForAdoption extends Component
{
    public $doglist;
    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->where('status',1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('dog_id_unique',$dogid)->where('isActive',true)->get();
        // dd($this->doglist);
    }

    public function adoptionform($id){
        dd($id);
    }
    public function render()
    {
        return view('livewire.for-adoption');
    }
}
