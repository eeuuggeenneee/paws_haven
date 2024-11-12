<?php

namespace App\Livewire;

use App\Models\AnimalList;
use App\Models\Annoucement;
use App\Models\ClickDogs;
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

        $clicked = ClickDogs::orderBy('clicked', 'desc')->take(5)->get('dog_id_unique');
        $this->dogclicked = AnimalList::whereIn('dog_id_unique', $clicked)->where('animal_lists.isActive', true)
        ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
        ->select('animal_lists.*', 'dog_breeds.name as breed_name')
        ->get();
        
        // dd($this->dogclicked);
    }
    public function render()
    {
        return view('livewire.announcement-index');
    }
}
