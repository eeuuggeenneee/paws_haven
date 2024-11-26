<?php

namespace App\Livewire;

use App\Models\AnimalList;
use App\Models\Annoucement;
use App\Models\ClickDogs;
use App\Models\Rounds;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AnnouncementIndex extends Component
{
    public $annoucements;
    public $dogclicked;
    public function mount()
    {

        $this->annoucements = Annoucement::where('isActive', 1)
            ->leftJoin('users', 'users.id', '=', 'annoucements.user_id')
            ->select('annoucements.*', 'users.name', 'users.profile_path')
            ->orderBy('annoucements.created_at', 'desc')
            ->limit(5) // Limit results to top 10
            ->get();

        $clicked = ClickDogs::orderBy('clicked', 'desc')
            ->leftJoin('animal_list_statuses', 'animal_list_statuses.animal_id', '=', 'click_dogs.dog_id_unique')
            ->leftJoin('animal_lists', 'animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
            ->whereIn('animal_list_statuses.status', [1, 2, 3])
            ->where('animal_list_statuses.isActive', 1)
             ->where('animal_lists.isActive', 1)
            ->select('click_dogs.dog_id_unique')
            ->orderby('click_dogs.clicked','desc')
            ->take(5)
            ->pluck('dog_id_unique');
            
        // Using the plucked array in the next query
        $this->dogclicked = AnimalList::whereIn('animal_lists.dog_id_unique', $clicked)
            ->where('animal_lists.isActive', 1)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('click_dogs', 'click_dogs.dog_id_unique', '=', 'animal_lists.dog_id_unique')
            ->orderby('click_dogs.clicked','desc')
            ->select('animal_lists.*', 'dog_breeds.name as breed_name')
            ->get();
        // dd($clicked,$this->dogclicked);


        // dd($this->dogclicked);
    }
    public function render()
    {
        return view('livewire.announcement-index');
    }
}
