<!DOCTYPE html>
<html lang="en">
<!-- start: HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', 'Play Area'); ?> :: <?php echo e(config('app.name', 'gamify')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- start: META -->
    <meta content="TechQuest: Uma Plataforma de Gamificação" name="description">
    <meta content="TechQuest Team" name="author">
    <?php echo $__env->yieldContent('meta'); ?>
    <!-- end: META -->
    <!-- start: GLOBAL CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/css/skins/skin-blue.min.css')); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo e(asset('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('//oss.maxcdn.com/respond/1.4.2/respond.min.js')); ?>"></script>
    <![endif]-->
    <!-- end: GLOBAL CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <?php echo $__env->yieldPushContent('styles'); ?>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="skin-blue layout-top-nav">
<!-- start: MAIN CONTAINER -->
<div class="wrapper">

    <!-- start: HEADER -->
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end: HEADER -->

    <!-- start: PAGE -->
    <div class="content-wrapper">
        <div class="container">
            <!-- start: PAGE HEADER -->
            <section class="content-header">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <h1>
                    <?php echo $__env->yieldContent('header', 'Title <small>page description</small>'); ?>
                </h1>
                <ol class="breadcrumb">
                    <?php echo $__env->yieldContent('breadcrumbs'); ?>
                </ol>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </section>
            <!-- end: PAGE HEADER -->

            <!-- start: PAGE CONTENT -->
            <section class="content">

                <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </section>
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
    <!-- end: PAGE -->

    <!-- start: FOOTER -->
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end: FOOTER -->
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: GLOBAL JAVASCRIPT -->
<script src="<?php echo e(asset('vendor/AdminLTE/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/AdminLTE/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/AdminLTE/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<!-- end: GLOBAL JAVASCRIPT -->
<!-- start: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
<?php echo $__env->yieldPushContent('scripts'); ?>
<!-- end: JAVASCRIPT REQUIRED FOR THIS PAGE ONLY -->
</body>
<!-- end: BODY -->
</html>
<?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/layouts/master.blade.php ENDPATH**/ ?>