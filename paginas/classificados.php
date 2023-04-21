<h1 class="text-secondary d-flex text-uppercase">Novo classificado</h1>

<form action="<?php echo INCLUDE_PATH; ?>classificadosenv" method="post">
  <div class="mb-3">
    <label>Titulo</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <input type="text" name="descricao" class="form-control" required>
  </div>
  <div class="col">
    <button class="btn btn-primary" type="submit" name="acao" value="cadastrar">Enviar</button>
    <a class="btn btn-danger" href="<?php echo INCLUDE_PATH; ?>">Voltar</a>
  </div>
</form>