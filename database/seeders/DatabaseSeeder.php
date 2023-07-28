<?php

namespace Database\Seeders;

use App\Models\CarBodyType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CarBrandSeeder::class);
        $this->call(CarDoorNumberSeeder::class);
        $this->call(CarDriveSeeder::class);
        $this->call(CarEngineTypeSeeder::class);
        $this->call(CarEquipmentSeeder::class);
        $this->call(CarBodyTypeSeeder::class);
        $this->call(CarManufactoringYearSeeder::class);
        $this->call(CarRudderSeeder::class);
        $this->call(CarTransmissionSeeder::class);
        $this->call(CarModelSeeder::class);
    }
}
