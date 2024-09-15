<select
    multiple="multiple"
    id="<?php echo e($name); ?>"
    name="<?php echo e($name . '[]'); ?>"
    <?php echo e($attributes); ?>

>
    <?php $__currentLoopData = $availableTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($tag); ?>" <?php if($isSelected($tag)): echo 'selected'; endif; ?>><?php echo e($tag); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<?php if (! $__env->hasRenderedOnce('4d2b38a8-2f09-4b07-97b4-c89d5e9190a3')): $__env->markAsRenderedOnce('4d2b38a8-2f09-4b07-97b4-c89d5e9190a3');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('7b90900b-53d5-471a-9412-c74c6c7657f1')): $__env->markAsRenderedOnce('7b90900b-53d5-471a-9412-c74c6c7657f1');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/AdminLTE/plugins/select2/js/select2.full.min.js')); ?>"></script>

    <script>
        const selectedTags = [
                <?php $__currentLoopData = $selectedTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                id: '<?php echo e($tag); ?>',
                text: '<?php echo e($tag); ?>',
                selected: true
            },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        $(function () {
            $("#<?php echo e($name); ?>").select2({
                tags: true,
                placeholder: "<?php echo e($placeholder); ?>",
                tokenSeparators: [',', ' '],
                allowClear: true,
                width: "100%",
                data: selectedTags,
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/components/tags/form-select-tags.blade.php ENDPATH**/ ?>