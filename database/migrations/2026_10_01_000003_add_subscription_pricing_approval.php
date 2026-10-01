<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('subscription_plans')) {
            Schema::table('subscription_plans', function (Blueprint $table) {
                if (!Schema::hasColumn('subscription_plans', 'currency_code')) $table->char('currency_code', 3)->default('USD');
                if (!Schema::hasColumn('subscription_plans', 'pricing_status')) $table->string('pricing_status', 20)->default('draft');
                if (!Schema::hasColumn('subscription_plans', 'created_by')) $table->unsignedBigInteger('created_by')->nullable();
                if (!Schema::hasColumn('subscription_plans', 'pricing_approved_by')) $table->unsignedBigInteger('pricing_approved_by')->nullable();
                if (!Schema::hasColumn('subscription_plans', 'pricing_approved_at')) $table->timestamp('pricing_approved_at')->nullable();
            });
        }

        if (Schema::hasTable('subscriptions') && !Schema::hasColumn('subscriptions', 'currency_code')) {
            Schema::table('subscriptions', function (Blueprint $table) {
                $table->char('currency_code', 3)->default('USD');
            });
        }
    }

    public function down(): void
    {
        // Retain pricing approval and currency metadata to avoid orphaning live plan/subscription data.
    }
};
