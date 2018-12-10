<?php
	include "header.php";
	if($_SESSION['setor'] == 6){
	require "nao_conformidade.class.php";

	$idUsuario = $_SESSION['idUsuario'];
	$idSetor = $_SESSION['setor'];
	
	
	$nao_conformidades = new NaoConformidade;
	
	if(!isset($_GET['status'])){
		$rows = $nao_conformidades->getListarTodasNaoConformidades($pdo, $idSetor);
	}else{
		$rows = $nao_conformidades->getListarNaoConformidadesStatus($pdo, $idSetor, $_GET['status']);
	}
?>
	<div class="row" style="margin-top: 1%;">
		<div class="col-12">
			<ul class="nav nav-tabs nav-fill">
				<li class="nav-item">
					<a class="nav-link <?php if(!isset($_GET['status'])){echo 'active';} ?>" href="listar_nao_conformidades.php">Todas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_GET['status'] == 1){ echo 'active';} ?>" href="listar_nao_conformidades.php?status=1">Aguardando validação</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_GET['status'] == 2){ echo 'active';} ?>" href="listar_nao_conformidades.php?status=2">Abertas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_GET['status'] == 3){ echo 'active';} ?>" href="listar_nao_conformidades.php?status=3">Encerradas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($_GET['status'] == 4){ echo 'active';} ?>" href="listar_nao_conformidades.php?status=4">Recusadas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Retornar</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="row" style="margin-top: 2%;">
		<div class="col-12">

			<?php
				foreach($rows as $row){
				if($row['status'] == 1){
					$color = "border-secondary";
				}elseif($row['status'] == 2){
					$color = "border-primary";
				}elseif($row['status'] == 3){
					$color = "border-success";
				}elseif($row['status'] == 4){
					$color = "border-danger";
				}
			?>
			<div class="card <?php echo $color;?>" style="margin-bottom: 2%;">
				<div class="card-header">
					<?php 
						$idStatus = $row['status'];
						$nao_conformidades->getVerificarStatus($pdo, $idStatus);
						echo "ID: " . $row['idNao_conformidade'] . " - " . $nao_conformidades->getStatus();
					?>
				</div>
				<div class="card-body">
					<p class="card-text"><?php echo $row['descricao']; ?></p>
				</div>

				<div class="card-footer">
					<p style="float: left;"><?php echo date('d/m/Y\, \à\s H:i', strtotime($row['dataAbertura'])) ; ?></p>

							
					<div class="dropdown" style="float: right;">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Opções
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="validar_aprovacao_nao_conformidade.php?id=<?php echo $row['idNao_conformidade']; ?>">Aprovar</a>
							<a class="dropdown-item" href="validar_rejeicao_nao_conformidade.php">Rejeitar</a>
						</div>
					</div>
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