<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('energy_readings')) {
            return;
        }

        if (!Schema::hasTable('device_readings')) {
            Schema::create('device_readings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('device_id')->nullable()->index();
                $table->dateTime('reading_time')->nullable();
                $table->decimal('voltage', 8, 2)->nullable();
                $table->decimal('current', 8, 2)->nullable();
                $table->decimal('power', 10, 2)->nullable();
                $table->decimal('energy', 10, 2)->nullable();
                $table->decimal('temperature', 5, 2)->nullable();
                $table->string('status', 20)->default('ok');
                $table->timestamp('created_at')->useCurrent();
            });

            if (Schema::hasTable('devices')) {
                Schema::table('device_readings', function (Blueprint $table) {
                    $table->foreign('device_id')->references('id')->on('devices')->nullOnDelete();
                });
            }
        }

        if (Schema::hasColumn('energy_readings', 'recorded_at')) {
            DB::table('energy_readings')->orderBy('id')->chunkById(500, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('device_readings')->insert([
                        'device_id' => $row->device_id,
                        'reading_time' => $row->recorded_at,
                        'voltage' => $row->voltage_v,
                        'current' => $row->current_a,
                        'power' => $row->power_kw,
                        'energy' => $row->energy_kwh,
                        'temperature' => $row->temperature_c,
                        'status' => 'ok',
                        'created_at' => $row->created_at ?? now(),
                    ]);
                }
            });
        }

        Schema::dropIfExists('energy_readings');
    }

    public function down(): void
    {
        // Keep readings in the imported canonical table to avoid data loss on rollback.
    }
};
