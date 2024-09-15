<?php $__env->startSection('title', __('admin/site.dashboard')); ?>


<?php $__env->startSection('header', __('admin/site.dashboard')); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li class="active">
        <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- info boxes -->
    <div class="row">
        <?php echo $__env->make('admin.dashboard._info_boxes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- ./info boxes -->

    <div class="row">
        <section class="col-md-6 connectedSortable ui-sortable">

                <?php echo $__env->make('admin.dashboard._latest_published_questions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('admin.dashboard._next_scheduled_questions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </section>

        <section class="col-md-6 connectedSortable ui-sortable">

            <?php echo $__env->make('admin.dashboard._latest_registered_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </section>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>