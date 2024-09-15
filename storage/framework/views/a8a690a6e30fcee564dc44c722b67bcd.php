<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php echo e($question->hash); ?>">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion"
               href="#collapse-<?php echo e($question->hash); ?>" aria-expanded="false"
               aria-controls="collapse-<?php echo e($question->hash); ?>">
                <?php echo e($question->name); ?>

            </a>
        </h4>
    </div>
    <div id="collapse-<?php echo e($question->hash); ?>" class="panel-collapse collapse"
         role="tabpanel" aria-labelledby="heading-<?php echo e($question->hash); ?>">
        <div class="panel-body">
            <?php echo $question->excerpt(); ?>


            <a href="<?php echo e(route('questions.show', ['q_hash' => $question->hash, 'slug' => $question->slug])); ?>"
               class="btn btn-primary pull-right">More...</a>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/home/_single-question.blade.php ENDPATH**/ ?>