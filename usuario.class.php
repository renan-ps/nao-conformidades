<?php 
class Usuario { 
	private $idUsuario;
	private $usuario; 
	private $nome;
	private $email;
	private $idSetor;
	private $cargo;
	private $logado;

	public function __construct(){
		
	}

	//Cadastrar usuário no banco de dados
	public function setCadastro($pdo, $usuario, $nome, $email, $cargo, $senha, $setor){
		$stmt = $pdo->prepare('INSERT INTO usuarios(usuario, nome, email, cargo, senha, idSetor) VALUES (?, ?, ?, ?, ?, ?)');
		$stmt->bindParam(1, $usuario, PDO::PARAM_STR);
		$stmt->bindParam(2, $nome, PDO::PARAM_STR);
		$stmt->bindParam(3, $email, PDO::PARAM_STR);
		$stmt->bindParam(4, $cargo, PDO::PARAM_STR);
		$stmt->bindParam(5, $senha, PDO::PARAM_STR);
		$stmt->bindParam(6, $setor, PDO::PARAM_STR);

		//Testa o cadastro.
		if($stmt->execute()){
			return "Cadastro realizado com sucesso.";
		}else{
			return "Erro no cadastro.";
		}
	}

	public function setVerificarCadastro($pdo, $usuario, $email){
		
		$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = ? OR email = ?');
		$stmt->bindParam(1, $usuario, PDO::PARAM_STR);
		$stmt->bindParam(2, $email, PDO::PARAM_STR);

		$stmt->execute();
		/*$a = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($a as $row){
			echo $row['usuario'];
			echo "</br>";
		}*/
	  
		return $stmt->rowCount();

		
	}

	public function setLogin($pdo, $usuario, $senha){
		$stmt = $pdo->prepare('SELECT * from usuarios WHERE usuario = ? and senha = ?');
		$stmt -> bindParam(1, $usuario, PDO::PARAM_STR);
		$stmt -> bindParam(2, $senha, PDO::PARAM_STR);
		$stmt -> execute();

		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$this->setIDUsuario($row['idUsuario']);
			$this->setUsuario($row['usuario']);
			$this->setNome($row['nome']);
			$this->setEmail($row['email']);
			$this->setIDSetor($row['idSetor']);
			$this->setCargo($row['cargo']);
			$this->setLogado(true);
		}
		else{
			return "erro";
		}
	}

	//Sets básicos
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function setIDUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setIDSetor($idSetor){
		$this->idSetor = $idSetor;
	}

	public function setCargo($cargo){
		$this->cargo = $cargo;
	}

	public function setLogado($log){
		$this->logado = $log;
	}

	//gets basicos
	public function getUsuario(){
		return $this->usuario;
	}

	public function getIDUsuario(){
		return $this->idUsuario;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getIDSetor(){
		return $this->idSetor;
	}

	public function getCargo(){
		return $this->cargo;
	}

	public function getLogado(){
		return $this->cargo;
	}


}

?>