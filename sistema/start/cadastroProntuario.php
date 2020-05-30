<!DOCTYPE HTML>
<html>

<head>
    <title>SGA - Cadastro de Prontuário</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <!-- <link rel="stylesheet" href="../../assets/css/main.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../ferramentas/graficos/ico.png">
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>
    <style>
        .margin {
            margin-top: 10%;
        }
    </style>
    <!-- Header -->
    <?php include './header.php'; ?>
    <?php
    $idResponsavel = $_SESSION['idResponsavel'];
    $connect = new mysqli("localhost", "root", "", "asiloemfoco");
    $selectIdoso = mysqli_query($connect, "SELECT idIdoso, nome FROM `idoso` WHERE responsavelId = '$idResponsavel'");
    $arrayIdoso = mysqli_fetch_assoc($selectIdoso);
    $total = mysqli_num_rows($selectIdoso);
    ?>
    <!-- Main -->
    <div id="main">
        <div class="container">
            <section>
                <form action="insertProntuario.php" method="POST">
                    <div class="form-group margin" id="prontuario">
                        <label for="nomeIdosoProntuario">Idoso:</label><br />
                        <select class="form-control" name="nomeIdosoProntuario" id="nomeIdosoProntuario">
                        <?php
                        // se o número de resultados for maior que zero, mostra os dados
                        if ($total > 0) {
                            // inicia o loop que vai mostrar todos os dados
                            do {
                        ?>
                            <option value="<?php echo $arrayIdoso['idIdoso']; ?>"><?php echo $arrayIdoso['nome']; ?></option>
                        <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($arrayIdoso = mysqli_fetch_assoc($selectIdoso));
                            // fim do if 
                        }
                        ?>
                        </select><br />
                        <label for="data">Data: </label> <input class="form-control" type="date" id="dataProntuario" name="dataProntuario" required><br />
                        <label for="hora">Hora: </label> <input class="form-control" type="time" id="horaProntuario" name="horaProntuario" required><br />
                        <label for="descricao">Descrição: </label> <input class="form-control" type="text" id="descricaoProntuario" name="descricaoProntuario" required><br /><br />
                    </div>
                    <center>
                        <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoProntuarios.php';" />
                        <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
                    </center>
                </form>
            </section>
        </div>
    </div>
    <div class="margin"></div>

    <!-- Scripts -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/jquery.poptrox.min.js"></script>
    <script src="../../assets/js/skel.min.js"></script>
    <script src="../../assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="../../assets/js/main.js"></script>

</body>

</html>