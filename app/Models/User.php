<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

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

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationUser::class);
    }

    public function scopeMembers(Builder $query): void
    {
        $query->select('users.*')
            ->join('organization_user', 'organization_user.organization_id', '=', 'users.active_organization_id')
            ->where('organization_user.organization_id', auth()->user()->active_organization_id)->groupBy('users.id');
    }

    public function currentOrganization()
    {
        return $this->belongsTo(Organization::class, 'active_organization_id', 'id');
    }
}
