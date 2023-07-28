<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'car_equipments';

    public function modifications()
    {
        return $this->belongsToMany(
            CarModification::class,
            'equipment_modification',
            'car_equipment_id',
            'car_modification_id',
            'id',
            'id',
            'equipments',
        );
    }
}
