<?php
	include "header.php";
	if($_SESSION['setor'] == 6){
	require "nao_conformidade.class.php";

	$idUsuario = $_SESSION['idUsuario'];
	$idSetor = $_SESSION['setor'];
	
	$nao_conformidades = new NaoConformidade;

	$rows = $nao_conformidades->getListarNaoConformidades($pdo, $idUsuario, $idSetor);
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
						</div>

						<div class="card-footer text-muted">
    					<p style="float: left;"><?php echo $row['dataAbertura']; ?></p>

    					<!-- APROVAR -->
							<a style="float: right;" href="validar_aprovacao_nao_conformidade.php?id=<?php echo $row['idNao_conformidade']; ?>" class="btn btn-success">Aprovar</a>

							<!-- REJEITAR -->
							<form style="float: right;" action="validar_rejeicao_nao_conformidade.php" method="POST">
								<input type="hidden" id="idNaoConformidade" name="idNaoConformidade" value="<?php $row['idNao_conformidade']; ?>">
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
	
}
?>