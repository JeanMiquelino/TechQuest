<table id="ranking" class="table table-hover">
    <thead>
    <tr>
        <th class="col-md-1">#</th>
        <th class="col-md-6">Jogador</th>
        <th class="col-md-3">Nível</th>
        <th class="col-md-2">Pontos</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $usersInRanking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $userInRank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($index+1); ?></td>
            <td><a href="<?php echo e(route('profiles.show', $userInRank['username'])); ?>"><?php echo e($userInRank['name']); ?></a></td>
            <td><?php echo e($userInRank['level']); ?></td>
            <td><?php echo e($userInRank['experience']); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tfoot>
    <tr>
        <th class="col-md-1">#</th>
        <th class="col-md-6">Jogador</th>
        <th class="col-md-3">Nível</th>
        <th class="col-md-2">Pontos</th>
    </tr>
    </tfoot>
</table>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/home/_ranking.blade.php ENDPATH**/ ?>