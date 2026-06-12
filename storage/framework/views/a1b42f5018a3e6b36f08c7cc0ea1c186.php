

<?php $__env->startPush('styles'); ?>
<style>
    body { background-color: #0a0a0a; }
    .auth-card {
        background-color: #161616;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        padding: 3rem;
    }
    .form-control {
        background-color: #1e1e1e;
        border: 1px solid #333;
        color: white;
    }
    .form-control:focus {
        background-color: #1e1e1e;
        border-color: #cfa858;
        box-shadow: 0 0 0 0.25rem rgba(207, 168, 88, 0.25);
        color: white;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="auth-card shadow-lg mt-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-white">Welcome Back</h3>
                    <p class="text-white">Login untuk mengelola reservasi Anda.</p>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger" style="background-color: rgba(220, 53, 69, 0.1); border-color: rgba(220, 53, 69, 0.3); color: #ff6b6b;">
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form action="<?php echo e(route('login.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label text-white">Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn w-100 fw-bold" style="background-color: #cfa858; color: black;">LOGIN</button>
                </form>

                <div class="text-center mt-4">
                    <p class="text-white mb-0">Belum punya akun? <a href="<?php echo e(route('register')); ?>" style="color: #cfa858; text-decoration: none;">Daftar Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\resources\views/auth/login.blade.php ENDPATH**/ ?>