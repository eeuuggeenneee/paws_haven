<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LostFoundList extends Component
{
    public $doglist;
    public $activedog;
    use LivewireAlert;

    protected $listeners = [ 'fetchdatanotif' => 'fetchdataAdopt'];
    public function mount(){
     
        // dd($this->doglist);
    }
    public function fetchDataDog(){
        $dogid = AnimalListStatus::where('isActive',true)->whereIn('status',[3])->get('animal_id');
        $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique',$dogid)
        ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=','animal_lists.dog_id_unique')
        ->leftJoin('dog_breeds', 'dog_breeds.id', '=','animal_lists.breed')
        ->select('animal_lists.*','click_dogs.clicked','dog_breeds.name as breed_name')
        ->where('animal_lists.isActive',true)->get();
    }
    public function adoptionform($id){

        $click = ClickDogs::where('dog_id_unique',$id)->first();
        if($click){
            $count = $click->clicked + 1;
            $click->update(['clicked' => $count]);
        }else{
            ClickDogs::create([
                'dog_id_unique' => $id,
                'clicked' => 1,
            ]);
            $count = 1;
        }
        $this->dispatch('click_dogs',$id,$count);
        $this->dispatch('activedog',$id);
        $this->alert('success', 'Success is approaching!');
    }
    public function render()
    {
        $this->fetchDataDog();
        return view('livewire.lost-found-list');
    }
}
