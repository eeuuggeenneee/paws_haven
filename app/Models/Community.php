<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id_unique',
        'message',
        'images_path',
        'isActive',
        'user_id',
    ];

    // Relationships
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_unique_id', 'post_id_unique');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
