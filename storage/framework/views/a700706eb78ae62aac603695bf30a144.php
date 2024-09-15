<?php $__env->startSection('title', __('admin/question/title.question_show')); ?>


<?php $__env->startSection('header', __('admin/question/title.question_show')); ?>


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
        <?php echo e(__('admin/question/title.question_show')); ?>

    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Notifications -->
    <?php echo $__env->make('partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.notifications -->

    <div class="row">

        <!-- left column -->
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
                    <h3><?php echo e(__('admin/question/title.general_section')); ?></h3>

                    <dl>

                        <!-- statement -->
                        <dt><?php echo e(__('admin/question/model.question')); ?></dt>
                        <dd id="question_statement"><?php echo e($question->present()->statement()); ?></dd>
                        <!-- ./ statement -->

                        <?php if($question->solution): ?>
                            <!-- solution -->
                            <dt><?php echo e(__('question/messages.explained_answer')); ?></dt>
                            <dd id="question_explanation"><?php echo e($question->present()->explanation()); ?></dd>
                            <!-- ./ solution -->
                        <?php endif; ?>

                        <!-- choices -->
                        <dt>
                            <?php if($question->type == 'single'): ?>
                                <?php echo e(__('question/messages.single_choice')); ?>

                            <?php else: ?>
                                <?php echo e(__('question/messages.multiple_choices')); ?>

                            <?php endif; ?>
                        </dt>

                        <dd>
                            <ul class="list-group">
                                <?php $__empty_1 = true; $__currentLoopData = $question->choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li class="list-group-item">
                                        <?php if($choice->isCorrect()): ?>
                                            <span class="glyphicon glyphicon-ok"></span>
                                            <span
                                                class="label label-success pull-right"><?php echo e(__('question/messages.choice_score', ['points' => $choice->score])); ?></span>
                                        <?php else: ?>
                                            <span class="glyphicon glyphicon-remove"></span>
                                            <span
                                                class="label label-danger pull-right"><?php echo e(__('question/messages.choice_score', ['points' => $choice->score])); ?></span>
                                        <?php endif; ?>

                                        <?php echo e($choice->text); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li class="list-group-item text-center"><?php echo e(__('admin/question/messages.choices_unavailable')); ?></li>
                                <?php endif; ?>

                                <li class="list-group-item bg-gray text-center">
                                    <p class="text-muted">
                                        <?php echo e(__('question/messages.legend')); ?>

                                        <span
                                            class="glyphicon glyphicon-ok"></span> <?php echo e(__('question/messages.correct_answer')); ?>

                                        <span
                                            class="glyphicon glyphicon-remove"></span> <?php echo e(__('question/messages.incorrect_answer')); ?>

                                    </p>
                                </li>
                            </ul>
                        </dd>
                        <!-- ./ choices -->

                    </dl>
                </div>

                <div class="box-footer">
                    <a href="<?php echo e(route('admin.questions.edit', $question)); ?>" class="btn btn-primary" role="button">
                        <?php echo e(__('general.edit')); ?>

                    </a>
                    <a href="<?php echo e(route('admin.questions.index')); ?>" class="btn btn-link" role="button">
                        <?php echo e(__('general.back')); ?>

                    </a>
                </div>

            </div>
            <!-- ./ general section -->

        </div>
        <!-- left column -->

        <!-- right column -->
        <div class="col-md-4">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('admin/question/title.badges_section')); ?></h3>
                </div>
                    <div class="box-body">

                    <dl>
                        <!-- tags -->
                        <dt><?php echo e(__('admin/question/model.tags')); ?></dt>
                        <dd>
                            <?php echo e($question->present()->tags()); ?>

                        </dd>
                        <!-- ./ tags -->
                    </dl>

                        <!-- badges -->
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
                        <!-- ./ badges -->
                </div>
            </div>

            <!-- other information section -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('admin/question/title.other_section')); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">

                    <dl class="dl-horizontal">

                        <!-- status -->
                        <dt><?php echo e(__('admin/question/model.status')); ?></dt>
                        <dd>
                            <?php echo e($question->present()->statusBadge()); ?>

                        </dd>
                        <!-- ./ status -->

                        <!-- visibility -->
                        <dt><?php echo e(__('admin/question/model.hidden')); ?></dt>
                        <dd><?php echo e($question->present()->visibility()); ?></dd>
                        <!-- ./ visibility -->

                        <!-- authored -->
                        <dt><?php echo e(__('admin/question/model.authored')); ?></dt>
                        <dd>
                            <ul class="list-unstyled">
                                <li><?php echo e(__('admin/question/model.created_by', ['who' => $question->present()->creator(), 'when' => $question->created_at->toDayDateTimeString()])); ?></li>
                                <li><?php echo e(__('admin/question/model.updated_by', ['who' => $question->present()->updater(), 'when' => $question->updated_at->toDayDateTimeString()])); ?></li>
                                <li><?php echo e($question->present()->publicationDateDescription()); ?></li>
                            </ul>
                        </dd>
                        <!-- ./ authored -->

                    </dl>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/admin/question/show.blade.php ENDPATH**/ ?>