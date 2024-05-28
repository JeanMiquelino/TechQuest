<?php

//Parametros de conexão
$servidor = "localhost";
$usuario = "register";
$senha = "CY4,+0J&Bx]£jU>qY£1W9,{c<£PSeBtI)&>4lF:u6JYg+{\£)%{}vO3c]A_0-XwKDs8h'#yC;)o}.-[Dt%FXSN{BF;0nB_o~~x";
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