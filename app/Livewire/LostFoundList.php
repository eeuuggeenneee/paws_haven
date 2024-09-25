<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;


class LostFoundList extends Component
{
    public $doglist;
    public $activedog;
    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->whereIn('status',[2,3])->get('animal_id');
        $this->doglist = AnimalList::whereIn('dog_id_unique',$dogid)->where('isActive',true)->get();
        // dd($this->doglist);
    }
    public function adoptionform($id){
        $this->dispatch('activedog',$id);
    }
    public function render()
    {
        return view('livewire.lost-found-list');
    }
}
