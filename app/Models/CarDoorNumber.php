<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDoorNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function bodyTypes()
    {
        return $this->belongsToMany(
            CarBodyType::class,
            'body_type_door_number',
            'car_door_number_id',
            'car_body_type_id',
            'id',
            'id',
            'doorNumbers',
        );
    }

    public function generations()
    {
        return $this->belongsToMany(
            CarGeneration::class,
            'generation_door_number',
            'car_door_number_id',
            'car_generation_id',
            'id',
            'id',
            'doorNumbers',
        );
    }
}
