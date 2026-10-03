<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\DeviceReading;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DeviceDemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'device-demo@aesort.local'],
            [
                'name' => 'AESORT Device Demo (Inactive)',
                'password' => Hash::make(Str::random(64)),
                'role' => 1,
                'company_name' => 'AESORT Demo Data',
                'status' => 0,
            ]
        );

        $site = Site::updateOrCreate(
            ['user_id' => $user->id, 'name' => 'Device Demo Facility'],
            [
                'address' => '100 Demo Avenue',
                'city' => 'Toronto',
                'province' => 'Ontario',
                'country' => 'Canada',
                'portfolio_name' => 'Device Demo Portfolio',
                'heating_fuel' => 'Electricity',
                'operating_hours' => 'Mon-Fri 08:00-18:00',
                'area_sqft' => 5000,
                'type' => 'office',
                'timezone' => 'America/Toronto',
                'status' => 1,
                'is_demo' => true,
            ]
        );

        $deviceSpecs = [
            [
                'serial_number' => 'AES-DEMO-METER-001',
                'name' => 'Main Electricity Meter',
                'type' => 'meter',
                'asset_name' => 'Building Main Feed',
                'source_unit' => 'kWh',
                'reading_interval_minutes' => 15,
                'firmware_version' => 'Demo 1.0',
                'last_active' => now()->subMinutes(15),
                'status' => 'online',
                'installed_at' => now()->subMonths(2),
                'reading' => ['voltage' => 230.0, 'current' => 12.4, 'power' => 2.85, 'energy' => 18.62, 'temperature' => null],
            ],
            [
                'serial_number' => 'AES-DEMO-SENSOR-002',
                'name' => 'Boiler Room Temperature Sensor',
                'type' => 'sensor',
                'asset_name' => 'Boiler Room',
                'source_unit' => 'C',
                'reading_interval_minutes' => 30,
                'firmware_version' => 'Demo 1.0',
                'last_active' => now()->subHours(2),
                'status' => 'offline',
                'installed_at' => now()->subMonths(1),
                'reading' => ['voltage' => null, 'current' => null, 'power' => null, 'energy' => null, 'temperature' => 21.7],
            ],
            [
                'serial_number' => 'AES-DEMO-GATEWAY-003',
                'name' => 'North Wing Gateway',
                'type' => 'gateway',
                'asset_name' => 'North Wing',
                'source_unit' => 'mixed',
                'reading_interval_minutes' => 5,
                'firmware_version' => 'Demo 1.0',
                'last_active' => null,
                'status' => 'unknown',
                'installed_at' => now()->subDays(3),
                'reading' => null,
            ],
        ];

        foreach ($deviceSpecs as $spec) {
            $device = Device::updateOrCreate(
                ['serial_number' => $spec['serial_number']],
                [
                    'site_id' => $site->id,
                    'name' => $spec['name'],
                    'type' => $spec['type'],
                    'asset_name' => $spec['asset_name'],
                    'source_unit' => $spec['source_unit'],
                    'reading_interval_minutes' => $spec['reading_interval_minutes'],
                    'firmware_version' => $spec['firmware_version'],
                    'last_active' => $spec['last_active'],
                    'status' => $spec['status'],
                    'installed_at' => $spec['installed_at'],
                    'is_demo' => true,
                ]
            );

            if ($spec['reading']) {
                $existingReading = DeviceReading::where('device_id', $device->id)
                    ->orderByDesc('reading_time')
                    ->first();
                $readingTime = $existingReading?->reading_time ?? now()->subMinutes(15)->startOfMinute();
                $readingValues = [
                    'reading_time' => $readingTime,
                    ...$spec['reading'],
                    'status' => 'ok',
                    'created_at' => $existingReading?->created_at ?? now(),
                ];

                if ($existingReading) {
                    $existingReading->update($readingValues);
                    DeviceReading::where('device_id', $device->id)
                        ->where('id', '!=', $existingReading->id)
                        ->delete();
                } else {
                    DeviceReading::create(['device_id' => $device->id, ...$readingValues]);
                }

                $device->update(['last_active' => $readingTime]);
            }
        }

        $this->command->info('Seeded 3 isolated demo devices and 2 sample readings. The demo customer is inactive and demo data is excluded from real customer views.');
    }
}
