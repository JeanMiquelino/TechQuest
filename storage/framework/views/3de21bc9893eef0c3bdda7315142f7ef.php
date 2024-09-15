<?php $__env->startSection('title', __('site.play')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('site.play')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('site.play')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="box box-default">
        <div class="box-body">

            <!-- user metrics -->
            <div class="row">
                <div class="col-md-6">
                    <?php echo $__env->make('question/_answered_questions_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $__env->make('question/_next_level_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- ./user metrics -->

            <!-- available-questions -->
            <div class="list-group">
                <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('questions.show', ['q_hash' => $question->hash, 'slug' => $question->slug])); ?>" class="list-group-item">
                        <h4 class="list-group-item-heading"><?php echo e($question->name); ?></h4>
                        <p class="list-group-item-text"></p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo $__env->make('question/_empty-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <!-- ./available-questions -->

        </div>
        <!-- ./box-body -->

        <!-- pagination-links -->
        <div class="box-footer clearfix">
            <?php echo e($questions->links('partials.simple-pager')); ?>

        </div>
        <!-- ./pagination-links -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/question/index.blade.php ENDPATH**/ ?>