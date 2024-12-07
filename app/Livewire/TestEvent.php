<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Events\NewPostEvent;
use App\Mail\TestMail;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\AnimalListStatus;
use Illuminate\Support\Facades\Mail;


class TestEvent extends Component
{
    use LivewireAlert;
    protected $listeners = ['claim_dog', 'claim_dog_rejected'];

    public function claim_dog($id)
    {

        AnimalListStatus::where('animal_id', $id)->update(['isActive' => 0]);

        AnimalListStatus::create([
            'animal_id' => $id,
            'status' => 7,
            'isActive' => 1,
        ]);
    }

    public function sendEmail()
    {

        $data = [
            'name' => 'Eugene',
            'message' => 'This is a real message',
        ];

        Mail::to('pangalanyes@gmail.com')->send(new TestMail($data));

        $this->alert('success', 'Email sent successfully!');
    }

    #[On('echo:newpost_received,NewPostEvent')]
    public function handlerealtime(): void
    {
        $this->alert('success', 'Basic Alert');
    }

    public function render()
    {
        return view('livewire.test-event');
    }
}
