<?php $__env->startSection('title', __('user/profile.edit_account')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('user/profile.edit_account')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

        </a>
    </li>

    <li>
        <a href="<?php echo e(route('account.index')); ?>">
            <?php echo e(__('site.my_profile')); ?>

        </a>
    </li>

    <li class="active">
        <?php echo e(__('user/profile.edit_account')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="box box-default">
        <div class="box-body">

            <form method="post" action="<?php echo e(route('account.profile.update')); ?>" enctype="multipart/form-data" role="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

            <div class="row">
                <div class="col-md-6">

                    <!-- username -->
                    <div class="form-group">
                        <label for="username" class="control-label">
                            <?php echo e(__('user/profile.username')); ?>

                        </label>

                        <div class="controls">
                            <input class="form-control" disabled="disabled" name="username" type="text" value="<?php echo e($user->username); ?>" id="username">
                        </div>
                    </div>
                    <!-- /.username -->

                    <!-- email -->
                    <div class="form-group">
                        <label for="email" class="control-label">
                            <?php echo e(__('user/profile.email')); ?>

                        </label>

                        <div class="controls">
                            <input class="form-control" disabled="disabled" name="email" type="email" value="<?php echo e($user->email); ?>" id="email">
                        </div>
                    </div>
                    <!-- /.email -->

                    <!-- name -->
                    <div class="form-group">
                        <label for="name" class="control-label">
                            <?php echo e(__('user/profile.name')); ?>

                        </label>

                        <div class="controls">
                            <input class="form-control" name="name" type="text" value="<?php echo e($user->name); ?>" id="name">
                        </div>
                    </div>
                    <!-- /.name -->

                    <!-- date_of_birth -->
                    <div class="form-group <?php echo e($errors->has('date_of_birth') ? 'has-error' : ''); ?>">
                        <label for="date_of_birth" class="control-label">
                            <?php echo e(__('user/profile.date_of_birth')); ?>

                        </label>

                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input class="form-control date-picker" name="date_of_birth" type="text" value="<?php echo e($user->profile->date_of_birth); ?>" id="date_of_birth">
                            </div>
                            <span class="help-block"><?php echo e($errors->first('date_of_birth', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- /.date_of_birth -->

                </div>
                <div class="col-md-6">

                    <!-- avatar -->
                    <div class="form-group <?php echo e($errors->has('avatar') ? 'has-error' : ''); ?>">
                        <label for="avatar" class="control-label">
                            <?php echo e(__('user/profile.image')); ?>

                        </label>

                        <div class="controls">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 150px; height: 150px;">
                                    <img src="<?php echo e($user->profile->avatarUrl); ?>" alt="Avatar">
                                </div>
                                <p>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">
                            <i class="fa fa-picture-o"></i> <?php echo e(__('button.pick_image')); ?>

                        </span>
                        <span class="fileinput-exists">
                            <i class="fa fa-picture-o"></i> <?php echo e(__('button.upload_image')); ?>

                        </span>
                        <input name="avatar" type="file">
                    </span>
                                    <a href="#" class="btn fileinput-exists btn-default" data-dismiss="fileinput">
                                        <i class="fa fa-times"></i> <?php echo e(__('button.delete_image')); ?>

                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.avatar -->

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo e(__('user/profile.additional_info')); ?></h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- twitter -->
                    <div class="form-group <?php echo e($errors->has('twitter') ? 'has-error' : ''); ?>">
                        <label for="twitter" class="control-label">
                            <?php echo e(__('user/profile.twitter')); ?>

                        </label>

                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <input class="form-control" name="twitter" type="text" value="<?php echo e($user->profile->twitter); ?>" id="twitter">
                            </div>
                            <span class="help-block"><?php echo e($errors->first('twitter', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- /.twitter -->

                    <!-- facebook -->
                    <div class="form-group <?php echo e($errors->has('facebook') ? 'has-error' : ''); ?>">
                        <label for="facebook" class="control-label">
                            <?php echo e(__('user/profile.facebook')); ?>

                        </label>

                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <input class="form-control" name="facebook" type="text" value="<?php echo e($user->profile->facebook); ?>" id="facebook">
                            </div>
                            <span class="help-block"><?php echo e($errors->first('facebook', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- /.facebook -->

                </div>
                <div class="col-md-6">

                    <!-- linkedin -->
                    <div class="form-group <?php echo e($errors->has('linkedin') ? 'has-error' : ''); ?>">
                        <label for="linkedin" class="control-label">
                            <?php echo e(__('user/profile.linkedin')); ?>

                        </label>

                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                <input class="form-control" name="linkedin" type="text" value="<?php echo e($user->profile->linkedin); ?>" id="linkedin">
                            </div>
                            <span class="help-block"><?php echo e($errors->first('linkedin', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- /.linkedin -->

                    <!-- github -->
                    <div class="form-group <?php echo e($errors->has('github') ? 'has-error' : ''); ?>">
                        <label for="github" class="control-label">
                            <?php echo e(__('user/profile.github')); ?>

                        </label>

                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                <input class="form-control" name="github" type="text" value="<?php echo e($user->profile->github); ?>" id="github">
                            </div>
                            <span class="help-block"><?php echo e($errors->first('github', ':message')); ?></span>
                        </div>
                    </div>
                    <!-- /.github -->

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group <?php echo e($errors->has('bio') ? 'has-error' : ''); ?>">
                        <label for="bio" class="control-label">
                            <?php echo e(__('user/profile.bio')); ?>

                        </label>

                        <div class="controls">
                            <textarea class="form-control" name="bio" cols="50" rows="10" id="bio"><?php echo e($user->profile->bio); ?></textarea>
                            <span class="help-block"><?php echo e($errors->first('question', ':message')); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('button.save')); ?> <i class="fa fa-floppy-o"></i>
                    </button>
                </div>
            </div>

            </form>

        </div>
        <!-- /.box-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="<?php echo e(asset('vendor/AdminLTE/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>">
    <!-- File Input -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <!-- Date Picker -->
    <script type="text/javascript"
            src="<?php echo e(asset('vendor/AdminLTE/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <!-- File Input -->
    <script type="text/javascript"
            src="<?php echo e(asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>

    <script>
        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            endDate: '0d',
            autoclose: true
        });
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/account/profile/edit.blade.php ENDPATH**/ ?>