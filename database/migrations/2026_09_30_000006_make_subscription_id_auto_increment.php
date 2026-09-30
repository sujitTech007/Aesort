<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('subscriptions') || !Schema::hasColumn('subscriptions', 'id')) {
            return;
        }

        $columns = DB::select(
            'SELECT EXTRA, COLUMN_KEY FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?',
            ['subscriptions', 'id']
        );
        $extra = strtolower($columns[0]->EXTRA ?? '');
        $key = strtoupper($columns[0]->COLUMN_KEY ?? '');

        if (!str_contains($extra, 'auto_increment') || $key !== 'PRI') {
            DB::statement('ALTER TABLE `subscriptions` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY');
        }
    }

    public function down(): void
    {
        // Keep auto-increment enabled so new subscription records can be created.
    }
};
