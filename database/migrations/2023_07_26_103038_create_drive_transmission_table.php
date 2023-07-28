<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drive_transmission', function (Blueprint $table) {
            $table->foreignId('car_transmission_id')->constrained();
            $table->foreignId('car_drive_id')->constrained();
            $table->foreignId('car_model_id')->constrained();
            $table->foreignId('car_manufacturing_year_id')->constrained();
            $table->foreignId('car_body_type_id')->constrained();
            $table->foreignId('car_door_number_id')->constrained();
            $table->foreignId('car_generation_id')->constrained();
            $table->foreignId('car_engine_type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engine_type_transmission');
    }
};
