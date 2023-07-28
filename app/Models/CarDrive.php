<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDrive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function engineTypes()
    {
        return $this->belongsToMany(
            CarEngineType::class,
            'engine_type_drive',
            'car_drive_id',
            'car_engine_type_id',
            'id',
            'id',
            'drives',
        );
    }

    public function modifications()
    {
        return $this->belongsToMany(
            CarModification::class,
            'modification_drive',
            'car_drive_id',
            'car_modification_id',
            'id',
            'id',
            'drives',
        );
    }

    public function transmissions()
    {
        return $this->belongsToMany(
            CarTransmission::class,
            'drive_transmission',
            'car_drive_id',
            'car_transmission_id',
            'id',
            'id',
            'drives',
        );
    }
}
