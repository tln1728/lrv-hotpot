<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_EDITOR = 2;

    const ROLES = [
        self::ROLE_USER => 'User',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_EDITOR => 'Editor',
    ];

    const ROLES_COLOR = [
        self::ROLE_ADMIN  => 'danger',
        self::ROLE_USER   => 'gray',
        self::ROLE_EDITOR => 'info',
    ];

    public function canAccessPanel(Panel $panel): bool{
        return true;
        // return $this -> isAdmin() || $this -> isEditer();
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function isAdmin(): bool{
        return $this -> role === self::ROLE_ADMIN;
    }

    public function isEditer(): bool{
        return $this -> role === self::ROLE_EDITOR;
    }

    public function products() {
        return $this -> hasMany(Product::class);
    }

    public function posts() {
        return $this -> belongsToMany(Post::class);
    }
    public function comments() {
        return $this -> hasMany(Comment::class);
    }
}
