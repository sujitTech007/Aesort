<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Device;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolloutDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();
        $user = User::first();
        $site = Site::first();
        $device = Device::first();

        if (! $admin) {
            $this->command->warn('No admin account found. Skipping rollout demo seed.');
            return;
        }

        if (! $user) {
            $this->command->warn('No client user found. Skipping rollout demo seed.');
            return;
        }

        if (! $site) {
            $site = Site::create([
                'user_id' => $user->id,
                'name' => 'North Tower Campus',
                'address' => '141 Market Street',
                'city' => 'Johannesburg',
                'country' => 'South Africa',
                'province' => 'Gauteng',
                'portfolio_name' => 'AESORT Portfolio',
                'heating_fuel' => 'Natural gas',
                'operating_hours' => 'Mon-Fri 08:00-18:00',
                'area_sqft' => 4200,
                'type' => 'office',
                'timezone' => 'Africa/Johannesburg',
                'status' => 1,
            ]);
        }

        if (! $device) {
            $device = Device::create([
                'site_id' => $site->id,
                'serial_number' => 'AES-ROLL-1001',
                'name' => 'Main Meter 1',
                'type' => 'smart_meter',
                'asset_name' => 'Building Main Meter',
                'source_unit' => 'kWh',
                'reading_interval_minutes' => 15,
                'firmware_version' => '2.4.1',
                'last_active' => now()->subMinutes(20),
                'status' => 'online',
                'installed_at' => now()->subMonths(4),
            ]);
        }

        $baselineId = DB::table('energy_baselines')->insertGetId([
            'site_id' => $site->id,
            'name' => 'Baseline Q3 2026',
            'period_start' => now()->startOfMonth()->subMonth()->toDateString(),
            'period_end' => now()->endOfMonth()->subMonth()->toDateString(),
            'methodology' => 'Utility billing review with 30-day interval reconciliation.',
            'baseline_kwh' => 41250.000,
            'status' => 'approved',
            'created_by' => $admin->id,
            'approved_by' => $admin->id,
            'approved_at' => now()->subDay(),
            'approval_note' => 'Baseline approved for rollout review and savings tracking.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('savings_measures')->updateOrInsert(
            ['site_id' => $site->id, 'title' => 'LED replacement programme'],
            [
                'baseline_id' => $baselineId,
                'description' => 'Retire legacy lighting and replace with controlled LED fixtures.',
                'stage' => 'verified',
                'estimated_savings_kwh' => 8400.000,
                'verified_savings_kwh' => 7985.500,
                'estimated_cost_savings' => 3200.00,
                'currency_code' => 'USD',
                'evidence' => 'Commissioning report attached and post-installation check completed.',
                'owner_id' => $admin->id,
                'verified_by' => $admin->id,
                'verified_at' => now()->subHours(6),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('recommendations')->updateOrInsert(
            ['site_id' => $site->id, 'title' => 'Optimize HVAC schedules'],
            [
                'device_id' => $device->id,
                'description' => 'Shift after-hours HVAC setpoints to align with reduced occupancy periods.',
                'priority' => 'high',
                'status' => 'in_progress',
                'assigned_to' => $admin->id,
                'due_date' => now()->addDays(12)->toDateString(),
                'completion_note' => 'Monitoring on-going with site team validation.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('onboarding_projects')->updateOrInsert(
            ['user_id' => $user->id, 'site_id' => $site->id, 'stage' => 'data_validation'],
            [
                'success_criteria' => 'Meter data stable, energy baseline approved, and dashboard aligned to site expectations.',
                'owner_id' => $admin->id,
                'target_date' => now()->addDays(15)->toDateString(),
                'activated_at' => now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('benchmark_versions')->updateOrInsert(
            ['name' => 'Commercial Office Benchmark', 'version' => 'v2026.2'],
            [
                'sector' => 'office',
                'metric' => 'energy_intensity',
                'unit' => 'kWh/sqft',
                'region' => 'South Africa',
                'benchmark_value' => 12.8700,
                'source_citation' => 'South Africa Commercial Energy Benchmarking Report, 2026.',
                'effective_from' => now()->subMonths(2)->toDateString(),
                'effective_to' => null,
                'status' => 'approved',
                'approved_by' => $admin->id,
                'approved_at' => now()->subDays(2),
                'created_by' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('operational_incidents')->updateOrInsert(
            ['site_id' => $site->id, 'title' => 'Weekend HVAC drift'],
            [
                'device_id' => $device->id,
                'description' => 'The main HVAC controller drifted above expected operating range during overnight demand window.',
                'severity' => 'high',
                'status' => 'investigating',
                'assigned_to' => $admin->id,
                'occurred_at' => now()->subHours(18),
                'resolution_note' => 'Awaiting technician field review and control setpoint validation.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('integration_health_checks')->updateOrInsert(
            ['integration_name' => 'Utility Data Sync'],
            [
                'integration_type' => 'csv',
                'status' => 'degraded',
                'checked_at' => now(),
                'details' => 'Data feed received but one import file was delayed by 12 hours.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('admin_audit_logs')->updateOrInsert(
            ['entity_type' => 'demo_rollout', 'event' => 'seeded', 'admin_id' => $admin->id],
            [
                'entity_id' => $site->id,
                'reason' => 'Sample rollout data seeded for workflow testing.',
                'before_values' => null,
                'after_values' => json_encode(['site_id' => $site->id, 'device_id' => $device->id]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('Rollout demo data seeded successfully.');
    }
}
