@extends('layouts.app')

@push('styles')
<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 120px 0 60px;
        background: linear-gradient(rgba(18, 18, 18, 0.8), rgba(18, 18, 18, 0.9)), url('https://images.unsplash.com/photo-1622286342621-4bd786c2447c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover fixed;
    }
    .auth-card {
        background: rgba(15, 15, 15, 0.85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(207, 168, 88, 0.2);
        border-radius: 12px;
        padding: 3rem 2.5rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    }
    .form-control-dark {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #fff;
        padding: 12px 15px;
        border-radius: 6px;
    }
    .form-control-dark:focus {
        background-color: rgba(255, 255, 255, 0.08);
        border-color: var(--primary-gold, #cfa858);
        color: #fff;
        box-shadow: none;
    }
    .form-label {
        font-size: 0.9rem;
        color: #e5e5e5;
        font-weight: 500;
        margin-bottom: 8px;
    }
    .btn-gold {
        background-color: #cfa858;
        color: #111 !important;
        font-weight: 700;
        border-radius: 6px;
        padding: 12px;
        transition: all 0.3s ease;
        border: 2px solid #cfa858;
        letter-spacing: 1px;
    }
    .btn-gold:hover {
        background-color: transparent;
        color: #cfa858 !important;
    }
</style>
@endpush

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-white mb-2" style="font-family: 'Playfair Display', serif;">Selamat Datang</h3>
            <p class="text-muted small">Silakan login untuk melakukan reservasi</p>
        </div>

        {{-- Menampilkan pesan error atau sukses jika ada --}}
        @if(session('error'))
            <div class="alert alert-danger py-2 small border-0" style="background-color: rgba(220, 53, 69, 0.2); color: #ff6b6b;">
                <i class="bi bi-exclamation-circle me-1"></i> {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success py-2 small border-0" style="background-color: rgba(40, 167, 69, 0.2); color: #51cf66;">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control form-control-dark @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control form-control-dark @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password Anda" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" style="background-color: #333; border-color: #555;">
                    <label class="form-check-label text-muted small" for="remember">
                        Ingat Saya
                    </label>
                </div>
                {{-- Bisa ditambahkan rute lupa password nanti --}}
                <a href="#" class="text-decoration-none small" style="color: #cfa858;">Lupa Password?</a>
            </div>

            <button type="submit" class="btn btn-gold w-100 mb-3">LOGIN SEKARANG</button>
            
            <p class="text-center text-muted small mb-0">
                Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #cfa858;">Daftar di sini</a>
            </p>
        </form>
    </div>
</div>
@endsection