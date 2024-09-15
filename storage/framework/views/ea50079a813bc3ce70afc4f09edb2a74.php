<!-- start: Social Login options -->
<div class="social-auth-links text-center">

    
    <?php if(config('services.facebook.client_id')): ?>
        <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>"
           class="btn btn-block btn-social btn-facebook btn-flat">
            <i class="fa fa-facebook"></i> <?php echo e(__('social_login.facebook')); ?>

        </a>
    <?php endif; ?>

    
    <?php if(config('services.twitter.client_id')): ?>
        <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>"
           class="btn btn-block btn-social btn-twitter btn-flat">
            <i class="fa fa-github"></i> <?php echo e(__('social_login.twitter')); ?>

        </a>
    <?php endif; ?>

    
    <?php if(config('services.github.client_id')): ?>
        <a href="<?php echo e(route('social.login', ['provider' => 'github'])); ?>"
           class="btn btn-block btn-social btn-github btn-flat">
            <i class="fa fa-github"></i> <?php echo e(__('social_login.github')); ?>

        </a>
    <?php endif; ?>

    
    <?php if(config('services.okta.client_id')): ?>
        <a href="<?php echo e(route('social.login', ['provider' => 'okta'])); ?>"
           class="btn btn-block btn-social btn-openid btn-flat">
            <i class="fa fa-openid"></i> <?php echo e(__('social_login.okta')); ?>

        </a>
    <?php endif; ?>

    <?php if(config('services.facebook.client_id') || config('services.twitter.client_id') || config('services.github.client_id') || config('services.okta.client_id')): ?>
        <p></p>
        <p class="text-center">- OR -</p>
    <?php endif; ?>

</div>
<!-- end: Social Login options -->
<?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/auth/_social_login.blade.php ENDPATH**/ ?>