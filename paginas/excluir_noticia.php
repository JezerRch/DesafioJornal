<?php


if (isset($_GET['id'])) {
  // Escapa o ID da notícia para evitar SQL injection
  $id = $mysqli->real_escape_string($_GET['id']);

  // Executa a consulta para excluir a notícia
  $sql = "DELETE FROM noticia WHERE id=$id";
  $result = $mysqli->query($sql);

  if ($result) {
    // Redireciona de volta para a página de classificado
    header('Location:index.php?excluido');
  } else {
    echo 'Erro ao excluir a notícia: ' . $mysqli->error;
  }
}
