<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBodyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function doorNumbers()
    {
        return $this->belongsToMany(
            CarDoorNumber::class,
            'body_type_door_number',
            'car_body_type_id',
            'car_door_number_id',
            'id',
            'id',
            'bodyTypes',
        );
    }

    public function generations()
    {
        return $this->belongsToMany(
            CarGeneration::class,
            'generation_body_type',
            'car_body_type_id',
            'car_generation_id',
            'id',
            'id',
            'bodyTypes',
        );
    }

    public function manufacturingYears()
    {
        return $this->belongsToMany(
            CarManufacturingYear::class,
            'body_type_manufacturing_year',
            'car_body_type_id',
            'car_manufacturing_year_id',
            'id',
            'id',
            'bodyTypes',
        )
            ->withPivot('car_model_id');
    }
}
