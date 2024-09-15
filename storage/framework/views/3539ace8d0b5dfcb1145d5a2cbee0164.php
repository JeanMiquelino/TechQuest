<?php if($paginator->hasPages()): ?>
    <nav>
        <ul class="pager">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="previous disabled" aria-disabled="true">
                    <span><?php echo app('translator')->get('pagination.previous'); ?></span>
                </li>
            <?php else: ?>
                <li class="previous">
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><?php echo app('translator')->get('pagination.previous'); ?></a>
                </li>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="next">
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><?php echo app('translator')->get('pagination.next'); ?></a>
                </li>
            <?php else: ?>
                <li class="next disabled" aria-disabled="true">
                    <span><?php echo app('translator')->get('pagination.next'); ?></span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\Users\Jean Miquelino Etec\Downloads\gamify-laravel\resources\views/partials/simple-pager.blade.php ENDPATH**/ ?>