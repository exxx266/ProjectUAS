@extends('layouts.app')

@push('styles')
<style>
    /* Efek Gerakan Scroll yang Mulus */
    html {
        scroll-behavior: smooth;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(18, 18, 18, 0.75), rgba(18, 18, 18, 1)), url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        padding: 160px 0 100px;
        text-align: center;
    }
    .badge-premium {
        border: 1px solid var(--primary-gold, #cfa858);
        color: var(--primary-gold, #cfa858);
        padding: 0.3rem 1rem;
        font-size: 0.75rem;
        letter-spacing: 2px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 2rem;
    }
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        color: #ffffff !important; /* Tambahkan ini agar putih mutlak */
    }
    .hero-subtitle {
        max-width: 650px;
        margin: 0 auto 3rem;
        color: #e5e5e5;
        font-size: 1.1rem;
        font-weight: 300;
    }

    /* Feature Cards */
    .feature-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 6px;
        padding: 2.5rem 1.5rem;
        height: 100%;
        transition: border-color 0.3s ease, transform 0.3s ease;
    }
    .feature-card:hover {
        border-color: var(--primary-gold, #cfa858);
        transform: translateY(-5px);
    }
    .feature-icon {
        color: var(--primary-gold, #cfa858);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(207, 168, 88, 0.05);
        border-radius: 4px;
        border: 1px solid rgba(207, 168, 88, 0.15);
    }

    /* Service Cards */
    .service-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 6px;
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
    .service-img-box {
        height: 220px;
        background-color: #1e1e1e;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-size: cover;
        background-position: center;
    }
    .service-icon-large {
        font-size: 3rem;
        color: #333;
    }
    .price-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background-color: var(--primary-gold, #cfa858);
        color: #000;
        font-weight: 700;
        padding: 0.3rem 0.8rem;
        font-size: 0.9rem;
        border-radius: 3px;
    }
    .service-body {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .service-body p {
        font-size: 0.9rem;
        color: #a3a3a3;
        margin-bottom: 2rem;
        flex-grow: 1;
    }

    /* Kapster Section */
    .staff-card {
        transition: transform 0.3s ease;
    }
    .staff-card:hover {
        transform: translateY(-5px);
    }
    .staff-img-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
        margin: 0 auto 1.5rem;
        border-radius: 50%;
        background-color: #1e1e1e;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .staff-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }
    .staff-card:hover .staff-img {
        border-color: var(--primary-gold, #cfa858);
    }
    .staff-icon-large {
        font-size: 2.5rem;
        color: #444;
    }
    .status-badge {
        position: absolute;
        bottom: 0px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #121212;
        border: 1px solid #2a2a2a;
        border-radius: 50px;
        padding: 0.2rem 0.6rem;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
        gap: 5px;
        color: #fff;
        white-space: nowrap;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }
    .status-available .status-dot { background-color: #28a745; }
    .status-busy .status-dot { background-color: #dc3545; }
    
    .staff-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        margin-bottom: 0.3rem;
    }
    .staff-role {
        color: var(--primary-gold, #cfa858);
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
        font-weight: 500;
    }

    /* Info & Contact Box */
    .contact-box {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 6px;
        padding: 2.5rem;
    }
    .contact-icon {
        color: var(--primary-gold, #cfa858);
        font-size: 1.2rem;
        margin-right: 15px;
    }

    /* --- OVERRIDE PAKSA UNTUK NAVBAR & FOOTER --- */
    .nav-inactive-gray {
        color: #a3a3a3 !important;
        font-weight: normal !important;
        transition: color 0.3s ease;
    }
    .nav-active-gold {
        color: #cfa858 !important;
        font-weight: 700 !important;
        transition: color 0.3s ease;
    }

    footer, .footer, [class*="footer"] {
        color: #a3a3a3 !important;
    }
    footer a, .footer a, [class*="footer"] a {
        color: #9e9e9e !important;
        text-decoration: none;
        transition: color 0.2s ease-in-out;
    }
    footer a:hover, .footer a:hover, [class*="footer"] a:hover {
        color: #cfa858 !important;
    }
    footer h5, footer h6, .footer h5, [class*="footer"] h5 {
        color: #ffffff !important;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
{{-- SECTION: HOME --}}
<section id="home" class="hero-section">
    <div class="container">
        <span class="badge-premium">PREMIUM MANAGEMENT</span>
        <h1 class="hero-title text-white">
            Caps Studio Barbershop <br>
            <span class="text-gold" style="color: #cfa858;">Management Information System</span>
        </h1>
        <p class="hero-subtitle">
            Digitalizing haircut reservations, barber schedules, service management, and daily income reports for the modern elite barbershop.
        </p>
        <a href="{{ route('booking.create') }}" class="btn mt-3" style="background-color: #cfa858; color: black; font-weight: bold; border-radius: 4px; padding: 10px 24px;">BOOKING SEKARANG</a>
    </div>
</section>

<section class="py-5" style="margin-top: -50px; position: relative; z-index: 10;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-calendar-event"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Online Reservation</h5>
                    <p class="text-muted small mb-0">Book haircut schedules easily and efficiently.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-person-badge"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Barber Schedule</h5>
                    <p class="text-muted small mb-0">Manage barber availability and work schedules seamlessly.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-scissors"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Service Management</h5>
                    <p class="text-muted small mb-0">Manage haircut services, treatments, and pricing structures.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Income Reports</h5>
                    <p class="text-muted small mb-0">Automatic daily revenue reports and detailed transaction summaries.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION: LAYANAN --}}
<section id="layanan" class="py-5 mt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white mb-2">Layanan Kami</h2>
            <p class="text-muted">Premium grooming services tailored for the modern gentleman.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($layanans as $layanan)
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        @if($layanan->foto)
                            <div class="service-img-box" style="background-image: url('{{ asset('storage/' . $layanan->foto) }}');">
                                <span class="price-badge">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
                            </div>
                        @else
                            <div class="service-img-box">
                                <i class="bi bi-scissors service-icon-large"></i>
                                <span class="price-badge">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
                            </div>
                        @endif
                        
                        <div class="service-body">
                            <h5 class="fw-bold text-white mb-3" style="font-family: 'Inter', sans-serif;">{{ $layanan->nama_layanan }}</h5>
                            <p>Layanan premium khas Caps Studio untuk memastikan penampilan terbaik Anda setiap saat.</p>
                            <a href="{{ route('booking.create') }}" class="btn w-100" style="border: 1px solid #cfa858; color: #cfa858; transition: 0.3s;" onmouseover="this.style.backgroundColor='#cfa858'; this.style.color='black';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#cfa858';">PESAN SEKARANG</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="feature-icon mx-auto mb-3"><i class="bi bi-exclamation-circle"></i></div>
                    <h5 class="text-white">Belum Ada Layanan</h5>
                    <p class="text-muted">Data layanan masih kosong. Silakan tambahkan layanan baru melalui panel Admin Filament.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- SECTION: KAPSTER --}}
<section id="kapster" class="py-5 mt-4 border-top border-dark">
    <div class="container pt-4">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold text-white mb-2">Kapster Profesional</h2>
                <p class="text-muted mb-0">Master craftsmen dedicated to the art of grooming.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-start">
            @forelse ($kapsters as $kapster)
                <div class="col-lg-3 col-md-4 col-6 text-center staff-card">
                    <div class="staff-img-wrapper">
                        @if($kapster->foto)
                            <img src="{{ asset('storage/' . $kapster->foto) }}" alt="{{ $kapster->nama }}" class="staff-img">
                        @else
                            <i class="bi bi-person staff-icon-large"></i>
                        @endif
                        
                        <div class="status-badge {{ $kapster->status === 'Aktif' ? 'status-available' : 'status-busy' }}">
                            <span class="status-dot"></span> {{ $kapster->status }}
                        </div>
                    </div>
                    <h5 class="staff-name text-white">{{ $kapster->nama }}</h5>
                    <p class="staff-role">{{ $kapster->keahlian }}</p>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="feature-icon mx-auto mb-3"><i class="bi bi-people"></i></div>
                    <h5 class="text-white">Belum Ada Kapster</h5>
                    <p class="text-muted">Data kapster masih kosong. Silakan daftarkan kapster baru lewat panel admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- SECTION: TENTANG KAMI --}}
<section id="tentang" class="py-5 mt-4 border-top border-dark">
    <div class="container pt-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div style="background-image: url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'); height: 400px; background-size: cover; background-position: center; border-radius: 8px;"></div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="fw-bold text-white mb-3">Lebih dari Sekadar Pangkas Rambut</h2>
                <h5 class="text-gold mb-4" style="color: #cfa858;">The Caps Studio Experience</h5>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Berdiri dengan semangat untuk mengembalikan masa kejayaan perawatan pria klasik, Caps Studio hadir bukan hanya sebagai barbershop biasa. Kami adalah ruang di mana teknik tradisional bertemu dengan gaya hidup modern. 
                </p>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    Setiap kapster kami telah melewati pelatihan ketat untuk memastikan setiap helai rambut Anda ditangani dengan presisi tingkat tinggi. Kami percaya bahwa potongan rambut yang sempurna adalah fondasi rasa percaya diri seorang pria sejati.
                </p>
                <div class="d-flex gap-4 mt-4">
                    <div>
                        <h3 class="text-white fw-bold mb-0">100+</h3>
                        <p class="text-muted small">Pelanggan Setia</p>
                    </div>
                    <div>
                        <h3 class="text-white fw-bold mb-0">Premium</h3>
                        <p class="text-muted small">Produk Haircare</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION: KONTAK --}}
