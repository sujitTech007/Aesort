<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('subscription_plans')) {
            return;
        }

        $addFromSqft = !Schema::hasColumn('subscription_plans', 'from_sqft');
        $addToSqft = !Schema::hasColumn('subscription_plans', 'to_sqft');

        if (!$addFromSqft && !$addToSqft) {
            return;
        }

        Schema::table('subscription_plans', function (Blueprint $table) use ($addFromSqft, $addToSqft) {
            if ($addFromSqft) {
                $table->unsignedInteger('from_sqft')->nullable();
            }

            if ($addToSqft) {
                $table->unsignedInteger('to_sqft')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Retain pricing-band data to avoid breaking configured plans on rollback.
    }
};
