<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'serial_number',
        'name',
        'type',
        'asset_name',
        'source_unit',
        'reading_interval_minutes',
        'firmware_version',
        'last_active',
        'status',
        'installed_at',
        'is_demo',
    ];
    
   protected $casts = [
    'last_active' => 'datetime',
    'installed_at' => 'datetime',
    'is_demo' => 'boolean',
];

public function site()
{
    return $this->belongsTo(Site::class);
}

    public function readings()
    {
        return $this->hasMany(DeviceReading::class);
    }

}
