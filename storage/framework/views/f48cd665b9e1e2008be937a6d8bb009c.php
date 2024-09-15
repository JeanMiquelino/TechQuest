<!DOCTYPE html>
<html lang="en">
<!-- start: HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', 'Administration Dashboard'); ?> :: <?php echo e(config('app.name', 'gamify')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- start: META -->
    <meta content="gamify: A Gamification Platform - Login" name="description">
    <meta content="Paco Orozco" name="author">
    <?php echo $__env->yieldContent('meta'); ?>
    <!-- end: META -->
    <!-- start: GLOBAL CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')); ?>">
    <!-- end: GLOBAL CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <?php echo $__env->yieldPushContent('styles'); ?>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/css/skins/skin-blue.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/css/techquest.css')); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo e(asset('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('//oss.maxcdn.com/respond/1.4.2/respond.min.js')); ?>"></script>
    <![endif]-->
    <!-- end: MAIN CSS -->
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="login-page">
<!-- start: LOGIN BOX -->
<div class="login-box">
    <div class="login-logo">
        <img class="logo-login" src="<?php echo e(asset('./images/Logo.jpeg')); ?>" alt="">
        <strong><?php echo e(config('app.name', 'gamify')); ?></strong>
    </div>

    <!-- start: NOTIFICATIONS -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- end: NOTIFICATIONS -->

    <div class="login-box-body">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<!-- end: LOGIN BOX -->

<!-- start: GLOBAL JAVASCRIPT -->
<script src="<?php echo e(asset('vendor/AdminLTE/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/AdminLTE/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- end: GLOBAL JAVASCRIPT -->
<!-- start: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
<?php echo $__env->yieldPushContent('scripts'); ?>
<!-- end: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
<!-- start: MAIN JAVASCRIPT -->
<script src="<?php echo e(asset('vendor/AdminLTE/js/adminlte.min.js')); ?>"></script>
<!-- end: MAIN JAVASCRIPT -->
</body>
<!-- end: BODY -->
</html>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/layouts/login.blade.php ENDPATH**/ ?>