<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceReading extends Model
{
    protected $table = 'device_readings';

    public $timestamps = false;

    protected $fillable = [
        'device_id',
        'reading_time',
        'voltage',
        'current',
        'power',
        'energy',
        'temperature',
        'status',
        'created_at',
    ];

    protected $casts = [
        'reading_time' => 'datetime',
        'created_at' => 'datetime',
        'voltage' => 'float',
        'current' => 'float',
        'power' => 'float',
        'energy' => 'float',
        'temperature' => 'float',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}