<?php
$id_categoria = $_REQUEST['idSetor'];
	
	$result_usuario = "SELECT * FROM usuarios WHERE idSetor=$idSetor ORDER BY nome";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	
	while ($row_usuario = mysqli_fetch_assoc($resultado_usuario) ) {
		$usuarios[] = array(
			'id'	=> $row_usuario['idUsuario'],
			'nome' => utf8_encode($row_usuario['nome']),
		);
	}
	
	echo(json_encode($usuarios));

?>