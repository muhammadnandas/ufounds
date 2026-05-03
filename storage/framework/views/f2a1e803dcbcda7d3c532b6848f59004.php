<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(env('APP_NAME')); ?></title>

    <?php echo $__env->make('includes.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar">
                <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    
                    <div class="section-body">
                        <h2 class="section-title"><?php echo $__env->yieldContent('title'); ?></h2>
                        <p class="section-lead"><?php echo $__env->yieldContent('desc'); ?></p>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </footer>
        </div>
    </div>

    <?php echo $__env->make('includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <!-- Modals Section -->
    <?php echo $__env->yieldContent('modals'); ?>
</body>

</html><?php /**PATH E:\website\ufounds\resources\views/layouts/app.blade.php ENDPATH**/ ?>