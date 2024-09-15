<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="<?php echo e($user->profile->avatarUrl); ?>" class="user-image"
             alt="<?php echo e(__('user/profile.avatar')); ?>"/>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs"><?php echo e($user->name); ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="<?php echo e($user->profile->avatarUrl); ?>" class="img-circle"
                 alt="<?php echo e(__('user/profile.avatar')); ?>"/>
            <p>
                <?php echo e($user->name); ?> - <?php echo e($user->level); ?>

                <small><?php echo e(__('user/profile.user_since')); ?> <?php echo e($user->present()->createdAt); ?></small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-12 text-center">
                <a href="#"><?php echo e(__('site.my_achievements')); ?></a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?php echo e(route('account.index')); ?>" class="btn btn-default btn-flat">
                    <?php echo e(__('site.my_profile')); ?>

                </a>
            </div>
            <div class="pull-right">
                <form method="post" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <input class="btn btn-default btn-flat" type="submit" value="<?php echo e(__('auth.logout')); ?>">
                </form>
            </div>
        </li>
    </ul>
</li>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/partials/user_dropdown.blade.php ENDPATH**/ ?>