<?php
	include "header.php";
?>

		<form name="abrir_nao_conformidade" method="POST" action="validar_nao_conformidade.php" style="margin-top: 1%">
			<div class="form-group row border">
				<label class="col-sm-2 col-form-label" style="margin-top: 1%" for="tipo">Tipo de não-conformidade:</label>
				<div class="col-sm-10" style="margin: 1% 0">
					<select class="form-control" id="tipo" name="tipo">
						<?php
							$consulta = $pdo->query('SELECT * FROM tipos_nao_conformidade ORDER BY nome');
								while ($row = $consulta->fetch(PDO::FETCH_ASSOC)){
							?>
						<option value="<?php echo $row['id'] ?>"><?php echo $row['nome']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

		<div class="form-group row border">
			<label class="col-sm-2 col-form-label" style="margin-top: 1%" for="descricao">Descrição:</label>
			<div class="col-sm-10" style="margin: 1% 0">
				<textarea class="form-control" style="resize:none;" rows="5" id="descricao" name="descricao"></textarea>
			</div>
		</div>

		<div class="form-group" align="right">
			<?php
				if(	isset($_SESSION['msg_descricao'])){
					echo $_SESSION['msg_descricao'];
					unset($_SESSION['msg_descricao']);
				}
			?>
			<button  type="submit" class= "btn btn-primary col-md-2">Enviar</button>
			<a href="index.php" class="btn btn-secondary col-md-2">Voltar</a>
			
		</div>
</form>

<?php
	include "footer.php";
?>