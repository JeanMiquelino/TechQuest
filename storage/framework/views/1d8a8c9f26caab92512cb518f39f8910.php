<div class="box">
    <div class="box-header with-border">
        <i class="fa fa-users"></i>
        <h3 class="box-title">Latest registered users</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo e(__('admin/user/model.username')); ?></th>
                <th><?php echo e(__('admin/user/model.name')); ?></th>
                <th><?php echo e(__('admin/user/model.email')); ?></th>
                <th><?php echo e(__('admin/user/model.created_at')); ?></th>
            </tr>
            </thead>
            <?php $__currentLoopData = $latest_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/admin/dashboard/_latest_registered_users.blade.php ENDPATH**/ ?>