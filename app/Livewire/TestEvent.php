<?php

namespace App\Livewire;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Events\NewPostEvent;
use Livewire\Component;
use Livewire\Attributes\On;


class TestEvent extends Component
{
    use LivewireAlert;

    public function testevent(){
        $message = 'hello';
        event(new NewPostEvent($message));
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
