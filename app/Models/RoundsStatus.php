<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundsStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'rounds_id',
        'is_approved',
        'is_active',
    ];
}
