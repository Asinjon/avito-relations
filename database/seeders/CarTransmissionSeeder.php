<?php

namespace Database\Seeders;

use App\Models\CarTransmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = config('avito.transmissions');

        foreach ($transmissions as $transmission) {
            CarTransmission::create([
                'name' => $transmission
            ]);
        }
    }
}
