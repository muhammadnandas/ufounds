

<?php $__env->startSection('title', 'Data Klaim'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <h4 class="mb-3">Data Klaim</h4>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Pelapor</th>
                        <th>Deskripsi Klaim</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $klaims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $klaim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($klaim->laporan->nama_barang ?? '-'); ?></td>
                            <td><?php echo e($klaim->user->name ?? '-'); ?></td>
                            <td>
                                <?php if($klaim->deskripsi_klaim): ?>
                                    <span class="text-truncate d-block" style="max-width: 200px;" title="<?php echo e($klaim->deskripsi_klaim); ?>">
                                        <?php echo e(Str::limit($klaim->deskripsi_klaim, 50)); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $klaim->status_label; ?></td>

                            <td>
                                <a href="<?php echo e(route('pages.klaim.show', $klaim)); ?>" class="btn btn-info btn-sm">Detail</a>

                                <?php if(auth()->user()->role === 'admin' || $klaim->laporan->user_id === auth()->id()): ?>
                                    <a href="<?php echo e(route('pages.klaim.edit', $klaim)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <?php endif; ?>

                                <?php if(auth()->user()->role === 'admin'): ?>
                                    <form action="<?php echo e(route('pages.klaim.destroy', $klaim)); ?>" method="POST" style="display:inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>

            <?php echo e($klaims->links()); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/klaim/index.blade.php ENDPATH**/ ?>