<?php

namespace Database\Seeders;

use App\Models\CarDrive;
use Illuminate\Database\Seeder;

class CarDriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drives = config('avito.drives');

        foreach ($drives as $drive) {
            CarDrive::create([
                'name' => $drive
            ]);
        }
    }
}
