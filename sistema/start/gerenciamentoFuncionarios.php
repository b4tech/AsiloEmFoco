<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Gerenciamento de Funcionários</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <?php

    $perfil = $_SESSION['perfil'];
    $funcionarioId = $_SESSION['idFuncionario'];
    $asiloId = $_SESSION['idAsilo'];

    $connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

    // Select Funcionário
    switch ($perfil) {
        case '0':
            $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario`");
            break;
        case '1':
            $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario` WHERE asiloId = '$asiloId'");
            break;
        case '2':
            $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario`");
            break;
        case '3':
            $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario`");
            break;
    }

    // Comando para criar matriz de dados de acordo com o select acima
    $arrayFuncionario = mysqli_fetch_assoc($selectFuncionario); // cria a instrução SQL que vai selecionar os dados
    $total = mysqli_num_rows($selectFuncionario);

    $contatoId = $arrayFuncionario['contatoId'];
    $selectContatoId = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = '$contatoId'");
    $arrayContato = mysqli_fetch_assoc($selectContatoId);

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
        <div class="row">
            <!-- Menu lateral -->
            <?php include 'nav-left.php'; ?>

            <div class="col-lg-9 my-4">
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="location.href='cadastroFuncionario.php';">Novo Cadastro</button>
                <div class="main">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Nascimento</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Formação</th>
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
                                        <th scope="row"><?= $arrayFuncionario['idFuncionario'] ?></th>
                                        <td><?= $arrayFuncionario['nome'] ?></td>
                                        <td><?= $arrayFuncionario['cpf'] ?></td>
                                        <td><?= $arrayFuncionario['dataNasc'] ?></td>
                                        <td><?= $arrayContato['telefone'] ?></td>
                                        <td>
                                            <?php if ($arrayFuncionario['formacaoId'] == 1) {
                                                echo 'Enfermeiro';
                                            } else echo 'Técnico em Enfermagem';
                                            ?>
                                        </td>
                                        <td>
                                            <button style="font-size:11px" onclick="location.href='atualizarFuncionario.php?edit=<?php echo $arrayFuncionario['idFuncionario']; ?>'">Editar <i class="fas fa-user-edit"></i></button>
                                            <button style="font-size:11px" onclick="location.href='deleteFuncionario.php?delete=<?php echo $arrayFuncionario['idFuncionario']; ?>'">Excluir <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($arrayFuncionario = mysqli_fetch_assoc($selectFuncionario));
                            // fim do if 
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>