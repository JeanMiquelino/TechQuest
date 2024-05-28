<?php

//Parametros de conexão
$servidor = "localhost";
$usuario = "login";
$senha = "3I$?(MRGQd#uDQDjje~!r<\l2A}Ak6)7T]@bIDE^=s1q=~£epbSc#KcK]mMn}rDs~@s^AI{KhY~)hTO_uNLx)3Snts3YeaS_K";
$bd = "TechQuest";
$usuario = "root";
$senha="";
$bd = "techquest";

//Conexao com o BD
$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);

if (!$conexao){
	die("Falha na conexão com o BD. ". mysqli_connect_error($conexao));
}

?>