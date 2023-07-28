<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'car_brand_id'
    ];

    public function generations()
    {
        return $this->belongsToMany(
            CarGeneration::class,
            'generation_model',
            'car_model_id',
            'car_generation_id',
            'id',
            'id',
            'models',
        );
    }

    public function manufacturingYears()
    {
        return $this->belongsToMany(
            CarManufacturingYear::class,
            'manufacturing_year_model',
            'car_model_id',
            'car_manufacturing_year_id',
            'id',
            'id',
            'models',
        );
    }

    public function rudders()
    {
        return $this->belongsToMany(
            CarRudder::class,
            'model_rudder',
            'car_model_id',
            'car_rudder_id',
            'id',
            'id',
            'models',
        );
    }
}
