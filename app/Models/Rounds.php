<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rounds extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'specific_location',
        'schedule',
        'reason',
        'contact',
        'user_id',
        'is_approved',
        'is_rejected',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
