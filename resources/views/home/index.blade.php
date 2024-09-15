@extends('layouts.master')

{{-- Web site Title --}}
@section('title', __('site.home'))

{{-- Content Header --}}
@section('header', __('site.home'))

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li class="active">
        <i class="fa fa-dashboard"></i> {{ __('site.home') }}
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Carousel -->
        @include('home._carousel')
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
                    @include('home._questions')
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
                    @include('home._ranking')
                </div>
            </div>
            <!-- ./ranking -->

        </div>
    </div>
@endsection
