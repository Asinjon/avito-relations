<?php

namespace Database\Seeders;

use App\Models\CarEngineType;
use Illuminate\Database\Seeder;

class CarEngineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engineTypes = config('avito.engine_types');

        foreach ($engineTypes as $engine) {
            CarEngineType::create([
                'name' => $engine,
            ]);
        }
    }
}
