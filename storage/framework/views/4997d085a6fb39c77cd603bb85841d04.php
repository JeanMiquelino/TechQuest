<!-- choices -->
<fieldset class="choices">
    <legend><?php echo e(__('admin/question/model.choices_section')); ?></legend>
    <p class="text-muted">
        <?php echo e(__('admin/question/model.choices_help')); ?>

        <strong><?php echo e(__('admin/question/model.choice_score_help')); ?></strong>
    </p>

    <?php $__errorArgs = ['choices'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="form-group has-error">
        <span class="help-block"><?php echo e($errors->first('choices', ':message')); ?></span>
    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div class="choices-wrapper">
        <div class="choices-container">
            <?php $__currentLoopData = old('choices', (isset($question) ? $question->choices->toArray() : [])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row choices-row">
                    <div class="col-sm-9 form-group <?php echo e($errors->has('choices.'. $loop->index .'.*') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('choices['. $loop->index .'][text]', __('admin/question/model.choice_text'), ['class' => 'control-label']); ?>

                        <?php echo Form::text('choices['. $loop->index .'][text]', $choice['text'], ['class' => 'form-control', 'placeholder' => __('admin/question/model.choice_text_help')]); ?>

                        <span class="help-block"><?php echo e($errors->first('choices.'. $loop->index .'.*', ':message')); ?></span>
                    </div>
                    <div class="col-sm-3 form-group <?php echo e($errors->has('choices.'. $loop->index .'.*') ? 'has-error' : ''); ?>">
                        <?php echo Form::label('choices['. $loop->index .'][score]', __('admin/question/model.choice_score'), ['class' => 'control-label']); ?>

                        <div class="input-group">
                            <?php echo Form::number('choices['. $loop->index .'][score]', $choice['score'], ['class' => 'form-control']); ?>

                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default remove" title="<?php echo e(__('button.remove_choice')); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="row form-group choices-template choices-row">
                <div class="col-sm-9">
                    <?php echo Form::label('choices[%%choice-count-placeholder%%][text]', __('admin/question/model.choice_text'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('choices[%%choice-count-placeholder%%][text]', '', ['class' => 'form-control', 'placeholder' => __('admin/question/model.choice_text_help')]); ?>

                </div>
                <div class="col-sm-3">
                    <?php echo Form::label('choices[%%choice-count-placeholder%%][score]', __('admin/question/model.choice_score'), ['class' => 'control-label']); ?>

                    <div class="input-group">
                        <?php echo Form::number('choices[%%choice-count-placeholder%%][score]', '', ['class' => 'form-control']); ?>

                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default remove" title="<?php echo e(__('button.remove_choice')); ?>">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <button type="button" class="btn btn-default pull-right add">
                <i class="fa fa-plus"></i> <?php echo e(__('button.add_new_choice')); ?>

            </button>
        </div>
    </div>
</fieldset>
<!-- ./ choices -->

<?php $__env->startPush('scripts'); ?>
    <script
        src="<?php echo e(asset('vendor/repeatable-fields/repeatable-fields.min.js')); ?>"></script>

    <script>
        $(function () {
            $('.choices').each(function () {
                $(this).repeatable_fields({
                    wrapper: '.choices-wrapper',
                    container: '.choices-container',
                    row: '.choices-row',
                    template: '.choices-template',
                    row_count_placeholder: '%%choice-count-placeholder%%',
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/question/_form_choices.blade.php ENDPATH**/ ?>