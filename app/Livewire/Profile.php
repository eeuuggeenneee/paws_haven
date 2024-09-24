<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Community;
use Livewire\WithFileUploads;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;

    public $profilepic;
    public $cfullname;
    public $cabout_me;
    public $c_contact;
    public $c_email;
    public $c_address;
    public $postcount;
    public $commentcount;

    public function saveProf(){
        $user = User::find(Auth::id());

        $user->name = $this->cfullname;
        $user->email = $this->c_email;
        $user->about_me = $this->cabout_me;
        $user->address = $this->c_address;
        $user->contact = $this->c_contact;
        if ($this->profilepic) {
            $path = $this->profilepic->store('profile_pictures', 'public');
            $user->profile_path = $path;
        }
        $user->save();
    }
    public function mount(){

        $user = Auth::user();
        $this->cfullname = $user->name;
        $this->c_email = $user->email;
        $this->cabout_me = $user->about_me;
        $this->c_address = $user->address;
        $this->c_contact = $user->contact;
        $this->cfullname = Auth::user()->name;

        $this->postcount = Community::where('user_id', $user->id)->count();
        $this->commentcount = Comment::where('user_id', $user->id)->count();

    }
    public function render()
    {
        return view('livewire.profile');
    }
}
