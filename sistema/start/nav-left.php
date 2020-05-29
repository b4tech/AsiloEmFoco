<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <style>
        .foto-perfil {
            border-radius: 200px;
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>

    <div class="col-lg-3">

        <h1 class="my-4"><img class="foto-perfil" src="http://placehold.it/200x200" alt=""></h1>
        <h1>
            <?php
            switch ($perfil) {
                case '0':
                    echo 'Administrador';
                    break;
                case '1':
                    echo $_SESSION['razaoSocial'];
                    break;
                case '2':
                    echo $_SESSION['nomeResponsavel'];
                    break;
                case '3':
                    echo $_SESSION['nomeFuncionario'];
                    break;
            } ?>
        </h1>
        <div class="mainAdmin">
            <div class="list-group">
                <a href="gerenciamentoAsilos.php" class="list-group-item">Gerenciamento de Asilos</a>
                <a href="gerenciamentoResponsaveis.php" class="list-group-item">Gerenciamento de Responsáveis</a>
                <a href="gerenciamentoIdosos.php" class="list-group-item">Gerenciamento de Idosos</a>
                <a href="gerenciamentoProntuarios.php" class="list-group-item">Gerenciamento de Prontuários</a>
                <a href="gerenciamentoFuncionarios.php" class="list-group-item">Gerenciamento de Funcionários</a>
            </div>
        </div>
        <div class="mainAsilo">
            <div class="list-group">
                <a href="gerenciamentoFuncionarios.php" class="list-group-item">Gerenciamento de Funcionários</a>
                <a href="gerenciamentoResponsaveis.php" class="list-group-item">Gerenciamento de Responsáveis</a>
                <a href="gerenciamentoIdosos.php" class="list-group-item">Gerenciamento de Idosos</a>
                <a href="gerenciamentoProntuarios.php" class="list-group-item">Gerenciamento de Prontuários</a>
            </div>
        </div>
        <div class="mainResponsavel">
            <div class="list-group">
                <a href="gerenciamentoIdosos.php" class="list-group-item">Gerenciamento de Idosos</a>
                <a href="gerenciamentoProntuarios.php" class="list-group-item">Gerenciamento de Prontuários</a>
            </div>
        </div>
        <div class="mainFuncionario">
            <div class="list-group">
                <a href="gerenciamentoIdosos.php" class="list-group-item">Gerenciamento de Idosos</a>
                <a href="gerenciamentoProntuarios.php" class="list-group-item">Gerenciamento de Prontuários</a>
            </div>
        </div>
        <br />
        <div class="container bg-dark">
            <p class="m-0 text-center text-white">
                &copy; B4 Technologies <br />
                Todos os direitos reservados
            </p>
        </div>
    </div>
</body>

</html>