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
    $asiloId = $_SESSION['idAsilo'];

    include_once 'conexao.php';

    // Select Funcionário
    switch ($perfil) {
        case '0':
            $selectAsilo = mysqli_query($connect, "SELECT * FROM `asilo`");
            break;
    }

    // Comando para criar matriz de dados de acordo com o select acima
    $arrayAsilo = mysqli_fetch_assoc($selectAsilo); // cria a instrução SQL que vai selecionar os dados
    $total = mysqli_num_rows($selectAsilo);
    if ($total > 0) {
        $contatoId = $arrayAsilo['contatoId'];
        $selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = '$contatoId'");
        $arrayContato = mysqli_fetch_assoc($selectContato);
        $enderecoId = $arrayAsilo['enderecoId'];
        $selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = '$enderecoId'");
        $arrayEndereco = mysqli_fetch_assoc($selectEndereco);
    }


    ?>

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

            <div class="col-lg-9 my-4">
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="location.href='cadastroAsilo.php';">Novo Cadastro</button>
                <div class="main">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Email</th>
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
                                        <th scope="row"><?= $arrayAsilo['idAsilo'] ?></th>
                                        <td><?= $arrayAsilo['razaoSocial'] ?></td>
                                        <td><?= $arrayAsilo['cnpj'] ?></td>
                                        <td>
                                            <?php echo $arrayEndereco['logradouro'] . ', ' . $arrayEndereco['numero'] . ' - ' . $arrayEndereco['bairro'] ?>
                                        </td>
                                        <td><?= $arrayContato['telefone'] ?></td>
                                        <td><?= $arrayAsilo['email'] ?></td>
                                        <td>
                                            <button style="font-size:11px" onclick="location.href='atualizarAsilo.php?edit=<?php echo $arrayAsilo['idAsilo']; ?>'">Editar <i class="fas fa-user-edit"></i></button>
                                            <button style="font-size:11px" onclick="location.href='deleteAsilo.php?delete=<?php echo $arrayAsilo['idAsilo']; ?>'">Excluir <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($arrayAsilo = mysqli_fetch_assoc($selectAsilo));
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