<?php $__env->startSection('title', __('admin/level/title.create_a_new_level')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/level/title.create_a_new_level')); ?>

    <small><?php echo e(__('admin/level/title.create_a_new_level_desc')); ?></small>
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
        <?php echo e(__('admin/level/title.create_a_new_level')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <?php echo Form::open(['route' => ['admin.levels.store'], 'method' => 'post', 'files' => true]); ?>


    <div class="box box-solid">
        <div class="box-body">
            <div class="row">

                <!-- right column -->
                <div class="col-md-6">
                    <!-- name -->
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('name', __('admin/level/model.name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ name -->

                    <!-- required_points -->
                    <div class="form-group <?php echo e($errors->has('required_points') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('required_points', __('admin/level/model.required_points'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::number('required_points', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0']); ?>

                            <span class="help-block"><?php echo e($errors->first('required_points', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ required_points -->

                    <!-- activation status -->
                    <div class="form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('active', __('admin/level/model.active'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('active', ['1' => __('general.yes'), '0' => __('general.no')], null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span
                                class="help-block"><?php echo e($errors->first('active', '<span class="help-inline">:message</span>')); ?></span>
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
                                </div>
                                <p>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new"><i
                                        class="fa fa-picture-o"></i> <?php echo e(__('button.pick_image')); ?></span>
                                <span class="fileinput-exists"><i
                                        class="fa fa-picture-o"></i> <?php echo e(__('button.upload_image')); ?></span>
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

                </div>
                <!-- ./right column -->

            </div>
        </div>

        <div class="box-footer">
            <!-- Form Actions -->
            <?php echo Form::button(__('button.save'), ['type' => 'submit', 'class' => 'btn btn-success']); ?>


            <a href="<?php echo e(route('admin.levels.index')); ?>"  class="btn btn-link" role="button">
                    <?php echo e(__('general.back')); ?>

            </a>
            <!-- ./ form actions -->
        </div>

    </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
    <!-- File Input -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <!-- File Input -->
    <script type="text/javascript" src="<?php echo e(asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/level/create.blade.php ENDPATH**/ ?>