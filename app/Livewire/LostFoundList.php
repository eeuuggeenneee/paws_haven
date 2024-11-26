<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Cache;

class LostFoundList extends Component
{
    public $doglist;
    public $activedog;
    public $statusC;
    public $changeName;
    use LivewireAlert;

    protected $listeners = ['fetchdatanotif' => 'fetchdataAdopt'];
    public function mount()
    {

        // dd($this->doglist);
    }
    public function fetchDataDog()
    {
        $dogid = null;
        if($this->statusC){
            if($this->statusC == 'Lost Dog'){
                $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [2])->get('animal_id');
            }else if ($this->statusC == 'Found Dog'){
                $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3])->get('animal_id');
            }
        }else{
            $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3,2])->get('animal_id');
        }
        
        if(!$dogid){
            $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3,2])->get('animal_id');
        }
        
        if($this->changeName){
            $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_list_statuses.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_lists.isActive', true)
            ->where(function ($query) {
                $query->where('animal_lists.dog_name', 'like', '%' . $this->changeName . '%')
                      ->orWhere('dog_breeds.name', 'like', '%' . $this->changeName . '%');
            })
            ->select('animal_lists.*', 'click_dogs.clicked', 'dog_breeds.name as breed_name','statuses.name as status_name')
            ->orderBy('click_dogs.clicked','desc')
            ->orderBy('animal_lists.dog_name','asc')
            ->get();
        }else{
            $this->doglist = AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_list_statuses.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_lists.isActive', true)
            ->select('animal_lists.*', 'click_dogs.clicked', 'dog_breeds.name as breed_name','statuses.name as status_name')
            ->orderBy('click_dogs.clicked','desc')
            ->orderBy('animal_lists.dog_name','asc')
            ->get();
        }
      
    }
    public function changeStatus(){
        $this->fetchDataDog();
        $this->dispatch('reinit');
    }
    public function adoptionform($id)
    {

        $user = Auth::user()->id;
        $cacheKey = 'dog_clicks_' . $id; // Single cache key for each dog
        $clickedUsers = Cache::get($cacheKey, []); // Default to an empty array if no cache exists
        if (!in_array($user, $clickedUsers)) {
            $click = ClickDogs::where('dog_id_unique', $id)->first();
            if ($click) {
                $count = $click->clicked + 1;
                $click->update(['clicked' => $count]);
            } else {
                ClickDogs::create([
                    'dog_id_unique' => $id,
                    'clicked' => 1,
                ]);
                $count = 1;
            }

            // Add the user to the list of clicked users
            $clickedUsers[] = $user;

            // Cache the updated list of clicked users
            Cache::forever($cacheKey, $clickedUsers);

            // Optionally cache the click count forever
            Cache::forever($id . '_click_count', $count);
        } else {
            // If the user has already clicked, fetch the click count from cache
            $count = Cache::get($id . '_click_count');
        }

        $this->dispatch('click_dogs', $id, $count);
        $this->dispatch('activedog', $id);
    }
    public function render()
    {
        $this->fetchDataDog();
        return view('livewire.lost-found-list');
    }
}
