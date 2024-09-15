<?php echo Form::open(['route' => ['admin.rewards.experience'], 'method' => 'post']); ?>


<div class="box box-solid">
    <div class="box-header">
        <i class="fa fa-certificate"></i>
        <h3 class="box-title"><?php echo e(__('admin/reward/messages.give_experience')); ?></h3>
    </div>
    <div class="box-body">

        <!-- username -->
        <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
            <?php echo Form::label('username', __('admin/reward/messages.username'), ['class' => 'control-label required']); ?>

            <div class="controls">
                <?php echo Form::select('username', $users, null,
                ['class' => 'form-control username-input', 'placeholder' => '', 'required' => 'required']); ?>

                <span class="help-block"><?php echo e($errors->first('username', ':message')); ?></span>
            </div>
        </div>
        <!-- ./ username -->

        <!-- points -->
        <div class="form-group <?php echo e($errors->has('points') ? 'has-error' : ''); ?>">
            <?php echo Form::label('points', __('admin/reward/messages.points'), array('class' => 'control-label required')); ?>

            <div class="controls">
                <?php echo Form::select('points', [
                '5' => __('admin/reward/messages.points_value', ['points' => '5']),
                '10' => __('admin/reward/messages.points_value', ['points' => '10']),
                '25' => __('admin/reward/messages.points_value', ['points' => '25']),
                ], null, ['class' => 'form-control', 'required' => 'required']); ?>

                <span class="help-block"><?php echo e($errors->first('points', ':message')); ?></span>
            </div>
        </div>
        <!-- ./ points -->

        <!-- message -->
        <div class="form-group <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
            <?php echo Form::label('message', __('admin/reward/messages.why_u_reward'), ['class' => 'control-label']); ?>

            <div class="controls">
                <?php echo Form::textarea('message', null, ['class' => 'form-control', 'rows' => '3']); ?>

                <span class="help-block"><?php echo e($errors->first('message', ':message')); ?></span>
            </div>
        </div>
        <!-- ./ message -->
    </div>
    <div class="box-footer">
        <?php echo Form::button(__('button.save') . ' <i class="fa fa-floppy-o"></i>', ['type' => 'submit', 'class' => 'btn btn-success']); ?>

    </div>
</div>

<?php echo Form::close(); ?>




<?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/reward/_form_experience.blade.php ENDPATH**/ ?>