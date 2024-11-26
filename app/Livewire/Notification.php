<?php

namespace App\Livewire;

use App\Models\AdoptionForm;
use App\Models\AnimalList;
use App\Models\AnimalListStatus;
use App\Models\DogClaim;
use App\Models\Rounds;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notification extends Component
{
    public $notif_adoption;
    public $notif_rounds;
    public $notif_claims;

    public $notifications;
    public $notifModal;

    protected $listeners = ['fetchdatanotif', 'cancelRequest'];

    public function cancelRequest($id, $source, $ticketN)
    {

        if ($source == 'claims') {
            $finddog = DogClaim::where('id', $id)->where('isActive',1)->first();
            $find_old_status = AnimalListStatus::where('animal_id',$finddog->dog_id_unique)->first();
            AnimalListStatus::where('animal_id',$finddog->dog_id_unique)->update(['isActive' => 0]);
            AnimalListStatus::create([
                'animal_id' => $finddog->dog_id_unique,
                'status' => $find_old_status->status,
                'isActive' => 1,
            ]);
            DogClaim::where('id', $id)->update(['isActive' => 0]);
        } else if ($source == 'adoption') {
            $finddog = AdoptionForm::where('id', $id)->where('is_active',1)->first();
            $find_old_status = AnimalListStatus::where('animal_id',$finddog->dog_id_unique)->first();
            AnimalListStatus::where('animal_id',$finddog->dog_id_unique)->update(['isActive' => 0]);
            AnimalListStatus::create([
                'animal_id' => $finddog->dog_id_unique,
                'status' => $find_old_status->status,
                'isActive' => 1,
            ]);
            AdoptionForm::where('id', $id)->update(['is_active' => 0]);
        } else if ($source == 'rounds') {
            Rounds::where('id', $id)->where('is_active', 1)->update(['is_active' => 0]);
        } else if ($source == 'found_form') {
            AnimalList::where('id', $id)->update(['isActive' => 0]);
        }

        $this->fetchdatanotif();
    }
    public function mount()
    {
        if (Auth::user()->type == 1) {
            $this->fetchmount_admin();
        } else {
            $this->fetchdatanotif();
        }
    }
    public function fetchmount()
    {
        $notif_adoption = AnimalListStatus::whereIn('status', [4, 5, 1])
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
                'animal_lists.gender',
                'animal_lists.description',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'adoption' as table_source")
            )
            ->where('adoption_forms.user_id', Auth::user()->id)
            ->where('adoption_forms.is_active', 1)
            ->where('animal_list_statuses.isActive', 1)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $foundreq = AnimalListStatus::whereIn('status', [8, 9, 3, 2, 11])
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->leftJoin('users', 'users.id', '=', 'animal_lists.user_id')

            ->select(
                'animal_list_statuses.status',
                'animal_lists.id',
                'animal_lists.description',
                'animal_lists.contact_number',
                'animal_lists.location_found',
                'animal_lists.dog_name',
                'animal_lists.created_at',
                'animal_lists.animal_images',
                'users.name as fullname',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'found_form' as table_source")
            )
            ->where('animal_lists.user_id', Auth::user()->id)
            ->where('animal_list_statuses.isActive', 1)

            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $notif_rounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id');
            })
            ->where('rounds.user_id', Auth::user()->id)
            ->where('rounds_statuses.is_active', 1)
            ->whereBetween('rounds_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->select(
                'users.name',
                'rounds.*',
                'rounds_statuses.is_approved',
                'rounds_statuses.created_at as date_notif',
                DB::raw("'rounds' as table_source")
            )
            ->get();
        // dd($notif_rounds);

        $notif_claims = AnimalListStatus::whereIn('status', [6, 7, 10])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'dog_claims.*',
                'animal_list_statuses.status',
                'animal_lists.dog_name',
                'animal_lists.description',
                'animal_lists.gender',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'claims' as table_source")
            )
            ->where('dog_claims.user_id', Auth::user()->id)
            ->where('dog_claims.isActive', 1)
            ->where('animal_list_statuses.isActive', 1)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();
        // dd($notif_claims);

        $this->notifModal = array_merge(
            $foundreq->toArray(),
            $notif_adoption->toArray(),
            $notif_rounds->toArray(),
            $notif_claims->toArray()
        );

        // Sort the notifications by the 'created_at' field in descending order
        usort($this->notifModal, function ($a, $b) {
            // Ensure that 'created_at' exists and is a valid date
            $createdAtA = isset($a['date_notif']) ? strtotime($a['date_notif']) : 0;
            $createdAtB = isset($b['date_notif']) ? strtotime($b['date_notif']) : 0;

            return $createdAtB - $createdAtA;
        });

        // dd($this->notifications);
        $this->notifModal = collect($this->notifModal);
    }
    public function fetchmount_admin()
    {
        $this->notif_adoption = AnimalListStatus::whereIn('status', [4])
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
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'adoption' as table_source")
            )
            ->where('adoption_forms.is_active', 1)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $foundreq = AnimalListStatus::whereIn('status', [8, 9, 3, 2])
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'animal_list_statuses.status',
                'animal_lists.id',
                'animal_lists.dog_name',
                'animal_lists.created_at',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'found_form' as table_source")
            )
            ->where('animal_lists.user_id', Auth::user()->id)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $this->notif_rounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id');
            })
            ->whereBetween('rounds_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->whereNull('rounds_statuses.is_approved')
            ->select(
                'users.name',
                'rounds.*',
                'rounds_statuses.is_approved',
                'rounds_statuses.created_at as date_notif',
                DB::raw("'rounds' as table_source")
            )
            ->get();

        $this->notif_claims = AnimalListStatus::whereIn('status', [6, 11])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'dog_claims.*',
                'animal_list_statuses.status',
                'animal_lists.dog_name',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'claims' as table_source")
            )
            ->where('dog_claims.isActive', 1)
            ->where('animal_lists.isActive', 1)
            ->where('dog_claims.created_at', '>=', 'animal_list_statuses.created_at')
            ->distinct()
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();
        // dd($this->notif_claims);
        $this->notifications = array_merge(
            $foundreq->toArray(),
            $this->notif_adoption->toArray(),
            $this->notif_rounds->toArray(),
            $this->notif_claims->toArray()
        );

        // Sort the notifications by the 'created_at' field in descending order
        usort($this->notifications, function ($a, $b) {
            // Ensure that 'created_at' exists and is a valid date
            $createdAtA = isset($a['date_notif']) ? strtotime($a['date_notif']) : 0;
            $createdAtB = isset($b['date_notif']) ? strtotime($b['date_notif']) : 0;

            return $createdAtB - $createdAtA;
        });

        // dd($this->notifications);
        $this->notifications = collect($this->notifications);
        $this->dispatch('notif', $this->notifications);
    }
    public function fetchdatanotif()
    {
        $this->notif_adoption = AnimalListStatus::whereIn('status', [4, 5, 1])
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
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'adoption' as table_source")
            )
            ->where('adoption_forms.user_id', Auth::user()->id)
            ->where('adoption_forms.is_active', 1)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $foundreq = AnimalListStatus::whereIn('status', [8, 9, 3, 2])
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'animal_list_statuses.status',
                'animal_lists.id',
                'animal_lists.dog_name',
                'animal_lists.created_at',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'found_form' as table_source")
            )
            ->where('animal_lists.user_id', Auth::user()->id)
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();

        $this->notif_rounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id');
            })
            ->where('rounds.user_id', Auth::user()->id)
            ->whereBetween('rounds_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->select(
                'users.name',
                'rounds.*',
                'rounds_statuses.is_approved',
                'rounds_statuses.created_at as date_notif',
                DB::raw("'rounds' as table_source")
            )
            ->get();

        $this->notif_claims = AnimalListStatus::whereIn('status', [6, 7, 10])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })
            ->select(
                'dog_claims.*',
                'animal_list_statuses.status',
                'animal_lists.dog_name',
                'animal_lists.animal_images',
                'statuses.name as status_name',
                'animal_list_statuses.created_at as date_notif',
                DB::raw("'claims' as table_source")
            )
            ->where('dog_claims.user_id', Auth::user()->id)
            ->where('dog_claims.isActive', 1)
            ->where('animal_lists.isActive', 1)
            ->where('dog_claims.created_at', '>=', 'animal_list_statuses.created_at')
            ->distinct()
            ->whereBetween('animal_list_statuses.created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get();
        // dd($this->notif_claims);
        $this->notifications = array_merge(
            $foundreq->toArray(),
            $this->notif_adoption->toArray(),
            $this->notif_rounds->toArray(),
            $this->notif_claims->toArray()
        );

        // Sort the notifications by the 'created_at' field in descending order
        usort($this->notifications, function ($a, $b) {
            // Ensure that 'created_at' exists and is a valid date
            $createdAtA = isset($a['date_notif']) ? strtotime($a['date_notif']) : 0;
            $createdAtB = isset($b['date_notif']) ? strtotime($b['date_notif']) : 0;

            return $createdAtB - $createdAtA;
        });

        // dd($this->notifications);
        $this->notifications = collect($this->notifications);
        $this->dispatch('notif', $this->notifications);
    }
    public function render()
    {
        $this->fetchmount();
        return view('livewire.notification');
    }
}
