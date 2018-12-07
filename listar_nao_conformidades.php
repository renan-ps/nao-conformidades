<?php
	include "header.php";
	if($_SESSION['setor'] == 6){
	require "nao_conformidade.class.php";

	$idUsuario = $_SESSION['idUsuario'];
	$idSetor = $_SESSION['setor'];
	
	$nao_conformidade = new NaoConformidade;

	$rows = $nao_conformidade->getListarNaoConformidades($pdo, $idUsuario, $idSetor);
	?>
	<div class="row" style="margin-top: 2%;">
		<div class="col-12">

			<?php
			foreach($rows as $row){?>
				<div class="card" style="margin-bottom: 2%;">
						<div class="card-header">
							<?php echo "ID: " . $row['idNao_conformidade'] . " - " . $row['status']; ?>
						</div>
						<div class="card-body">
							<p class="card-text"><?php echo $row['descricao']; ?></p>

							
							<!-- APROVAR -->
							<form style="float: right; "action="validar_aprovacao_nao_conformidade.php" method="POST">
								<input type="hidden" id="idNaoConformidade" name="idNaoConformidade" value="<?php $row['idNao_conformidade']; ?>">
								<input type="hidden" id="descricao" name="descricao" value="<?php $row['descricao']; ?>">
								<input type="hidden" id="tipo" name="tipo" value="<?php $row['tipo']; ?>">
								<input type="hidden" id="status" name="status" value="<?php $row['status']; ?>">
								<input type="hidden" id="dataAbertura" name="dataAbertura" value="<?php $row['dataAbertura']; ?>">
								<input type="hidden" id="idUsuario" name="idUsuario" value="<?php $row['idUsuario']; ?>">
								<button type="submit" class="btn btn-primary">Aprovar</button>
							</form>

							<!-- REJEITAR -->
							<form style="float: right; " action="validar_aprovacao_nao_conformidade.php" method="POST">
								<input type="hidden" id="idNaoConformidade" name="idNaoConformidade" value="<?php $row['idNao_conformidade']; ?>">
								<input type="hidden" id="descricao" name="descricao" value="<?php $row['descricao']; ?>">
								<input type="hidden" id="tipo" name="tipo" value="<?php $row['tipo']; ?>">
								<input type="hidden" id="status" name="status" value="<?php $row['status']; ?>">
								<input type="hidden" id="dataAbertura" name="dataAbertura" value="<?php $row['dataAbertura']; ?>">
								<input type="hidden" id="idUsuario" name="idUsuario" value="<?php $row['idUsuario']; ?>">
								<button type="submit" class="btn btn-danger">Rejeitar</button>
							</form>
							
						</div>
				</div>
		<?php
			}
		?>

	</div>
</div>

<?php
	include "footer.php";
}else{
	header("Location: login.php");
}
?>