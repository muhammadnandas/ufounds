

<?php $__env->startSection('title', 'Tambah Laporan Barang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Tambah Laporan Barang Baru</h5>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo e(route('pages.laporan.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <!-- Nama Barang -->
                                <div class="col-md-6 mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        class="form-control <?php $__errorArgs = ['nama_barang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('nama_barang')); ?>" required autofocus>
                                    <?php $__errorArgs = ['nama_barang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" id="kategori"
                                        class="form-select <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Elektronik" <?php echo e(old('kategori') == 'Elektronik' ? 'selected' : ''); ?>>
                                            Elektronik</option>
                                        <option value="Dompet & Kartu" <?php echo e(old('kategori') == 'Dompet & Kartu' ? 'selected' : ''); ?>>Dompet & Kartu</option>
                                        <option value="Tas & Barang Pribadi" <?php echo e(old('kategori') == 'Tas & Barang Pribadi' ? 'selected' : ''); ?>>Tas & Barang Pribadi</option>
                                        <option value="Pakaian" <?php echo e(old('kategori') == 'Pakaian' ? 'selected' : ''); ?>>Pakaian
                                        </option>
                                        <option value="Aksesoris" <?php echo e(old('kategori') == 'Aksesoris' ? 'selected' : ''); ?>>
                                            Aksesoris</option>
                                        <option value="Dokumen" <?php echo e(old('kategori') == 'Dokumen' ? 'selected' : ''); ?>>Dokumen
                                        </option>
                                        <option value="Lainnya" <?php echo e(old('kategori') == 'Lainnya' ? 'selected' : ''); ?>>Lainnya
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Lokasi Ditemukan -->
                            <div class="mb-3">
                                <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="lokasi_ditemukan" id="lokasi_ditemukan"
                                    class="form-control <?php $__errorArgs = ['lokasi_ditemukan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('lokasi_ditemukan')); ?>"
                                    placeholder="Contoh: Gedung A Lantai 3, Perpustakaan, dll" required>
                                <?php $__errorArgs = ['lokasi_ditemukan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Tanggal Ditemukan -->
                            <div class="mb-3">
                                <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="tanggal_ditemukan" id="tanggal_ditemukan"
                                    class="form-control <?php $__errorArgs = ['tanggal_ditemukan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tanggal_ditemukan', now()->format('Y-m-d'))); ?>" required>
                                <?php $__errorArgs = ['tanggal_ditemukan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Foto Barang -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Barang</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                                <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="text-muted">Format: JPG, JPEG, PNG (Max 2MB)</small>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi Barang <span
                                        class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" rows="5"
                                    class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    required><?php echo e(old('deskripsi')); ?></textarea>
                                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Detail Tambahan (Admin Only) -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <div class="mb-4">
                                <label for="detail_admin" class="form-label">Detail Tambahan (Admin Only)</label>
                                <textarea name="detail_admin" id="detail_admin" rows="4"
                                    class="form-control <?php $__errorArgs = ['detail_admin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Informasi detail tambahan yang hanya visible untuk admin (contoh: lokasi penyimpanan barang, kondisi spesifik, dll)"><?php echo e(old('detail_admin')); ?></textarea>
                                <div class="form-text">Field ini hanya akan terlihat oleh admin dan tidak ditampilkan ke user biasa.</div>
                                <?php $__errorArgs = ['detail_admin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php endif; ?>

                            <!-- Status (khusus admin) -->
                            <div class="mb-4">
                                <label for="status" class="form-label">Status Laporan</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" selected>Pending</option>
                                    <option value="diklaim">Diklaim</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?php echo e(route('pages.laporan.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/laporan/create.blade.php ENDPATH**/ ?>