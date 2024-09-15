<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- start: CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: LOGO -->
                <strong><a href="<?php echo e(route('home')); ?>" class="navbar-brand"><?php echo e(config('app.name', 'gamify')); ?></a></strong>
                <!-- end: LOGO -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- start: TOP LEFT NAVIGATION MENU -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- end: TOP LEFT NAVIGATION MENU -->

            <!-- start: TOP RIGHT NAVIGATION MENU -->
            <div class="navbar-custom-menu">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-dashboard')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.home')); ?>" title="<?php echo e(__('site.admin_area')); ?>">
                                <i class="fa fa-gears"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    

                    <?php if(auth()->guard()->check()): ?>
                        <!-- start: USER DROPDOWN -->
                        <?php echo $__env->make('partials.user_dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- end: USER DROPDOWN -->
                    <?php endif; ?>

                    <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a href="<?php echo e(route('login')); ?>" title="<?php echo e(__('auth.login')); ?>">
                                <?php echo e(__('auth.login')); ?>

                            </a>
                        </li>
                    <?php endif; ?>


                </ul>
                <!-- end: TOP RIGHT NAVIGATION MENU -->
            </div>


        </div>
        <!-- end: CONTAINER -->
    </nav>
</header>
<?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/partials/header.blade.php ENDPATH**/ ?>