<?php
class NaoConformidade{

	/* não-conformidade */
	private $descricao;
	private $tipo;
	private $status;
	private $dataAbertura;
	private $dataFechamento;
	private $usuario;

	/* encaminhamentos */
	private $enc_descricao;
	private $enc_data;
	private $enc_usuario;
	private $enc_setor;
 	
	function __construct(){
	}


	public function setAbrirNaoConformidade($pdo, $descricao, $tipo, $status, $idUsuario){
		$stmt = $pdo->prepare('INSERT INTO nao_conformidade(descricao, tipo, status, idUsuario) VALUES (?, ?, ?, ?)');
		$stmt->bindParam(1, $descricao, PDO::PARAM_STR);
		$stmt->bindParam(2, $tipo, PDO::PARAM_STR);
		$stmt->bindParam(3, $status, PDO::PARAM_STR);
		$stmt->bindParam(3, $idUsuario, PDO::PARAM_STR);
	}


}
?>