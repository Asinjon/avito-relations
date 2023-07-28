<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEngineType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function drives()
    {
        return $this->belongsToMany(
            CarDrive::class,
            'engine_type_drive',
            'car_engine_type_id',
            'car_drive_id',
            'id',
            'id',
            'engineTypes',
        );
    }

    public function generations()
    {
        return $this->belongsToMany(
            CarGeneration::class,
            'engine_type_generation',
            'car_engine_type_id',
            'car_generation_id',
            'id',
            'id',
            'engineTypes',
        );
    }

    public function modifications()
    {
        return $this->belongsToMany(
            CarModification::class,
            'modification_engine_type',
            'car_engine_type_id',
            'car_modification_id',
            'id',
            'id',
            'engineTypes',
        );
    }
}
