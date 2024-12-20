<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_unique_id',
        'comment_unique_id',
        'messages',
        'isActive',
        'user_id',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_unique_id', 'comment_unique_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
