<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'features',
        'from_sqft',
        'to_sqft',
        'status',
        'currency_code',
        'pricing_status',
        'created_by',
        'pricing_approved_by',
        'pricing_approved_at',
    ];

     protected $casts = [
        'features' => 'array',
        'pricing_approved_at' => 'datetime',
    ];
    
}
