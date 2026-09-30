<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('energy_readings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id')->index();
            $table->timestamp('recorded_at')->index();
            $table->decimal('voltage_v', 10, 3)->nullable();
            $table->decimal('current_a', 10, 3)->nullable();
            $table->decimal('power_kw', 12, 4)->nullable();
            $table->decimal('energy_kwh', 14, 4)->nullable();
            $table->decimal('temperature_c', 8, 3)->nullable();
            $table->timestamps();
            $table->index(['device_id', 'recorded_at']);
        });

        if (Schema::hasTable('devices')) {
            Schema::table('energy_readings', function (Blueprint $table) {
                $table->foreign('device_id')->references('id')->on('devices')->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('energy_readings');
    }
};
