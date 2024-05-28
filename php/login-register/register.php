<?php
require_once("../acessosBd/conexaoregister.php");
// Verifica se o formulário de registro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";

    if ($conexao->query($sql) === TRUE) {
        echo "Registro realizado com sucesso!";
    } else {
        echo "Erro ao registrar: " . $conexao->error;
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>