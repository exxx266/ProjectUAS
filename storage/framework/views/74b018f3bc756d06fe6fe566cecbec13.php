<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(10, 10, 10, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid #2a2a2a;">
    <div class="container">
        <a class="navbar-brand text-gold fs-3 fw-bold" href="<?php echo e(url('/')); ?>" style="color: #cfa858;">Caps Studio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link text-uppercase px-3" href="<?php echo e(url('/#home')); ?>" style="font-size: 0.85rem; letter-spacing: 1px;">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase px-3" href="<?php echo e(url('/#layanan')); ?>" style="font-size: 0.85rem; letter-spacing: 1px;">Layanan</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase px-3" href="<?php echo e(url('/#kapster')); ?>" style="font-size: 0.85rem; letter-spacing: 1px;">Kapster</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase px-3" href="<?php echo e(url('/#tentang')); ?>" style="font-size: 0.85rem; letter-spacing: 1px;">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase px-3" href="<?php echo e(url('/#kontak')); ?>" style="font-size: 0.85rem; letter-spacing: 1px;">Kontak</a></li>
            </ul>
            
            <div class="d-flex align-items-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                    
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-nav-user">Masuk User</a>
                        <a href="<?php echo e(url('/admin/login')); ?>" class="btn btn-nav-admin">Masuk Admin</a>
                    </div>
                <?php else: ?>
                    
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: 1px solid #333; color: #fff; padding: 6px 16px; border-radius: 4px;">
                            <i class="bi bi-person-circle" style="color: #cfa858;"></i>
                            <span class="fw-semibold" style="font-size: 0.85rem;"><?php echo e(Auth::user()->name); ?></span>
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow-lg mt-2" style="background-color: #161616; border: 1px solid #2a2a2a; border-radius: 6px; min-width: 200px;">
                            <li class="px-3 py-2 border-bottom border-secondary border-opacity-25">
                                <small class="text-muted d-block">Masuk sebagai:</small>
                                <span class="text-white fw-bold small"><?php echo e(Auth::user()->email); ?></span>
                            </li>
                            
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::user()->hasAnyRole(['Super Admin', 'Kasir'])): ?>
                                <li>
                                    <a class="dropdown-item py-2 small fw-bold" href="<?php echo e(url('/admin')); ?>" style="color: #cfa858;">
                                        <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider" style="border-color: #2a2a2a;"></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            
                            
                            <li>
                                <a class="dropdown-item py-2 small text-white" href="<?php echo e(route('booking.history')); ?>">
                                    <i class="bi bi-clock-history me-2 text-muted"></i>Riwayat Reservasi
                                </a>
                            </li>
                            
                            <li><hr class="dropdown-divider" style="border-color: #2a2a2a;"></li>
                            
                            
                            <li>
                                <form action="<?php echo e(route('logout')); ?>" method="POST" class="m-0 p-0">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item py-2 small text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Keluar Aplikasi
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            
        </div>
    </div>
</nav><?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\resources\views/components/navbar.blade.php ENDPATH**/ ?>