<?php

namespace App\Livewire;

use League\Flysystem\MountManager;
use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\DogBreed;
use Livewire\WithPagination;

class ForAdoption extends Component
{
    protected $paginationTheme = 'bootstrap';

    public $activedog;
    public $changeName;
    public $hovered = false;
    public $active_id;
    protected $listeners = ['fetchdataAdopt','Adog_viewed'];

    use WithPagination;

    public function mount() {}

    public function fetchdataAdopt()
    {
        // Retrieve the dog IDs based on the active status
        $dogid = AnimalListStatus::where('isActive', true)->where('status', 1)->get('animal_id');

        // Start building the query
        $query = AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_list_statuses.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->select('animal_lists.*', 'click_dogs.clicked', 'dog_breeds.name as breed_name')
            ->where('animal_lists.isActive', true);

        // If changeName is set, apply additional filters
        if ($this->changeName) {
            $query->where(function ($q) {
                $q->where('animal_lists.dog_name', 'like', '%' . $this->changeName . '%')
                    ->orWhere('dog_breeds.name', 'like', '%' . $this->changeName . '%');
            });
        }

        $query->orderBy('click_dogs.clicked', 'desc')
            ->orderBy('animal_lists.dog_name', 'asc');

        $count = $query->count();

        if ($count > 8) {
            return $query->paginate(8);  // Paginate results
        }else{
            return $query->get(); 
        }
    }
    public function Adog_viewed($dog_id){
        $this->heartDog($dog_id);
    }
    public function adoptionform($id)
    {
        if($this->active_id != $id){
            $this->active_id = $id;
            $this->dispatch('activedog', $id);
        }
    
    }
    public function changeStatus()
    {
        $this->dispatch('reinit');
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
        return view('livewire.for-adoption', [
            'doglist' => $this->fetchdataAdopt(),
        ]);
    }
}
