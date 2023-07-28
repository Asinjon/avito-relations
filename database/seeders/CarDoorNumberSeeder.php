<?php

namespace Database\Seeders;

use App\Models\CarDoorNumber;
use Illuminate\Database\Seeder;

class CarDoorNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doors = config('avito.door_numbers');

        foreach ($doors as $door) {
            CarDoorNumber::create([
                'name' => $door
            ]);
        }
    }
}
