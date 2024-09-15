<?php $__env->startSection('title', __('admin/badge/title.badge_edit')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/badge/title.badge_edit')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li>
        <a href="<?php echo e(route('admin.badges.index')); ?>">
            <?php echo e(__('admin/site.badges')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/badge/title.badge_edit')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    
    <?php echo Form::model($badge, ['route' => ['admin.badges.update', $badge], 'method' => 'put', 'files' => true]); ?>


    <div class="box box-solid">
        <div class="box-header with-border">
            <h2 class="box-title">
                <?php echo e($badge->present()->nameWithStatusBadge()); ?>

            </h2>
        </div>
        <div class="box-body">
            <div class="row">

                <!-- right column -->
                <div class="col-md-6">

                    <fieldset>
                        <!-- name -->
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('name', __('admin/badge/model.name'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ name -->

                        <!-- description -->
                        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('description', __('admin/badge/model.description'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                <span class="help-block"><?php echo e($errors->first('description', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ description -->
                    </fieldset>

                    <fieldset>
                        <!-- required_repetitions -->
                        <div class="form-group <?php echo e($errors->has('required_repetitions') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('required_repetitions', __('admin/badge/model.required_repetitions'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::number('required_repetitions', null, ['class' => 'form-control', 'required' => 'required', 'min' => '1']); ?>

                                <p class="text-muted"><?php echo e(__('admin/badge/model.required_repetitions_help')); ?></p>
                                <span class="help-block"><?php echo e($errors->first('required_repetitions', ':message')); ?></span>

                            </div>
                        </div>
                        <!-- ./ required_repetitions -->

                        <!-- actuators -->
                        <div class="form-group <?php echo e($errors->has('actuators') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('actuators', __('admin/badge/model.actuators'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php echo Form::select('actuators', \Gamify\Enums\BadgeActuators::toSelectArray(), old('actuators', $badge->actuators->value), ['class' => 'form-control actuators-select', 'required' => 'required', 'id' => 'actuators']); ?>

                                <p class="text-muted"><?php echo e(__('admin/badge/model.actuators_help')); ?></p>
                                <span class="help-block"><?php echo e($errors->first('actuators', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ actuators -->

                        <!-- tags -->
                        <div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>" id="tags-selector">
                            <?php echo Form::label('tags', __('admin/badge/model.tags'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php if (isset($component)) { $__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf = $attributes; } ?>
<?php $component = Gamify\View\Components\Tags\FormSelectTags::resolve(['name' => 'tags','placeholder' => __('admin/badge/model.tags_placeholder'),'selectedTags' => old('tags', $badge->tagArrayNormalized)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tags.form-select-tags'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Gamify\View\Components\Tags\FormSelectTags::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-control']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf)): ?>
<?php $attributes = $__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf; ?>
<?php unset($__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf)): ?>
<?php $component = $__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf; ?>
<?php unset($__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf); ?>
<?php endif; ?>
                                <p class="text-muted"><?php echo e(__('admin/badge/model.tags_help')); ?></p>
                            </div>
                        </div>
                        <!-- ./ tags -->
                    </fieldset>

                </div>
                <!-- ./left column -->

                <!-- right column -->
                <div class="col-md-6">

                    <!-- image -->
                    <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('image', __('admin/badge/model.image'), ['class' => 'control-label required']); ?>

                        <p class="text-muted"><?php echo e(__('admin/badge/model.image_help')); ?></p>
                        <div class="controls">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 150px; height: 150px;">
                                    <?php echo e($badge->present()->imageTag()); ?>

                                </div>

                                <!-- image buttons -->
                                <div class="clearfix">

                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">
                                        <i class="fa fa-picture-o"></i> <?php echo e(__('button.pick_image')); ?>

                                    </span>
                                    <span class="fileinput-exists">
                                        <i class="fa fa-picture-o"></i> <?php echo e(__('button.upload_image')); ?>

                                    </span>
                                    <input type="file" name="image">
                                </span>
                                    <a href="#" class="fileinput-exists btn btn-default" data-dismiss="fileinput">
                                        <i class="fa fa-times"></i> <?php echo e(__('button.delete_image')); ?>

                                    </a>

                                </div>
                                <!-- ./image buttons -->

                            </div>
                        </div>
                        <span class="help-block"><?php echo e($errors->first('image', ':message')); ?></span>
                    </div>
                    <!-- ./ image -->

                    <!-- status -->
                    <div class="form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('active', __('admin/badge/model.active'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('active', ['1' => __('general.yes'), '0' => __('general.no')], null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span class="help-block"><?php echo e($errors->first('active', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ status -->

                    <!-- danger zone -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <strong><?php echo app('translator')->get('admin/badge/messages.danger_zone_section'); ?></strong>
                        </div>
                        <div class="panel-body">
                            <p><strong><?php echo app('translator')->get('admin/badge/messages.delete_button'); ?></strong></p>
                            <p><?php echo app('translator')->get('admin/badge/messages.delete_help'); ?></p>

                            <div class="text-center">
                                <button type="button" class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#confirmationModal">
                                    <?php echo app('translator')->get('admin/badge/messages.delete_button'); ?>
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
            <!-- form actions -->
            <?php echo Form::button(__('button.save'), ['type' => 'submit', 'class' => 'btn btn-success']); ?>

            <a href="<?php echo e(route('admin.badges.index')); ?>" class="btn btn-link" role="button">
                <?php echo e(__('general.back')); ?>

            </a>
            <!-- ./ form actions -->
        </div>

    </div>
    <?php echo Form::close(); ?>


    <!-- confirmation modal -->
    <?php if (isset($component)) { $__componentOriginal8dabef0e0dc06f04666a952c63f3688e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.confirmation','data' => ['action' => ''.e(route('admin.badges.destroy', $badge)).'','confirmationText' => ''.e($badge->name).'','buttonText' => ''.e(__('admin/badge/messages.delete_confirmation_button')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modals.confirmation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('admin.badges.destroy', $badge)).'','confirmationText' => ''.e($badge->name).'','buttonText' => ''.e(__('admin/badge/messages.delete_confirmation_button')).'']); ?>

        <div class="alert alert-warning" role="alert">
            <?php echo app('translator')->get('admin/badge/messages.delete_confirmation_warning', ['name' => $badge->name]); ?>
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
    <link rel="stylesheet"
          href="<?php echo e(asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script
        src="<?php echo e(asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>

    <script>
        $(function () {

            $('#actuators').change(function () {
                $(this).find("option:selected").each(function () {
                    let optionValue = parseInt($(this).attr("value"));
                    if (isTaggable(optionValue)) {
                        enableTags();
                    } else {
                        disableTags();
                    }
                });
            }).change();

            function isTaggable(value) {
                return !($.inArray(value, [<?php echo e(\Gamify\Enums\BadgeActuators::triggeredByQuestionsList()); ?>]) === -1);
            }

            function enableTags() {
                $('#tags-selector').show();
                $('#tags').prop('disabled', false)
            }

            function disableTags() {
                $('#tags-selector').hide();
                $('#tags').prop('disabled', true)
            }

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/badge/edit.blade.php ENDPATH**/ ?>