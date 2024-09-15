<?php $__env->startSection('title'); ?>
    <?php echo e(__('admin/reward/messages.title')); ?> :: <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/reward/messages.title')); ?>

    <small><?php echo e(__('admin/reward/messages.header')); ?></small>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/site.rewards')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <div class="row">
        <div class="col-md-6">
            <?php echo $__env->make('admin/reward/_form_experience', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-6">
            <?php echo $__env->make('admin/reward/_form_badge', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <!-- Select2 -->
    <script type="text/javascript" src="<?php echo e(asset('vendor/AdminLTE/plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script>
        $(function () {
            $(".username-input").select2({
                placeholder: "<?php echo e(__('admin/reward/messages.pick_user')); ?>",
            });
            $(".badge-input").select2({
                placeholder: "<?php echo e(__('admin/reward/messages.pick_badge')); ?>",
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/reward/index.blade.php ENDPATH**/ ?>