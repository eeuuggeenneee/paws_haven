<?php

namespace App\Livewire;

use App\Models\Annoucement;
use Livewire\Component;

class AnnouncementIndex extends Component
{
    public $annoucements;

    public function mount()
    {
        $this->annoucements = Annoucement::where('isActive', 1)
            ->leftJoin('users', 'users.id', '=', 'annoucements.user_id')
            ->select('annoucements.*', 'users.name', 'users.profile_path')
            ->orderBy('annoucements.created_at', 'desc')
            ->limit(10) // Limit results to top 10
            ->get();
        // dd($this->annoucement);
    }
    public function render()
    {
        return view('livewire.announcement-index');
    }
}
