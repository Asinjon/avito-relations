<?php

namespace Database\Seeders;

use App\Models\CarEquipment;
use Illuminate\Database\Seeder;

class CarEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = config('avito.equipments');

        foreach ($equipments as $equipment) {
            CarEquipment::create([
                'name' => $equipment,
            ]);
        }
    }
}
