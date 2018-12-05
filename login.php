<?php
	include "header.php";
?>
		<form class="col-md-3" action="logar.php" method = "post">
			<div class="form-group">
				<h2 label for="usuario">Usuário:</label>
				<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite com o seu usuario">
			</div>
			<div class="form-group">
				<h2 label for="senha">Senha:</label>
				<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a sua senha">
			</div>
			<button type="submit" class="btn btn-success">Entrar</button>
		</form>
<?php
	include "footer.php";
?>