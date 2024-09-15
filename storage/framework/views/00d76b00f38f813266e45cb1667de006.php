<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
'title' => __('components/modals/confirmation.title'),
'action',
'confirmationText',
'buttonText',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
'title' => __('components/modals/confirmation.title'),
'action',
'confirmationText',
'buttonText',
]); ?>
<?php foreach (array_filter(([
'title' => __('components/modals/confirmation.title'),
'action',
'confirmationText',
'buttonText',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
     aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e($action); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="confirmationModalLabel">
                        <?php echo e($title); ?>

                    </h4>
                </div>
                <div class="modal-body">
                    <?php echo e($slot); ?>

                    <p>
                        <?php echo app('translator')->get('components/modals/confirmation.help', ['confirmationText' => $confirmationText]); ?>
                    </p>
                    <input id="confirmationInput" type="text" class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-danger" id="confirmationButton"
                            disabled="disabled">
                        <?php echo e($buttonText); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#confirmationInput').keyup(function (e) {
            if ($('#confirmationInput').val().trim() === '<?php echo e($confirmationText); ?>') {
                $('#confirmationButton').removeAttr('disabled');
            } else {
                $('#confirmationButton').attr('disabled', 'true');
            }
        });
        $('#confirmationModal').on('shown.bs.modal', function () {
            $('#confirmationInput').trigger('focus')
        })
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/components/modals/confirmation.blade.php ENDPATH**/ ?>