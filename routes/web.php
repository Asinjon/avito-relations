<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/brands', function () {
    return response([
        'brands' => \App\Models\CarBrand::get(),
    ], 200);
});

Route::get('/brands/{brand}/models', function (\App\Models\CarBrand $brand) {
    return response([
        'brand' => $brand->load('models'),
    ], 200);
});

Route::get('/brands/{brand}/models/{model}/years', function (\App\Models\CarBrand $brand, \App\Models\CarModel $model) {
    return response([
        'years' => $model->manufacturingYears,
    ], 200);
});

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies', function (
    \App\Models\CarBrand $brand,
    \App\Models\CarModel $model,
    \App\Models\CarManufacturingYear $year
) {
    return response([
        'bodies' => $year->bodyTypes()->where('car_model_id', $model->id)->get(),
    ], 200);
});

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors', function (
    \App\Models\CarBrand $brand,
    \App\Models\CarModel $model,
    \App\Models\CarManufacturingYear $year,
    \App\Models\CarBodyType $body,
) {
    return response([
        'doors' => $body->doorNumbers()
            ->where('car_model_id', $model->id)
            ->where('car_manufacturing_year_id', $year->id)
            ->get(),
    ], 200);
});

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations', function (
    \App\Models\CarBrand $brand,
    \App\Models\CarModel $model,
    \App\Models\CarManufacturingYear $year,
    \App\Models\CarBodyType $body,
    \App\Models\CarDoorNumber $door,
) {
    return response([
        'generations' => $door->generations()
            ->where('car_model_id', $model->id)
            ->where('car_manufacturing_year_id', $year->id)
            ->where('car_manufacturing_year_id', $year->id)
            ->where('car_body_type_id', $body->id)
            ->get(),
    ], 200);
});

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations/{generation}/engines',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
        \App\Models\CarManufacturingYear $year,
        \App\Models\CarBodyType $body,
        \App\Models\CarDoorNumber $door,
        \App\Models\CarGeneration $generation,
    ) {
        return response([
            'engineTypes' => $generation->engineTypes()
                ->where('car_model_id', $model->id)
                ->where('car_manufacturing_year_id', $year->id)
                ->where('car_body_type_id', $body->id)
                ->where('car_generation_id', $generation->id)
                ->get(),
        ], 200);
    });

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations/{generation}/engines/{engine}/drives',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
        \App\Models\CarManufacturingYear $year,
        \App\Models\CarBodyType $body,
        \App\Models\CarDoorNumber $door,
        \App\Models\CarGeneration $generation,
        \App\Models\CarEngineType $engine,
    ) {
        return response([
            'drives' => $engine->drives()
                ->where('car_model_id', $model->id)
                ->where('car_manufacturing_year_id', $year->id)
                ->where('car_body_type_id', $body->id)
                ->where('car_generation_id', $generation->id)
                ->where('car_engine_type_id', $engine->id)
                ->get(),
        ], 200);
    });

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations/{generation}/engines/{engine}/drives/{drive}/transmissions',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
        \App\Models\CarManufacturingYear $year,
        \App\Models\CarBodyType $body,
        \App\Models\CarDoorNumber $door,
        \App\Models\CarGeneration $generation,
        \App\Models\CarEngineType $engine,
        \App\Models\CarDrive $drive,
    ) {
        return response([
            'transmissions' => $drive->transmissions()
                ->where('car_model_id', $model->id)
                ->where('car_manufacturing_year_id', $year->id)
                ->where('car_body_type_id', $body->id)
                ->where('car_generation_id', $generation->id)
                ->where('car_engine_type_id', $engine->id)
                ->where('car_drive_id', $drive->id)
                ->get(),
        ], 200);
    });

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations/{generation}/engines/{engine}/drives/{drive}/transmissions/{transmission}/modifications',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
        \App\Models\CarManufacturingYear $year,
        \App\Models\CarBodyType $body,
        \App\Models\CarDoorNumber $door,
        \App\Models\CarGeneration $generation,
        \App\Models\CarEngineType $engine,
        \App\Models\CarDrive $drive,
        \App\Models\CarTransmission $transmission,
    ) {
        return response([
            'modifications' => $transmission->modifications()
                ->where('car_model_id', $model->id)
                ->where('car_manufacturing_year_id', $year->id)
                ->where('car_body_type_id', $body->id)
                ->where('car_generation_id', $generation->id)
                ->where('car_engine_type_id', $engine->id)
                ->where('car_drive_id', $drive->id)
                ->where('car_transmission_id', $transmission->id)
                ->get(),
        ], 200);
    });

Route::get('/brands/{brand}/models/{model}/years/{year}/bodies/{body}/doors/{door}/generations/{generation}/engines/{engine}/drives/{drive}/transmissions/{transmission}/modifications/{modification}/equipments',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
        \App\Models\CarManufacturingYear $year,
        \App\Models\CarBodyType $body,
        \App\Models\CarDoorNumber $door,
        \App\Models\CarGeneration $generation,
        \App\Models\CarEngineType $engine,
        \App\Models\CarDrive $drive,
        \App\Models\CarTransmission $transmission,
        \App\Models\CarModification $modification,
    ) {
        return response([
            'complectations' => $modification->equipments()
                ->where('car_model_id', $model->id)
                ->where('car_manufacturing_year_id', $year->id)
                ->where('car_body_type_id', $body->id)
                ->where('car_generation_id', $generation->id)
                ->where('car_engine_type_id', $engine->id)
                ->where('car_drive_id', $drive->id)
                ->where('car_transmission_id', $transmission->id)
                ->where('car_modification_id', $modification->id)
                ->get(),
        ], 200);
    });

Route::get('/brands/{brand}/models/{model}/rudders',
    function (
        \App\Models\CarBrand $brand,
        \App\Models\CarModel $model,
    ) {
        return response([
            'rudders' => $model->rudders,
        ], 200);
    });
