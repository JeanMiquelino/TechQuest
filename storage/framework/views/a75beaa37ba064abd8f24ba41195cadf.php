<?php $__env->startSection('title'); ?>
    <?php echo e(__('admin/user/title.user_update')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/user/title.user_update')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li>
        <a href="<?php echo e(route('admin.users.index')); ?>">
            <?php echo e(__('admin/site.users')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/user/title.user_update')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    
    <?php echo Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']); ?>


    <div class="box box-solid">
        <div class="box-header with-border">
            <h2 class="box-title">
                <?php echo e($user->username); ?> <?php echo e($user->present()->adminLabel); ?>

            </h2>
        </div>
        <div class="box-body">
            <div class="row">

                <!-- right column -->
                <div class="col-md-6">
                    <!-- username -->
                    <div class="form-group">
                        <?php echo Form::label('username', __('admin/user/model.username'), ['class' => 'control-label']); ?>

                        <div class="controls">
                            <?php echo Form::text('username', $user->username, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                        </div>
                    </div>
                    <!-- ./ username -->

                    <!-- name -->
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('name', __('admin/user/model.name'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ name -->

                    <!-- Email -->
                    <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('email', __('admin/user/model.email'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ email -->

                    <!-- role -->
                    <div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('role', __('admin/user/model.role'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('update-role', $user)): ?>
                                <?php echo Form::select('role', \Gamify\Enums\Roles::asSelectArray(), $user->role, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                                <?php echo Form::hidden('role', $user->role); ?>

                            <?php else: ?>
                                <?php echo Form::select('role', \Gamify\Enums\Roles::asSelectArray(), \Gamify\Enums\Roles::Player, ['class' => 'form-control', 'required' => 'required']); ?>

                                <p class="text-muted"><?php echo e(__('admin/user/messages.roles_help')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- ./ role -->

                </div>
                <!-- ./left column -->

                <!-- right column -->
                <div class="col-md-6">

                    <dl class="dl-horizontal">

                        <!-- level -->
                        <dt><?php echo e(__('user/profile.level')); ?>:</dt>
                        <dd><?php echo e($user->level); ?></dd>
                        <!-- ./ level -->

                        <!-- badges -->
                        <dt><?php echo e(__('user/profile.badges')); ?>:</dt>
                        <dd><?php echo e($user->unlockedBadgesCount()); ?></dd>
                        <!-- ./ badges -->

                        <!-- experience -->
                        <dt><?php echo e(__('user/profile.experience')); ?>:</dt>
                        <dd><?php echo e($user->experience); ?></dd>
                        <!-- ./ experience -->

                        <!-- created_at -->
                        <dt><?php echo e(__('user/profile.user_since')); ?>:</dt>
                        <dd><?php echo e($user->present()->createdAt); ?></dd>
                        <!-- ./ created_at -->

                    </dl>

                    <!-- danger zone -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-user', $user)): ?>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <strong><?php echo app('translator')->get('admin/user/messages.danger_zone_section'); ?></strong>
                            </div>
                            <div class="panel-body">
                                <p><strong><?php echo app('translator')->get('admin/user/messages.delete_button'); ?></strong></p>
                                <p><?php echo app('translator')->get('admin/user/messages.delete_help'); ?></p>

                                <div class="text-center">
                                    <button type="button" class="btn btn-danger"
                                            data-toggle="modal"
                                            data-target="#confirmationModal">
                                        <?php echo app('translator')->get('admin/user/messages.delete_button'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- ./danger zone -->

                </div>
                <!-- ./right column -->

            </div>
        </div>

        <div class="box-footer">
            <!-- form actions -->
            <?php echo Form::button(__('button.update'), ['type' => 'submit', 'class' => 'btn btn-success']); ?>

            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-link" role="button">
                <?php echo e(__('general.back')); ?>

            </a>
            <!-- ./ form actions -->
        </div>

    </div>
    <?php echo Form::close(); ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-user', $user)): ?>
        <!-- confirmation modal -->
        <?php if (isset($component)) { $__componentOriginal8dabef0e0dc06f04666a952c63f3688e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.confirmation','data' => ['action' => ''.e(route('admin.users.destroy', $user)).'','confirmationText' => ''.e($user->username).'','buttonText' => ''.e(__('admin/user/messages.delete_confirmation_button')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modals.confirmation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('admin.users.destroy', $user)).'','confirmationText' => ''.e($user->username).'','buttonText' => ''.e(__('admin/user/messages.delete_confirmation_button')).'']); ?>

            <div class="alert alert-warning" role="alert">
                <?php echo app('translator')->get('admin/user/messages.delete_confirmation_warning', ['name' => $user->username]); ?>
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
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>