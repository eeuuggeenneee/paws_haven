<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCommentEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public array $newcomment;
    public string $post_id;
    public function __construct(string $newcomment,string $post_id)
    {
        //
        $comment = Comment::where('comment_unique_id', $newcomment) 
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name') // Select relevant fields
            ->get()
            ->toArray(); 

        $this->newcomment = $comment;
        $this->post_id = $post_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('new_comment'),
        ];
    }
}
