<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'country',
        'area_sqft',
        'type',
        'timezone',
        'status',
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
