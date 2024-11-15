<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionForm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'c_number',
        'address',
        'reason',
        'materials',
        'tos_agree',
        'dog_id_unique',
        'user_id',
        'is_active'
    ];
}
