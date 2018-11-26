<?php
	$bd_name = 'nao_conformidade';
	$hostname = 'localhost';
	$username = 'root';
	$password = '';

	$opcoes = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
	);

	//conectar ao banco de dados
	$pdo = new PDO("mysql:host=$hostname; dbname=$bd_name", $username, $password, $opcoes);
?>