<section id="kontak" class="py-5" style="background-color: #0a0a0a; min-height: 70vh; display: flex; align-items: center; border-top: 1px solid #1a1a1a;">
    <div class="container py-5">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase" style="color: #cfa858; letter-spacing: 2px;">Kontak Kami</h2>
            <p class="text-muted">Kunjungi Caps Studio atau hubungi kami untuk informasi lebih lanjut.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            {{-- KOTAK INFORMASI LOKASI & SOSMED --}}
            <div class="col-md-5">
                <div class="p-4 h-100 shadow-sm" style="background-color: #161616; border: 1px solid #2a2a2a; border-radius: 8px; transition: 0.3s;" onmouseover="this.style.borderColor='#cfa858'" onmouseout="this.style.borderColor='#2a2a2a'">
                    <h5 class="text-white mb-4 fw-bold">Informasi Studio</h5>
                    
                    <div class="d-flex mb-4">
                        <i class="bi bi-geo-alt fs-3 me-3" style="color: #cfa858;"></i>
                        <div>
                            <h6 class="text-white mb-1">Lokasi Kami</h6>
                            <p class="text-muted small mb-0">Jl. Margonda Raya, Depok, Jawa Barat<br>Indonesia</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <i class="bi bi-whatsapp fs-3 me-3" style="color: #cfa858;"></i>
                        <div>
                            <h6 class="text-white mb-1">WhatsApp Admin</h6>
                            <p class="text-muted small mb-0">+62 812-3456-7890</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <i class="bi bi-instagram fs-3 me-3" style="color: #cfa858;"></i>
                        <div>
                            <h6 class="text-white mb-1">Instagram</h6>
                            <p class="text-muted small mb-0">@caps_studio</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOTAK JAM OPERASIONAL & TOMBOL --}}
            <div class="col-md-5">
                <div class="p-4 h-100 shadow-sm" style="background-color: #161616; border: 1px solid #2a2a2a; border-radius: 8px; transition: 0.3s;" onmouseover="this.style.borderColor='#cfa858'" onmouseout="this.style.borderColor='#2a2a2a'">
                    <h5 class="text-white mb-4 fw-bold">Jam Operasional</h5>
                    
                    <ul class="list-unstyled text-muted small mb-4">
                        <li class="d-flex justify-content-between border-bottom border-dark py-2">
                            <span>Senin - Jumat</span>
                            <span class="text-white fw-semibold">10:00 - 22:00 WIB</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-2">
                            <span>Sabtu - Minggu</span>
                            <span class="text-white fw-semibold">09:00 - 23:00 WIB</span>
                        </li>
                        <li class="d-flex justify-content-between py-2">
                            <span>Hari Libur Nasional</span>
                            <span class="fw-bold" style="color: #cfa858;">Tetap Buka</span>
                        </li>
                    </ul>

                    <div class="mt-auto pt-2">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn w-100 fw-bold d-flex align-items-center justify-content-center gap-2 text-uppercase" style="background-color: #cfa858; color: #000; letter-spacing: 1px;">
                            <i class="bi bi-whatsapp"></i> Chat Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. BERSIHKAN PAKSA CLASS BAWAAN TEMPLATE & INJEKSI HREF
        const seluruhLink = document.querySelectorAll('a');
        seluruhLink.forEach(link => {
            const teksLink = link.innerText.trim().toLowerCase();
            
            // Cek apakah link ini adalah salah satu menu navigasi kita
            if (['home', 'layanan', 'kapster', 'tentang kami', 'tentang', 'kontak'].includes(teksLink)) {
                // Copot semua class yang bikin error/nyangkut warna emas terus
                link.classList.remove('active', 'text-warning', 'text-gold');
                link.style.color = ''; // Hapus inline css kalau ada
                link.classList.add('nav-inactive-gray'); // Pasang abu-abu sbg default
                
                // Sambungkan ke ID section yang benar
                if (teksLink === 'home') link.setAttribute('href', '#home');
                if (teksLink === 'layanan') link.setAttribute('href', '#layanan');
                if (teksLink === 'kapster') link.setAttribute('href', '#kapster');
                if (teksLink === 'tentang kami' || teksLink === 'tentang') link.setAttribute('href', '#tentang');
                if (teksLink === 'kontak') link.setAttribute('href', '#kontak');
            }
        });

        // 2. LOGIKA SCROLL MENGGUNAKAN GETBOUNDINGCLIENTRECT (Sangat Akurat)
        const daftarSection = document.querySelectorAll('section[id]');
        const menuNavigasi = document.querySelectorAll('a[href^="#"]');

        function aktifkanMenuSaatScroll() {
            let idSectionAktif = '';

            daftarSection.forEach(section => {
                const rect = section.getBoundingClientRect();
                // Deteksi presisi: Jika jarak section ke batas atas layar kurang dari 250px 
                // DAN bagian bawah section belum melewati batas 250px dari atas layar
                if (rect.top <= 250 && rect.bottom >= 250) {
                    idSectionAktif = section.getAttribute('id');
                }
            });

            // LOGIKA PENGAMAN: Jika kamu nge-scroll mentok sampai paling bawah ujung web
            // paksa 'kontak' yang menyala agar tidak tertinggal di 'tentang kami'
            if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 50) {
                idSectionAktif = 'kontak';
            }

            // Eksekusi perubahan warna
            if (idSectionAktif !== '') {
                menuNavigasi.forEach(menu => {
                    const targetHref = menu.getAttribute('href');
                    
                    // Reset ke abu-abu dulu
                    menu.classList.remove('nav-active-gold');
                    menu.classList.add('nav-inactive-gray');
                    
                    // Nyalakan emas jika cocok dengan posisi layar
                    if (targetHref === '#' + idSectionAktif) {
                        menu.classList.remove('nav-inactive-gray');
                        menu.classList.add('nav-active-gold');
                    }
                });
            }
        }

        // Jalankan fungsi pengintai ini saat kamu nge-scroll web
        window.addEventListener('scroll', aktifkanMenuSaatScroll);
        
        // Sengaja diberi jeda sedetik saat web pertama direfresh agar semua struktur siap
        setTimeout(aktifkanMenuSaatScroll, 500); 
    });
</script>
@endpush