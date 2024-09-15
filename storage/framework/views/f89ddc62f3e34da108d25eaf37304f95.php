<div class="info-box bg-green">
    <span class="info-box-icon"><i class="fa fa-question"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Questions</span>
        <span class="info-box-number"><?php echo e($answered_questions); ?></span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo e($percentage_of_answered_questions); ?>%"></div>
        </div>
        <span
            class="progress-description">You have answered <?php echo e($percentage_of_answered_questions); ?>% of the questions</span>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/question/_answered_questions_box.blade.php ENDPATH**/ ?>