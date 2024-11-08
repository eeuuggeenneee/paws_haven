<?php

namespace App\Livewire;

use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use Livewire\Component;

class LostTableList extends Component
{
    public $doglist;
    protected $listeners = ['deleteDog', 'dogSaved' => 'render','dogUpdate' => 'render'];
    public function mount() {}
    public function fetchdata()
    {
        $dogid = AnimalListStatus::where('isActive', true)->where('status', 3)->get('animal_id');
       
        $this->doglist =  AnimalList::whereIn('dog_id_unique', $dogid)->where('animal_lists.isActive', true)
        ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
        ->select('animal_lists.*', 'dog_breeds.name as breed_name')
        ->get();
    }
    public function editDog($dogID)
    {
        $this->dispatch('editDoggo', $dogID);
    }
    public function deleteDog($dog_id)
    {
        $finddog = AnimalList::where('isActive', 1)->where('dog_id_unique', $dog_id)->update(['isActive' => 0]);
        $this->dispatch('dogDeleted', 'Data succesfully deleted');
    }
    public function render()
    {
        $this->fetchdata();
        return view('livewire.lost-table-list');
    }
}
