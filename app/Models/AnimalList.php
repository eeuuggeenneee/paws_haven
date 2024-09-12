<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalListStatus;

class AnimalList extends Model
{
    use HasFactory;

    protected $fillable = [

        'dog_name',      // e.g., Dog, Cat
        'dog_id_unique',
        'breed',
        'color',
        'gender',
        'report_type',
        'location_found',
        'date_found',
        'description',
        'animal_images',
        'contact_name',
        'contact_person',
        'isActive',
    ];

    public function statuses()
    {
        return $this->hasMany(AnimalListStatus::class, 'animal_id', 'dog_id_unique');
    }
    public function scopeActive($query)
    {
        return $query->where('isActive', true);
    }
}
