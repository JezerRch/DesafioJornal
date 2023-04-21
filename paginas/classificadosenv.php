<?php
// Inserir novo classificado no banco de dados
$titulo = mysqli_real_escape_string($mysqli, $_POST['titulo']);
$descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);

$sql = "INSERT INTO noticia (titulo, descricao) VALUES ('$titulo', '$descricao')";
$linha = $mysqli->query($sql);

if ($linha) {
     header('Location:index.php?cadastrado-com-sucesso');
     exit();
} else {
     echo 'Erro ao cadastrar a notícia: ' . $mysqli->error;
}
