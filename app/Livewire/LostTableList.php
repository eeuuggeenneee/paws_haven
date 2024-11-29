<?php

namespace App\Livewire;

use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use Livewire\Component;
use Livewire\WithPagination;

class LostTableList extends Component
{
    use WithPagination;

    // public $doglist;
    // public $doglist2;
    protected $paginationTheme = 'bootstrap';
    public $dogname = '';
    public $dogname2 = ''; // Search term for doglist2

    protected $listeners = ['deleteDog', 'dogSaved' => 'render', 'dogUpdate' => 'render', 'reinnitdata' => 'render', 'cancelposting' => 'render'];
    public function mount() {}
    // public function fetchdata()
    // {
    //     $dogid = AnimalListStatus::where('isActive', true)->whereIn('status', [3,2])->get('animal_id');
    //     $dogid2 = AnimalListStatus::where('isActive', true)->whereIn('status',[8,9])->get('animal_id');

    //     $this->doglist =  AnimalList::whereIn('dog_id_unique', $dogid)->where('animal_lists.isActive', true)
    //         ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
    //         ->leftJoin('animal_list_statuses', function ($join) {
    //             $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
    //                 ->where('animal_lists.isActive', '=', 1);
    //         })
    //         ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
    //         ->where('animal_list_statuses.isActive',1)
    //         ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
    //         ->get();

    //     $this->doglist2 =  AnimalList::whereIn('dog_id_unique', $dogid2)->where('animal_lists.isActive', true)
    //         ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
    //         ->leftJoin('animal_list_statuses', function ($join) {
    //             $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
    //                 ->where('animal_lists.isActive', '=', 1);
    //         })->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
    //         ->where('animal_list_statuses.isActive',1)

    //         ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name')
    //         ->get();
    // }
    public function changeStatus() {}

    private function fetchdata(array $statuses, $searchTerm, $pageName = 'page')
    {
        $dogIds = AnimalListStatus::where('isActive', true)
            ->whereIn('status', $statuses)
            ->pluck('animal_id');

        $query = AnimalList::query();

        $query->where('animal_lists.isActive', true)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->leftJoin('animal_list_statuses', function ($join) {
                $join->on('animal_list_statuses.animal_id', '=', 'animal_lists.dog_id_unique')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->where('animal_list_statuses.isActive', 1)
            ->whereIn('animal_list_statuses.status', $statuses)
            ->select('animal_lists.*', 'dog_breeds.name as breed_name', 'statuses.name as status_name');

        if (!empty($searchTerm)) {
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('animal_lists.dog_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('dog_breeds.name', 'like', '%' . $searchTerm . '%');
            });
        }

        return $query->paginate(5, ['*'], $pageName); // Use custom page parameter
    }
    public function editDog($dogID)
    {
        $this->dispatch('editDoggo', $dogID);
    }
    public function deleteDog($dog_id)
    {
        $finddog = AnimalList::where('isActive', 1)->where('dog_id_unique', $dog_id)->update(['isActive' => 0]);
        $this->dispatch('dogDeleted', 'Data succesfully deleted');
    }
    public function render()
    {
        $doglist = $this->fetchdata([3, 2], $this->dogname, 'doglist_page'); // Custom page parameter
        $doglist2 = $this->fetchdata([8, 9], $this->dogname2, 'doglist2_page'); // Custom page parameter

        return view('livewire.lost-table-list', [
            'doglist' => $doglist,
            'doglist2' => $doglist2,
        ]);
    }
}
