<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('sites') || !Schema::hasColumn('sites', 'id')) {
            return;
        }

        $columns = DB::select(
            'SELECT EXTRA FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?',
            ['sites', 'id']
        );
        $extra = strtolower($columns[0]->EXTRA ?? '');

        if (!str_contains($extra, 'auto_increment')) {
            DB::statement('ALTER TABLE `sites` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }
    }

    public function down(): void
    {
        // Keep AUTO_INCREMENT enabled to avoid breaking future site inserts.
    }
};
