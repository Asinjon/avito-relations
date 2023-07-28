<?php

namespace Database\Seeders;

use App\Models\CarBodyType;
use Illuminate\Database\Seeder;

class CarBodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodies = config('avito.body_types');

        foreach ($bodies as $body) {
            CarBodyType::create([
                'name' => $body,
            ]);
        }
    }
}
