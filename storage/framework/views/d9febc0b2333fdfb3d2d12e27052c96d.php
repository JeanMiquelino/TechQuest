<!-- start: MAIN NAVIGATION MENU -->
<ul class="sidebar-menu">
    <li class="header">Área de Administração</li>
    <li <?php echo (Request::is('admin') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i><span><?php echo e(__('admin/site.dashboard')); ?></span>
        </a>
    </li>
    <li <?php echo (Request::is('admin/users*') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.users.index')); ?>">
            <i class="fa fa-users"></i><span><?php echo e(__('admin/site.users')); ?></span>
        </a>
    </li>
    <li <?php echo (Request::is('admin/badges*') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.badges.index')); ?>">
            <i class="fa fa-trophy"></i><span><?php echo e(__('admin/site.badges')); ?></span>
        </a>
    </li>
    <li <?php echo (Request::is('admin/levels*') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.levels.index')); ?>">
            <i class="fa fa-graduation-cap"></i><span><?php echo e(__('admin/site.levels')); ?></span>
        </a>
    </li>
    <li <?php echo (Request::is('admin/questions*') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.questions.index')); ?>">
            <i class="fa fa-comments"></i><span><?php echo e(__('admin/site.questions')); ?></span>
        </a>
    </li>
    <li <?php echo (Request::is('admin/rewards*') ? ' class="active"' : ''); ?>>
        <a href="<?php echo e(route('admin.rewards.index')); ?>">
            <i class="fa fa-bank"></i><span><?php echo e(__('admin/site.rewards')); ?></span>
        </a>
    </li>
    <li class="header">Área de Jogo</li>
    <li>
        <a href="<?php echo e(route('home')); ?>">
            <i class="fa fa-gamepad"></i><span><?php echo e(__('admin/site.play_area')); ?></span>
        </a>
    </li>
</ul>
<!-- end: MAIN NAVIGATION MENU -->
<?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>