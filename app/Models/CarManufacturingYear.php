<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarManufacturingYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function bodyTypes()
    {
        return $this->belongsToMany(
            CarBodyType::class,
            'body_type_manufacturing_year',
            'car_manufacturing_year_id',
            'car_body_type_id',
            'id',
            'id',
            'manufacturingYears',
        )
            ->withPivot('car_model_id');
    }

    public function models()
    {
        return $this->belongsToMany(
            CarModel::class,
            'manufacturing_year_model',
            'car_manufacturing_year_id',
            'car_model_id',
            'id',
            'id',
            'manufacturingYears',
        );
    }
}
