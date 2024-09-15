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

<?php if (! $__env->hasRenderedOnce('99926f1e-eae4-4175-bb7d-1c2fb14f8e9f')): $__env->markAsRenderedOnce('99926f1e-eae4-4175-bb7d-1c2fb14f8e9f');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/AdminLTE/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('22829a3e-f55f-4d49-9c21-4f9678e7fb64')): $__env->markAsRenderedOnce('22829a3e-f55f-4d49-9c21-4f9678e7fb64');
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
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/components/tags/form-select-tags.blade.php ENDPATH**/ ?>