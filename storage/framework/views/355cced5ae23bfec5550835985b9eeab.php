<?php $__env->startSection('title'); ?><?php echo e(__('auth.login')); ?><?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/plugins/iCheck/square/blue.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <!-- start: LOGIN BOX -->
    <p class="login-box-msg"><?php echo e(__('auth.sign_title')); ?></p>

    <?php echo $__env->make('auth._social_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a href="#" class="btn btn-block btn-flat btn-default" role="button" id="email-login-btn">
        <i class="fa fa-envelope"></i> <?php echo e(__('social_login.e-mail')); ?>

    </a>

    <div id="email-login" class="hidden">

        <?php echo Form::open(['route' => 'login']); ?>

        <div class="form-group has-feedback">
            <?php echo Form::text('email', null, [
                        'class' => 'form-control',
                        'placeholder' => __('auth.email'),
                        'required' => 'required',
                        'autofocus' => 'autofocus',
                        ]); ?>

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo Form::password('password', [
                        'class' => 'form-control password',
                        'placeholder' => __('auth.password'),
                        'required' => 'required',
                        ]); ?>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php if(Route::has('password.request')): ?>
            <p class="text-right">
                <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('auth.forgot_password')); ?></a>
            </p>
        <?php endif; ?>

        <div class="checkbox icheck">
            <label>
                <?php echo Form::checkbox('remember', '1', false); ?> <?php echo e(__('auth.remember_me')); ?>

            </label>
        </div>

        <?php echo Form::submit(__('auth.login'), ['class' => 'btn btn-primary btn-block btn-flat', 'id' => 'loginButton']); ?>

        <?php echo Form::close(); ?>

    </div>

    <p></p>
    <?php if(Route::has('register')): ?>
        <p class="text-center">
            <?php echo e(__('auth.dont_have_account')); ?> <a href="<?php echo e(route('register')); ?>"><?php echo e(__('auth.create_account')); ?></a>
        </p>
    <?php endif; ?>

    <!-- end: LOGIN BOX -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/AdminLTE/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });

            $('#email-login-btn').click(function () {
                $("#email-login").removeClass("hidden");
                $("#email-login-btn").addClass("hidden");
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/auth/login.blade.php ENDPATH**/ ?>