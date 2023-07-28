<?php

namespace Database\Seeders;

use App\Models\CarBodyType;
use App\Models\CarBrand;
use App\Models\CarDoorNumber;
use App\Models\CarDrive;
use App\Models\CarEngineType;
use App\Models\CarEquipment;
use App\Models\CarGeneration;
use App\Models\CarManufacturingYear;
use App\Models\CarModel;
use App\Models\CarModification;
use App\Models\CarRudder;
use App\Models\CarTransmission;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = config('avito.brands');

        foreach ($brands as $brandItem) {
            $brand = CarBrand::where('name', $brandItem['value'])->first();

            foreach ($brandItem['models'] as $modelItem) {
                $model = CarModel::create([
                    'name'         => $modelItem['value'],
                    'car_brand_id' => $brand->id,
                ]);

                $rudders = $modelItem['rudders'];

                foreach ($rudders as $rudderItem) {
                    $rudder = CarRudder::where('name', $rudderItem)->first();

                    $model->rudders()->attach($rudder);
                }

                if (isset($modelItem['manufacturing_years'])) {
                    foreach ($modelItem['manufacturing_years'] as $year) {
                        $manufacturingYear = CarManufacturingYear::where('name', $year['value'])->first();

                        $model->manufacturingYears()->attach($manufacturingYear);

                        $bodyTypes = $year['body_types'];
                        foreach ($bodyTypes as $bodyType) {
                            $body = CarBodyType::where('name', $bodyType['value'])->first();

                            if (!$body) {
                                $body = CarBodyType::create([
                                    'name' => $bodyType['value'],
                                ]);
                            }

                            $manufacturingYear->bodyTypes()->attach($body, ['car_model_id' => $model->id]);

                            $doors = $bodyType['door_numbers'];

                            foreach ($doors as $door) {
                                $d = CarDoorNumber::where('name', $door['value'])->first();
                                $body->doorNumbers()->attach($d, [
                                    'car_model_id'              => $model->id,
                                    'car_manufacturing_year_id' => $manufacturingYear->id,
                                ]);

                                $generations = $door['generations'];

                                foreach ($generations as $generationItem) {
                                    $generation = CarGeneration::create([
                                        'name'  => $generationItem['value']['name'],
                                        'from'  => $generationItem['value']['from'],
                                        'to'    => $generationItem['value']['to'],
                                        'image' => 'hello',
                                    ]);
                                    $d->generations()->attach($generation, [
                                        'car_model_id'              => $model->id,
                                        'car_manufacturing_year_id' => $manufacturingYear->id,
                                        'car_body_type_id'          => $body->id,
                                    ]);

                                    $engineTypes = $generationItem['engine_types'];

                                    foreach ($engineTypes as $engineItem) {
                                        $engineType = CarEngineType::where('name', $engineItem['value'])->first();

                                        $generation->engineTypes()->attach($engineType, [
                                            'car_model_id'              => $model->id,
                                            'car_manufacturing_year_id' => $manufacturingYear->id,
                                            'car_body_type_id'          => $body->id,
                                            'car_door_number_id'        => $d->id,
                                        ]);

                                        $drives = $engineItem['drives'];

                                        foreach ($drives as $driveItem) {
                                            $drive = CarDrive::where('name', $driveItem['value'])->first();

                                            $engineType->drives()->attach($drive, [
                                                'car_model_id'              => $model->id,
                                                'car_manufacturing_year_id' => $manufacturingYear->id,
                                                'car_body_type_id'          => $body->id,
                                                'car_door_number_id'        => $d->id,
                                                'car_generation_id'         => $generation->id,
                                            ]);

                                            $transmissions = $driveItem['transmissions'];

                                            foreach ($transmissions as $transmissionItem) {
                                                $transmission = CarTransmission::where('name',
                                                    $transmissionItem['value'])->first();

                                                $drive->transmissions()->attach($transmission, [
                                                    'car_model_id'              => $model->id,
                                                    'car_manufacturing_year_id' => $manufacturingYear->id,
                                                    'car_body_type_id'          => $body->id,
                                                    'car_door_number_id'        => $d->id,
                                                    'car_generation_id'         => $generation->id,
                                                    'car_engine_type_id'        => $engineType->id,
                                                ]);

                                                $modifications = $transmissionItem['modifications'];

                                                foreach ($modifications as $modificationItem) {
                                                    $modification = CarModification::create([
                                                        'name' => $modificationItem['value'],
                                                    ]);

                                                    $transmission->modifications()->attach($modification, [
                                                        'car_model_id'              => $model->id,
                                                        'car_manufacturing_year_id' => $manufacturingYear->id,
                                                        'car_body_type_id'          => $body->id,
                                                        'car_door_number_id'        => $d->id,
                                                        'car_generation_id'         => $generation->id,
                                                        'car_engine_type_id'        => $engineType->id,
                                                        'car_drive_id'              => $drive->id,
                                                    ]);

                                                    $equipments = $modificationItem['equipments'];

                                                    foreach ($equipments as $equipmentItem) {
                                                        $equipment = CarEquipment::where('name',
                                                            $equipmentItem)->first();

                                                        if (!$equipment) {
                                                            $equipment = CarEquipment::create([
                                                                'name' => $equipmentItem,
                                                            ]);
                                                        }

                                                        $modification->equipments()->attach($equipment, [
                                                            'car_model_id'              => $model->id,
                                                            'car_manufacturing_year_id' => $manufacturingYear->id,
                                                            'car_body_type_id'          => $body->id,
                                                            'car_door_number_id'        => $d->id,
                                                            'car_generation_id'         => $generation->id,
                                                            'car_engine_type_id'        => $engineType->id,
                                                            'car_drive_id'              => $drive->id,
                                                            'car_transmission_id'       => $transmission->id,
                                                        ]);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
