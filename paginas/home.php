<main class="container mt-5">
  <!-- Alert de cadastro com sucesso -->
  <?php
  if (isset($_GET['cadastrado-com-sucesso'])) { ?>
    <div class="row">
      <div class="alert alert-success" role="alert" id="success-message">
        Cadastrado com sucesso.
      </div>
    </div>
    <script>
      // Seleciona o elemento HTML que contém a mensagem
      var successMessage = document.getElementById("success-message");

      // Remove o elemento HTML
      setTimeout(function() {
        successMessage.remove();
      }, 3000);
    </script>
  <?php  }  ?>
  <!-- Fim Alert de cadastro com sucesso -->

  <!-- Alert de excluido com sucesso -->
  <?php
  if (isset($_GET['excluido'])) { ?>
    <div class="row">
      <div class="alert alert-danger" role="alert" id="delete-message">
        O registro foi excluído com sucesso.
      </div>
    </div>
    <script>
      // Seleciona o elemento HTML que contém a mensagem
      var deleteMessage = document.getElementById("delete-message");

      // Remove o elemento HTML
      setTimeout(function() {
        deleteMessage.remove();
      }, 3000);
    </script>
  <?php } ?>
  <!-- Fim Alert de excluido com sucesso -->

  <!-- Seção classificado -->
  <section class="d-flex justify-content-between mb-5">
    <div class="row">
      <div class="col">
        <h2 class="text-secondary d-flex text-uppercase">Classificados</h2>
      </div>
      <div class="col">
        <a class="btn btn-secondary text-uppercase d-flex align-items-center" href="<?php echo INCLUDE_PATH; ?>classificados">
          <i class="bi bi-plus-lg icon"></i>
          Novo classificado
        </a>
      </div>
    </div>
  </section>
  <!-- Fim Seção classificado -->

  <!-- Card de classificado -->
  <section class="d-flex justify-content-center row g-4">

    <!-- Fazendo consulta no banco de dados na tabela noticia -->
    <?php
    $sql = "SELECT * FROM noticia ORDER BY data_postagem DESC";
    $res = $mysqli->query($sql);
    $qtd = $res->num_rows;
    $mes = ['01' => 'janeiro', '02' => 'fevereiro', '03' => 'março', '04' => 'abril'];

    if ($qtd > 0) {
      while ($linha = $res->fetch_object()) {
        $data_postagem = date('m', strtotime($linha->data_postagem));
        $dia =  date('d', strtotime($linha->data_postagem));
        $ano =  date('Y', strtotime($linha->data_postagem));
    ?>
        <div class="col-10 col-md-3 col-md-3">
          <div class="card">
            <!-- <img src="img/imagem-da-notIcia.png" class="card-img-top" alt="Logo-news"> -->
            <div class="card-body">
              <h5 class="card-title"><?php echo $linha->titulo; ?></h5>
              <p class="card-text"><?php echo $linha->descricao; ?></p>
              <p class="card-text"><small class="text-body-secondary"><?php echo $dia . " de " . $mes[$data_postagem] . " de " . $ano; ?></small></p>
              <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                  <a href="<?php echo INCLUDE_PATH; ?>editar?id=<?php echo $linha->id; ?>" class="btn btn-primary">Editar</a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                  <a onclick="apagar(<?php echo $linha->id; ?>)" href="#" class="btn btn-danger">Excluir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo "Sem classificados.";
    }
    ?>
  </section>
  <!-- Fim Card de classificado -->
</main>

<!-- Apagar classificado -->
<script>
  function apagar(id) {
    if (confirm("Deseja apagar o classificado?")) {
      window.location = "<?php echo INCLUDE_PATH; ?>excluir_noticia?id=" + id;
    }


  }
</script>
<!-- Fim Apagar classificado -->