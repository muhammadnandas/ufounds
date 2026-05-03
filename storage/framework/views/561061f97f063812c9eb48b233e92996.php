

<?php $__env->startSection('title', 'Edit Klaim'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <h4 class="mb-3">
        <?php echo e(auth()->user()->role === 'admin' ? 'Edit Status Klaim' : 'Edit Informasi Klaim'); ?>

    </h4>

    <div class="card">
        <div class="card-body">

            <form action="<?php echo e(route('pages.klaim.update', $klaim)); ?>" method="POST">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                <?php if(auth()->user()->role === 'admin'): ?>
                    <!-- Admin fields -->
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status_klaim" class="form-control">
                            <option value="menunggu" <?php echo e($klaim->status_klaim == 'menunggu' ? 'selected' : ''); ?>>Menunggu</option>
                            <option value="diproses" <?php echo e($klaim->status_klaim == 'diproses' ? 'selected' : ''); ?>>Diproses</option>
                            <option value="diterima" <?php echo e($klaim->status_klaim == 'diterima' ? 'selected' : ''); ?>>Diterima</option>
                            <option value="ditolak" <?php echo e($klaim->status_klaim == 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Catatan Admin</label>
                        <textarea name="catatan_admin" class="form-control"><?php echo e($klaim->catatan_admin); ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nama Pemilik</label>
                                <input type="text" name="nama_pemilik" class="form-control" value="<?php echo e($klaim->nama_pemilik ?? ''); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" value="<?php echo e($klaim->no_telepon ?? ''); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi Klaim</label>
                        <textarea name="deskripsi_klaim" class="form-control"><?php echo e($klaim->deskripsi_klaim ?? ''); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Bukti Kepemilikan</label>
                        <textarea name="bukti_kepemilikan" class="form-control"><?php echo e($klaim->bukti_kepemilikan ?? ''); ?></textarea>
                    </div>

                <?php else: ?>
                    <!-- Finder fields -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nama Pemilik *</label>
                                <input type="text" name="nama_pemilik" class="form-control" value="<?php echo e($klaim->nama_pemilik ?? ''); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>No Telepon *</label>
                                <input type="text" name="no_telepon" class="form-control" value="<?php echo e($klaim->no_telepon ?? ''); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi Klaim *</label>
                        <textarea name="deskripsi_klaim" class="form-control" required><?php echo e($klaim->deskripsi_klaim ?? ''); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Bukti Kepemilikan</label>
                        <textarea name="bukti_kepemilikan" class="form-control"><?php echo e($klaim->bukti_kepemilikan ?? ''); ?></textarea>
                    </div>

                    <div class="alert alert-info">
                        <strong>Info:</strong> Sebagai finder, Anda hanya dapat mengedit informasi klaim. Status klaim hanya dapat diubah oleh admin.
                    </div>
                <?php endif; ?>

                <button class="btn btn-primary">Simpan</button>
                <a href="<?php echo e(route('pages.klaim.index')); ?>" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/klaim/edit.blade.php ENDPATH**/ ?>