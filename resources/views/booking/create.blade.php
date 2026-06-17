@extends('layouts.app')

@push('styles')
<style>
    body { background-color: #0a0a0a; }
    .booking-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        padding: 3rem;
    }
    .form-control, .form-select {
        background-color: #1e1e1e;
        border: 1px solid #333;
        color: white !important;
    }
    .form-control:focus, .form-select:focus {
        background-color: #1e1e1e;
        border-color: #cfa858;
        box-shadow: 0 0 0 0.25rem rgba(207, 168, 88, 0.25);
        color: white;
    }
    /* Mengubah warna checkbox standar menjadi emas */
    .form-check-input:checked {
        background-color: #cfa858;
        border-color: #cfa858;
    }
    .service-item {
        border: 1px solid #333;
        border-radius: 6px;
        padding: 12px 15px;
        margin-bottom: 15px;
        transition: 0.3s;
        background-color: #1a1a1a;
    }
    .service-item:hover {
        border-color: #cfa858;
    }
</style>
@endpush

@section('content')
<div class="container py-5 mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="booking-card shadow-lg mt-4">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-white">Reservasi Layanan</h2>
                    <p style="color: #aaaaaa;">Pilih layanan premium dan kapster terbaik kami.</p>
                </div>

                {{-- Menampilkan pesan error validasi jika ada yang terlewat --}}
                @if($errors->any())
                    <div class="alert alert-danger" style="background-color: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.3); color: #ff6b6b;">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        {{-- TANGGAL & WAKTU --}}
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-white fw-bold">Tanggal Reservasi</label>
                            {{-- min="..." mencegah pelanggan booking di tanggal masa lalu --}}
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required min="{{ date('Y-m-d') }}">
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-white fw-bold">Slot Waktu</label>
                            <select name="slot_waktu" class="form-select" required>
                                <option value="" selected disabled>Pilih jam kedatangan...</option>
                                <option value="10:00" {{ old('slot_waktu') == '10:00' ? 'selected' : '' }}>10:00 WIB</option>
                                <option value="11:00" {{ old('slot_waktu') == '11:00' ? 'selected' : '' }}>11:00 WIB</option>
                                <option value="13:00" {{ old('slot_waktu') == '13:00' ? 'selected' : '' }}>13:00 WIB</option>
                                <option value="14:00" {{ old('slot_waktu') == '14:00' ? 'selected' : '' }}>14:00 WIB</option>
                                <option value="15:00" {{ old('slot_waktu') == '15:00' ? 'selected' : '' }}>15:00 WIB</option>
                                <option value="16:00" {{ old('slot_waktu') == '16:00' ? 'selected' : '' }}>16:00 WIB</option>
                                <option value="19:00" {{ old('slot_waktu') == '19:00' ? 'selected' : '' }}>19:00 WIB</option>
                                <option value="20:00" {{ old('slot_waktu') == '20:00' ? 'selected' : '' }}>20:00 WIB</option>
                            </select>
                        </div>

                        {{-- KAPSTER & PEMBAYARAN --}}
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-white fw-bold">Pilih Kapster</label>
                            <select name="kapster_id" class="form-select" required>
                                <option value="" selected disabled>Siapa kapster pilihanmu?</option>
                                @foreach($kapsters as $kapster)
                                    <option value="{{ $kapster->id }}" {{ old('kapster_id') == $kapster->id ? 'selected' : '' }}>
                                        {{ $kapster->nama }} - {{ $kapster->keahlian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label text-white fw-bold">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="form-select" required>
                                <option value="" selected disabled>Pilih metode...</option>
                                <option value="QRIS" {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS (OVO, Gopay, Dana)</option>
                                <option value="Cash" {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>Bayar Tunai di Kasir</option>
                                <option value="Transfer Bank" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                            </select>
                        </div>
                    </div>

                    {{-- LAYANAN (CHECKBOX MULTIPLE) --}}
                    <div class="mb-5 mt-3">
                        <label class="form-label text-white fw-bold mb-3">Pilih Layanan (Bisa lebih dari satu)</label>
                        <div class="row">
                            @forelse($layanans as $layanan)
                            <div class="col-md-6">
                                <div class="service-item d-flex justify-content-between align-items-center">
                                    <div class="form-check m-0">
                                        <input class="form-check-input" type="checkbox" name="layanan[]" value="{{ $layanan->id }}" id="layanan_{{ $layanan->id }}" {{ (is_array(old('layanan')) && in_array($layanan->id, old('layanan'))) ? 'checked' : '' }}>
                                        <label class="form-check-label text-white ms-2" for="layanan_{{ $layanan->id }}">
                                            {{ $layanan->nama_layanan }}
                                        </label>
                                    </div>
                                    <span style="color: #cfa858; font-weight: 600; font-size: 0.9rem;">
                                        Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-3">
                                <p class="text-muted">Belum ada layanan yang tersedia di sistem.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <button type="submit" class="btn w-100 fw-bold py-3 text-uppercase" style="background-color: #cfa858; color: black; letter-spacing: 1.5px;">
                        Konfirmasi & Buat Reservasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection