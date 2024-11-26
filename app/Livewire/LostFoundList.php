<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\ClickDogs;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class LostFoundList extends Component
{
    public $activedog;
    public $statusC;
    public $changeName;
    public $hovered = false;
    public $active_id;

    use LivewireAlert;
    use WithPagination;


    protected $listeners = ['fetchdatanotif' => 'fetchdataAdopt', 'dog_viewed'];
    public function mount()
    {

        // dd($this->doglist);
    }
    public function fetchDataDog()
    {
        $dogid = null;

        // Determine dog IDs based on the status filter
        if ($this->statusC) {
            if ($this->statusC == 'Lost Dog') {
                $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [2])->pluck('animal_id');
            } elseif ($this->statusC == 'Found Dog') {
                $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3])->pluck('animal_id');
            }
        } else {
            $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3, 2])->pluck('animal_id');
        }

        // If no IDs found, default to [3, 2]
        if (!$dogid) {
            $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3, 2])->pluck('animal_id');
        }

        // Build the query for AnimalList
        $query = AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_list_statuses.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_lists.isActive', true)
            ->select('animal_lists.*', 'click_dogs.clicked', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
            ->orderBy('click_dogs.clicked', 'desc')
            ->orderBy('animal_lists.dog_name', 'asc');

        // Apply search filter if changeName is provided
        if ($this->changeName) {
            $query->where(function ($query) {
                $query->where('animal_lists.dog_name', 'like', '%' . $this->changeName . '%')
                    ->orWhere('dog_breeds.name', 'like', '%' . $this->changeName . '%');
            });
        }

        if ($query->count() > 8) {
            return $query->paginate(8); // Apply pagination if more than 8 results
        } else {
            return $query->get(); // Return all results if 8 or fewer
        }
    }
    public function changeStatus()
    {
        $this->fetchDataDog();
        $this->dispatch('reinit');
    }
    public function dog_viewed($dog_id)
    {
        $user = Auth::user()->id;
        $cacheKey = 'dog_clicks_' . $dog_id; // Single cache key for each dog
        $clickedUsers = Cache::get($cacheKey, []); // Default to an empty array if no cache exists

        // If the user hasn't clicked this dog yet
        if (!in_array($user, $clickedUsers)) {
            $click = ClickDogs::where('dog_id_unique', $dog_id)->first();

            // Increment the click count or create a new entry
            if ($click) {
                $count = $click->clicked + 1;
                $click->update(['clicked' => $count]);
            } else {
                ClickDogs::create([
                    'dog_id_unique' => $dog_id,
                    'clicked' => 1,
                ]);
                $count = 1;
            }

            // Add the user to the list of clicked users
            $clickedUsers[] = $user;

            // Cache the updated list of clicked users
            Cache::forever($cacheKey, $clickedUsers);

            // Optionally cache the click count forever
            Cache::forever($dog_id . '_click_count', $count);
        } else {
            // If the user has already clicked, fetch the click count from cache
            $count = Cache::get($dog_id . '_click_count');
        }

        // Dispatch the necessary actions
        $this->dispatch('click_dogs', $dog_id, $count);
    }
    public function adoptionform($id)
    {
        // Check if the hovered dog ID is different from the current active dog
        if ($this->active_id != $id) {
            // Set the hovered dog as active
            $this->hovered = true;
            $this->active_id = $id;


            $this->dispatch('activedog', $id);
        }
    }


    public function render()
    {
        return view('livewire.lost-found-list', [
            'doglist' => $this->fetchDataDog(),
        ]);
    }
}
