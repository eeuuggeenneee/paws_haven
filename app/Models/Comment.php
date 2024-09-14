<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_unique_id',
        'comment_unique_id',
        'messages',
        'isActive',
        'user_id',
    ];

    // Relationships
    public function community()
    {
        return $this->belongsTo(Community::class, 'post_unique_id', 'post_id_unique');
    }
    public function userc()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
