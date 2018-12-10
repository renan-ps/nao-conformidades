<?php
	include "header.php";
	if($_SESSION['logado'] == true){
?>
<div class="row" style="margin-top: 2%;">
	<div class="col-3">
		<nav class="nav flex-column">
			<a class="nav-link active" href="abrir_nao_conformidade.php">Abrir não-conformidade</a>
			<a class="nav-link" href="listar_nao_conformidades.php">Listar não-conformidades</a>
			<?php
				if($_SESSION['setor'] == 1){
			?>
			<a class="nav-link" href="cadastrar.php">Cadastrar usuário</a>
		<?php } ?>
			<a class="nav-link" href="logout.php">Logout</a>
		</nav>

	</div>

	<div class="col-9">
		<h1 class="titulo_index">Bem vindo, <?php echo $_SESSION['nome']; ?>.</h1>
	</div>
</div>
<?php
	include "footer.php";
	}else{
		$_SESSION['msg_logar'] = "<p style='color: red;'>Por favor, faça login para entrar no sistema.</p>";
		header('location: login.php');
	}
?>