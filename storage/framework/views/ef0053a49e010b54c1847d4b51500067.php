<?php $__env->startPush('styles'); ?>
<style>
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 90px; 
    }

    section[id]:not(#home) {
        padding-top: 100px !important;
        padding-bottom: 100px !important;
    }

    :root {
        --primary-gold: #cfa858;
    }

    .text-muted {
        color: #9ca3af !important; 
    }
    p {
        line-height: 1.7;
    }

    .hero-section {
        background: linear-gradient(rgba(18, 18, 18, 0.75), rgba(18, 18, 18, 1)), url('https://images.unsplash.com/photo-1585747860715-2ba37e788b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        padding: 160px 0 100px;
        text-align: center;
    }
    .badge-premium {
        border: 1px solid var(--primary-gold);
        color: var(--primary-gold);
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
        color: #ffffff !important;
    }
    .hero-subtitle {
        max-width: 650px;
        margin: 0 auto 3rem;
        color: #e5e5e5;
        font-size: 1.1rem;
        font-weight: 300;
    }

    /* Buttons Modern */
    .btn-gold {
        background-color: var(--primary-gold);
        color: #111 !important;
        font-weight: bold;
        border-radius: 6px;
        padding: 12px 28px;
        transition: all 0.3s ease;
        border: 2px solid var(--primary-gold);
        letter-spacing: 1px;
    }
    .btn-gold:hover {
        background-color: transparent;
        color: var(--primary-gold) !important;
        transform: translateY(-2px);
    }
    .btn-outline-gold {
        border: 1px solid var(--primary-gold);
        color: var(--primary-gold) !important;
        transition: all 0.3s ease;
        padding: 10px 24px;
        border-radius: 6px;
        font-weight: 600;
        background: transparent;
        letter-spacing: 0.5px;
    }
    .btn-outline-gold:hover {
        background-color: var(--primary-gold);
        color: #111 !important;
        transform: translateY(-2px);
    }

    /* Feature Cards */
    .feature-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        padding: 2.5rem 1.5rem;
        height: 100%;
        transition: border-color 0.3s ease, transform 0.3s ease;
    }
    .feature-card:hover {
        border-color: var(--primary-gold);
        transform: translateY(-5px);
    }
    .feature-icon {
        color: var(--primary-gold);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(207, 168, 88, 0.05);
        border-radius: 6px;
        border: 1px solid rgba(207, 168, 88, 0.15);
    }

    /* Service Cards */
    .service-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .service-card:hover {
        border-color: var(--primary-gold);
        transform: translateY(-5px);
    }
    .service-img-box {
        height: 250px;
        background-color: #1e1e1e;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-size: cover;
        background-position: center top;
        overflow: hidden;
    }
    .service-icon-large {
        font-size: 3rem;
        color: #333;
    }
    .price-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background-color: var(--primary-gold);
        color: #000;
        font-weight: 700;
        padding: 0.3rem 0.8rem;
        font-size: 0.9rem;
        border-radius: 4px;
    }
    .service-body {
        padding: 2rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .service-body p {
        font-size: 0.95rem;
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
        border-color: var(--primary-gold);
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
        padding: 0.2rem 0.8rem;
        font-size: 0.7rem;
        display: flex;
        align-items: center;
        gap: 6px;
        color: #fff;
        white-space: nowrap;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }
    .status-available .status-dot { background-color: #28a745; box-shadow: 0 0 8px rgba(40, 167, 69, 0.5); }
    .status-busy .status-dot { background-color: #dc3545; box-shadow: 0 0 8px rgba(220, 53, 69, 0.5); }
    
    .staff-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        margin-bottom: 0.3rem;
    }
    .staff-role {
        color: var(--primary-gold);
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
        font-weight: 500;
    }

    .contact-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 2.5rem;
        height: 100%;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    .contact-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-gold);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    .nav-inactive-gray {
        color: #e2e8f0 !important;
        font-weight: 500 !important;
        transition: color 0.3s ease;
    }
    .nav-active-gold {
        color: var(--primary-gold) !important;
        font-weight: 700 !important;
        transition: color 0.3s ease;
    }

    footer, .footer, [class*="footer"] {
        background-color: #0b0b0b !important;
        color: #cbd5e1 !important;
    }
    footer a, .footer a, [class*="footer"] a {
        color: #f1f5f9 !important;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease-in-out;
    }
    footer a:hover, .footer a:hover, [class*="footer"] a:hover {
        color: var(--primary-gold) !important;
    }
    footer h5, footer h6, .footer h5, [class*="footer"] h5 {
        color: #ffffff !important;
        font-weight: 600;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section id="home" class="hero-section">
    <div class="container">
        <span class="badge-premium">PREMIUM GROOMING</span>
        <h1 class="hero-title text-white">
            Upgrade Your Crown, <br>
            <span style="color: var(--primary-gold);">Elevate Your Style.</span>
        </h1>
        <p class="hero-subtitle">
            Experience premium grooming, precision haircuts, and seamless online booking tailored for the modern gentleman.
        </p>
        <a href="<?php echo e(route('booking.create')); ?>" class="btn btn-gold mt-3">BOOKING SEKARANG</a>
    </div>
</section>

<section class="py-5" style="margin-top: -50px; position: relative; z-index: 10;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-3 col-md-6">
                <a href="#layanan" class="feature-card d-block text-decoration-none">
                    <div class="feature-icon"><i class="bi bi-scissors"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Premium Services</h5>
                    <p class="text-muted small mb-0">Jelajahi berbagai layanan pangkas rambut dan perawatan pria terbaik kami.</p>
                </a>
            </div>
            
            
            <div class="col-lg-3 col-md-6">
                <a href="#kapster" class="feature-card d-block text-decoration-none">
                    <div class="feature-icon"><i class="bi bi-person-badge"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Expert Barbers</h5>
                    <p class="text-muted small mb-0">Ditangani langsung oleh kapster profesional dengan jam terbang tinggi.</p>
                </a>
            </div>
            
            
            <div class="col-lg-3 col-md-6">
                <a href="#tentang" class="feature-card d-block text-decoration-none">
                    <div class="feature-icon"><i class="bi bi-award"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">The Experience</h5>
                    <p class="text-muted small mb-0">Lebih dari sekadar potong rambut. Rasakan standar grooming yang sesungguhnya.</p>
                </a>
            </div>
            
            
            <div class="col-lg-3 col-md-6">
                <a href="#kontak" class="feature-card d-block text-decoration-none">
                    <div class="feature-icon"><i class="bi bi-geo-alt"></i></div>
                    <h5 class="fw-bold mb-3 text-white" style="font-family: 'Inter', sans-serif;">Visit Studio</h5>
                    <p class="text-muted small mb-0">Temukan lokasi kami dan jadwalkan sesi potong rambutmu dengan mudah.</p>
                </a>
            </div>
        </div>
    </div>
</section>


<section id="layanan">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white mb-2">Layanan Kami</h2>
            <p class="text-muted">Layanan perawatan premium yang dirancang khusus untuk Anda.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($layanan->foto): ?>
                            <div class="service-img-box" style="background-image: url('<?php echo e(asset('storage/' . $layanan->foto)); ?>');">
                                <span class="price-badge">Rp <?php echo e(number_format($layanan->harga, 0, ',', '.')); ?></span>
                            </div>
                        <?php else: ?>
                            <div class="service-img-box">
                                <i class="bi bi-scissors service-icon-large"></i>
                                <span class="price-badge">Rp <?php echo e(number_format($layanan->harga, 0, ',', '.')); ?></span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <div class="service-body">
                            <h5 class="fw-bold text-white mb-3" style="font-family: 'Inter', sans-serif;"><?php echo e($layanan->nama_layanan); ?></h5>
                            <p class="text-muted">Layanan premium khas Caps Studio untuk memastikan penampilan terbaik Anda setiap saat.</p>
                            <a href="<?php echo e(route('booking.create')); ?>" class="btn btn-outline-gold w-100 mt-auto">PESAN SEKARANG</a>
                        </div>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-12 text-center py-5">
                    <div class="feature-icon mx-auto mb-3"><i class="bi bi-exclamation-circle"></i></div>
                    <h5 class="text-white">Belum Ada Layanan</h5>
                    <p class="text-muted">Data layanan masih kosong. Silakan tambahkan layanan baru melalui panel Admin.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section id="kapster" class="border-top border-dark">
    <div class="container pt-4">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold text-white mb-2">Kapster Profesional</h2>
                <p class="text-muted mb-0">Para ahli terampil yang berdedikasi pada style rambut Anda.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-start">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $kapsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kapster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="col-lg-3 col-md-4 col-6 text-center staff-card">
                    <div class="staff-img-wrapper">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kapster->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $kapster->foto)); ?>" alt="<?php echo e($kapster->nama); ?>" class="staff-img">
                        <?php else: ?>
                            <i class="bi bi-person staff-icon-large"></i>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        
                        <div class="status-badge <?php echo e($kapster->status === 'Aktif' ? 'status-available' : 'status-busy'); ?>">
                            <span class="status-dot"></span> <?php echo e($kapster->status); ?>

                        </div>
                    </div>
                    <h5 class="staff-name text-white"><?php echo e($kapster->nama); ?></h5>
                    <p class="staff-role"><?php echo e($kapster->keahlian); ?></p>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-12 text-center py-5">
                    <div class="feature-icon mx-auto mb-3"><i class="bi bi-people"></i></div>
                    <h5 class="text-white">Belum Ada Kapster</h5>
                    <p class="text-muted">Data kapster masih kosong.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section id="tentang" class="border-top border-dark">
    <div class="container pt-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div style="background-image: url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'); height: 400px; background-size: cover; background-position: center; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);"></div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="fw-bold text-white mb-3">Lebih dari Sekadar Pangkas Rambut</h2>
                <h5 class="mb-4" style="color: var(--primary-gold);">The Caps Studio Experience</h5>
                <p class="text-muted mb-4">
                    Berdiri dengan semangat untuk mengembalikan masa kejayaan perawatan pria klasik, Caps Studio hadir bukan hanya sebagai barbershop biasa. Kami adalah ruang di mana teknik tradisional bertemu dengan gaya hidup modern. 
                </p>
                <p class="text-muted mb-4">
                    Setiap kapster kami telah melewati pelatihan ketat untuk memastikan setiap helai rambut Anda ditangani dengan presisi tingkat tinggi.
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


