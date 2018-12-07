<?php
class NaoConformidade{

	/* não-conformidade */
	private $idNaoConformidade;
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
		$stmt = $pdo->prepare('INSERT INTO nao_conformidade(descricao, tipo, status, dataAbertura, idUsuario) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)');
		$stmt->bindParam(1, $descricao, PDO::PARAM_STR);
		$stmt->bindParam(2, $tipo, PDO::PARAM_STR);
		$stmt->bindParam(3, $status, PDO::PARAM_STR);
		$stmt->bindParam(4, $idUsuario, PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok.";
		}else{
			return "Erro.";
		}
	}

	public function getListarNaoConformidades($pdo, $idUsuario, $setorUsuario){
		if($setorUsuario == 6){
			$stmt = $pdo->prepare('SELECT * FROM nao_conformidade ORDER BY dataAbertura DESC');
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rows;
			/*foreach ($row as $rows){
				$this->setIDNaoConformidade($row['idNao_Conformidade']);
			}*/

			
		}
	}

	public function setIDNaoConformidade($idNaoConformidade){
		$this->idNaoConformidade = $idNaoConformidade;
	}

	public function getIDNaoConformidade(){
		return $this->idNaoConformidade;
	}

}



?>