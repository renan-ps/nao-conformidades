<?php
	include "header.php";
?>
<div class="row" style="margin-top: 2%;">
	<div class="col-3" style="border: 1px red solid">
		<nav class="menu_index">
			<ul>
				<li>
					<a href="abrir_nao_conformidade.php">Abrir não-conformidade</a>
				</li>
				<li>
					<a href="">Listar não-conformidades</a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="col-9">
		<h1 class="titulo_index">Bem vindo, <?php echo $_SESSION['nome']; ?>.</h1>
	</div>
</div>
<?php
	include "footer.php";
?>