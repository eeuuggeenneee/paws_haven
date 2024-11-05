<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;

class AnimalListComponent extends Component
{
    public $doglist;

    protected $listeners = ['deleteDogAdopt'];

    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->where('status',1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('dog_id_unique',$dogid)->where('isActive',true)->get();
        // dd($this->doglist);
    }
    public function editDog($dogID){
        $this->dispatch('editDoggo',$dogID);
    }
    public function deleteDogAdopt($dog_id){
        $finddog = AnimalList::where('isActive',1)->where('dog_id_unique',$dog_id)->update(['isActive' => 0]);
        $this->dispatch('dogDeleted', 'Data succesfully deleted');
    }
    public function render()
    {
        return view('livewire.animal-list-component');
    }
}
