<a href="<?php echo e(route('admin.' . $model . '.show', $id)); ?>">
    <button type="button" class="btn btn-xs btn-info" title="<?php echo e(__('general.show')); ?>">
        <i class="fa fa-eye"></i>
    </button>
</a>
<a href="<?php echo e(route('admin.' . $model . '.edit', $id)); ?>">
    <button type="button" class="btn btn-xs btn-primary" title="<?php echo e(__('general.edit')); ?>">
        <i class="fa fa-edit"></i>
    </button>
</a>

<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/admin/partials/actions_dd.blade.php ENDPATH**/ ?>