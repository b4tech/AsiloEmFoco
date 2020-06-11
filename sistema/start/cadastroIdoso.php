<!DOCTYPE HTML>
<html>

<head>
    <title>SGA - Cadastro de Idoso</title>
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
    <!-- Main -->
    <div id="main">
        <div class="container">
            <section>
                <form action="insertIdoso.php" method="POST">
                    <div class="form-group margin" id="idoso">
                        <label for="nome">Nome completo:</label> <input class="form-control" type="text" id="nomeIdoso" name="nomeIdoso" required><br />
                        <label for="cpf">CPF: </label> <input class="form-control" type="text" id="cpfIdoso" name="cpfIdoso" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="dataNasc">Data de Nascimento: </label> <input class="form-control" type="date" id="dataNascIdoso" name="dataNascIdoso" required><br /><br />
                    </div>
                    <center>
                        <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
                        <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoIdosos.php';" />
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