<?php

namespace Database\Seeders;

use App\Models\CarRudder;
use Illuminate\Database\Seeder;

class CarRudderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rudders = config('avito.rudders');

        foreach ($rudders as $rudder) {
            CarRudder::create([
                'name' => $rudder,
            ]);
        }
    }
}
