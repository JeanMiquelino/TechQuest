<div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="fa fa-level-up"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Próximo Nível</span>
        <span class="info-box-number"><?php echo e($next_level_name); ?></span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo e($percentage_to_next_level); ?>%"></div>
        </div>
        <span class="progress-description">Você precisa de mais <?php echo e($points_to_next_level); ?> pontos de XP.</span>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/question/_next_level_box.blade.php ENDPATH**/ ?>