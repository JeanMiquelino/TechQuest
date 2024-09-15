<!-- users count -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-orange">
        <div class="inner">
            <h3><?php echo e($players_count); ?></h3>
            <p>Jogadores</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="<?php echo e(route('admin.users.index')); ?>"
           class="small-box-footer"><?php echo e(__('admin/user/title.user_management')); ?> <i
                class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./users count -->

<!-- questions count -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo e($questions_count); ?></h3>
            <p>Questões Publicadas</p>
        </div>
        <div class="icon">
            <i class="fa fa-question"></i>
        </div>
        <a href="<?php echo e(route('admin.questions.index')); ?>"
           class="small-box-footer"><?php echo e(__('admin/question/title.question_management')); ?> <i
                class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./questions count -->

<!-- badges count -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo e($badges_count); ?></h3>
            <p>Emblemas Ativos</p>
        </div>
        <div class="icon">
            <i class="fa fa-trophy"></i>
        </div>
        <a href="<?php echo e(route('admin.badges.index')); ?>"
           class="small-box-footer"><?php echo e(__('admin/badge/title.badge_management')); ?> <i
                class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./badges count -->

<!-- levels count -->
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
        <div class="inner">
            <h3><?php echo e($levels_count); ?></h3>
            <p>Níveis Ativos</p>
        </div>
        <div class="icon">
            <i class="fa fa-level-up"></i>
        </div>
        <a href="<?php echo e(route('admin.levels.index')); ?>"
           class="small-box-footer"><?php echo e(__('admin/level/title.level_management')); ?> <i
                class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./levels count -->
<?php /**PATH C:\Users\Jean\Documents\TechQuest\resources\views/admin/dashboard/_info_boxes.blade.php ENDPATH**/ ?>