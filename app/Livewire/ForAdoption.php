<?php

namespace App\Livewire;

use League\Flysystem\MountManager;
use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ForAdoption extends Component
{
    public $doglist;
    public $activedog;

    protected $listeners = ['fetchdataAdopt'];
    public function mount() {}

    public function fetchdataAdopt()
    {
        // dd('fetched');
        $dogid = AnimalListStatus::where('isActive', true)->where('status', 1)->get('animal_id');
        $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->select('animal_lists.*', 'click_dogs.clicked', 'dog_breeds.name as breed_name')
            ->where('animal_lists.isActive', true)->get();
    }

    public function adoptionform($id)
    {

        $this->dispatch('activedog', $id);
    }
    public function heartDog($data)
    {
        $user = Auth::user()->id;
        $cacheKey = 'dog_clicks_' . $data; 

        $clickedUsers = Cache::get($cacheKey, []); 

        if (!in_array($user, $clickedUsers)) {
            $click = ClickDogs::where('dog_id_unique', $data)->first();

            if ($click) {
                $count = $click->clicked + 1;
                $click->update(['clicked' => $count]);
            } else {
                ClickDogs::create([
                    'dog_id_unique' => $data,
                    'clicked' => 1,
                ]);
                $count = 1;
            }

            $clickedUsers[] = $user;
            Cache::forever($cacheKey, $clickedUsers);
            Cache::forever($data . '_click_count', $count);
        } else {
            $count = Cache::get($data . '_click_count');
        }
        
        $this->dispatch('heart_dog', $data, $count);
    }
    public function render()
    {
        $this->fetchdataAdopt();
        return view('livewire.for-adoption');
    }
}
