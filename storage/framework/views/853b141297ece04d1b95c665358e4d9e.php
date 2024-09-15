<?php $__env->startSection('title'); ?>
    <?php echo e(__('auth.email_verification')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <p class="login-box-msg"><?php echo e(__('auth.email_verification_instructions')); ?></p>

    <form method="POST" action="<?php echo e(route('verification.send')); ?>">
        <?php echo csrf_field(); ?>

        <input class="btn btn-primary btn-block btn-flat" type="submit"
               value="<?php echo e(__('auth.email_verification_action')); ?>">
    </form>

    <form method="post" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <input class="btn btn-default btn-flat" type="submit" value="<?php echo e(__('auth.logout')); ?>">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>