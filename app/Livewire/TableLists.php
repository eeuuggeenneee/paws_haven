<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\DogClaim;
use App\Models\Rounds;
use App\Models\RoundsStatus;
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
    public $claimlist;
    public $activelostclaim;

    protected $listeners = ['adopted', 'rounds_accepted', 'rounds_rejected', 'r_adopted'];
    public function mount()
    {
        $this->adoptionlist = AnimalListStatus::whereIn('status', [4, 5,1])
            ->join('adoption_forms', 'adoption_forms.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'adoption_forms.*',
                'animal_list_statuses.status',
                'animal_lists.dog_name',
                'animal_lists.animal_images',
                'statuses.name as status_name'
            )
            ->where('animal_list_statuses.isActive', 1)
            ->get();


        $this->reqrounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id')
                    ->where('rounds_statuses.is_active', '=', 1);
            })
            ->select('users.name', 'rounds.*', 'rounds_statuses.is_approved')
            ->get();
        // dd($this->reqrounds);

        $this->claimlist = AnimalListStatus::whereIn('status', [6,7,3])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })->select('dog_claims.*', 'animal_list_statuses.status', 'animal_lists.dog_name', 'animal_lists.animal_images', 'statuses.name as status_name')
            ->where('animal_list_statuses.isActive', 1)->get();
        // dd($this->claimlist);
    }
    public function getrounds($id)
    {
        $this->roundsid = $id;
        $this->activerounds = Rounds::where('is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->select('users.name', 'rounds.*',)
            ->where('rounds.id', $id)
            ->first();
        // dd($this->reqrounds);
    }
    public function getlostclaim($id)
    {
        $this->dog_unique = $id;
        $this->activelostclaim = DogClaim::where('dog_claims.isActive', 1)
            ->leftJoin('users', 'users.id', '=', 'dog_claims.user_id')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'dog_claims.dog_id_unique')
                    ->where('animal_lists.isActive', '=', 1);
            })->select('users.name', 'dog_claims.dog_description', 'dog_claims.proof', 'dog_claims.breed as c_breed', 'dog_claims.breed as c_gender', 'animal_lists.*')
            ->where('dog_claims.id', $id)
            ->first();
        // dd($this->activelostclaim);/
    }
    public function rounds_accepted()
    {

        RoundsStatus::where('rounds_id', $this->roundsid)->update(['is_active' => 0]);

        RoundsStatus::create([
            'rounds_id' => $this->roundsid,
            'is_approved' => 1,
            'is_active' => 1,
        ]);
    }
    public function rounds_rejected()
    {
        RoundsStatus::where('rounds_id', $this->roundsid)->update(['is_active' => 0]);

        RoundsStatus::create([
            'rounds_id' => $this->roundsid,
            'is_approved' => 0,
            'is_active' => 1,
        ]);
    }
    public function claim_approved()
    {

        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 7,
            'isActive' => 1,
        ]);
    }
    public function claim_rejected()
    {

        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 3,
            'isActive' => 1,
        ]);
    }
    public function r_adopted()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);
        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 1,
            'isActive' => 1,
        ]);
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
