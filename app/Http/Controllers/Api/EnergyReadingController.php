<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceReading;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EnergyReadingController extends Controller
{
    public function store(Request $request, int $deviceId)
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);

        $device = Device::with('site')->findOrFail($deviceId);
        abort_unless($device->site && (int) $device->site->user_id === (int) $user->id, 404);

        $data = Validator::make($request->all(), [
            'reading_time' => 'required|date|before_or_equal:now',
            'voltage' => 'nullable|numeric|between:0,1000',
            'current' => 'nullable|numeric|between:0,10000',
            'power' => 'nullable|numeric|between:0,100000',
            'energy' => 'nullable|numeric|between:0,1000000000',
            'temperature' => 'nullable|numeric|between:-100,200',
        ])->validate();

        $measurementFields = ['voltage', 'current', 'power', 'energy', 'temperature'];
        if (!collect($measurementFields)->contains(fn ($field) => array_key_exists($field, $data) && $data[$field] !== null)) {
            throw ValidationException::withMessages([
                'reading' => 'Provide at least one measurement value.',
            ]);
        }

        $reading = DeviceReading::create([
            'device_id' => $device->id,
            'status' => 'ok',
            'created_at' => now(),
            ...$data,
        ]);

        if (!$device->last_active || $reading->reading_time->gt($device->last_active)) {
            $device->last_active = $reading->reading_time;
            $device->save();
        }

        return response()->json([
            'message' => 'Energy reading recorded.',
            'reading' => $reading->load('device:id,name,serial_number'),
        ], 201);
    }
}