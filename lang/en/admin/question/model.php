<?php

use Gamify\Models\Question;

return [

    // Geral
    'short_name' => 'Nome curto',
    'permanent_link' => 'Link permanente',
    'name' => 'Nome da pergunta',
    'name_help' => 'Este é público, não divulgue informações sobre a solução.',
    'question' => 'Enunciado da pergunta',
    'question_help' => 'Os usuários verão este texto como o enunciado da pergunta a ser respondida.',
    'solution' => 'Explicação',
    'solution_help' => 'A explicação é mostrada ao usuário após a conclusão da pergunta. Você pode usá-la para fornecer uma resposta completamente trabalhada e talvez um link para mais informações.',
    'type' => 'Tipo',
    'type_list' => [
        Question::SINGLE_RESPONSE_TYPE => 'Pergunta de escolha única',
        Question::MULTI_RESPONSE_TYPE => 'Pergunta de múltiplas escolhas',
    ],
    'shuffle_choices' => 'Embaralhar as opções?',
    'shuffle_choices_help' => 'Se ativado, a ordem das respostas será embaralhada aleatoriamente para cada tentativa.',

    'publication_date' => 'Data de publicação',
    'publication_date_placeholder' => 'Deixe em branco para publicar imediatamente.',
    'publish_immediately' => 'Publicar imediatamente',
    'publish_on' => 'Publicar em :datetime.',
    'published_on' => 'Publicado em :datetime.',
    'scheduled_for' => 'Agendado para :datetime.',
    'published_not_yet' => 'Ainda não publicado.',

    'hidden' => 'Visibilidade',
    'hidden_yes' => 'Privado',
    'hidden_yes_help' => 'Perguntas privadas não são publicadas nos painéis de controle. Elas são acessadas apenas através de seu URL.',
    'hidden_no' => 'Público',
    'hidden_no_help' => 'Perguntas públicas são listadas no painel de controle do usuário.',

    'status' => 'Status',
    'status_list' => [
        Question::DRAFT_STATUS => 'Rascunho',
        Question::PUBLISH_STATUS => 'Publicado',
        Question::FUTURE_STATUS => 'Agendado',
    ],

    // Tags
    'tags' => 'Tags',
    'tags_help' => 'Digite as tags separadas por vírgulas',
    'tags_none' => 'Nenhuma',

    // Respostas
    'choices_section' => 'Opções de resposta',
    'choices_help' => 'Estas são as respostas das quais o participante pode escolher.',
    'choice_text' => 'Texto da opção de resposta',
    'choice_text_help' => 'Coloque aqui o texto desta opção de resposta.',
    'choice_score' => 'Pontuação',
    'choice_score_help' => 'Observe que pontuações positivas marcarão a resposta como correta.',

    // Criado / última modificação
    'created_by' => 'Criado por :who em :when.',
    'updated_by' => 'Atualizado por :who em :when.',

    'authored' => 'Autor',
];
