<?php $__env->startSection('title'); ?>
    <?php echo e(__('site.play')); ?> :: <?php echo e($question->name); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('site.play')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

        </a>
    </li>
    <li>
        <a href="<?php echo e(route('questions.index')); ?>">
            <?php echo e(__('site.play')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e($question->name); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->renderUnless(is_null($response), 'question._show_question_answer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php echo $__env->renderWhen(is_null($response), 'question._show_question_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/question/show.blade.php ENDPATH**/ ?>