<?php $__env->startSection('title', __('admin/level/title.level_show')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/level/title.level_show')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li>
        <a href="<?php echo e(route('admin.levels.index')); ?>">
            <?php echo e(__('admin/site.levels')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/level/title.level_show')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <div class="box box-solid">
        <div class="box-header with-border">
            <h2 class="box-title">
                <?php echo e($level->present()->nameWithStatusBadge()); ?>

            </h2>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">

                    <!-- name -->
                    <dl>
                        <dt>
                            <?php echo e(__('admin/level/model.name')); ?>

                        </dt>
                        <dd>
                            <?php echo e($level->name); ?>

                        </dd>
                    </dl>
                    <!-- ./ name -->

                    <!-- required_points -->
                    <dl>
                        <dt>
                            <?php echo e(__('admin/level/model.required_points')); ?>

                        </dt>
                        <dd>
                            <?php echo e($level->required_points); ?>

                        </dd>
                    </dl>
                    <!-- ./ required_points -->

                    <!-- Activation Status -->
                    <dl>
                        <dt>
                            <?php echo e(__('admin/level/model.active')); ?>

                        </dt>
                        <dd>
                            <?php echo e($level->present()->status()); ?>

                        </dd>
                    </dl>
                    <!-- ./ activation status -->

                </div>
                <div class="col-md-6">

                    <!-- image -->
                    <dl>
                        <dt>
                            <?php echo e(__('admin/level/model.image')); ?>

                        </dt>
                        <dd>
                            <?php echo e($level->present()->imageThumbnail()); ?>

                        </dd>
                    </dl>
                    <!-- ./ image -->

                    <!-- danger zone -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <strong><?php echo app('translator')->get('admin/level/messages.danger_zone_section'); ?></strong>
                        </div>
                        <div class="panel-body">
                            <p><strong><?php echo app('translator')->get('admin/level/messages.delete_button'); ?></strong></p>
                            <p><?php echo app('translator')->get('admin/level/messages.delete_help'); ?></p>

                            <div class="text-center">
                                <button type="button" class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#confirmationModal">
                                    <?php echo app('translator')->get('admin/level/messages.delete_button'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- ./danger zone -->

                </div>
            </div>

        </div>
        <div class="box-footer">
            <a href="<?php echo e(route('admin.levels.edit', $level)); ?>">
                <button type="button" class="btn btn-primary">
                    <?php echo e(__('general.edit')); ?>

                </button>
            </a>

            <a href="<?php echo e(route('admin.levels.index')); ?>" class="btn btn-link" role="button">
                <?php echo e(__('general.back')); ?>

            </a>
        </div>
    </div>

    <!-- confirmation modal -->
    <?php if (isset($component)) { $__componentOriginal8dabef0e0dc06f04666a952c63f3688e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.confirmation','data' => ['action' => ''.e(route('admin.levels.destroy', $level)).'','confirmationText' => ''.e($level->name).'','buttonText' => ''.e(__('admin/level/messages.delete_confirmation_button')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modals.confirmation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('admin.levels.destroy', $level)).'','confirmationText' => ''.e($level->name).'','buttonText' => ''.e(__('admin/level/messages.delete_confirmation_button')).'']); ?>

        <div class="alert alert-warning" role="alert">
            <?php echo app('translator')->get('admin/level/messages.delete_confirmation_warning', ['name' => $level->name]); ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8dabef0e0dc06f04666a952c63f3688e)): ?>
<?php $attributes = $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e; ?>
<?php unset($__attributesOriginal8dabef0e0dc06f04666a952c63f3688e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8dabef0e0dc06f04666a952c63f3688e)): ?>
<?php $component = $__componentOriginal8dabef0e0dc06f04666a952c63f3688e; ?>
<?php unset($__componentOriginal8dabef0e0dc06f04666a952c63f3688e); ?>
<?php endif; ?>
    <!-- ./ confirmation modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/level/show.blade.php ENDPATH**/ ?>