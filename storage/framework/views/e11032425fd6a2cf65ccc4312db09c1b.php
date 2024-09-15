<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('title', __('admin/user/title.user_management')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/user/title.user_management')); ?>

    <small><?php echo e(__('admin/user/title.user_management_desc')); ?></small>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(route('admin.users.index')); ?>">
            <?php echo e(__('admin/site.users')); ?>

        </a>
    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <!-- actions -->
    <a href="<?php echo e(route('admin.users.create')); ?>">
        <button type="button" class="btn btn-success margin-bottom">
            <i class="fa fa-plus"></i> <?php echo e(__('admin/user/title.create_a_new_user')); ?>

        </button>
    </a>
    <!-- /.actions -->

    <div class="box">
        <div class="box-body">
            <table id="users" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="col-md-2"><?php echo e(__('admin/user/model.username')); ?></th>
                    <th class="col-md-3"><?php echo e(__('admin/user/model.name')); ?></th>
                    <th class="col-md-2"><?php echo e(__('admin/user/model.email')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/user/model.role')); ?></th>
                    <th class="col-md-1"><?php echo e(__('user/profile.level')); ?></th>
                    <th class="col-md-1"><?php echo e(__('user/profile.experience')); ?></th>
                    <th class="col-md-2"><?php echo e(__('general.actions')); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="col-md-2"><?php echo e(__('admin/user/model.username')); ?></th>
                    <th class="col-md-3"><?php echo e(__('admin/user/model.name')); ?></th>
                    <th class="col-md-2"><?php echo e(__('admin/user/model.email')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/user/model.role')); ?></th>
                    <th class="col-md-1"><?php echo e(__('user/profile.level')); ?></th>
                    <th class="col-md-1"><?php echo e(__('user/profile.experience')); ?></th>
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
            $('#users').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/<?php echo e(__('site.dataTablesLang')); ?>.json"
                },
                "ajax": "<?php echo e(route('admin.users.data')); ?>",
                "columns": [
                    {data: "username"},
                    {data: "name"},
                    {data: "email"},
                    {data: "role"},
                    {data: "level"},
                    {data: "experience"},
                    {data: "actions", "orderable": false, "searchable": false}
                ],
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/admin/user/index.blade.php ENDPATH**/ ?>