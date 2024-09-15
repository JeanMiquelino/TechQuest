<?php $__env->startSection('title', __('admin/question/title.create_a_new_question')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/question/title.create_a_new_question')); ?>

    <small>create a new question</small>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li>
        <a href="<?php echo e(route('admin.home')); ?>">
            <i class="fa fa-dashboard"></i> <?php echo e(__('admin/site.dashboard')); ?>

        </a>
    </li>
    <li>
        <a href="<?php echo e(route('admin.questions.index')); ?>">
            <?php echo e(__('admin/site.questions')); ?>

        </a>
    </li>
    <li class="active">
        <?php echo e(__('admin/question/title.create_a_new_question')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <?php echo Form::open([
                'id' => 'formCreateQuestion',
                'route' => ['admin.questions.store'],
                'method' => 'post',
                ]); ?>


    <div class="row">
        <div class="col-md-8">

            <!-- general section -->
            <div class="box box-solid">
                <div class="box-body">

                    <fieldset>
                        <legend>
                            <?php echo e(__('admin/question/title.general_section')); ?>

                        </legend>

                        <!-- name -->
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('name', __('admin/question/model.name'), ['class' => 'control-label required']); ?>

                            <p class="text-muted"><?php echo e(__('admin/question/model.name_help')); ?></p>
                            <div class="controls">
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ name -->

                        <!-- question text -->
                        <div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('question', __('admin/question/model.question'), ['class' => 'control-label required']); ?>

                            <p class="text-muted"><?php echo e(__('admin/question/model.question_help')); ?></p>
                            <div class="controls">
                                <?php echo Form::textarea('question', null, ['class' => 'form-control editor', 'style' => 'width:100%']); ?>

                                <span class="help-block"><?php echo e($errors->first('question', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ question text -->

                        <!-- type -->
                        <div class="form-group <?php echo e($errors->has('type') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('type', __('admin/question/model.type'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::select('type', __('admin/question/model.type_list'), null, ['class' => 'form-control']); ?>

                                <span class="help-block"><?php echo e($errors->first('type', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ type -->
                    </fieldset>

                    <!-- options -->
                    <?php echo $__env->make('admin/question/_form_choices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- ./ options -->

                    <fieldset>
                        <legend>
                            <?php echo e(__('admin/question/title.optional_section')); ?>

                        </legend>

                        <!-- solution -->
                        <div class="form-group <?php echo e($errors->has('solution') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('solution', __('admin/question/model.solution'), ['class' => 'control-label']); ?>

                            <p class="text-muted"><?php echo e(__('admin/question/model.solution_help')); ?></p>
                            <div class="controls">
                                <?php echo Form::textarea('solution', null, ['class' => 'form-control editor', 'style' => 'width:100%']); ?>

                                <span class="help-block"><?php echo e($errors->first('solution', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ solution -->

                        <!-- tags -->
                        <div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('tags', __('admin/question/model.tags'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <?php if (isset($component)) { $__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf = $attributes; } ?>
<?php $component = Gamify\View\Components\Tags\FormSelectTags::resolve(['name' => 'tags','placeholder' => __('admin/question/model.tags_help'),'selectedTags' => old('tags', [])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tags.form-select-tags'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Gamify\View\Components\Tags\FormSelectTags::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-control']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf)): ?>
<?php $attributes = $__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf; ?>
<?php unset($__attributesOriginalf3154d4c5f06001a9ded6cb4b5d12ccf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf)): ?>
<?php $component = $__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf; ?>
<?php unset($__componentOriginalf3154d4c5f06001a9ded6cb4b5d12ccf); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <!-- ./ tags -->

                    </fieldset>
                </div>
            </div>
            <!-- ./ general section -->

        </div>
        <div class="col-md-4">

            <!-- publish section -->
            <div class="box box-solid">
                <div class="box-body">

                    <fieldset>
                        <legend>
                            <?php echo e(__('admin/question/title.publish_section')); ?>

                        </legend>

                        <!-- save draft and preview -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="submitDraftBtn">
                                <?php echo e(__('button.save_as_draft')); ?> <i class="fa fa-floppy-o"></i>
                            </button>
                        </div>
                        <!-- ./ save draft and preview -->

                        <!-- status -->
                        <div class="form-group">
                            <?php echo Form::label('status', __('admin/question/model.status'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <span
                                    class="form-control-static"><?php echo e(__('admin/question/model.status_list.draft')); ?></span>
                                <?php echo Form::hidden('status','draft'); ?>

                            </div>
                        </div>
                        <!-- ./ status -->

                        <!-- visibility -->
                        <div class="form-group <?php echo e($errors->has('hidden') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('hidden', __('admin/question/model.hidden'), ['class' => 'control-label required']); ?>

                            <a href="#" id="enableVisibilityControls"><?php echo e(__('general.edit')); ?></a>
                            <div id="visibilityStatus">
                            <span class="form-control-static">
                                <?php echo e(old('hidden') === '1' ? __('admin/question/model.hidden_yes') : __('admin/question/model.hidden_no')); ?>

                            </span>
                            </div>
                            <div class="controls hidden" id="visibilityControls">
                                <div class="radio">
                                    <label class="control-label">
                                        <?php echo e(Form::radio('hidden', '0', true, [ 'id' => 'visibilityPublic'])); ?>

                                        <?php echo e(__('admin/question/model.hidden_no')); ?>

                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="control-label">
                                        <?php echo e(Form::radio('hidden', '1', false, [ 'id' => 'visibilityPrivate', 'aria-describedby' => 'helpHiddenYes'])); ?>

                                        <?php echo e(__('admin/question/model.hidden_yes')); ?>

                                    </label>
                                    <span id="helpHiddenYes"
                                          class="text-muted"><?php echo e(__('admin/question/model.hidden_yes_help')); ?></span>
                                </div>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('hidden', ':message')); ?></span>
                        </div>
                        <!-- ./ visibility -->

                        <!-- publication date -->
                        <div class="form-group <?php echo e($errors->has('publication_date') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('publication_date', __('admin/question/model.publication_date'), ['class' => 'control-label']); ?>

                            <a href="#" id="enablePublicationDateControls"><?php echo e(__('general.edit')); ?></a>
                            <div id="publicationDateStatus">
                            <span class="form-control-static">
                            <?php if(empty(old('publication_date'))): ?>
                                    <?php echo e(__('admin/question/model.publish_immediately')); ?>

                                <?php else: ?>
                                    <?php echo e(__('admin/question/model.publish_on', ['datetime' => old('publication_date')])); ?>

                                <?php endif; ?>
                            </span>
                            </div>
                            <div class="controls hidden" id="publicationDateControls">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo Form::text('publication_date', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('admin/question/model.publication_date_placeholder')]); ?>

                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-flat" id="resetPublicationDateBtn">
                                        <?php echo e(__('admin/question/model.publish_immediately')); ?>

                                    </button>
                                </span>
                                </div>
                            </div>
                            <span class="help-block"><?php echo e($errors->first('publication_date', ':message')); ?></span>
                        </div>
                        <!-- ./ publication date -->
                    </fieldset>

                </div>
                <div class="box-footer">
                    <a href="<?php echo e(route('admin.questions.index')); ?>" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> <?php echo e(__('button.back')); ?>

                    </a>
                    <button type="submit" class="btn btn-success pull-right" id="submitPublishBtn">
                        <i class="fa fa-paper-plane-o"></i> <?php echo e(__('button.publish')); ?>

                    </button>
                </div>

            </div>
            <!-- ./ publish section -->

        </div>
    </div>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet"
          href="<?php echo e(asset('vendor/jquery-datetimepicker/jquery.datetimepicker.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/summernote/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script
        src="<?php echo e(asset('vendor/jquery-datetimepicker/jquery.datetimepicker.full.min.js')); ?>"></script>

    <script src="<?php echo e(asset('vendor/summernote/summernote.min.js')); ?>"></script>

    <script>
        $(function () {
            $('.editor').summernote();

            $("#submitDraftBtn").click(function () {
                $("#status").val("draft");
                $("#formCreateQuestion").submit();
            });

            $("#submitPublishBtn").click(function () {
                $("#status").val("publish");
                $("#formCreateQuestion").submit();
            });

            $("#enableVisibilityControls").click(function () {
                $("#visibilityStatus").addClass("hidden");
                $("#visibilityControls").removeClass("hidden");
                $("#enableVisibilityControls").addClass("hidden");
            });

            $.datetimepicker.setLocale("<?php echo e(__('site.dateTimePickerLang')); ?>");
            $("#publication_date").datetimepicker({
                minDate: 0,
                format: "Y-m-d H:i",
                defaultTime: '09:00',
            });

            $("#enablePublicationDateControls").click(function () {
                $("#publicationDateStatus").addClass("hidden");
                $("#publicationDateControls").removeClass("hidden");
                $("#enablePublicationDateControls").addClass("hidden");
                $("#publication_date").datetimepicker("show");
            });

            $("#resetPublicationDateBtn").click(function () {
                $("#publication_date").val("");
                $("#publication_date").change();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/question/create.blade.php ENDPATH**/ ?>