<?php

	private $id;
	private $nome;

	public function __construct(){}

	public function getListaSetores($pdo){
		$stmt = $pdo->query(SELECT * FROM setores);
		

		/*if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$this->nome = 
		}*/
	}

?>