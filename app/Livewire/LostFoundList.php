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

    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->whereIn('status',[3])->get('animal_id');
        $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique',$dogid)
        ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=','animal_lists.dog_id_unique')
        ->select('animal_lists.*','click_dogs.clicked')
        ->where('animal_lists.isActive',true)->get();
        // dd($this->doglist);
        $this->alert('success', 'Success is approaching!');

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
        return view('livewire.lost-found-list');
    }
}
