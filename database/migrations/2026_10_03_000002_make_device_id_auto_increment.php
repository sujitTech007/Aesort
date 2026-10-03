<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('devices') || !Schema::hasColumn('devices', 'id')) {
            return;
        }

        $column = DB::selectOne(
            'SELECT EXTRA AS extra, COLUMN_KEY AS column_key FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?',
            ['devices', 'id']
        );

        if (!$column) {
            return;
        }

        if (!str_contains(strtolower($column->extra), 'auto_increment')) {
            if ($column->column_key === 'PRI') {
                DB::statement('ALTER TABLE `devices` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
            } else {
                DB::statement('ALTER TABLE `devices` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`)');
            }
        }
    }

    public function down(): void
    {
        // Keep AUTO_INCREMENT enabled to preserve safe future device inserts.
    }
};
