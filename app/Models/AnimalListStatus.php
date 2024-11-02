<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalList;


class AnimalListStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',    // Foreign key from animal_lists
        'status',       // Status of the animal (lost, found, claimed, etc.)
        'isActive',     // Whether the status is active or not
    ];
    public function animal()
    {
        return $this->belongsTo(AnimalList::class, 'animal_id', 'dog_id_unique');
    }
    public function animalClick()
    {
        return $this->belongsTo(ClickDogs::class, 'dog_id_unique', 'dog_id_unique');
    }
}
