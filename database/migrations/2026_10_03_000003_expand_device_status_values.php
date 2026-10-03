<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('devices') || !Schema::hasColumn('devices', 'status')) {
            return;
        }

        $column = DB::selectOne(
            'SELECT DATA_TYPE AS data_type FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?',
            ['devices', 'status']
        );

        if ($column && strtolower($column->data_type) === 'enum') {
            DB::statement("ALTER TABLE `devices` MODIFY `status` VARCHAR(20) NULL DEFAULT 'online'");
        }
    }

    public function down(): void
    {
        // Preserve statuses such as unknown and archived; narrowing the column could truncate data.
    }
};
