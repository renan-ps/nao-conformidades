<?php
	include "header.php";
	if($_SESSION['logado'] == true){
?>
<div class="row" style="margin-top: 2%;">
	<div class="col-3" style="border: 1px red solid">
		<nav class="menu_index">
			<ul>
				<li>
					<a href="abrir_nao_conformidade.php">Abrir não-conformidade</a>
				</li>
				<li>
					<a href="listar_nao_conformidades.php">Listar não-conformidades</a>
				</li>
				<?php
					if($_SESSION['setor'] == 1){
				?>
				<li>
					<a href="cadastrar.php">Cadastrar usuário</a>
				</li>
				<?php
					}
				?>
				<li>
					<a href="logout.php">Logout</a>
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
	}else{
		$_SESSION['msg_logar'] = "<p style='color: red;'>Por favor, faça login para entrar no sistema.</p>";
		header('location: login.php');
	}
?>