<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRudder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function models()
    {
        return $this->belongsToMany(
            CarModel::class,
            'model_rudder',
            'car_rudder_id',
            'car_model_id',
            'id',
            'id',
            'rudders',
        );
    }
}
