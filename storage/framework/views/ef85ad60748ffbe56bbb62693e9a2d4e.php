<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(__('user/profile.about_me')); ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="text-center">
            <?php if($user->profile->facebook): ?>
                <a class="btn btn-social-icon btn-facebook" href="<?php echo e($user->profile->facebook); ?>"
                   rel="nofollow">
                    <i class="fa fa-facebook"></i>
                </a>
            <?php else: ?>
                <button type="button" class="btn btn-social-icon btn-facebook disabled">
                    <i class="fa fa-facebook"></i>
                </button>
            <?php endif; ?>
            <?php if($user->profile->twitter): ?>
                <a class="btn btn-social-icon btn-twitter" href="<?php echo e($user->profile->twitter); ?>"
                   rel="nofollow">
                    <i class="fa fa-twitter"></i>
                </a>
            <?php else: ?>
                <button type="button" class="btn btn-social-icon btn-twitter disabled">
                    <i class="fa fa-twitter"></i>
                </button>
            <?php endif; ?>
            <?php if($user->profile->linkedin): ?>
                <a class="btn btn-social-icon btn-linkedin" href="<?php echo e($user->profile->linkedin); ?>"
                   rel="nofollow">
                    <i class="fa fa-linkedin"></i>
                </a>
            <?php else: ?>
                <button type="button" class="btn btn-social-icon btn-linkedin disabled">
                    <i class="fa fa-linkedin"></i>
                </button>
            <?php endif; ?>
            <?php if($user->profile->github): ?>
                <a class="btn btn-social-icon btn-github" href="<?php echo e($user->profile->github); ?>"
                   rel="nofollow">
                    <i class="fa fa-github"></i>
                </a>
            <?php else: ?>
                <button type="button" class="btn btn-social-icon btn-github disabled">
                    <i class="fa fa-github"></i>
                </button>
            <?php endif; ?>
        </div>
        <hr>
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th colspan="2"><?php echo e(__('user/profile.general_info')); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo e(__('user/profile.level')); ?>:</td>
                <td><?php echo e($user->level); ?></td>
            </tr>
            <tr>
                <td><?php echo e(__('user/profile.badges')); ?>:</td>
                <td><?php echo e($user->unlockedBadgesCount()); ?></td>
            </tr>
            <tr>
                <td><?php echo e(__('user/profile.experience')); ?>:</td>
                <td><?php echo e($user->experience); ?></td>
            </tr>
            <tr>
                <td><?php echo e(__('user/profile.user_since')); ?>:</td>
                <td><?php echo e($user->present()->createdAt); ?></td>
            </tr>
            <tr>
                <td><?php echo e(__('user/profile.roles')); ?>:</td>
                <td><?php echo e($user->present()->role); ?></td>
            </tr>
            </tbody>
        </table>
        <hr>
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th colspan="2"><?php echo e(__('user/profile.additional_info')); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo e(__('user/profile.date_of_birth')); ?></td>
                <td>
                    <?php echo e($user->present()->birthdate); ?>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/profile/_about_me.blade.php ENDPATH**/ ?>