<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Gerenciamento de Asilos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <?php $perfil = $_SESSION['perfil'];

    switch ($perfil) {
        case '0':
            $admin = "block";
            $asilo = "none";
            $responsavel = "none";
            $funcionario = "none";
            break;
        case '1':
            $admin = "none";
            $asilo = "block";
            $responsavel = "none";
            $funcionario = "none";
            break;
        case '2':
            $admin = "none";
            $asilo = "none";
            $responsavel = "block";
            $funcionario = "none";
            break;
        case '3':
            $admin = "none";
            $asilo = "none";
            $responsavel = "none";
            $funcionario = "block";
            break;
    } ?>

    <style>
        .mainAdmin {
            display: <?php echo $admin; ?>
        }

        .mainAsilo {
            display: <?php echo $asilo; ?>
        }

        .mainResponsavel {
            display: <?php echo $responsavel; ?>
        }

        .mainFuncionario {
            display: <?php echo $funcionario; ?>
        }
    </style>

    <div class="container">
        <div class="row">
            <!-- Menu lateral -->
            <?php include 'nav-left.php'; ?>


        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>