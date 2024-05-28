<?php
require_once("../acessosbd/conexaologin.php");

// Verifica se a conexão foi estabelecida com sucesso


// Obtém os dados do formulário de login
$usuario = $_POST['email'];
$senha = $_POST['password'];

// Consulta SQL para verificar se o usuário existe no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND password = '$senha'";
$result = $conexao->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Usuário autenticado com sucesso
    echo "Login realizado com sucesso!";
} else {
    // Usuário não encontrado ou senha incorreta
    echo "Usuário ou senha inválidos!";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>