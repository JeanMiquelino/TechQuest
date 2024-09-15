<ul class="nav navbar-nav">

    <?php if(auth()->guard()->check()): ?>
    <li class="<?php echo e(request()->is('/') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('home')); ?>">
            <?php echo e(__('site.home')); ?>

            <?php if( request()->is('/')): ?>
                <span class="sr-only">(current)</span>
            <?php endif; ?>
        </a>
    </li>

    <li class="<?php echo e(request()->is('questions*') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('questions.index')); ?>">
            <?php echo e(__('site.play')); ?>

            <?php if( request()->is('questions*')): ?>
                <span class="sr-only">(current)</span>
            <?php endif; ?>
        </a>
    </li>
    <?php endif; ?>

    <li class="<?php echo e(request()->is('leaderboard') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('leaderboard')); ?>">
            <?php echo e(__('site.leaderboard')); ?>

            <?php if( request()->is('leaderboard')): ?>
                <span class="sr-only">(current)</span>
            <?php endif; ?>
        </a>
    </li>

</ul>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>