<?php
$id = $_GET['id'];

// Verifica se o formulário foi preenchido
if (isset($_POST['editar'])) {
  // Obtém os valores do formulário
  $titulo = mysqli_real_escape_string($mysqli, $_POST['titulo']);
  $descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);

  // Inicia a lista de erros vazia
  $erros = array();

  // Verifica se o campo título foi preenchido
  if (empty($titulo)) {
    $erros[] = 'O campo título é obrigatório.';
  }

  // Verifica se o campo descrição foi preenchido
  if (empty($descricao)) {
    $erros[] = 'O campo descrição é obrigatório.';
  }

  // Verifica se houve algum erro
  if (count($erros) == 0) {
    // Atualiza os dados da notícia no banco de dados
    $sql = "UPDATE noticia SET titulo='$titulo', descricao='$descricao', data_postagem=NOW() WHERE id=$id";
    $mysqli->query($sql);

    header('Location:index.php?atualizado-com-sucesso');
    exit();
  } else {
    // Exibe os erros para o usuário
    foreach ($erros as $erro) {
      echo '<p class="text-danger">' . $erro . '</p>';
    }
  }
}

// Obtém os dados da notícia a ser editada
$sql = "SELECT * FROM noticia WHERE id=$id";
$res = $mysqli->query($sql);
$linha = $res->fetch_object();
?>

<form method="post">
  <div class="mb-3">
    <label>Titulo</label>
    <input type="text" name="titulo" value="<?php echo $linha->titulo; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <input type="text" name="descricao" value="<?php echo $linha->descricao; ?>" class="form-control">
  </div>
  <div class="col">
    <button class="btn btn-primary" type="submit" name="editar" value="acao">Enviar</button>
    <a class="btn btn-danger" href="<?php echo INCLUDE_PATH; ?>">Voltar</a>
  </div>
</form>