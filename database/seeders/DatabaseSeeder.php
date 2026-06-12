<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat akun Owner utama
        $user = User::create([
            'name' => 'Owner Caps Studio',
            'email' => 'owner@capsstudio.com',
            'password' => Hash::make('password123'), // Gunakan password ini untuk login
        ]);

        // 2. Otomatisasi Role & Permission agar menu Filament tidak disembunyikan
        // Kita gunakan DB::table langsung agar aman dari error jika model Spatie belum di-import
        if (Schema::hasTable('roles')) {
            
            // Buat Role Super Admin jika belum ada
            $roleId = DB::table('roles')->insertGetId([
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Pasangkan Role Super Admin ke akun Owner yang baru dibuat
            DB::table('model_has_roles')->insert([
                'role_id' => $roleId,
                'model_type' => 'App\Models\User',
                'model_id' => $user->id,
            ]);
        }
    }
}