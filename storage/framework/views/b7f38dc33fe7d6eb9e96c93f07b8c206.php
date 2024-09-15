<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo e(__('admin/question/title.question_management')); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/question/title.question_management')); ?>

    <small>create and edit questions</small>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li class="active">
        <a href="<?php echo e(route('admin.questions.index')); ?>">
            <?php echo e(__('admin/site.questions')); ?>

        </a>
    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.notifications -->

    <!-- actions -->
    <a href="<?php echo e(route('admin.questions.create')); ?>">
        <button type="button" class="btn btn-success margin-bottom">
            <i class="fa fa-plus"></i> <?php echo e(__('admin/question/title.create_a_new_question')); ?>

        </button>
    </a>
    <!-- /.actions -->
    <div class="box">
        <div class="box-body">
            <table id="questions" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="col-md-4"><?php echo e(__('admin/question/model.name')); ?></th>
                    <th class="col-md-3"><?php echo e(__('admin/question/model.tags')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/question/model.status')); ?></th>
                    <th class="col-md-2"><?php echo e(__('admin/question/model.publication_date')); ?></th>
                    <th class="col-md-2"><?php echo e(__('general.actions')); ?></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="col-md-4"><?php echo e(__('admin/question/model.name')); ?></th>
                    <th class="col-md-3"><?php echo e(__('admin/question/model.tags')); ?></th>
                    <th class="col-md-1"><?php echo e(__('admin/question/model.status')); ?></th>
                    <th class="col-md-2"><?php echo e(__('admin/question/model.publication_date')); ?></th>
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
            $('#questions').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/<?php echo e(__('site.dataTablesLang')); ?>.json"
                },
                "ajax": "<?php echo e(route('admin.questions.data')); ?>",
                "columns": [
                    {data: "name"},
                    {data: "tags"},
                    {data: "status"},
                    {data: "publication_date"},
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/admin/question/index.blade.php ENDPATH**/ ?>