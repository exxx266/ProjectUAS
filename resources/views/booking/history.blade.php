@extends('layouts.app')

@push('styles')
<style>
    body { background-color: #0a0a0a; }
    .history-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        transition: 0.3s;
    }
    .history-card:hover {
        border-color: #cfa858;
    }
    .status-badge {
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: bold;
        letter-spacing: 1px;
    }
    .status-pending { background-color: rgba(255, 193, 7, 0.1); color: #ffc107; border: 1px solid rgba(255, 193, 7, 0.3); }
    .status-lunas { background-color: rgba(40, 167, 69, 0.1); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.3); }
    .service-list {
        background-color: #111;
        border-radius: 4px;
        padding: 10px 15px;
        border: 1px dashed #333;
    }
</style>
@endpush

@section('content')
<div class="container py-5 mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="fw-bold text-white mb-1">Riwayat Reservasi</h2>
                    <p class="text-muted mb-0">Daftar jadwal potong rambut dan transaksi Anda.</p>
                </div>
                <a href="{{ route('booking.create') }}" class="btn fw-bold text-uppercase" style="background-color: #cfa858; color: black; font-size: 0.85rem; letter-spacing: 1px;">+ Booking Baru</a>
            </div>

            @forelse ($riwayatReservasi as $reservasi)
                <div class="history-card p-4 mb-4 shadow-sm">
                    <div class="row align-items-center">
                        {{-- Info Waktu & Status --}}
                        <div class="col-md-3 mb-3 mb-md-0 border-end border-dark">
                            <p class="text-muted small text-uppercase mb-1">Jadwal Kedatangan</p>
                            <h5 class="text-white fw-bold mb-1">{{ \Carbon\Carbon::parse($reservasi->tanggal)->translatedFormat('d F Y') }}</h5>
                            <h4 class="text-gold mb-3" style="color: #cfa858;">{{ $reservasi->slot_waktu }} WIB</h4>
                            
                            <span class="status-badge {{ $reservasi->status_pembayaran == 'Pending' ? 'status-pending' : 'status-lunas' }} text-uppercase">
                                {{ $reservasi->status_pembayaran }}
                            </span>
                        </div>

                        {{-- Info Kapster & Layanan --}}
                        <div class="col-md-6 mb-3 mb-md-0 px-md-4">
                            <p class="text-muted small text-uppercase mb-1">Kapster</p>
                            <p class="text-white fw-bold mb-3"><i class="bi bi-person-badge text-gold me-2" style="color: #cfa858;"></i> {{ $reservasi->kapster->nama ?? 'Kapster Tidak Ditemukan' }}</p>
                            
                            <p class="text-muted small text-uppercase mb-1">Layanan yang Dipilih</p>
                            <div class="service-list">
                                @php $totalHarga = 0; @endphp
                                <ul class="list-unstyled mb-0">
                                    @foreach($reservasi->layanan as $item)
                                        <li class="d-flex justify-content-between text-white mb-1" style="font-size: 0.9rem;">
                                            <span>- {{ $item->nama_layanan }}</span>
                                            <span class="text-muted">Rp {{ number_format($item->pivot->harga_saat_ini, 0, ',', '.') }}</span>
                                        </li>
                                        @php $totalHarga += $item->pivot->harga_saat_ini; @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Total Pembayaran --}}
                        <div class="col-md-3 text-md-end border-start border-dark">
                            <p class="text-muted small text-uppercase mb-1">Metode Bayar</p>
                            <p class="text-white mb-3" style="font-size: 0.9rem;">{{ $reservasi->metode_pembayaran }}</p>
                            
                            <p class="text-muted small text-uppercase mb-1">Total Tagihan</p>
                            <h4 class="fw-bold mb-0" style="color: #cfa858;">Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5" style="background-color: #161616; border: 1px dashed #333; border-radius: 8px;">
                    <i class="bi bi-calendar-x" style="font-size: 3rem; color: #444;"></i>
                    <h5 class="text-white mt-3">Belum Ada Riwayat Reservasi</h5>
                    <p class="text-muted mb-4">Anda belum pernah melakukan pemesanan jadwal di Caps Studio.</p>
                    <a href="{{ route('booking.create') }}" class="btn btn-outline-gold text-uppercase" style="border: 1px solid #cfa858; color: #cfa858;">Booking Sekarang</a>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection