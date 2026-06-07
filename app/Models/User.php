<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasName; // Kontrak Filament untuk nama

class User extends Authenticatable implements HasName
{
    // Cukup panggil satu kali saja di sini
    use HasRoles, Notifiable;

    // 1. Beritahu Laravel bahwa tabel ini tidak punya created_at dan updated_at
    public $timestamps = false;

    // 2. Sesuaikan kolom yang boleh diisi dengan tabel kita (nama, bukan name)
    protected $fillable = [
        'nama',
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
        return $this->nama;
    }
}