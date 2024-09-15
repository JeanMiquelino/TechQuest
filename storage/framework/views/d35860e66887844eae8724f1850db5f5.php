<?php echo Form::open(array('route' => ['questions.answer', ['q_hash' => $question->hash, 'slug' => $question->slug]])); ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($question->name); ?></h3>
    </div>
    <div class="box-body">
        <div id="question_statement">
            <?php echo e($question->present()->statement); ?>

        </div>

        <fieldset id="choicesGroup">
            <p>
                <?php echo e(__('question/messages.choices')); ?>

            </p>
            <?php $__currentLoopData = $question->choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <?php if($question->type == 'single'): ?>
                        <div class="radio icheck">
                            <label><?php echo Form::radio('choices[]', $choice->id,  false); ?> <?php echo e($choice->text); ?></label>
                        </div>
                    <?php else: ?>
                        <div class="checkbox icheck">
                            <label><?php echo Form::checkbox('choices[]', $choice->id,  false); ?> <?php echo e($choice->text); ?></label>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </fieldset>

    </div>
    <div class="box-footer">
        <?php echo Form::submit(__('question/messages.send'), ['class' => 'btn btn-primary', 'id' => 'btnSubmit']); ?>

    </div>
</div>
<?php echo Form::close(); ?>



<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/plugins/iCheck/square/blue.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/AdminLTE/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/question/_show_question_form.blade.php ENDPATH**/ ?>