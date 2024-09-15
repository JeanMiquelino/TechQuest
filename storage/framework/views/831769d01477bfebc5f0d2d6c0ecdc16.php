<div class="info-box bg-green">
    <span class="info-box-icon"><i class="fa fa-question"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Perguntas</span>
        <span class="info-box-number"><?php echo e($answered_questions); ?></span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo e($percentage_of_answered_questions); ?>%"></div>
        </div>
        <span
            class="progress-description">Você respondeu <?php echo e($percentage_of_answered_questions); ?>% das perguntas.</span>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/question/_answered_questions_box.blade.php ENDPATH**/ ?>