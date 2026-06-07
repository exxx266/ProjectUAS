<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildSchema()); ?>

</div>
<?php /**PATH C:\Users\h\Documents\Semester2\Pemrograman Web\ProjectUAS\vendor\filament\schemas\resources\views/components/grid.blade.php ENDPATH**/ ?>