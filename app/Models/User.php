<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements HasName, FilamentUser 
{
    use HasRoles, Notifiable;

    protected $table = 'users'; 

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasAnyRole(['Super Admin', 'Kasir']);
    }
}