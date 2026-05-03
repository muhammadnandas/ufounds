

<?php $__env->startSection('title', 'Detail Klaim'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <h4 class="mb-3">Detail Klaim</h4>

    <div class="card">
        <div class="card-body">

            <p><strong>Nama Barang:</strong> <?php echo e($klaim->laporan->nama_barang); ?></p>
            <p><strong>Pelapor:</strong> <?php echo e($klaim->user->name); ?></p>
            <p><strong>Status:</strong> <?php echo $klaim->status_label; ?></p>
            <p><strong>Tanggal Klaim:</strong> <?php echo e($klaim->tanggal_klaim); ?></p>
            
            <?php if($klaim->deskripsi_klaim): ?>
                <div class="mb-3">
                    <strong>Deskripsi Klaim (Seeker):</strong>
                    <div class="alert alert-info mt-2">
                        <?php echo e($klaim->deskripsi_klaim); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id()): ?>
                <?php if($klaim->nama_pemilik): ?>
                    <p><strong>Nama Pemilik:</strong> <?php echo e($klaim->nama_pemilik); ?></p>
                <?php endif; ?>
                <?php if($klaim->no_telepon): ?>
                    <p><strong>No Telepon:</strong> <?php echo e($klaim->no_telepon); ?></p>
                <?php endif; ?>
                <?php if($klaim->bukti_kepemilikan): ?>
                    <div class="mb-3">
                        <strong>Bukti Kepemilikan:</strong>
                        <div class="alert alert-warning mt-2">
                            <?php echo e($klaim->bukti_kepemilikan); ?>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($klaim->catatan_admin): ?>
                <div class="mb-3">
                    <strong>Catatan Admin:</strong>
                    <div class="alert alert-secondary mt-2">
                        <?php echo e($klaim->catatan_admin); ?>

                    </div>
                </div>
            <?php endif; ?>

            <a href="<?php echo e(route('pages.klaim.index')); ?>" class="btn btn-secondary">Kembali</a>

            <?php if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id()): ?>
                <a href="<?php echo e(route('pages.klaim.edit', $klaim)); ?>" class="btn btn-warning">
                    <?php echo e(auth()->user()->role === 'admin' ? 'Edit Status' : 'Edit Klaim'); ?>

                </a>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/klaim/show.blade.php ENDPATH**/ ?>