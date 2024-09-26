<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogClaim extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'address',
        'dog_description',
        'breed',
        'gender',
        'proof',
        'last_loc',
        'dog_id_unique',
        'isActive',
        'contact',
        'user_id'
    ];
}
