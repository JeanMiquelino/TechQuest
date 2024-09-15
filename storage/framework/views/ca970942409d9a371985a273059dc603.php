<?php $__env->startSection('title', __('user/profile.title')); ?>


<?php $__env->startSection('header', __('user/profile.title')); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('user/profile.title')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username"><?php echo e($user->name); ?></h3>
                    <h5 class="widget-user-desc"><?php echo e($user->level); ?></h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo e($user->profile->avatarUrl); ?>" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?php echo e($user->experience); ?></h5>
                                <span class="description-text">XP</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?php echo e($user->answeredQuestionsCount()); ?></h5>
                                <span class="description-text">ANSWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><?php echo e($user->unlockedBadgesCount()); ?></h5>
                                <span class="description-text">BADGES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.profile image -->

            <!-- About Me -->
            <?php echo $__env->make('profile._about_me', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /.about me -->

        </div>
        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#overview" data-toggle="tab"><?php echo e(__('user/profile.overview')); ?></a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-profile', $user)): ?>
                        <li>
                            <a href="<?php echo e(route('account.profile.edit')); ?>"><?php echo e(__('user/profile.edit_account')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-password', $user)): ?>
                        <li>
                            <a href="<?php echo e(route('account.password.index')); ?>"><?php echo e(__('user/profile.change_password')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="overview">
                        <?php echo $__env->make('profile._overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/profile/show.blade.php ENDPATH**/ ?>