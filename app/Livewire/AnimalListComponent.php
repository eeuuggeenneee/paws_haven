<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;

class AnimalListComponent extends Component
{
    public $doglist;
    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->where('status',1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('dog_id_unique',$dogid)->where('isActive',true)->get();
        // dd($this->doglist);
    }
    public function editDog($dogID){
        $this->dispatch('editDoggo',$dogID);
    }
    public function deleteDog($dogID){
        AnimalListStatus::where('animal_id', $dogID)->update(['status' => 0]); //Archived

        AnimalListStatus::create([
            'animal_id' =>$dogID,
            'status' => 9999,
            'isActive' => 1,
        ]);
    }
    public function render()
    {
        return view('livewire.animal-list-component');
    }
}
