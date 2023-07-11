<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\User\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
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
        'username',
        'email',
        'password',
        'role',
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
     * Set hashed password
     *
     * @param $password
     * @return void
     */
    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }


    /**
     * Get element role attribute
     *
     * @return string
     */
    public function getRoleTextAttribute(): string
    {
        return match ($this->role) {
            UserRole::Admin => '<span class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-warning">' . UserRole::getDescription($this->role) . '</span>',
            default => '<span class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-primary">' . UserRole::getDescription($this->role) . '</span>',
        };
    }
}
