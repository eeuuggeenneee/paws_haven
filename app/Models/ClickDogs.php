<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickDogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id_unique',
        'clicked',
    ];

    public function animal()
    {
        return $this->belongsTo(AnimalList::class, 'dog_id_unique', 'dog_id_unique');
    }
}
