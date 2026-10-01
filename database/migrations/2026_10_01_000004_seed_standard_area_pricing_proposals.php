<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('subscription_plans')
            || !Schema::hasColumn('subscription_plans', 'from_sqft')
            || !Schema::hasColumn('subscription_plans', 'to_sqft')
            || !Schema::hasColumn('subscription_plans', 'pricing_status')) {
            return;
        }

        if (!Schema::hasColumn('subscription_plans', 'status')) {
            Schema::table('subscription_plans', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->unsignedTinyInteger('status')->default(1);
            });
        }

        $defaults = [
            [
                'name' => 'Standard Monthly - Up to 2,000 sq ft',
                'amount' => 399.00,
                'from_sqft' => 0,
                'to_sqft' => 2000,
                'features' => json_encode(['Standard monthly service']),
            ],
            [
                'name' => 'Standard Monthly - 2,001 to 5,000 sq ft',
                'amount' => 599.00,
                'from_sqft' => 2001,
                'to_sqft' => 5000,
                'features' => json_encode(['Standard monthly service']),
            ],
        ];

        foreach ($defaults as $plan) {
            $exists = DB::table('subscription_plans')->where('name', $plan['name'])->exists();
            if (!$exists) {
                DB::table('subscription_plans')->insert($plan + [
                    'currency_code' => 'USD',
                    'status' => 1,
                    'pricing_status' => 'draft',
                    'created_by' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        // Keep proposed plans if they have been referenced or reviewed after seeding.
    }
};
