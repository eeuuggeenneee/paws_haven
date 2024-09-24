<?php

namespace App\Events;

use App\Models\Reply;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReplyEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public array $newreply;
    public string $comment_id;
    public function __construct(string $reply,string $comment_id)
    {
        //
        $reply = Reply::where('reply_unique_id',$reply)
        ->leftJoin('users', 'replies.user_id', '=', 'users.id')
        ->select('replies.*', 'users.name','users.profile_path') // Select relevant fields
        ->get()->toArray(); 

        $this->newreply = $reply;
        $this->comment_id = $comment_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('reply_channel'),
        ];
    }
}
