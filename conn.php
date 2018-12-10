<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "nao_conformidade";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$conn->set_charset("utf8");
?>