<div class="row">
    <div class="col-xs-12">
        <?php if (! (empty($user->present()->bio))): ?>
        <blockquote class="blockquote">
            <p class="mb-0">
            <?php echo e($user->present()->bio); ?>

            </p>
            <footer class="blockquote-footer"><?php echo e($user->name); ?></footer>
        </blockquote>
        <?php endif; ?>
    </div>
</div>

<!-- unlocked badges -->
<h3><?php echo e(__('user/profile.unlocked_badges')); ?></h3>
<p class="text-muted"><?php echo e(__('user/profile.badge_detail_help')); ?></p>

<div class="row">
    <?php echo $__env->renderEach('profile._badge_unlocked', $user->unlockedBadges(), 'badge', 'profile._badges_none'); ?>
</div>
<!-- ./unlocked badges -->

<!-- locked badges -->
<h3><?php echo e(__('user/profile.locked_badges')); ?></h3>

<div class="row">
    <?php echo $__env->renderEach('profile._badge_locked', $user->lockedBadges(), 'badge', 'profile._badges_none'); ?>
</div>
<!-- ./unlocked badges -->




<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/profile/_overview.blade.php ENDPATH**/ ?>