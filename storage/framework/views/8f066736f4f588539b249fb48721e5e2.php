

<?php $__env->startSection('title', 'Atur Serah Terima'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <?php if(isset($klaims)): ?>
                    <!-- List of claims to select -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-handshake"></i> Pilih Klaim untuk Atur Jadwal
                            </h4>
                        </div>
                        
                        <div class="card-body">
                            <?php if($klaims->isEmpty()): ?>
                                <div class="alert alert-info text-center py-5">
                                    <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                    <h5>Tidak ada klaim yang bisa dijadwalkan</h5>
                                    <p class="text-muted">Klaim dengan status 'Diproses' yang belum memiliki jadwal akan muncul di sini.</p>
                                </div>
                            <?php else: ?>
                                <div class="list-group">
                                    <?php $__currentLoopData = $klaims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $klaim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"><?php echo e($klaim->laporan->nama_barang ?? 'Barang Tidak Diketahui'); ?></h5>
                                                <small><?php echo $klaim->status_label; ?></small>
                                            </div>
                                            <p class="mb-1"><strong>Pemilik:</strong> <?php echo e($klaim->user->name ?? '-'); ?></p>
                                            <p class="mb-1 small text-muted"><?php echo e(Str::limit($klaim->deskripsi_klaim, 100)); ?></p>
                                            <a href="<?php echo e(route('serah-terima.create.with-klaim', $klaim)); ?>" class="btn btn-sm btn-success mt-2">
                                                <i class="fas fa-calendar-check"></i> Atur Jadwal
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="mt-3">
                                <a href="<?php echo e(route('serah-terima.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                <?php elseif(isset($klaim)): ?>
                    <!-- Form for specific claim -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-handshake"></i> Atur Jadwal Serah Terima
                            </h4>
                        </div>
                        
                        <div class="card-body">
                            
                            <!-- Informasi Barang & Pemilik -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>Barang yang Diklaim</h5>
                                    <p class="mb-1"><strong><?php echo e($klaim->laporan->nama_barang ?? '-'); ?></strong></p>
                                    <p class="small text-muted">
                                        Lokasi Ditemukan: <?php echo e($klaim->laporan->lokasi_ditemukan); ?><br>
                                        Tanggal Ditemukan: <?php echo e(optional($klaim->laporan->tanggal_ditemukan)->format('d M Y')); ?>

                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Pemilik Klaim</h5>
                                    <p class="mb-1"><strong><?php echo e($klaim->user->name ?? 'Pemilik'); ?></strong></p>
                                    <p class="small text-muted"><?php echo e($klaim->deskripsi_klaim); ?></p>
                                </div>
                            </div>

                            <hr>

                            <form action="<?php echo e(route('serah-terima.store', $klaim)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Tanggal & Waktu Serah Terima <span class="text-danger">*</span></label>
                                        <input type="datetime-local" 
                                               name="tanggal_serah_terima" 
                                               class="form-control <?php $__errorArgs = ['tanggal_serah_terima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               required>
                                        <?php $__errorArgs = ['tanggal_serah_terima'];
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

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Lokasi Serah Terima <span class="text-danger">*</span></label>
                                        <select name="lokasi_serah_terima" 
                                                class="form-control <?php $__errorArgs = ['lokasi_serah_terima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                required>
                                            <option value="">Pilih Lokasi...</option>
                                            <option value="Gedung Fasilkom Lantai 7">Gedung Fasilkom Lantai 7</option>
                                            <option value="Pos Keamanan Kampus">Pos Keamanan Kampus</option>
                                            <option value="Ruang UKM">Ruang UKM</option>
                                            <option value="Perpustakaan">Perpustakaan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <?php $__errorArgs = ['lokasi_serah_terima'];
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

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Catatan Tambahan (Opsional)</label>
                                    <textarea name="catatan" class="form-control" rows="4" 
                                        placeholder="Contoh: Mohon bawa identitas asli sebagai bukti kepemilikan..."></textarea>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <a href="<?php echo e(route('serah-terima.create')); ?>" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-calendar-check"></i> Atur Jadwal Serah Terima
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/serah_terima/create.blade.php ENDPATH**/ ?>