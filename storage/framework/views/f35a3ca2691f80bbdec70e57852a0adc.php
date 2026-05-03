

<?php $__env->startSection('title', 'Kelola Laporan Barang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Kelola Laporan Barang Hilang & Ditemukan</h4>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
            <a href="<?php echo e(route('pages.laporan.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Laporan
            </a>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $laporans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">

                        <!-- Foto Barang - UKURAN DISESUAIKAN -->
                        <div class="position-relative">
                            <?php if($laporan->foto): ?>
                                <img src="<?php echo e($laporan->foto_url); ?>" class="card-img-top" alt="<?php echo e($laporan->nama_barang); ?>"
                                    style="height: 240px; object-fit: cover;">
                            <?php else: ?>
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                    style="height: 240px;">
                                    <i class="fas fa-image fa-4x text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate mb-2"><?php echo e($laporan->nama_barang); ?></h5>

                            <p class="small text-muted mb-1">
                                <i class="fas fa-map-marker-alt"></i> <?php echo e($laporan->lokasi_ditemukan); ?>

                            </p>
                            <p class="small text-muted mb-2">
                                <i class="fas fa-calendar"></i> <?php echo e($laporan->tanggal_ditemukan->format('d M Y')); ?>

                            </p>

                            <div class="mb-2">
                                <?php echo $laporan->status_label; ?>

                            </div>

                            <p class="card-text flex-grow-1 text-truncate" style="min-height: 50px;">
                                <?php echo e(Str::limit($laporan->deskripsi, 90)); ?>

                            </p>

                            <small class="text-muted">
                                Oleh: <strong><?php echo e($laporan->user->name ?? 'User'); ?></strong>
                            </small>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0">
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('pages.laporan.show', $laporan)); ?>" class="btn btn-primary btn-sm flex-fill">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="<?php echo e(route('pages.laporan.edit', $laporan)); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h5>Belum ada laporan barang</h5>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($laporans->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/laporan/index.blade.php ENDPATH**/ ?>