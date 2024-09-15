<?php $__env->startSection('title', __('admin/level/title.level_update')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/level/title.level_update')); ?>

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
        <?php echo e(__('admin/level/title.level_edit')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <?php echo e(Form::model($level, [
            'route' => ['admin.levels.update', $level],
            'method' => 'put',
            'files' => true,
            ])); ?>



    <div class="box box-solid">
        <div class="box-header with-border">
            <h2 class="box-title">
                <?php echo e($level->present()->nameWithStatusBadge()); ?>

            </h2>
        </div>
        <div class="box-body">
            <div class="row">

                <!-- right column -->
                <div class="col-md-6">
                    <!-- name -->
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <?php echo e(Form::label('name', __('admin/level/model.name'),['class' => 'control-label required'])); ?>

                        <div class="controls">
                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ name -->

                    <!-- required_points -->
                    <div class="form-group <?php echo e($errors->has('required_points') ? 'has-error' : ''); ?>">
                        <?php echo e(Form::label('required_points', __('admin/level/model.required_points'), ['class' => 'control-label required'])); ?>

                        <div class="controls">
                            <?php echo e(Form::number('required_points', null, array('class' => 'form-control', 'required' => 'required', 'min' => '0'))); ?>

                            <span class="help-block"><?php echo e($errors->first('required_points', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ required_points -->

                    <!-- activation status -->
                    <div class="form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                        <?php echo e(Form::label('active', __('admin/level/model.active'), array('class' => 'control-label required'))); ?>

                        <div class="controls">
                            <?php echo e(Form::select('active', array('1' => __('general.yes'), '0' => trans('general.no')), null, array('class' => 'form-control', 'required' => 'required'))); ?>

                            <?php echo e($errors->first('active', '<span class="help-inline">:message</span>')); ?>

                        </div>
                    </div>
                    <!-- ./ activation status -->

                </div>
                <!-- ./left column -->

                <!-- right column -->
                <div class="col-md-6">

                    <!-- image -->
                    <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('image', __('admin/level/model.image'), ['class' => 'control-label required']); ?>

                        <p class="text-muted"><?php echo e(__('admin/level/model.image_help')); ?></p>
                        <div class="controls">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 150px; height: 150px;">
                                    <?php echo e($level->present()->imageTag()); ?>

                                </div>
                                <p>
                             <span class="btn btn-default btn-file">
                                <span class="fileinput-new">
                                    <i class="fa fa-picture-o"></i> <?php echo e(__('button.pick_image')); ?>

                                </span>
                                <span class="fileinput-exists">
                                    <i class="fa fa-picture-o"></i> <?php echo e(__('button.upload_image')); ?>

                                </span>
                                <?php echo Form::file('image'); ?>

                            </span>
                                    <a href="#" class="btn fileinput-exists btn-default" data-dismiss="fileinput">
                                        <i class="fa fa-times"></i> <?php echo e(__('button.delete_image')); ?>

                                    </a>
                                </p>
                            </div>
                        </div>
                        <span class="help-block"><?php echo e($errors->first('image', ':message')); ?></span>
                    </div>
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
                <!-- ./right column -->

            </div>
        </div>

        <div class="box-footer">
            <!-- Form Actions -->
            <?php echo e(Form::button(__('button.save'), ['type' => 'submit', 'class' => 'btn btn-success'])); ?>

            <a href="<?php echo e(route('admin.levels.index')); ?>" class="btn btn-link" role="button">
                <?php echo e(__('general.back')); ?>

            </a>
            <!-- ./ form actions -->
        </div>

    </div>
    <?php echo e(Form::close()); ?>


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


<?php $__env->startPush('styles'); ?>
    <!-- File Input -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <!-- File Input -->
    <script type="text/javascript" src="<?php echo e(asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/level/edit.blade.php ENDPATH**/ ?>