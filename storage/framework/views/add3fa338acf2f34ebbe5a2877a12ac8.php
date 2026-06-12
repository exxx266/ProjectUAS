<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Caps Studio Barbershop | Management Information System'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    
    <style>
        /* --- KONTROL WARNA TEKS NAVBAR MUTLAK --- */
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff !important; 
            font-weight: 500 !important;
            transition: all 0.3s ease-in-out;
        }

        /* Membunuh warna putih bawaan Bootstrap dan memaksa jadi Emas */
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #cfa858 !important; 
            font-weight: 700 !important;
        }

        /* CSS PEMERSATU TOMBOL NAVBAR */
        .btn-nav-user {
            background-color: transparent !important;
            border: 1px solid #444 !important;
            color: #aaa !important;
            font-size: 0.8rem !important;
            padding: 6px 16px !important;
            letter-spacing: 1px !important;
            text-transform: uppercase !important;
            font-weight: 600 !important;
            transition: 0.3s;
        }
        .btn-nav-user:hover { border-color: #cfa858 !important; color: #cfa858 !important; }

        .btn-nav-admin {
            background-color: transparent !important;
            border: 1px solid #cfa858 !important;
            color: #cfa858 !important;
            font-size: 0.8rem !important;
            padding: 6px 16px !important;
            letter-spacing: 1px !important;
            text-transform: uppercase !important;
            font-weight: 600 !important;
            transition: 0.3s;
        }
        .btn-nav-admin:hover { background-color: #cfa858 !important; color: #0a0a0a !important; }

        .btn-nav-logout {
            background-color: transparent !important;
            border: 1px solid #dc3545 !important;
            color: #dc3545 !important;
            font-size: 0.8rem !important;
            padding: 6px 16px !important;
            letter-spacing: 1px !important;
            text-transform: uppercase !important;
            font-weight: 600 !important;
            transition: 0.3s;
        }
        .btn-nav-logout:hover { background-color: #dc3545 !important; color: #fff !important; }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="flex-grow-1" style="padding-top: 76px;">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            const sections = Array.from(navLinks)
                .map(link => {
                    const href = link.getAttribute('href');
                    const id = href.substring(href.indexOf('#') + 1);
                    return document.getElementById(id);
                })
                .filter(section => section !== null);

            function updateActiveOnScroll() {
                let scrollY = window.pageYOffset;
                let currentSection = '';

                // A. LOGIKA UTAMA: Cek koordinat masing-masing seksi
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 150;
                    const sectionHeight = section.offsetHeight;

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        currentSection = '#' + section.getAttribute('id');
                    }
                });

                // B. LOGIKA PENGAMAN 1: Jika di posisi paling atas, paksa ke Beranda
                if (scrollY < 50) {
                    currentSection = '#home';
                }

                // C. LOGIKA PENGAMAN 2 (SOLUSI UTAMA): Jika sudah mentok bawah halaman
                // Jika tinggi layar + jarak gulir sudah sama dengan total tinggi seluruh dokumen
                if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 20) {
                    currentSection = '#kontak';
                }

                // Eksekusi penyematan warna emas
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (currentSection && link.getAttribute('href').includes(currentSection)) {
                        link.classList.add('active');
                    }
                });
            }

            window.addEventListener('scroll', updateActiveOnScroll);
            updateActiveOnScroll();
        });
    </script><?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\resources\views/layouts/app.blade.php ENDPATH**/ ?>