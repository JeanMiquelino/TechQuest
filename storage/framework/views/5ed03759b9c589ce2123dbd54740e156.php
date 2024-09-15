<?php if(auth()->guard()->check()): ?>
    <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>
                <?php echo e(__('notifications.badge_unlocked_title')); ?>

                <small class="pull-right time">
                    <i class="fa fa-clock-o"></i>
                    <?php echo e($notification->created_at->diffForHumans()); ?>

                </small>
            </strong>
            <p>
                <?php echo $notification->data['message']; ?>

                <a href="#" class="pull-right mark-as-read" data-id="<?php echo e($notification->id); ?>" data-dismiss="alert">
                    <?php echo e(__('notifications.mark_as_read')); ?>

                </a>
            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if (! $__env->hasRenderedOnce('257d320d-bedf-43cd-86d8-34a9a4d2b13c')): $__env->markAsRenderedOnce('257d320d-bedf-43cd-86d8-34a9a4d2b13c');
$__env->startPush('scripts'); ?>
        <script>
            function sendMarkRequest(id = null) {
                return $.ajax({
                    url: "<?php echo e(route('notifications.read')); ?>",
                    method: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        _method: 'PATCH',
                        id: id
                    }
                });
            }

            $(function () {
                $('.mark-as-read').click(function () {
                    sendMarkRequest($(this).data('id'));
                });
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> <?php echo e(__('general.success')); ?></h4>
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> <?php echo e(__('general.warning')); ?></h4>
        <?php echo e(session()->get('warning')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> <?php echo e(__('general.error')); ?></h4>
        <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has('info')): ?>
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Info</h4>
        <?php echo e(session()->get('info')); ?>

    </div>
<?php endif; ?>

<?php if(session()->has('message')): ?>
    <div class="callout callout-info">
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="callout callout-danger">
        <h4><?php echo e(__('general.validation_error')); ?></h4>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/partials/notifications.blade.php ENDPATH**/ ?>