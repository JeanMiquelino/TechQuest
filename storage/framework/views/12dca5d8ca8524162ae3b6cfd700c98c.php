<div class="box">
    <div class="box-header">
        <i class="fa fa-clock-o"></i>
        <h3 class="box-title">Próximas perguntas agendadas</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo e(__('admin/question/model.name')); ?></th>
                <th><?php echo e(__('admin/question/model.hidden')); ?></th>
                <th><?php echo e(__('admin/question/model.publication_date')); ?></th>
                <th><?php echo e(__('general.edit')); ?></th>
            </tr>
            </thead>
            <?php $__empty_1 = true; $__currentLoopData = $next_scheduled_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php echo e($question->name); ?>

                        <?php echo e($question->present()->publicUrlLink); ?>

                    </td>
                    <td>
                        <?php echo e($question->present()->visibilityBadge()); ?>

                    </td>
                    <td><?php echo e($question->present()->publicationDate); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.questions.edit', $question)); ?>">
                            <button type="button" class="btn btn-xs btn-primary" title="<?php echo e(__('general.edit')); ?>">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr class="warning">
                    <td colspan="5" class="text-center"><?php echo e(__('admin/question/messages.no_scheduled_questions')); ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/admin/dashboard/_next_scheduled_questions.blade.php ENDPATH**/ ?>