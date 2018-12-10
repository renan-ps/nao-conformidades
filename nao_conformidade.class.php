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

	public function getListarTodasNaoConformidades($pdo, $setorUsuario){
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

	public function getListarNaoConformidadesStatus($pdo, $setorUsuario, $status){
		if($setorUsuario == 6){
			$stmt = $pdo->prepare('SELECT * FROM nao_conformidade WHERE status = ? ORDER BY dataAbertura DESC');
			$stmt->bindParam(1, $status, PDO::PARAM_STR);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $rows;
			/*foreach ($row as $rows){
				$this->setIDNaoConformidade($row['idNao_Conformidade']);
			}*/
		}
	}

	public function getListarStatus($pdo){
		$stmt = $pdo->prepare('SELECT * FROM status_nao_conformidade');
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}

	public function getVerificarStatus($pdo, $idStatus){
		$stmt = $pdo->prepare('SELECT nome FROM status_nao_conformidade WHERE id = ?');
		$stmt->bindParam(1, $idStatus, PDO::PARAM_STR);
		$stmt->execute();
		$status = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->setStatus($status['nome']);
	}

	public function getExibirNaoConformidade($pdo, $idNaoConformidade){
		$stmt = $pdo->prepare('SELECT * FROM nao_conformidade WHERE idNao_conformidade = ?');
		$stmt->bindParam(1, $idNaoConformidade, PDO::PARAM_STR);
		$stmt->execute();
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$this->setIDNaoConformidade($row['idNao_conformidade']);
			$this->setDescricao($row['descricao']);
			$this->setTipo($row['tipo']);
			$this->setStatus($row['status']);
			$this->setDataAbertura($row['dataAbertura']);
			$this->setDataFechamento($row['dataFechamento']);
			$this->setUsuario($row['idUsuario']);
		}
	}

	

	/*ID NÃO CONFORMIDADE*/
	public function setIDNaoConformidade($idNaoConformidade){
		$this->idNaoConformidade = $idNaoConformidade;
	}

	public function getIDNaoConformidade(){
		return $this->idNaoConformidade;
	}

	/*DESCRIÇÃO*/
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	/*TIPO*/
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $this->tipo;
	}

	/*STATUS*/
	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	/*dataAbertura*/
	public function setDataAbertura($dataAbertura){
		$this->dataAbertura = $dataAbertura;
	}

	public function getDataAbertura(){
		return $this->dataAbertura;
	}

	/*dataFechamento*/
	public function setDataFechamento($dataFechamento){
		$this->dataFechamento = $dataFechamento;
	}

	public function getDataFechamento(){
		return $this->dataFechamento;
	}

	/*usuario*/
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}

}


class Encaminhamento
{
	/* encaminhamentos */
	private $enc_descricao;
	private $enc_data;
	private $enc_usuario;
	private $enc_setor;

	function __construct(){}

	public function setCriarEncaminhamento($pdo, $comentario, $data){
		
	}





}



?>