<section id="kontak" style="background-color: #0a0a0a; border-top: 1px solid #1a1a1a;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase" style="color: var(--primary-gold); letter-spacing: 2px;">Kontak Kami</h2>
            <p class="text-muted">Kunjungi Caps Studio atau hubungi kami untuk informasi lebih lanjut.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="contact-card shadow-sm">
                    <h5 class="text-white mb-4 fw-bold">Informasi Studio</h5>
                    
                    <div class="d-flex mb-4">
                        <i class="bi bi-geo-alt fs-3 me-3" style="color: var(--primary-gold);"></i>
                        <div>
                            <h6 class="text-white mb-1">Lokasi Kami</h6>
                            <p class="text-muted small mb-0">Jl. Margonda Raya, Depok, Jawa Barat<br>Indonesia</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <i class="bi bi-whatsapp fs-3 me-3" style="color: var(--primary-gold);"></i>
                        <div>
                            <h6 class="text-white mb-1">WhatsApp Admin</h6>
                            <p class="text-muted small mb-0">+62 812-3456-7890</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <i class="bi bi-instagram fs-3 me-3" style="color: var(--primary-gold);"></i>
                        <div>
                            <h6 class="text-white mb-1">Instagram</h6>
                            <p class="text-muted small mb-0">@caps_studio</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="contact-card shadow-sm d-flex flex-column">
                    <h5 class="text-white mb-4 fw-bold">Jam Operasional</h5>
                    
                    <ul class="list-unstyled text-muted small mb-4 flex-grow-1">
                        <li class="d-flex justify-content-between border-bottom border-dark py-3">
                            <span>Senin - Jumat</span>
                            <span class="text-white fw-semibold">10:00 - 22:00 WIB</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-dark py-3">
                            <span>Sabtu - Minggu</span>
                            <span class="text-white fw-semibold">10:00 - 22:00 WIB</span>
                        </li>
                        <li class="d-flex justify-content-between py-3">
                            <span>Hari Libur Nasional</span>
                            <span class="fw-bold" style="color: var(--primary-gold);">Tetap Buka</span>
                        </li>
                    </ul>

                    <div class="mt-auto pt-2">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-gold w-100 d-flex align-items-center justify-content-center gap-2 text-uppercase">
                            <i class="bi bi-whatsapp"></i> Chat Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seluruhLinkNavbar = document.querySelectorAll('.navbar a, nav a, .nav-link');
        
        seluruhLinkNavbar.forEach(link => {
            const teksLink = link.innerText.trim().toLowerCase();
            
            if (['home', 'layanan', 'booking', 'booking sekarang', 'pesan sekarang', 'kapster', 'tentang kami', 'tentang', 'kontak'].includes(teksLink)) {
                
                if (teksLink === 'booking' || teksLink === 'booking sekarang' || teksLink === 'pesan sekarang') {
                    link.setAttribute('href', "<?php echo e(route('booking.create')); ?>");
                } else {
                    link.classList.remove('active', 'text-warning', 'text-gold');
                    link.style.color = '';
                    link.classList.add('nav-inactive-gray');
                    
                    if (teksLink === 'home') link.setAttribute('href', '#home');
                    if (teksLink === 'layanan') link.setAttribute('href', '#layanan');
                    if (teksLink === 'kapster') link.setAttribute('href', '#kapster');
                    if (teksLink === 'tentang kami' || teksLink === 'tentang') link.setAttribute('href', '#tentang');
                    if (teksLink === 'kontak') link.setAttribute('href', '#kontak');
                }
            }
        });

        // Seleksi link di badan halaman / tombol penawaran (Layanan & Hero)
        const tombolHalaman = document.querySelectorAll('section a');
        tombolHalaman.forEach(btn => {
            const teksBtn = btn.innerText.trim().toLowerCase();
            if (teksBtn === 'booking sekarang' || teksBtn === 'pesan sekarang') {
                btn.setAttribute('href', "<?php echo e(route('booking.create')); ?>");
            }
        });

        // Deteksi scroll aktif hanya untuk komponen menu navbar utama
        const daftarSection = document.querySelectorAll('section[id]');
        const menuNavigasiNavbar = document.querySelectorAll('.navbar a[href^="#"], nav a[href^="#"]');

        function aktifkanMenuSaatScroll() {
            let idSectionAktif = '';

            daftarSection.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 250 && rect.bottom >= 250) {
                    idSectionAktif = section.getAttribute('id');
                }
            });

            if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 50) {
                idSectionAktif = 'kontak';
            }

            if (idSectionAktif !== '') {
                menuNavigasiNavbar.forEach(menu => {
                    const targetHref = menu.getAttribute('href');
                    menu.classList.remove('nav-active-gold');
                    menu.classList.add('nav-inactive-gray');
                    
                    if (targetHref === '#' + idSectionAktif) {
                        menu.classList.remove('nav-inactive-gray');
                        menu.classList.add('nav-active-gold');
                    }
                });
            }
        }

        window.addEventListener('scroll', aktifkanMenuSaatScroll);
        setTimeout(aktifkanMenuSaatScroll, 500); 
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\resources\views/welcome.blade.php ENDPATH**/ ?>