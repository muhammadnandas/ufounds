

<?php $__env->startSection('title', 'Daftar Serah Terima'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-handshake"></i> Daftar Serah Terima yang Perlu Diurus
            </h4>
            <a href="<?php echo e(route('serah-terima.create')); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Buat Jadwal Baru
            </a>
        </div>

        <?php if($serahTerimas->isEmpty()): ?>
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                <h5>Belum ada jadwal serah terima yang perlu diatur</h5>
                <p class="text-muted">Jadwal akan muncul setelah Anda menyetujui klaim pemilik.</p>
            </div>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $serahTerimas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo e($serah->klaim->laporan->nama_barang ?? 'Barang Tidak Diketahui'); ?>

                                </h5>
                                
                                <p class="small text-muted mb-2">
                                    <strong>Pemilik:</strong> <?php echo e($serah->pemilik->name ?? '-'); ?>

                                </p>

                                <p class="mb-1">
                                    <i class="fas fa-calendar-alt"></i> 
                                    <?php echo e($serah->tanggal_serah_terima->format('d M Y • H:i')); ?>

                                </p>
                                <p class="mb-3">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <?php echo e($serah->lokasi_serah_terima); ?>

                                </p>

                                <?php if($serah->catatan): ?>
                                    <p class="small text-muted">
                                        <strong>Catatan:</strong> <?php echo e(Str::limit($serah->catatan, 80)); ?>

                                    </p>
                                <?php endif; ?>

                                <span class="badge bg-warning">Menunggu Serah Terima</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/serah_terima/index.blade.php ENDPATH**/ ?>