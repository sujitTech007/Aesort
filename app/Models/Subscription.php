<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'site_id',
        'plan_id',
        'amount',
        'start_date',
        'end_date',
        'status',
        'stripe_subscription_id',
    ];

     public function site()
    {
        return $this->belongsTo(\App\Models\Site::class, 'site_id');
    }
    
     public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Relationship with Plan
     */
    public function plan()
    {
        return $this->belongsTo(\App\Models\SubscriptionPlan::class, 'plan_id');
    }

}
