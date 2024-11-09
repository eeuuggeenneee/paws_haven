<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;

class AnimalListComponent extends Component
{
    public $doglist;

    protected $listeners = ['deleteDogAdopt','dogSaved' => 'render'];

    public function mount(){
      
        // dd($this->doglist);
    }
    public function fetchdata(){
        $dogid = AnimalListStatus::where('isActive',true)->where('status',1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique',$dogid)
        ->leftJoin('dog_breeds', 'dog_breeds.id', '=','animal_lists.breed')
        ->select('animal_lists.*','dog_breeds.name as breed_name')
        ->where('animal_lists.isActive',true)->orderby('animal_lists.created_at', 'desc')->get();
        // dd($this->doglist);
        $this->dispatch('newdata', $this->doglist);
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
        $this->fetchdata();
        return view('livewire.animal-list-component');
    }
}
