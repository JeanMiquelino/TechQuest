<?php $__env->startSection('title'); ?>
    <?php echo e(__('admin/user/title.create_a_new_user')); ?> :: <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/user/title.create_a_new_user')); ?>

    <small>add a new user</small>
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
        <?php echo e(__('admin/user/title.create_a_new_user')); ?>

    </li>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    
    <?php echo Form::open(['route' => ['admin.users.store'], 'method' => 'post']); ?>


    <div class="box box-solid">
        <div class="box-body">
            <div class="row">

                <!-- right column -->
                <div class="col-md-6">
                    <!-- username -->
                    <div class="form-group">
                        <?php echo Form::label('username', __('admin/user/model.username'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::text('username', null, ['class' => 'form-control', 'required' => 'required']); ?>

                            <span class="help-block"><?php echo e($errors->first('username', ':message')); ?></span>
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

                </div>
                <!-- ./left column -->

                <!-- right column -->
                <div class="col-md-6">

                    <!-- role -->
                    <div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('role', __('admin/user/model.role'), ['class' => 'control-label required']); ?>

                        <div class="controls">
                            <?php echo Form::select('role', \Gamify\Enums\Roles::asSelectArray(), \Gamify\Enums\Roles::Player, ['class' => 'form-control', 'required' => 'required']); ?>

                            <p class="text-muted"><?php echo e(__('admin/user/messages.roles_help')); ?></p>
                            <span class="help-block"><?php echo e($errors->first('role', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- ./ role -->

                </div>
                <!-- ./right column -->

            </div>
        </div>

        <div class="box-footer">
            <!-- form actions -->
            <?php echo Form::button(__('button.save'), ['type' => 'submit', 'class' => 'btn btn-success']); ?>

            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-link" role="button">
                <?php echo e(__('general.back')); ?>

            </a>
            <!-- ./ form actions -->
        </div>

    </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/user/create.blade.php ENDPATH**/ ?>