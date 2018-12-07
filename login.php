<?php
	include "header.php";
?>
		<form class="col-md-4 form-login" style="margin-top: 2%" action="logar.php" method = "post">
			<div class="form-group">
				<h2 label style="font-size: 25px" for="usuario">Usuário:</label>
				<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite com o seu usuario">
			</div>
			<div class="form-group">
				<h2 label style="font-size: 25px" for="senha">Senha:</label>
				<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a sua senha">
			</div>
			<?php
				if(	isset($_SESSION['msg_logar'])){
					echo $_SESSION['msg_logar'];
					unset($_SESSION['msg_logar']);
				}
			?>
			<button type="submit" class="btn btn-success">Entrar</button>
		</form>
<?php
	include "footer.php";
?>