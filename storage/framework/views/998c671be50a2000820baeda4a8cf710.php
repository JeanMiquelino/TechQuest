<div class="col-xs-2">
    <a href="#badge-<?php echo e($badge->slug()); ?>" data-toggle="modal">
        <?php echo e($badge->present()->imageThumbnail()); ?>

    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="badge-<?php echo e($badge->slug()); ?>" tabindex="-1" role="dialog"
     aria-labelledby="badge-<?php echo e($badge->slug()); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="<?php echo e(__('general.close')); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="badge-<?php echo e($badge->slug()); ?>Label">
                    <?php echo e(__('user/profile.badge')); ?>: <?php echo e($badge->name); ?>

                </h4>
            </div>
            <div class="modal-body text-center">
                <p class="lead">
                    <?php echo e(__('user/profile.congrats_message', ['name' => $badge->name])); ?>

                </p>

                <p><?php echo e($badge->present()->imageThumbnail()); ?></p>

                <p>
                    <?php echo e($badge->description); ?>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal"><?php echo e(__('general.close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/profile/_badge_unlocked.blade.php ENDPATH**/ ?>