<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    // 1. Menampilkan halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Memproses data Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Cek role: Jika Admin/Kasir lempar ke panel, jika Pelanggan lempar ke home/booking
            if (Auth::user()->hasAnyRole(['Super Admin', 'Kasir'])) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Menampilkan halaman Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // 4. Memproses pendaftaran Pelanggan Baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        // Buat akun baru di database (TANPA menyertakan 'role')
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // SUNTIKAN SPATIE: Otomatis berikan role 'Pelanggan' agar bisa dibedakan dengan Kasir/Admin
        $role = Role::firstOrCreate(['name' => 'Pelanggan', 'guard_name' => 'web']);
        $user->assignRole($role);

        // Langsung login-kan user setelah sukses daftar
        Auth::login($user);

        return redirect('/');
    }

    // 5. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
    

    
}