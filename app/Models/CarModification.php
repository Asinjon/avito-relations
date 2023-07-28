<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function drives()
    {
        return $this->belongsToMany(
            CarDrive::class,
            'modification_drive',
            'car_modification_id',
            'car_drive_id',
            'id',
            'id',
            'modifications',
        );
    }

    public function engineTypes()
    {
        return $this->belongsToMany(
            CarEngineType::class,
            'modification_engine_type',
            'car_modification_id',
            'car_engine_type_id',
            'id',
            'id',
            'modifications',
        );
    }

    public function equipments()
    {
        return $this->belongsToMany(
            CarEquipment::class,
            'equipment_modification',
            'car_modification_id',
            'car_equipment_id',
            'id',
            'id',
            'modifications',
        );
    }

    public function transmissions()
    {
        return $this->belongsToMany(
            CarTransmission::class,
            'modification_transmission',
            'car_modification_id',
            'car_transmission_id',
            'id',
            'id',
            'modifications',
        );
    }
}
