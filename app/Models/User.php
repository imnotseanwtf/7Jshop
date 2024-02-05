<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class User extends Authenticatable implements Auditable, MustVerifyEmail
{
    use AuditableTrait;

    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
    public function isSupplier()
    {
        return $this->hasRole('supplier');
    }

    public function isUser()
    {
        return $this->hasRole('user');
    }

    public function isStaff()
    {
        return $this->hasRole('staff');
    }

    public function changeRole(): HasOne
    {
        return $this->hasOne(ChangeRole::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class);
    }
}
