

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5 mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="fw-bold text-white mb-1">Riwayat Reservasi</h2>
                    <p class="text-muted mb-0">Daftar jadwal potong rambut dan transaksi Anda.</p>
                </div>
                <a href="<?php echo e(route('booking.create')); ?>" class="btn fw-bold text-uppercase" style="background-color: #cfa858; color: black; font-size: 0.85rem; letter-spacing: 1px;">+ Booking Baru</a>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $riwayatReservasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="history-card p-4 mb-4 shadow-sm">
                    <div class="row align-items-center">
                        
                        <div class="col-md-3 mb-3 mb-md-0 border-end border-dark">
                            <p class="text-muted small text-uppercase mb-1">Jadwal Kedatangan</p>
                            <h5 class="text-white fw-bold mb-1"><?php echo e(\Carbon\Carbon::parse($reservasi->tanggal)->translatedFormat('d F Y')); ?></h5>
                            <h4 class="text-gold mb-3" style="color: #cfa858;"><?php echo e($reservasi->slot_waktu); ?> WIB</h4>
                            
                            <span class="status-badge <?php echo e($reservasi->status_pembayaran == 'Pending' ? 'status-pending' : 'status-lunas'); ?> text-uppercase">
                                <?php echo e($reservasi->status_pembayaran); ?>

                            </span>
                        </div>

                        
                        <div class="col-md-6 mb-3 mb-md-0 px-md-4">
                            <p class="text-muted small text-uppercase mb-1">Kapster</p>
                            <p class="text-white fw-bold mb-3"><i class="bi bi-person-badge text-gold me-2" style="color: #cfa858;"></i> <?php echo e($reservasi->kapster->nama ?? 'Kapster Tidak Ditemukan'); ?></p>
                            
                            <p class="text-muted small text-uppercase mb-1">Layanan yang Dipilih</p>
                            <div class="service-list">
                                <?php $totalHarga = 0; ?>
                                <ul class="list-unstyled mb-0">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reservasi->layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <li class="d-flex justify-content-between text-white mb-1" style="font-size: 0.9rem;">
                                            <span>- <?php echo e($item->nama_layanan); ?></span>
                                            <span class="text-muted">Rp <?php echo e(number_format($item->pivot->harga_saat_ini, 0, ',', '.')); ?></span>
                                        </li>
                                        <?php $totalHarga += $item->pivot->harga_saat_ini; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        
                        <div class="col-md-3 text-md-end border-start border-dark">
                            <p class="text-muted small text-uppercase mb-1">Metode Bayar</p>
                            <p class="text-white mb-3" style="font-size: 0.9rem;"><?php echo e($reservasi->metode_pembayaran); ?></p>
                            
                            <p class="text-muted small text-uppercase mb-1">Total Tagihan</p>
                            <h4 class="fw-bold mb-0" style="color: #cfa858;">Rp <?php echo e(number_format($totalHarga, 0, ',', '.')); ?></h4>
                        </div>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="text-center py-5" style="background-color: #161616; border: 1px dashed #333; border-radius: 8px;">
                    <i class="bi bi-calendar-x" style="font-size: 3rem; color: #444;"></i>
                    <h5 class="text-white mt-3">Belum Ada Riwayat Reservasi</h5>
                    <p class="text-muted mb-4">Anda belum pernah melakukan pemesanan jadwal di Caps Studio.</p>
                    <a href="<?php echo e(route('booking.create')); ?>" class="btn btn-outline-gold text-uppercase" style="border: 1px solid #cfa858; color: #cfa858;">Booking Sekarang</a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\resources\views/booking/history.blade.php ENDPATH**/ ?>