<?php 
	include "header.php";
	require "nao_conformidade.class.php";
	require "usuario.class.php";
	if($_SESSION['setor'] == 6){

	$idNaoConformidade = $_GET['id'];
	
	$nao_conformidade = new NaoConformidade();
	$nao_conformidade->getExibirNaoConformidade($pdo, $idNaoConformidade);
	

?>
<div class="row" style="margin-top: 2%;">
	<p>Verifique as informações e preencha o formulário para encaminhar a não-conformidade para o setor responsável.</p>
</div>

<form method="post" action="validar_encaminhamento_nao_conformidade.php">
	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="naoConformidade">Descrição da não-conformidade:</label>
		<div class="col-sm-9">
			<textarea class="form-control" style="resize: none;" id="naoConformidade" name="naoConformidade" rows="5" disabled="disabled"><?php echo $nao_conformidade->getDescricao(); ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="usuario">Usuario:</label>
		<div class="col-sm-9">
			<?php 
				$idUsuario = $nao_conformidade->getUsuario();
				$usuario = new Usuario();
				$usuario->getVerificarUsuario($pdo, $idUsuario);
			?>
			<input type="text" readonly class="form-control-plaintext" id="usuario" value="<?php echo $usuario->getNome()?> (<?php echo $usuario->getEmail(); ?>)">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="abertura">Data de abertura:</label>
		<div class="col-sm-9">
			<input type="text" readonly class="form-control-plaintext" id="abertura" value="<?php echo date('d/m/Y\, \à\s H:i', strtotime($nao_conformidade->getDataAbertura())) ?>">
		</div>
	</div>


	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="setor">Setor a ser encaminhado:</label>
		<div class="col-sm-9">
			<select id="setor" name="setor" class="form-control">

				<?php
					include_once "conn.php";
					$result_setor = "SELECT * FROM setores ORDER BY nome";
					$resultado_setor = mysqli_query($conn, $result_setor);
					while($row_setor = mysqli_fetch_assoc($resultado_setor) ) {
						echo '<option value="'.$row_setor['idSetor'].'">'.$row_setor['nome'].'</option>';
					}
				?>

			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="encaminhamento">Mensagem:</label>
		<div class="col-sm-9">
			<textarea class="form-control" style="resize: none;" id="encaminhamento" name="encaminhamento" rows="5" placeholder="Mensagem para o setor que receberá a não-conformidade."></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-3 col-form-label " for="status">Status:</label>
		<div class="col-sm-9">
			<select id="status" name="status" class="form-control">
				<?php	$rows = $nao_conformidade->getListarStatus($pdo); 
							
							foreach($rows as $row){
				?>

				<option value="<?php echo $row['id']; ?>" <?php if($row['nome'] == "Aberta"){echo "selected";} ?>><?php echo $row['nome']; ?></option>

				<?php 
					}
				?>
			</select>
		</div>
	</div>

	

	<div class="form-group row">
		<button type="submit" class="btn btn-success btn-block">Enviar</button>
		<a href="listar_nao_conformidades.php" class="btn btn-secondary btn-block">Voltar</a>
	</div>

</form>





<?php
	include "footer.php";
}else{
	header("Location: index.php");
}
?>