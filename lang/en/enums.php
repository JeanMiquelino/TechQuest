<?php
use Gamify\Enums\BadgeActuators;
use Gamify\Enums\QuestionActuators;
use Gamify\Enums\Roles;

return [
    'actuators_related_with_question_events' => 'Eventos relacionados a questões',
    'actuators_related_with_user_events' => 'Eventos relacionados a usuários',

    BadgeActuators::class => [
        BadgeActuators::None => 'Nenhum, eu vou acionar por conta própria',

        BadgeActuators::OnQuestionAnswered => 'Questão foi respondida',
        BadgeActuators::OnQuestionCorrectlyAnswered => 'Questão foi respondida corretamente',
        BadgeActuators::OnQuestionIncorrectlyAnswered => 'Questão foi respondida incorretamente',

        BadgeActuators::OnUserLoggedIn => 'Usuário fez login',
        BadgeActuators::OnUserProfileUpdated => 'Usuário atualizou seu perfil',
        BadgeActuators::OnUserAvatarUploaded => 'Usuário fez upload de um avatar',
    ],

    QuestionActuators::class => [
        QuestionActuators::OnQuestionAnswered => 'Sempre',
        QuestionActuators::OnQuestionCorrectlyAnswered => 'Ao responder a questão corretamente',
        QuestionActuators::OnQuestionIncorrectlyAnswered => 'Ao responder a questão incorretamente',
    ],

    Roles::class => [
        Roles::Admin => 'Administrador',
        Roles::Player => 'Jogador',
    ],
];
