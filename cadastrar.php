  <?php
  include "header.php";
  
  ?>

		<div class="col-12">
			<h2 style="margin-bottom: 2%; margin-top: 2%;">Cadastro de funcionário</h2>
			<form name="cadastrar_usuario" method="POST" action="validar_cadastro_funcionario.php" class="form-horizontal">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="usuario">Nome de usuário:</label>
					<div class="col-sm-10">
						<input 	type="text"
										class="form-control"
										id="usuario"
										placeholder="Nome de usuário do funcionário"
										name="usuario"
										required="required"
										value="<?php ?>" 
										value="<?php echo $usuario; ?>"
						/>
						<?php
							/* MENSAGEM CASO O NOME ESTEJA INCORRETO */
							if(isset($_SESSION['msg_cadNomeUser'])){
								echo $_SESSION['msg_cadNomeUser'];
								unset($_SESSION['msg_cadNomeUser']);
							}
						?>
					</div>
				</div>
			
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="nome">Nome:</label>
					<div class="col-sm-10">
						<input 	type="text"
										class="form-control" 
										id="nome"
										placeholder="Nome completo do funcionário"
										name="nome"
										required="required"

						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="email">E-mail:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" placeholder="E-mail do funcionário" name="email" required="required" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="cargo">Cargo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cargo" placeholder="Ex: Auxiliar administrativo" name="cargo" required="required" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="senha">Senha:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="senha" placeholder="Mínimo 8 caracteres" name="senha" required="required">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="csenha">Confirme a senha:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="csenha" placeholder="Mínimo 8 caracteres" name="csenha" required="required">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="setor">Setor</label>
					<div class="col-sm-10">
						<select id="setor" name="setor" class="form-control" required="required">
							<?php
								$consulta = $pdo->query('SELECT * FROM setores ORDER BY nome');
								while ($row = $consulta->fetch(PDO::FETCH_ASSOC)){
							?>

							<option value="<?php echo $row['idSetor'] ?>"><?php echo $row['nome']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<input type="hidden" id="validador" name="validador" value="1">

				<?php
					if(isset($_SESSION['msg_cadUser'])){
						echo $_SESSION['msg_cadUser'];
						unset($_SESSION['msg_cadUser']);
					}
				?>

				<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg btn-block" onClick="return validar()">Cadastrar usuário</button>
				</div>

			</form>
		</div>
	</div>
<!--
	<script type="text/javascript">
		function validar(){
			var usuario = cadastrar_usuario.usuario.value;
			var nome = cadastrar_usuario.nome.value;
			var email = cadastrar_usuario.email.value;
			var cargo = cadastrar_usuario.cargo.value;
			var senha = cadastrar_usuario.senha.value;
			var csenha = cadastrar_usuario.csenha.value;
			var setor = cadastrar_usuario.setor.value;

			if(usuario == "" || usuario.length < 5){
				alert("Preencha o campo usuário com pelo menos 5 caracteres!");
				cadastrar_usuario.usuario.focus();
				return false;
			}

			if(nome == ""){
				alert("Preencha o nome do funcionário!");
				cadastrar_usuario.nome.focus();
				return false;
			}

			if(email == ""){
				alert("Preencha o campo e-mail corretamente!");
				cadastrar_usuario.email.focus();
				return false;
			}

			if(cargo == ""){
				alert("Preencha o cargo do funcionário!");
				cadastrar_usuario.cargo.focus();
				return false;
			}
			
			
			if(senha == "" || senha.length < 8){
				alert("Preencha a senha com pelo menos 8 caracteres..");
				cadastrar_usuario.senha.focus();
				return false;
			}
			
			if(csenha == "" || csenha != senha){
				alert("Preencha os campos de senha corretamente.");
				cadastrar_usuario.senha.focus();
				return false;
			}

			if(setor == "n"){
				alert("Preencha o setor do funcionário.");
				cadastrar_usuario.setor.focus();
				return false;
			}
		}
	</script>
-->

<?php
	include "footer.php";
?>