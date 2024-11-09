<?php

namespace App\Livewire;

use League\Flysystem\MountManager;
use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;

class ForAdoption extends Component
{
    public $doglist;
    public $activedog;
    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->where('status',1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique',$dogid)
        ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=','animal_lists.dog_id_unique')
        ->leftJoin('dog_breeds', 'dog_breeds.id', '=','animal_lists.breed')
        ->select('animal_lists.*','click_dogs.clicked','dog_breeds.name as breed_name')
        ->where('animal_lists.isActive',true)->get();
    }

    public function adoptionform($id){
        $this->dispatch('activedog',$id);
   
    }
    public function heartDog($data){
        $click = ClickDogs::where('dog_id_unique',$data)->first();
        if($click){
            $count = $click->clicked + 1;
            $click->update(['clicked' => $count]);
        }else{
            ClickDogs::create([
                'dog_id_unique' => $data,
                'clicked' => 1,
            ]);
            $count = 1;
        }
        $this->dispatch('heart_dog',$data,$count);
    }
    public function render()
    {
        return view('livewire.for-adoption');
    }
}
