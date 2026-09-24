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
        'firmware_version',
        'last_active',
        'status',
        'installed_at',
    ];
    
   protected $casts = [
    'last_active' => 'datetime',
    'installed_at' => 'datetime',
];

public function site()
{
    return $this->belongsTo(Site::class);
}

}
