<?php $__env->startSection('title'); ?>
    <?php echo e(__('auth.register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p class="login-box-msg"><?php echo e(__('auth.create_account')); ?></p>

    <?php echo $__env->make('auth._social_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group has-feedback<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
            <input type="text" class="form-control" placeholder="<?php echo e(__('admin/user/model.username')); ?>"
                   name="username" value="<?php echo e(old('username')); ?>" required="required">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            <span class="help-block"><?php echo e($errors->first('username', ':message')); ?></span>
        </div>

        <div class="form-group has-feedback<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input class="form-control" placeholder="<?php echo e(__('admin/user/model.email')); ?>"
                   name="email" type="text" value="<?php echo e(old('email')); ?>" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
        </div>

        <div class="form-group has-feedback<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <input class="form-control" placeholder="<?php echo e(__('admin/user/model.password')); ?>" type="password"
                   name="password" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            <ul class="help-block">
                <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="<?php echo e(__('admin/user/model.password_confirmation')); ?>"
                   name="password_confirmation" required="required">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="checkbox<?php echo e($errors->has('terms') ? ' has-error' : ''); ?>">
            <label for="terms">
                <input name="terms" type="checkbox" <?php if(old('terms')): echo 'checked'; endif; ?>> I agree to the <a href="#">terms</a>
            </label>
            <span class="help-block"><?php echo e($errors->first('terms', ':message')); ?></span>
        </div>

        <input class="btn btn-primary btn-block btn-flat" type="submit" value="<?php echo e(__('auth.register')); ?>">
    </form>

    <p></p>
    <p class="text-center">
        <a href="<?php echo e(route('login')); ?>" class="text-center"><?php echo e(__('auth.already_signed_in')); ?></a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>