<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\Rounds;
use Livewire\Component;

class TableLists extends Component
{
    public $adoptionlist;
    public $activedog;
    public $adoptdetails;
    public $dog_unique;
    public $reqrounds;
    public $roundsid;
    public $activerounds;
    protected $listeners = ['adopted','rounds_accepted','rounds_rejected'];

    public function mount()
    {
        $this->adoptionlist = AnimalListStatus::whereIn('status', [4, 5])
            ->leftJoin('adoption_forms', 'adoption_forms.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })->select('adoption_forms.*', 'animal_list_statuses.status', 'animal_lists.dog_name', 'animal_lists.animal_images', 'statuses.name as status_name')
            ->where('animal_list_statuses.isActive', 1)->get();

        $this->reqrounds = Rounds::where('is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->select('users.name', 'rounds.*', )
            ->get();
        // dd($this->reqrounds);
    }
    public function getrounds($id){
        $this->roundsid = $id;
        $this->activerounds = Rounds::where('is_active', 1)
        ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
        ->select('users.name', 'rounds.*', )
        ->where('rounds.id',$id)
        ->first();
        // dd($this->reqrounds);
    }
    public function rounds_accepted(){
        Rounds::where('id', $this->roundsid)->update(['is_active' => 1, 'is_approved' => 1]);
    }
    public function rounds_rejected(){
        Rounds::where('id', $this->roundsid)->update(['is_active' => 1, 'is_rejected' => 1]);
    }
    public function adopted()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);
        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 5,
            'isActive' => 1,
        ]);
    }
    public function adoptionpending($id)
    {
        $this->dog_unique = $id;
        $this->activedog = AnimalList::where('dog_id_unique', $id)->where('isActive', true)->first();
        $this->adoptdetails = AdoptionForm::where('dog_id_unique', $id)->where('is_active', true)->first();
        // dd($this->adoptdetails);
    }
    public function render()
    {
        return view('livewire.table-lists');
    }
}
