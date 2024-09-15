<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('title', __('admin/level/title.level_management')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/level/title.level_management')); ?>

    <small><?php echo e(__('admin/level/title.level_management_desc')); ?></small>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/site.levels')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <!-- actions -->
    <a href="<?php echo e(route('admin.levels.create')); ?>">
        <button type="button" class="btn btn-success margin-bottom">
            <i class="fa fa-plus"></i> <?php echo e(__('admin/level/title.create_a_new_level')); ?>

        </button>
    </a>
    <!-- /.actions -->
    <div class="box">
        <div class="box-body">
            <table id="levels" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="col-md-7"><?php echo e(__('admin/level/model.name')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.image')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.required_points')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.active')); ?></th>
                    <th class="col-md-2"><?php echo e(__('general.actions')); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="col-md-7"><?php echo e(__('admin/level/model.name')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.image')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.required_points')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/level/model.active')); ?></th>
                    <th class="col-md-2"><?php echo e(__('general.actions')); ?></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript"
            src="<?php echo e(asset('vendor/AdminLTE/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript"
            src="<?php echo e(asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

    <script>
        $(function () {
            $('#levels').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/<?php echo e(__('site.dataTablesLang')); ?>.json"
                },
                "ajax": "<?php echo e(route('admin.levels.data')); ?>",
                "columns": [
                    {data: "name"},
                    {data: "image", "orderable": false, "searchable": false},
                    {data: "required_points"},
                    {data: "active"},
                    {data: "actions", "orderable": false, "searchable": false}
                ],
                "order": [[2, "asc"]],
                "aLengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "<?php echo e(__('general.all')); ?>"]
                ],
                // set the initial value
                "iDisplayLength": 10,
                "autoWidth": false
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/level/index.blade.php ENDPATH**/ ?>