<?php $__env->startSection('title', __('site.leaderboard')); ?>


<?php $__env->startSection('header', __('site.leaderboard')); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li class="active">
        <i class="fa fa-dashboard"></i> <?php echo e(__('site.leaderboard')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <table id="ranking" class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-6">Player</th>
            <th class="col-md-3">Level</th>
            <th class="col-md-2">Points</th>
        </tr>
        </thead>

        <?php $__currentLoopData = $usersInRanking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><a href="<?php echo e(route('profiles.show', $user['username'])); ?>"><?php echo e($user['name']); ?></a></td>
                <td><?php echo e($user['level']); ?></td>
                <td><?php echo e($user['experience']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tfoot>
        <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-6">Player</th>
            <th class="col-md-3">Level</th>
            <th class="col-md-2">Points</th>
        </tr>
        </tfoot>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/leaderboard/index.blade.php ENDPATH**/ ?>