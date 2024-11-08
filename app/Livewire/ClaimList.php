<?php

namespace App\Livewire;

use App\Models\AnimalListStatus;
use Livewire\Component;

class ClaimList extends Component
{
    public $claimlist;

    public function fetchdata()
    {
       // dd($this->claimlist);
    }
    public function render()
    {
        $this->fetchdata();
        return view('livewire.claim-list');
    }
}
