<?php $__env->startSection('title', __('auth.change_password')); ?>


<?php $__env->startSection('header', __('auth.change_password')); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

        </a>
    </li>

    <li>
        <a href="<?php echo e(route('account.index')); ?>">
            <?php echo e(__('site.my_profile')); ?>

        </a>
    </li>

    <li class="active">
        <?php echo e(__('user/profile.change_password')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- panel -->
    <div class="panel panel-default">
        <div class="panel-body">

            <form class="form-horizontal" method="post" action="<?php echo e(route('account.password.update')); ?>">
                <?php echo csrf_field(); ?>

                <!-- current password -->
                <div class="form-group<?php echo e($errors->has('current-password') ? ' has-error' : ''); ?>">
                    <label for="current-password" class="col-md-4 control-label">
                        <?php echo e(__('user/profile.current_password')); ?>

                    </label>

                    <div class="col-md-6">
                        <input id="current-password" type="password" class="form-control"
                               name="current-password" required>

                        <?php $__errorArgs = ['current-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="help-block"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <!-- /.current password -->

                <!-- new password -->
                <div class="form-group<?php echo e($errors->has('new-password') ? ' has-error' : ''); ?>">
                    <label for="new-password" class="col-md-4 control-label">
                        <?php echo e(__('user/profile.new_password')); ?>

                    </label>

                    <div class="col-md-6">
                        <input id="new-password" type="password" class="form-control" name="new-password"
                               required>

                        <?php $__errorArgs = ['new-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <ul class="help-block">
                                <?php $__currentLoopData = $errors->get('new-password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <!-- /. new password -->

                <!-- new password confirmation -->
                <div class="form-group">
                    <label for="new-password-confirm" class="col-md-4 control-label">
                        <?php echo e(__('user/profile.new_password_confirm')); ?>

                    </label>

                    <div class="col-md-6">
                        <input id="new-password-confirm" type="password" class="form-control"
                               name="new-password_confirmation" required>
                    </div>
                </div>
                <!-- new password confirmation -->

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('button.update')); ?> <i class="fa fa-pencil-square-o"></i>
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- ./ panel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/account/password/index.blade.php ENDPATH**/ ?>