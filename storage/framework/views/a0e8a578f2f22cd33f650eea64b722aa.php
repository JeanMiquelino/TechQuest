<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($question->name); ?></h3>
    </div>
    <div class="box-body">
        <div id="question_statement">
            <?php echo e($question->present()->statement); ?>

        </div>

        <?php if($question->solution): ?>
            <div id="question_explanation" class="bg-success">
                <h4><?php echo e(__('question/messages.explained_answer')); ?></h4>
                <?php echo e($question->present()->explanation); ?>

            </div>
        <?php endif; ?>

        <h4>
            <?php if($question->type == 'single'): ?>
                <?php echo e(__('question/messages.single_choice')); ?>

            <?php else: ?>
                <?php echo e(__('question/messages.multiple_choices')); ?>

            <?php endif; ?>
        </h4>

        <ul class="list-group">
            <?php $__currentLoopData = $question->choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <?php if($choice->isCorrect()): ?>
                        <span class="glyphicon glyphicon-ok"></span>
                        <span class="label label-success pull-right">
                                <?php echo e(__('question/messages.choice_score', ['points' => $choice->score])); ?>

                            </span>
                    <?php else: ?>
                        <span class="glyphicon glyphicon-remove"></span>
                        <span class="label label-danger pull-right">
                                <?php echo e(__('question/messages.choice_score', ['points' => $choice->score])); ?>

                            </span>
                    <?php endif; ?>

                    <?php if($response->hasChoice($choice->id)): ?>
                        <span class="glyphicon glyphicon-flag"></span>
                    <?php endif; ?>

                    <?php echo e($choice->text); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li class="list-group-item bg-gray text-center">
                <p class="text-muted">
                    <?php echo e(__('question/messages.legend')); ?>

                    <span class="glyphicon glyphicon-ok"></span> <?php echo e(__('question/messages.correct_answer')); ?>

                    <span class="glyphicon glyphicon-remove"></span> <?php echo e(__('question/messages.incorrect_answer')); ?>

                    <span class="glyphicon glyphicon-flag"></span> <?php echo e(__('question/messages.your_choice')); ?>

                </p>
            </li>
        </ul>

        <div class="callout callout-info">
            <?php echo e(__('question/messages.obtained_points')); ?>:
            <strong><?php echo e(__('question/messages.choice_score', ['points' => $response->score()])); ?></strong>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/question/_show_question_answer.blade.php ENDPATH**/ ?>