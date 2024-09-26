<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LostFoundList extends Component
{
    public $doglist;
    public $activedog;
    use LivewireAlert;

    public function mount(){
        $dogid = AnimalListStatus::where('isActive',true)->whereIn('status',[3])->get('animal_id');
        $this->doglist = AnimalList::whereIn('dog_id_unique',$dogid)->where('isActive',true)->get();
        // dd($this->doglist);
        $this->alert('success', 'Success is approaching!');

    }
    public function adoptionform($id){
        $this->dispatch('activedog',$id);
        $this->alert('success', 'Success is approaching!');

    }
    public function render()
    {
        return view('livewire.lost-found-list');
    }
}
