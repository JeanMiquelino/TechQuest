# TechQuest - Plataforma de Gamificação

Bem-vindo ao tutorial de instalação do TechQuest, uma plataforma de gamificação baseada em Laravel. Este guia irá te ajudar a instalar e configurar o TechQuest em um ambiente de desenvolvimento ou produção.
## Vídeos de Apoio
[Tutorial de Instalação da Plataforma](https://www.youtube.com/watch?v=k839mbRKHO8&ab_channel=JeanMiquelino)

[Tour pela Plataforma](https://www.youtube.com/watch?v=us8OV54l8h4&ab_channel=JeanMiquelino)
## Funcionalidades

A plataforma Tech Quest oferece uma variedade de funcionalidades para aprimorar a experiência do usuário e facilitar a administração do sistema. Abaixo estão listadas as principais funcionalidades disponíveis:

1. **Cadastro e Autenticação de Usuário**
   - Registro de usuários com e-mail, nome, nome de usuário e senha.
   - Confirmação de e-mail para validação de conta.
   - Recuperação e alteração de senha através do perfil.

2. **Perfil do Usuário**
   - Exibição de distintivos desbloqueados.
   - Possibilidade de editar detalhes do perfil, como imagem, data de nascimento, links para redes sociais (LinkedIn, GitHub, Facebook) e descrição pessoal.
   - Opção de alterar a senha diretamente no perfil.

3. **Sistema de Ranking e Níveis**
   - Classificação dos usuários com base nos pontos acumulados.
   - Sistema de níveis configurável, onde é possível definir faixas de XP para cada nível.

4. **Painel Administrativo**
   - Acesso ao painel de controle para administradores, onde é possível gerenciar toda a plataforma.
   - Permissão para alterar o papel dos usuários (ex: usuário comum para administrador).
   - Criação e gerenciamento de usuários, permitindo a exclusão e edição de dados.

5. **Sistema de Medalhas/Distintivos**
   - Cadastro e gerenciamento de distintivos com nome, imagem e descrição.
   - Configuração de condições (eventos) para desbloqueio dos distintivos, como: resposta correta de questões, upload de avatar, entre outros.

6. **Sistema de Questões e Tags**
   - Criação de perguntas de múltipla escolha ou escolha única com opções de pontuação positiva ou negativa.
   - Atribuição de tags às questões, permitindo a categorização por temas.
   - Publicação de perguntas imediatamente ou em uma data futura.

7. **Sistema de Recompensas**
   - Distribuição manual de pontos de experiência (XP) e distintivos para os usuários.
   - Sistema de justificativa para a atribuição de recompensas.

8. **Jogo e Competição**
   - Os usuários podem responder às perguntas e ganhar pontos com base nas respostas corretas.
   - Exibição de pontuação e progresso do usuário em um ranking global.
   - Desbloqueio de distintivos com base no desempenho do usuário.

9. **Painel do Administrador**
   - Opção para visualizar todos os usuários cadastrados, incluindo suas informações e estatísticas (pontos, nível, número de perguntas respondidas, etc.).
   - Possibilidade de editar ou excluir usuários, assim como mudar o papel de jogador para administrador.

10. **Verificação de Bugs**
   - Durante o tour da plataforma, foram identificados bugs visuais que serão corrigidos na versão final do projeto.

11. **Painel do Jogo**
   - Exibe as perguntas disponíveis para responder.
   - Mostra o feedback da resposta, indicando se o usuário obteve pontos.

A plataforma está em constante desenvolvimento, com atualizações planejadas para melhorar a experiência do usuário e incluir novas funcionalidades.

## Tutorial de Instalação

## Passo 1: Clonar o Repositório

Primeiro, faça o download do projeto a partir do repositório no GitHub:

1. Clone o repositório para o seu diretório de preferência.
2. Coloque o projeto no diretório configurado com o seu servidor web (por exemplo, `C:/xampp/htdocs/` ou o diretório configurado com o Nginx).

## Passo 2: Instalar o PHP

1. Baixe a versão mais recente do [PHP](https://www.php.net/downloads) (a versão recomendada é a 8.3).
2. Extraia o pacote baixado para uma nova pasta no disco local, nomeada como `C:/php`.
3. Adicione o caminho `C:/php` nas variáveis de ambiente do Windows:
    - Procure por "Variáveis de Ambiente".
    - Edite a variável `Path` e adicione `C:/php`.

## Passo 3: Instalar Visual Studio Redistributable

1. Baixe o [Visual Studio Redistributable](https://learn.microsoft.com/en-us/cpp/windows/latest-supported-vc-redist?view=msvc-160) para a versão 64 bits.
2. Instale o pacote baixado.

## Passo 4: Instalar o Composer

1. Baixe o Composer a partir do site oficial: [Download Composer](https://getcomposer.org/download/).
2. Execute o instalador e certifique-se de que ele esteja configurando o caminho correto para o PHP (`C:/php`).
3. Complete a instalação.

## Passo 5: Instalar o Node.js

1. Baixe o [Node.js](https://nodejs.org/) (recomenda-se a versão LTS para maior estabilidade).
2. Execute o instalador e certifique-se de marcar a opção para instalar o `chocolatey` durante o processo.

## Passo 6: Instalar o MySQL Server

1. Baixe a versão LTS do [MySQL Server](https://dev.mysql.com/downloads/mysql/).
2. Execute o instalador e escolha a opção `Complete`.
3. Durante a configuração, escolha a opção "Development Computer".
4. Defina uma senha para o usuário `root`.
5. Configure o MySQL para rodar como um serviço do Windows.

## Passo 7: Criar Banco de Dados com MySQL Workbench

1. Baixe e instale o [MySQL Workbench](https://dev.mysql.com/downloads/workbench/).
2. Abra o MySQL Workbench e conecte-se ao servidor local.
3. Crie um novo esquema de banco de dados com o nome `laravel`.

## Passo 8: Configurar o Projeto Laravel

1. Extraia os arquivos do TechQuest e renomeie a pasta para `TechQuest`.
2. Abra um terminal na pasta do projeto.
3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

    - Se ocorrerem erros relacionados a extensões do PHP, edite o arquivo `php.ini` localizado em `C:/php` e descomente as seguintes extensões:
        ```ini
        extension=exif
        extension=mysqli
        extension=fileinfo
        ```
    - Salve o arquivo `php.ini`.

4. Instale as dependências do Node.js:

    ```bash
    npm install
    ```

## Passo 9: Configurar o Arquivo `.env`

1. Renomeie o arquivo `.env.example` para `.env`.
2. Abra o arquivo `.env` e configure as seguintes variáveis:
    - Configuração do banco de dados:
        ```env
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=SUA_SENHA
        ```
    - Configuração de e-mail SMTP:
        ```env
        MAIL_USERNAME=SEU_EMAIL@gmail.com
        MAIL_PASSWORD=SENHA_DE_APP
        MAIL_FROM_ADDRESS=SEU_EMAIL@gmail.com
        ```
    - Para obter a senha de app do Gmail, acesse as configurações de segurança da sua conta Google.

3. Salve as alterações no arquivo `.env`.

## Passo 10: Migrar o Banco de Dados

1. No terminal, execute o comando abaixo para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```

## Passo 11: Iniciar o Servidor

1. No terminal, execute o comando:

    ```bash
    php artisan serve
    ```

2. A aplicação estará disponível em `http://127.0.0.1:8000`.

## Passo 12: Compilar os Assets

1. Para compilar os assets, execute:

    ```bash
    npm run dev
    ```

## Considerações Finais

- Em um ambiente de produção, é recomendado utilizar o comando `composer install --no-dev` para otimizar a instalação.
- Se houver necessidade de alterações nas configurações, edite o arquivo `.env` conforme necessário.

Com isso, você já estará com a plataforma TechQuest instalada e configurada para uso!

## Créditos
Código base desenvolvido por [Pacoorozco](https://github.com/pacoorozco)  