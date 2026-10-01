<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('benchmark_versions') && !Schema::hasColumn('benchmark_versions', 'created_by')) {
            Schema::table('benchmark_versions', function (Blueprint $table) {
                $table->unsignedBigInteger('created_by')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Keep proposer attribution for saved benchmark review history.
    }
};
