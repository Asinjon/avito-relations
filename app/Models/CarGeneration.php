<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarGeneration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'from',
        'to',
    ];

    public function bodyTypes()
    {
        return $this->belongsToMany(
            CarBodyType::class,
            'generation_body_type',
            'car_generation_id',
            'car_body_type_id',
            'id',
            'id',
            'generations',
        );
    }

    public function doorNumbers()
    {
        return $this->belongsToMany(
            CarDoorNumber::class,
            'generation_door_number',
            'car_generation_id',
            'car_door_number_id',
            'id',
            'id',
            'generations',
        );
    }

    public function engineTypes()
    {
        return $this->belongsToMany(
            CarEngineType::class,
            'engine_type_generation',
            'car_generation_id',
            'car_engine_type_id',
            'id',
            'id',
            'generations',
        );
    }

    public function models()
    {
        return $this->belongsToMany(
            CarModel::class,
            'generation_model',
            'car_generation_id',
            'car_model_id',
            'id',
            'id',
            'generations',
        );
    }
}
