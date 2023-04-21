<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornal</title>
    <link rel="shortcut icon" href="img/logo-jornal.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <header class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo INCLUDE_PATH; ?>">
                    <img src="img/logo-jornal.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col mt-5">

                <?php
                include('paginas/conexao.php');

                $url = isset($_GET['url']) ? $_GET['url'] : 'home';
                if (file_exists('paginas/' . $url . '.php')) {
                    include('paginas/' . $url . '.php');
                }

                ?>
            </div>
        </div>
    </div>

    <footer class="container mt-5">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo INCLUDE_PATH; ?>">
                    <img src="img/logo-jornal.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <?php
                    if (isset($qtd)) {
                        echo $qtd . " Classificados";
                    }
                    ?>
                </a>
            </div>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>