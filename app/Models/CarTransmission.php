<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function drives()
    {
        return $this->belongsToMany(
            CarDrive::class,
            'drive_transmission',
            'car_transmission_id',
            'car_drive_id',
            'id',
            'id',
            'transmissions',
        );
    }

    public function modifications()
    {
        return $this->belongsToMany(
            CarModification::class,
            'modification_transmission',
            'car_transmission_id',
            'car_modification_id',
            'id',
            'id',
            'transmissions',
        );
    }
}
