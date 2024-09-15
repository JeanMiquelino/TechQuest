<?php $__env->startSection('title', __('admin/question/title.question_edit')); ?>


<?php $__env->startSection('header'); ?>
    <?php echo e(__('admin/question/title.question_edit')); ?>

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
        <?php echo e(__('admin/question/title.question_edit')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ./ notifications -->

    <?php echo Form::model($question, [
                'id' => 'formEditQuestion',
                'route' => ['admin.questions.update', $question],
                'method' => 'put',
                ]); ?>


    <div class="row">
        <div class="col-md-8">

            <!-- general section -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <?php echo e($question->name); ?>

                    </h2>
                    <?php echo e($question->present()->visibilityBadge()); ?>

                    <?php echo e($question->present()->statusBadge()); ?>


                    <a href="<?php echo e(route('questions.show', ['q_hash' => $question->hash, 'slug' => $question->slug])); ?>"
                       class="btn btn-link pull-right" target="_blank">
                        <?php echo e(__('general.view')); ?> <i class="fa fa-external-link"></i>
                    </a>
                </div>
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

                        <!-- link -->
                        <div class="form-group">
                            <p class="text-muted">
                                <b><?php echo e(__('admin/question/model.permanent_link')); ?></b>: <?php echo e(route('questions.show', ['q_hash' => $question->hash, 'slug' => $question->slug])); ?>

                                <a href="<?php echo e(route('questions.show', ['q_hash' => $question->hash, 'slug' => $question->slug])); ?>"
                                   class="btn btn-default btn-xs" target="_blank">
                                    <?php echo e(__('general.view')); ?> <i class="fa fa-external-link"></i>
                                </a>
                            </p>
                        </div>
                        <!-- ./link -->

                        <!-- question text -->
                        <div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('question', __('admin/question/model.question'), ['class' => 'control-label required']); ?>

                            <p class="text-muted"><?php echo e(__('admin/question/model.question_help')); ?></p>
                            <div class="controls">
                                <?php echo Form::textarea('question', null, ['class' => 'form-control editor', 'style' => 'width:100%']); ?>

                                <span class="help-block"><?php echo e($errors->first('question', ':message')); ?></span>
                            </div>
                        </div>
                        <!-- ./ question text-->

                        <!-- type -->
                        <div class="form-group <?php echo e($errors->has('type') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('type', __('admin/question/model.type'), ['class' => 'control-label required']); ?>

                            <div class="controls">
                                <?php echo Form::select('type', __('admin/question/model.type_list'), null, ['class' => 'form-control required']); ?>

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
<?php $component = Gamify\View\Components\Tags\FormSelectTags::resolve(['name' => 'tags','placeholder' => __('admin/question/model.tags_help'),'selectedTags' => old('tags', $question->tagArrayNormalized)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php if($question->isPublished()): ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#saveAsDraftConfirmationModal">
                                    <?php echo e(__('button.save_as_draft')); ?>

                                </button>
                                <!-- modal: saveAsDraftConfirmationModal -->
                                <div class="modal fade" id="saveAsDraftConfirmationModal" tabindex="-1" role="dialog"
                                     aria-labelledby="saveAsDraftConfirmationModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="saveAsDraftConfirmationModalLabel">
                                                    <?php echo e(__('admin/question/title.un-publish_confirmation')); ?>

                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo e(__('admin/question/messages.un-publish_confirmation_notice')); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    <?php echo e(__('general.close')); ?>

                                                </button>
                                                <button type="button" class="btn btn-primary" id="submitDraftBtn">
                                                    <?php echo e(__('admin/question/messages.un-publish_confirmation_button')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./ modal: saveAsDraftConfirmationModal -->
                                </div>
                            <?php else: ?>
                                <button type="button" class="btn btn-primary" id="submitDraftBtn">
                                    <?php echo e(__('button.save_as_draft')); ?>

                                </button>
                            <?php endif; ?>
                        </div>
                        <!-- ./ save draft and preview -->

                        <!-- status -->
                        <div class="form-group">
                            <?php echo Form::label('status', __('admin/question/model.status'), ['class' => 'control-label']); ?>

                            <div class="controls">
                                <span
                                    class="form-control-static"><?php echo e(__('admin/question/model.status_list.' . $question->status)); ?></span>
                                <?php echo Form::hidden('status', $question->status); ?>

                            </div>
                        </div>
                        <!-- ./ status -->

                        <!-- visibility -->
                        <div class="form-group <?php echo e($errors->has('hidden') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('hidden', __('admin/question/model.hidden'), ['class' => 'control-label required']); ?>

                            <a href="#" id="enableVisibilityControls"><?php echo e(__('general.edit')); ?></a>
                            <div id="visibilityStatus">
                            <span class="form-control-static">
                                <?php echo e(old('hidden', $question->hidden ? '1' : '0') === '1' ? __('admin/question/model.hidden_yes') : __('admin/question/model.hidden_no')); ?>

                            </span>
                            </div>
                            <div class="controls hidden" id="visibilityControls">
                                <div class="radio">
                                    <label class="control-label">
                                        <?php echo e(Form::radio('hidden', '0', null, [ 'id' => 'visibilityPublic'])); ?>

                                        <?php echo e(__('admin/question/model.hidden_no')); ?>

                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="control-label">
                                        <?php echo e(Form::radio('hidden', '1', null, [ 'id' => 'visibilityPrivate', 'aria-describedby' => 'helpHiddenYes'])); ?>

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

                            <?php if (! ($question->isPublished())): ?>
                                <a href="#" id="enablePublicationDateControls"><?php echo e(__('general.edit')); ?></a>
                            <?php endif; ?>
                            <div id="publicationDateStatus">
                            <span class="form-control-static">
                            <?php switch($question->status):
                                    case (\Gamify\Models\Question::DRAFT_STATUS): ?>
                                        <?php if(empty(old('publication_date'))): ?>
                                            <?php echo e(__('admin/question/model.publish_immediately')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('admin/question/model.publish_on', ['datetime' => old('publication_date', $question->present()->publicationDate())])); ?>

                                        <?php endif; ?>
                                        <?php break; ?>
                                    <?php case (\Gamify\Models\Question::PUBLISH_STATUS): ?>
                                        <?php echo e(__('admin/question/model.published_on', ['datetime' => old('publication_date', $question->present()->publicationDate())])); ?>

                                        <?php break; ?>
                                    <?php case (\Gamify\Models\Question::FUTURE_STATUS): ?>
                                        <?php echo e(__('admin/question/model.scheduled_for', ['datetime' => old('publication_date', $question->present()->publicationDate())])); ?>

                                        <?php break; ?>
                                <?php endswitch; ?>
                            </span>
                            </div>
                            <div class="controls hidden" id="publicationDateControls">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo Form::text('publication_date', $question->present()->publicationDate(), ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('admin/question/model.publication_date_placeholder')]); ?>

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
                    <button type="submit" class="btn btn-success" id="submitPublishBtn">
                        <?php if($question->isPublished() || $question->isScheduled()): ?>
                            <?php echo e(__('button.update')); ?>

                        <?php else: ?>
                            <?php echo e(__('button.publish')); ?>

                        <?php endif; ?>
                    </button>

                    <a href="<?php echo e(route('admin.questions.index')); ?>" class="btn btn-link">
                        <?php echo e(__('button.back')); ?>

                    </a>
                </div>

            </div>
            <!-- ./ publish section -->

            <!-- badges section -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('admin/question/title.badges_section')); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">

                    <dl>
                        <dt><?php echo e(__('admin/question/model.tags')); ?></dt>
                        <dd>
                            <?php echo e($question->present()->tags()); ?>

                        </dd>
                    </dl>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><?php echo e(__('admin/badge/model.name')); ?></th>
                            <th><?php echo e(__('admin/badge/model.actuators')); ?></th>
                            <th><?php echo e(__('admin/badge/model.tags')); ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $relatedBadges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($badge->name); ?></td>
                                <td><?php echo e($badge->actuators->description); ?></td>
                                <td>
                                    <?php echo e($badge->present()->tagsIn($question->tagArrayNormalized)); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- ./ badges section -->


            <!-- other information section -->
            <div class="box box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('admin/question/title.other_section')); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php if($question->isPublished()): ?>
                        <p>
                            <?php echo e(__('admin/question/model.published_on', ['datetime' => $question->present()->publicationDate()])); ?>

                        </p>
                    <?php endif; ?>
                    <p>
                        <?php echo e(__('admin/question/model.updated_by', ['who' => $question->present()->updater(), 'when' => $question->updated_at->toDayDateTimeString()])); ?>

                    </p>
                    <p>
                        <?php echo e(__('admin/question/model.created_by', ['who' => $question->present()->creator(), 'when' => $question->created_at->toDayDateTimeString()])); ?>

                    </p>
                </div>
            </div>
            <!-- ./ other information section -->

            <!-- danger zone -->
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <strong><?php echo app('translator')->get('admin/question/messages.danger_zone_section'); ?></strong>
                </div>
                <div class="box-body">
                    <p><strong><?php echo app('translator')->get('admin/question/messages.delete_button'); ?></strong></p>
                    <p><?php echo app('translator')->get('admin/question/messages.delete_help'); ?></p>

                    <div class="text-center">
                        <button type="button" class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#confirmationModal">
                            <?php echo app('translator')->get('admin/question/messages.delete_button'); ?>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ./danger zone -->

        </div>
    </div>

    <?php echo Form::close(); ?>


    <!-- confirmation modal -->
    <?php if (isset($component)) { $__componentOriginal8dabef0e0dc06f04666a952c63f3688e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.confirmation','data' => ['action' => ''.e(route('admin.questions.destroy', $question)).'','confirmationText' => ''.e($question->name).'','buttonText' => ''.e(__('admin/question/messages.delete_confirmation_button')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modals.confirmation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('admin.questions.destroy', $question)).'','confirmationText' => ''.e($question->name).'','buttonText' => ''.e(__('admin/question/messages.delete_confirmation_button')).'']); ?>

        <div class="alert alert-warning" role="alert">
            <?php echo app('translator')->get('admin/question/messages.delete_confirmation_warning', ['name' => $question->name]); ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8dabef0e0dc06f04666a952c63f3688e)): ?>
<?php $attributes = $__attributesOriginal8dabef0e0dc06f04666a952c63f3688e; ?>
<?php unset($__attributesOriginal8dabef0e0dc06f04666a952c63f3688e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8dabef0e0dc06f04666a952c63f3688e)): ?>
<?php $component = $__componentOriginal8dabef0e0dc06f04666a952c63f3688e; ?>
<?php unset($__componentOriginal8dabef0e0dc06f04666a952c63f3688e); ?>
<?php endif; ?>
    <!-- ./ confirmation modal -->
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
                $("#formEditQuestion").submit();
            });

            $("#submitPublishBtn").click(function () {
                $("#status").val("publish");
                $("#formEditQuestion").submit();
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/admin/question/edit.blade.php ENDPATH**/ ?>