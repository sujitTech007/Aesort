<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAuditLog extends Model
{
    protected $table = 'admin_audit_logs';

    protected $fillable = [
        'admin_id',
        'entity_type',
        'entity_id',
        'event',
        'reason',
        'before_values',
        'after_values',
    ];

    protected $casts = [
        'before_values' => 'array',
        'after_values' => 'array',
    ];
}
