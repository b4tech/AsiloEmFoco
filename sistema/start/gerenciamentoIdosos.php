<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Gerenciamento de Idosos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="../../ferramentas/graficos/ico.png">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <?php 
    
    $perfil = $_SESSION['perfil'];
    $responsavelId = $_SESSION['idResponsavel'];
    $asiloId = $_SESSION['idAsilo'];

    $connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

    // Select Idoso
    switch ($perfil) {
        case '0':
            $selectIdoso = mysqli_query($connect, "SELECT * FROM `idoso`");
            break;
        case '1':
            $selectIdoso = mysqli_query($connect, "SELECT * FROM `idoso`, `responsavel` WHERE responsavel.asiloId = '$asiloId'");
            break;
        case '2':
            $selectIdoso = mysqli_query($connect, "SELECT * FROM `idoso` WHERE responsavelId = '$responsavelId'");
            break;
        case '3':
            $selectIdoso = mysqli_query($connect, "SELECT * FROM `asilo`, `responsavel`, `funcionario` WHERE idoso.responsavelId = '$responsavelId' AND responsavel.asiloId = '$asiloId' AND funcionario.asiloId = '$asiloId'");
            break;
    }

    // Comando para criar matriz de dados de acordo com o select acima
    $arrayIdoso = mysqli_fetch_assoc($selectIdoso); // cria a instrução SQL que vai selecionar os dados
    $total = mysqli_num_rows($selectIdoso);

    ?>

    <?php

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
        <!-- Menu lateral -->
        <div class="row">
            <?php include 'nav-left.php'; ?>

            <?php
                if ($perfil == 1 ) { 

            ?>
            <div class="col-lg-9 my-4">
                <div class="main">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Nascimento</th>
                            </tr>
                        </thead>

                        <?php
                        // se o número de resultados for maior que zero, mostra os dados
                        if ($total > 0) {
                            // inicia o loop que vai mostrar todos os dados
                            do {
                        ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $arrayIdoso['idIdoso'] ?></th>
                                        <td><?= $arrayIdoso['nome'] ?></td>
                                        <td><?= $arrayIdoso['cpf'] ?></td>
                                        <td><?= $arrayIdoso['dataNasc'] ?></td>
                                    </tr>
                                </tbody>
                        <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($arrayIdoso = mysqli_fetch_assoc($selectIdoso));
                            // fim do if 
                        }
                        ?>
                    </table>
                </div>
            </div>
            <?php
                } else {
            ?>
            <div class="col-lg-9 my-4">
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="location.href='cadastroIdoso.php';">Novo Cadastro</button>
                <div class="main">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Nascimento</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>

                        <?php
                        // se o número de resultados for maior que zero, mostra os dados
                        if ($total > 0) {
                            // inicia o loop que vai mostrar todos os dados
                            do {
                        ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $arrayIdoso['idIdoso'] ?></th>
                                        <td><?= $arrayIdoso['nome'] ?></td>
                                        <td><?= $arrayIdoso['cpf'] ?></td>
                                        <td><?= $arrayIdoso['dataNasc'] ?></td>
                                        <td>
                                            <button style="font-size:12px" onclick="location.href='atualizarIdoso.php?edit=<?php echo $arrayIdoso['idIdoso']; ?>'">Editar <i class="fas fa-user-edit"></i></button>
                                            <button style="font-size:12px" onclick="location.href='deleteIdoso.php?delete=<?php echo $arrayIdoso['idIdoso']; ?>'">Excluir <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($arrayIdoso = mysqli_fetch_assoc($selectIdoso));
                            // fim do if 
                        }
                        ?>
                    </table>
                </div>
            </div>
            <?php
                }
            ?>

        </div>
    </div>

</body>

</html>