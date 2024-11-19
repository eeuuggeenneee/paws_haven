<?php

namespace App\Livewire;

use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use Livewire\Component;

class LostTableList extends Component
{
    public $doglist;
    public $doglist2;
    protected $listeners = ['deleteDog', 'dogSaved' => 'render', 'dogUpdate' => 'render', 'reinnitdata' => 'render'];
    public function mount() {}
    public function fetchdata()
    {
        $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3,2])->get('animal_id');
        $dogid2 = AnimalListStatus::where('isActive', true)->whereIn('status',[8,9])->get('animal_id');

        $this->doglist =  AnimalList::whereIn('dog_id_unique', $dogid)->where('animal_lists.isActive', true)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_list_statuses.isActive',1)
            ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
            ->get();

        $this->doglist2 =  AnimalList::whereIn('dog_id_unique', $dogid2)->where('animal_lists.isActive', true)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_lists.isActive', '=', 1);
            })->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_list_statuses.isActive',1)

            ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
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
