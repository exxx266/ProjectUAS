<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Role dengan aman
        Role::firstOrCreate(['name' => 'owner']);
        Role::firstOrCreate(['name' => 'kasir']);
        Role::firstOrCreate(['name' => 'pelanggan']);

        // 2. Membuat Akun Master (Owner)
        // Kita juga pakai firstOrCreate di sini berdasarkan email agar tidak error kalau akun sudah ada
        $owner = User::firstOrCreate(
            ['email' => 'owner@capsstudio.com'], 
            [
                'nama' => 'Ahmad Husein Mufahir',
                'password' => Hash::make('password123'),
                'role' => 'Admin' 
            ]
        );

        // 3. Menyerahkan "Kartu Akses" Owner
        $owner->assignRole('owner');
    }
}