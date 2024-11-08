<?php

namespace App\Livewire;

use App\Models\AnimalListStatus;
use App\Models\Rounds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notification extends Component
{
    public $notif_adoption;
    public $notif_rounds;
    public $notif_claims;

    public $notifications;
    public function mount()
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
                DB::raw("'adoption' as table_source")
                )
            ->where('animal_list_statuses.isActive', 1)
            ->where('adoption_forms.user_id', Auth::user()->id)
            ->get();

        $this->notif_rounds = Rounds::where('rounds.is_active', 1)
            ->leftJoin('users', 'users.id', '=', 'rounds.user_id')
            ->leftJoin('rounds_statuses', function ($join) {
                $join->on('rounds_statuses.rounds_id', '=', 'rounds.id')
                    ->where('rounds_statuses.is_active', '=', 1);
            })
            ->where('rounds.user_id', Auth::user()->id)
            ->select('users.name', 'rounds.*', 'rounds_statuses.is_approved',DB::raw("'rounds' as table_source"))
            
            ->get();

        $this->notif_claims = AnimalListStatus::whereIn('status', [6, 7, 3])
            ->leftJoin('dog_claims', 'dog_claims.dog_id_unique', '=', 'animal_list_statuses.animal_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'animal_list_statuses.status')
            ->leftJoin('animal_lists', function ($join) {
                $join->on('animal_lists.dog_id_unique', '=', 'animal_list_statuses.animal_id')
                    ->where('animal_lists.isActive', '=', 1);
            })->select('dog_claims.*', 'animal_list_statuses.status', 'animal_lists.dog_name', 'animal_lists.animal_images', 'statuses.name as status_name',DB::raw("'claims' as table_source"))
            ->where('dog_claims.user_id', Auth::user()->id)
            ->where('animal_list_statuses.isActive', 1)->get();
        // dd($this->notif_rounds);
        $this->notifications = array_merge(
            $this->notif_adoption->toArray(),
            $this->notif_rounds->toArray(),
            $this->notif_claims->toArray()
        );

        // Sort the notifications by the 'created_at' field in descending order
        usort($this->notifications, function ($a, $b) {
            // Ensure that 'created_at' exists and is a valid date
            $createdAtA = isset($a['created_at']) ? strtotime($a['created_at']) : 0;
            $createdAtB = isset($b['created_at']) ? strtotime($b['created_at']) : 0;

            // Sort in descending order, newer notifications come first
            return $createdAtB - $createdAtA;
        });

        $this->notifications = collect($this->notifications);
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
