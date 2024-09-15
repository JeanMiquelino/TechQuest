<?php $__env->startSection('title', __('site.home')); ?>


<?php $__env->startSection('header', __('site.home')); ?>


<?php $__env->startSection('breadcrumbs'); ?>
    <li class="active">
        <i class="fa fa-dashboard"></i> <?php echo e(__('site.home')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <!-- Carousel -->
        <?php echo $__env->make('home._carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ./carousel -->

            <!-- Welcome -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-rocket"></i> Welcome to <strong>gamify</strong> v3</h3>
                </div>
                <div class="box-body">
                    <p>Mauris pulvinar sollicitudin ligula, eu auctor mi iaculis vel. Mauris a nulla eleifend,
                        imperdiet
                        mi at, molestie augue. Cras vulputate dui eget justo tristique imperdiet.</p>
                    <p>Sed posuere nec felis id mattis. Nunc in tempor tortor, vel tristique eros. Praesent eu
                        ligula
                        sapien. Etiam nisl mi, hendrerit nec nibh sit amet, lacinia laoreet risus. <b>Quisque
                            bibendum,
                            felis non tincidunt porttitor, odio dui finibus turpis, ut bibendum urna quam vitae
                            nisi.</b></p>
                    <ul>
                        <li>Nullam semper sed diam eu placerat.</li>
                        <li>Phasellus pharetra rhoncus tristique.</li>
                        <li>Aenean purus quam, porta ac blandit eget,</li>
                    </ul>
                    <p>Nullam condimentum finibus leo, eu bibendum libero dignissim sed. Sed mattis turpis eu dolor
                        auctor, sit amet cursus felis ultricies. Sed ac magna felis. Quisque nisi mi, euismod vel
                        tortor
                        eu, ullamcorper tincidunt eros. Cras vitae vehicula tortor. Curabitur a mi commodo, finibus
                        dolor vel, dictum mauris.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- ./welcome -->

            <!-- Pending questions -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-gamepad"></i> Play with us</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('home._questions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- ./pending questions -->

        </div>


        <div class="col-md-6">

            <!-- Ranking -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-trophy"></i> Ranking</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('home._ranking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- ./ranking -->

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Downloads\gamify-laravel\resources\views/home/index.blade.php ENDPATH**/ ?>