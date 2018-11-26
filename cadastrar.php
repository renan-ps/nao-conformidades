<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de Funcionário</title>
  </head>
  <body>
    <div class="container">
      <h2>Cadastro de funcionário</h2>
      <form name="cadastrar_usuario" method="POST" action="cadastrar_usuario.php" class="form-horizontal">

        <div class="form-group">
          <label class="control-label col-sm-2" for="usuario">Nome de usuário:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="usuario" placeholder="Nome de usuário do funcionário" name="usuario">
          </div>
        </div>
    
        <div class="form-group">
          <label class="control-label col-sm-2" for="nome">Nome:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" placeholder="Nome completo do funcionário" name="nome">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">E-mail:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="E-mail do funcionário" name="email">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="cargo">Cargo:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cargo" placeholder="Ex: Auxiliar administrativo" name="cargo">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="senha">Senha:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="senha" placeholder="******" name="senha">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="csenha">Confirme a senha:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="csenha" placeholder="******" name="csenha">
          </div>
        </div>

        <div class="form-group">
          <label for="setor">Setor</label>
          <select id="setor" name="setor" class="form-control">
            <option selected>Escolher...</option>
          </select>
        </div>


        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>