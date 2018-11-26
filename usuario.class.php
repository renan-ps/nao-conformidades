<?php 
class Usuario { 
	private $usuario; 
	private $nome;
	private $email;
	private $idSetor;
	private $cargo;

	public function __construct(){}

	//Cadastrar usuário no banco de dados
	public function setCadastro($pdo, $usuario, $nome, $email, $cargo, $senha, $setor){
		$stmt = $pdo->prepare('INSERT INTO usuarios(usuario, nome, email, cargo, senha, idSetor) VALUES (?, ?, ?, ?, ?, ?');
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

}

?>