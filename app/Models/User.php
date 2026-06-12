<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasName; // Kontrak bawaan kamu
use Filament\Models\Contracts\FilamentUser; // SUNTIKAN 1: Kontrak Keamanan Panel
use Filament\Panel; // SUNTIKAN 2: Class Panel Filament

// SUNTIKAN 3: Gabungkan implementasi HasName dan FilamentUser
class User extends Authenticatable implements HasName, FilamentUser 
{
    // Cukup panggil satu kali saja di sini
    use HasRoles, Notifiable;

    protected $table = 'users'; 

    // 1. Beritahu Laravel bahwa tabel ini tidak punya created_at dan updated_at
    public $timestamps = false;

    // 2. Sesuaikan kolom yang boleh diisi
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

    // 3. Fungsi wajib dari Filament agar tidak error "null returned"
    public function getFilamentName(): string
    {
        return $this->name;
    }

    // 4. SUNTIKAN 4: GERBANG KEAMANAN FILAMENT
    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya user dengan role Super Admin atau Kasir yang boleh masuk URL /admin
        // Pelanggan biasa yang mencoba masuk akan langsung diblokir (403 Forbidden)
        return $this->hasAnyRole(['Super Admin', 'Kasir']);
    }
}