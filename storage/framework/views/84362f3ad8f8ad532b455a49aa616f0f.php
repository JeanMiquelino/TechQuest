<header class="main-header">

    <!-- start: LOGO -->
    <a href="<?php echo e(route('admin.home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><strong><i class="fa fa-fw fa-home"></i></strong></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><strong><?php echo e(config('app.name', 'gamify')); ?></strong></span>
    </a>
    <!-- end: LOGO -->

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- start: RESPONSIVE MENU TOGGLER -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- end: RESPONSIVE MENU TOGGLER -->
        <div class="navbar-custom-menu">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav">

                <!-- start: NOTIFICATION DROPDOWN -->
                <!-- TODO -->
                <!-- end: NOTIFICATION DROPDOWN -->

                <!-- start: USER DROPDOWN -->
            <?php echo $__env->make('partials.user_dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </nav>
</header>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/admin/partials/header.blade.php ENDPATH**/ ?>