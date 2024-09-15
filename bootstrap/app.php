<?php

/*
|--------------------------------------------------------------------------
| Criar A Aplicação
|--------------------------------------------------------------------------
|
| A primeira coisa que faremos é criar uma nova instância da aplicação Laravel
| que serve como o "colante" para todos os componentes do Laravel, e é
| o contêiner IoC para o sistema vinculando todas as várias partes.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Vincular Interfaces Importantes
|--------------------------------------------------------------------------
|
| A seguir, precisamos vincular algumas interfaces importantes ao contêiner
| para que possamos resolvê-las quando necessário. Os kernels servem as
| solicitações recebidas por esta aplicação tanto da web quanto do CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Gamify\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Gamify\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Gamify\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Retornar A Aplicação
|--------------------------------------------------------------------------
|
| Este script retorna a instância da aplicação. A instância é dada ao
| script chamador para que possamos separar a construção das instâncias
| da execução real da aplicação e do envio das respostas.
|
*/

return $app;
