<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\Annoucement;
use App\Models\DogClaim;
use App\Models\Rounds;
use App\Models\RoundsStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Throwable;
use Livewire\WithPagination;

class TableLists extends Component
{

    use WithPagination;

    public $activedog;
    public $adoptdetails;
    public $dog_unique;
    public $roundsid;
    public $activerounds;
    public $activelostclaim;
    public $claimdetails;
    public $searchDogClaim;
    public $dog_proof = '';
    public $ticket_num = '';
    public $changeName = '';
    
    protected $listeners = ['adopted', 'rounds_accepted', 'delete_claim', 'claim_approved', 'claim_dog_rejected', 'rounds_rejected', 'r_adopted', 'delete_adoption', 'delete_rounds'];
    public function mount()
    {
        // dd($this->claimlist);
    }
    public function changeStatus() {}
    public function fetchdata()
    {
        // Fetch and paginate adoption list
        $adoptionlist = AnimalListStatus::whereIn('status', [4, 5, 1])
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
        ->where('adoption_forms.is_active', 1)
        ->where('animal_list_statuses.isActive', 1)
        // Conditionally apply the search filter if changeName is not empty
        ->when($this->changeName, function ($query) {
            $query->where('animal_lists.dog_name', 'like', '%' . $this->changeName . '%');
        });

        if ($adoptionlist->count() > 5) {
            $adoptionlist = $adoptionlist->paginate(5, ['*'], 'adoption_list'); // Apply pagination if more than 2 results
        } else {
            $adoptionlist = $adoptionlist->get(); // Return all results if 2 or fewer
        }

        // Fetch and paginate reqrounds
        $reqrounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id')
                    ->where('rounds_statuses.is_active', '=', 1);
            })
            ->select('users.name', 'rounds.*', 'rounds_statuses.is_approved')
            ->where(function ($query) {
                // If ticket_num (round ID) is provided, filter by rounds.id
                if ($this->ticket_num) {
                    $searchPattern = strtoupper($this->ticket_num); // Convert input to uppercase for consistency
                    // Match the rounds.id (e.g., R2411-0004)
                    $query->where('rounds.id', 'like', '%' . $searchPattern . '%');

                    $query->orWhere('users.name', 'like', '%' . $searchPattern . '%');
                }
            })
            ->orderBy('rounds_statuses.id', 'desc');

        if ($reqrounds->count() > 5) {
            $reqrounds = $reqrounds->paginate(5, ['*'], 'req_rounds'); // Apply pagination if more than 2 results
        } else {
            $reqrounds = $reqrounds->get(); // Return all results if 2 or fewer
        }


        // Fetch and paginate claimlist
        $claimlist = AnimalListStatus::whereIn('status', [6, 7, 10, 11, 2, 3])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select('dog_claims.*', 'animal_list_statuses.status', 'animal_lists.dog_name', 'animal_lists.animal_images', 'statuses.name as status_name')
            ->where('dog_claims.isActive', 1)
            ->where('animal_list_statuses.isActive', 1)
            ->where(function ($query) {
                if ($this->searchDogClaim) {
                    $query->where('animal_lists.dog_name', 'like', '%' . $this->searchDogClaim . '%');
                }
                // If dog_proof is selected as 'with', filter by non-null proof
                if ($this->dog_proof === 'with') {
                    $query->whereNotNull('dog_claims.proof');
                }
                // If dog_proof is selected as 'without', filter by null proof
                elseif ($this->dog_proof === 'without') {
                    $query->whereNull('dog_claims.proof');
                } elseif ($this->dog_proof === 'all') {
                    // No additional filter for 'all'
                }
            });

        if ($claimlist->count() > 5) {
            $claimlist = $claimlist->paginate(5, ['*'], 'claim_list'); // Apply pagination if more than 2 results
        } else {
            $claimlist = $claimlist->get(); // Return all results if 2 or fewer
        }

        // Return all data as an array or object
        return [
            'adoptionlist' => $adoptionlist,
            'reqrounds' => $reqrounds,
            'claimlist' => $claimlist,
        ];
    }
    public function getrounds($id)
    {
        try {
            $this->roundsid = $id;

            $this->activerounds = Rounds::where('is_active', 1)
                ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
                ->select('users.name', 'rounds.*')
                ->where('rounds.id', $id)
                ->first();
            // dd($this->reqrounds);
        } catch (Throwable $r) {
        }

        $this->dispatch('reinit_table');
    }
    public function lostclaim($dog_id)
    {

        try {
            $this->dog_unique = $dog_id;

            $this->activedog = AnimalList::where('dog_id_unique', $dog_id)->where('animal_lists.isActive', true)
                ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
                ->select('animal_lists.*', 'dog_breeds.name as breed_name')
                ->first();

            $this->claimdetails = DogClaim::where('dog_id_unique', $dog_id)->where('isActive', true)->first();
        } catch (Throwable $r) {
        }

        // dd($this->activedog,$this->claimdetails);
        $this->dispatch('reinit_table');
    }


    public function rounds_accepted($data)
    {

        RoundsStatus::where('rounds_id', $this->roundsid)->update(['is_active' => 0]);

        RoundsStatus::create([
            'rounds_id' => $this->roundsid,
            'is_approved' => 1,
            'is_active' => 1,
        ]);

        $html = '<div class="ql-editor"><p>' . $data['remarks'] . '</p></div>';

        Annoucement::create([
            'message' => $html,
            'title' => $data['title'],
            'sub_title' => $this->activerounds->barangay,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);

        $this->dispatch('reinit_table');
    }
    public function rounds_rejected()
    {
        RoundsStatus::where('rounds_id', $this->roundsid)->update(['is_active' => 0]);

        RoundsStatus::create([
            'rounds_id' => $this->roundsid,
            'is_approved' => 0,
            'is_active' => 1,
        ]);

        $this->dispatch('reinit_table');
    }
    public function claim_approved()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 7,
            'isActive' => 1,
        ]);

        $this->dispatch('reinit_table');
    }
    public function claim_dog_rejected()
    {
        $finddog = AnimalListStatus::where('animal_id', $this->dog_unique)->first();

        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);

        if ($finddog->status == 8) {
            AnimalListStatus::create([
                'animal_id' => $this->dog_unique,
                'status' => 2,
                'isActive' => 1,
            ]);
        } else {
            AnimalListStatus::create([
                'animal_id' => $this->dog_unique,
                'status' => 3,
                'isActive' => 1,
            ]);
        }


        $this->dispatch('reinit_table');
    }
    public function r_adopted()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);
        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 1,
            'isActive' => 1,
        ]);

        $this->dispatch('reinit_table');
    }
    public function adopted()
    {
        AnimalListStatus::where('animal_id', $this->dog_unique)->update(['isActive' => 0]);
        AnimalListStatus::create([
            'animal_id' => $this->dog_unique,
            'status' => 5,
            'isActive' => 1,
        ]);

        $this->dispatch('reinit_table');
    }
    public function delete_adoption($id)
    {

        AnimalListStatus::where('animal_id', $id)->update(['isActive' => 0]);
        // AdoptionForm::where('dog_id_unique', $id)->update(['isActive' => 0]);
        $this->dispatch('reinit_table');
    }
    public function delete_rounds($id)
    {

        Rounds::where('id', $id)->where('is_active', 1)->update(['is_active' => 0]);
        // AdoptionForm::where('dog_id_unique', $id)->update(['isActive' => 0]);
        $this->dispatch('reinit_table');
    }
    public function delete_claim($id)
    {
        AnimalListStatus::where('animal_id', $id)->update(['isActive' => 0]);
        $this->dispatch('reinit_table');
    }
    public function adoptionpending($id)
    {
        $this->dog_unique = $id;

        $this->activedog = AnimalList::where('dog_id_unique', $id)->where('animal_lists.isActive', true)
            ->leftJoin('dog_breeds', 'dog_breeds.id', '=', 'animal_lists.breed')
            ->select('animal_lists.*', 'dog_breeds.name as breed_name')
            ->first();
        $this->adoptdetails = AdoptionForm::where('dog_id_unique', $id)->where('is_active', true)->first();
        // dd($this->adoptdetails);
        $this->dispatch('reinit_table');
    }
    public function render()
    {
        $data = $this->fetchdata();

        return view('livewire.table-lists', [
            'adoptionlist' => $data['adoptionlist'],
            'reqrounds' => $data['reqrounds'],
            'claimlist' => $data['claimlist'],
        ]);
    }
}
