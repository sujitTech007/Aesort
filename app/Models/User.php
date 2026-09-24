<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_code',
        'phone',
        'role',
        'company_name',
        'status',
         'google_id',
            'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Determine if the user is a client.
     */
    public function isClient(): bool
    {
        return $this->role === 1 || $this->role === '1';
    }

    /**
     * Determine if the user is a technician.
     */
    public function isTechnician(): bool
    {
        return $this->role === 2 || $this->role === '2';
    }

    /**
     * Return human readable role name.
     */
    public function roleName(): string
    {
        return $this->role == 2 ? 'Technician' : 'Client';
    }

    /**
     * Return human readable status.
     */
    public function statusName(): string
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
}
