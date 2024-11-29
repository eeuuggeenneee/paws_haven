<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use Livewire\WithPagination;

class AnimalListComponent extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $dogname = ''; // To store search query
    protected $listeners = ['deleteDogAdopt', 'dogSaved' => 'render'];
    use WithPagination;

    public function mount()
    {

        // dd($this->doglist);
    }
    public function changeStatus(){

    }
    public function fetchdata()
    {
        $dogid = AnimalListStatus::where('isActive', true)
            ->where('status', 1)
            ->pluck('animal_id'); // Use pluck to retrieve a flat array of IDs

        return AnimalList::whereIn('animal_lists.dog_id_unique', $dogid)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->select('animal_lists.*', 'dog_breeds.name as breed_name')
            ->where('animal_lists.isActive', true)
            ->where(function ($query) {
                // Apply search on both dog name and breed name
                $query->where('animal_lists.dog_name', 'like', '%' . $this->dogname . '%')
                    ->orWhere('dog_breeds.name', 'like', '%' . $this->dogname . '%');
            })
            ->orderBy('animal_lists.created_at', 'desc')
            ->paginate(2); 

    }
    public function editDog($dogID)
    {
        $this->dispatch('editDoggo', $dogID);
    }
    public function deleteDogAdopt($dog_id)
    {
        $finddog = AnimalList::where('isActive', 1)->where('dog_id_unique', $dog_id)->update(['isActive' => 0]);
        $this->dispatch('dogDeleted', 'Data succesfully deleted');
    }
    public function render()
    {
        $doglist = $this->fetchdata();
        return view('livewire.animal-list-component', ['doglist' => $doglist]);
    }
}
