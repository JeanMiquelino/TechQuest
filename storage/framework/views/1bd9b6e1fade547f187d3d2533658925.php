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
                    <h3 class="box-title"><i class="fa fa-rocket"></i> Bem-Vindo Ao <strong>TechQuest</strong></h3>
                </div>
                <div class="box-body">
                    <p>TechQuest é uma plataforma inovadora de gamificação desenvolvida especialmente para as Escolas Técnicas Estaduais (Etecs) do Estado de São Paulo. Nosso objetivo é transformar a maneira como os alunos interagem com seus estudos, trazendo elementos de jogos para o ambiente educacional e incentivando o engajamento e o aprendizado contínuo.</p>
                    <p><b>Com TechQuest, os alunos podem:</b></p>
                    <ul>
                        <li>Acumular pontos ao completar atividades acadêmicas e extracurriculares;</li>
                        <li>Desbloquear conquistas ao alcançar marcos importantes no desempenho escolar;</li>
                        <li>Receber recompensas virtuais e reais, que variam desde certificados de reconhecimento até prêmios exclusivos.</li>
                    </ul>
                    <p>A plataforma permite que os professores criem desafios personalizados, ajustados às necessidades específicas de suas disciplinas. Além disso, os alunos têm a oportunidade de colaborar em equipes, competir de maneira saudável e monitorar seu progresso acadêmico de forma visual e intuitiva.</p>
                    <p>Nosso sistema também oferece ferramentas para a gestão acadêmica e o acompanhamento de métricas de desempenho, facilitando a comunicação entre professores, alunos e a administração das Etecs. Com TechQuest, estamos preparando os alunos para um futuro onde a tecnologia e a inovação são essenciais.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- ./welcome -->

            <!-- Pending questions -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-gamepad"></i> Jogue Conosco</h3>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/home/index.blade.php ENDPATH**/ ?>