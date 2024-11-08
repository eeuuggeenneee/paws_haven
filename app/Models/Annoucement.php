<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annoucement extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',     
        'title',
        'sub_title',
        'isActive',
        'user_id',
    ];

}