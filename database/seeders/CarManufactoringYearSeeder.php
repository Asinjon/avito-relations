<?php

namespace Database\Seeders;

use App\Models\CarManufacturingYear;
use Illuminate\Database\Seeder;

class CarManufactoringYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = config('avito.manufacturing_years');

        foreach ($years as $year) {
            CarManufacturingYear::create([
                'name' => $year,
            ]);
        }
    }
}
