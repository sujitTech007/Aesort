<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('subscription_plans') || !Schema::hasColumn('subscription_plans', 'created_by')) {
            return;
        }

        $firstAdminId = Schema::hasTable('admins') ? DB::table('admins')->orderBy('id')->value('id') : null;
        if ($firstAdminId) {
            DB::table('subscription_plans')->whereNull('created_by')->update(['created_by' => $firstAdminId]);
        }
    }

    public function down(): void
    {
        // Keep proposer attribution to preserve approval history.
    }
};
