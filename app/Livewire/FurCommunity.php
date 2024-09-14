<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attribute\On;
use App\Models\Community;
use App\Models\Reply;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Types\Model\Comments;

class FurCommunity extends Component
{
    use WithFileUploads;

    use WithFileUploads;

    public $files = [];
    public $message;
    public $user_id;
    public $posts;
    public $replycomment;
    public $replyrepl;
    public $comments;
    public $replies;    
    public function mount()
    {
        // Get all active posts
        $this->posts = Community::where('isActive', true)->get();
        $postIds = $this->posts->pluck('post_id_unique');

        //get comments
        $commentsg = Comment::whereIn('post_unique_id', $postIds)
        ->leftJoin('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*', 'users.name') // Select relevant fields
        ->get();
        $this->comments = collect($commentsg)->groupBy('post_unique_id')->toArray();
        $commentIds = $commentsg->pluck('comment_unique_id');

        //replies
        $repliesg = Reply::whereIn('comment_unique_id', $commentIds)
        ->leftJoin('users', 'replies.user_id', '=', 'users.id')
        ->select('replies.*', 'users.name') // Select relevant fields
        ->get();

        $this->replies = collect($repliesg)->groupBy('comment_unique_id')->toArray();

    }
    public function savePost()
    {
        $this->validate([
            'message' => 'required|string|max:255',
            'files.*' => 'image|max:2048', // Validate files
        ]);

        $postIdUnique = Str::uuid(); // Generate a unique post ID

        // Store files and get their paths
        $imagesPath = [];
        if ($this->files) {
            foreach ($this->files as $file) {
                $path = $file->store('public/post-images');
                $imagesPath[] = $path;
            }
        }

        // Save the post to the database
        Community::create([
            'post_id_unique' => $postIdUnique,
            'message' => $this->message,
            'images_path' => json_encode($imagesPath), // Store paths as JSON
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);

        // Optionally, you can reset the input fields
        $this->reset(['message', 'files']);
        $this->dispatch('activedog', ['messages' => 'Succesfully Saved']);
    }

    public function saveComment($post_id)
    {
        $commentunique = Str::uuid(); // Generate a unique post ID

        Comment::create([
            'messages' => $this->replycomment,
            'comment_unique_id' => $commentunique,
            'post_unique_id' => $post_id,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]);
        $this->reset(['replycomment']);
    }

    public function handlerealtime(): void
    {   
        dd('hello');
    }

    public function saveReply($commentid){


        $replyunique = Str::uuid(); // Generate a unique post ID

        Reply::create([
            'messages' => $this->replyrepl,
            'reply_unique_id' => $replyunique,
            'comment_unique_id' => $commentid,
            'isActive' => 1,
            'user_id' => Auth::user()->id,
        ]); 
    }
    public function render()
    {
        return view('livewire.fur-community');
    }
}
