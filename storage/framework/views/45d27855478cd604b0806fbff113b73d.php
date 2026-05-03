<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" width="50" height="50" alt="logo">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" width="50" height="50" alt="logo">
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="<?php echo e(Route::is('dashboard') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        

        
        

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li class="menu-header">Administrator</li>
            <li class="<?php echo e(Route::is('user*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
                    <i class="fas fa-users"></i>
                    <span>Kelola User</span>
                </a>
            </li>
            <li class="<?php echo e(Route::is('laporan*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('laporan.index')); ?>">
                    <i class="fas fa-box"></i>
                    <span>Kelola Laporan</span>
                </a>
            </li>
            <li class="<?php echo e(Route::is('klaim*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('klaim.index')); ?>">
                    <i class="fas fa-box"></i>
                    <span>Kelola Klaim</span>
                </a>
            </li>
            <li class="<?php echo e(Route::is('serah-terima*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('serah-terima.index')); ?>">
                    <i class="fas fa-calendar-check"></i>
                    <span>Atur Serah Terima</span>
                </a>
            </li>
        <?php endif; ?>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
            <!--<li class="menu-header text-center"><h5>Finder</h5></li>-->
            <li class="<?php echo e(Route::is('laporan*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('laporan.index')); ?>">
                    <i class="fas fa-box"></i>
                    <span>Buat Laporan</span>
                </a>
            </li>

            <li class="<?php echo e(Route::is('klaim*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('klaim.index')); ?>">
                    <i class="fas fa-box"></i>
                    <span>Kelola Klaim</span>
                </a>
            </li>

            <li class="<?php echo e(Route::is('serah-terima*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('serah-terima.index')); ?>">
                    <i class="fas fa-calendar-check"></i>
                    <span>Atur Serah Terima</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</aside><?php /**PATH E:\website\ufounds\resources\views/includes/sidebar.blade.php ENDPATH**/ ?>