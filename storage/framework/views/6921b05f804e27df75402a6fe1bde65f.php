<div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="fa fa-level-up"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Next level</span>
        <span class="info-box-number"><?php echo e($next_level_name); ?></span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo e($percentage_to_next_level); ?>%"></div>
        </div>
        <span class="progress-description">You need <?php echo e($points_to_next_level); ?> XP more to get a new level</span>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/question/_next_level_box.blade.php ENDPATH**/ ?>