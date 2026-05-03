<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    <!-- Logo + Nama Aplikasi - Versi yang lebih baik -->
                    <div class="login-brand text-center mb-4">
                        <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" class="img-fluid mx-auto d-block"
                            style="max-width: 280px; width: 100%; height: auto; margin-bottom: 12px;"
                            alt="<?php echo e(env('APP_NAME')); ?> Logo">

                        <p class="font-weight-bold text-primary mb-1" style="font-size: 17px;">
                            <?php echo e(env('APP_FULLNAME')); ?>

                        </p>

                        <h2 class="text-muted mb-0" style="font-size: 14px; font-weight: 500;">
                            Sistem Lost & Found Universitas
                        </h2>
                    </div>

                    <div class="card shadow">
                        <div class="card-header text-center bg-white border-0 pt-4">
                            <h4 class="mb-0">Login</h4>
                        </div>

                        <div class="card-body pb-4">
                            <form method="POST" action="<?php echo e(route('login')); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="email">Email / Username</label>
                                    <input id="email" type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="email" tabindex="1" autofocus>
                                    <?php $__errorArgs = ['email'];
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

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            
                                        </div>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        tabindex="2">
                                    <?php $__errorArgs = ['password'];
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

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-muted text-center">
                        Belum Punya Akun?
                        <a href="<?php echo e(route('register')); ?>" class="text-primary">Register</a>
                    </div>

                    <div class="simple-footer mt-5">
                        Copyright © 2024 <?php echo e(env('APP_NAME')); ?>. All Rights Reserved.
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\website\ufounds\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>