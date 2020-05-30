<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Gerenciamento de Prontuários</title>

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

    $idResponsavel = $_SESSION['idResponsavel'];

    $connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

    $selectIdoso = mysqli_query($connect, "SELECT nome FROM `idoso` WHERE responsavelId = '$idResponsavel'");
    $arrayIdoso = mysqli_fetch_assoc($selectIdoso);

    // Select prontuario
    $selectProntuario = mysqli_query($connect, "SELECT * FROM `prontuario`");
    // Comando para criar matriz de dados de acordo com o select acima
    $arrayProntuario = mysqli_fetch_assoc($selectProntuario); // cria a instrução SQL que vai selecionar os dados
    $total = mysqli_num_rows($selectProntuario);
    

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
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="location.href='cadastroProntuario.php';">Novo Cadastro</button>
                <div class="main">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Idoso</th>
                                <th scope="col">Data</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>

                        <?php
                        // se o número de resultados for maior que zero, mostra os dados
                        mostrarProntuario();
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
<?php
    function mostrarProntuario() {
        global $total, $arrayProntuario, $selectProntuario, $arrayIdoso;
        if ($total > 0) {
            // inicia o loop que vai mostrar todos os dados
            do {
        ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $arrayProntuario['idProntuario'] ?></th>
                        <td><?= $arrayIdoso['nome'] ?></td>
                        <td><?= $arrayProntuario['data'] ?></td>
                        <td><?= $arrayProntuario['hora'] ?></td>
                        <td><?= $arrayProntuario['descricao'] ?></td>
                        <td>
                            <button style="font-size:12px" onclick="location.href='atualizarProntuario.php?edit=<?php echo $arrayProntuario['idProntuario']; ?>'">Editar <i class="fas fa-user-edit"></i></button>
                            <button style="font-size:12px" onclick="location.href='deleteProntuario.php?delete=<?php echo $arrayProntuario['idProntuario']; ?>'">Excluir <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
        <?php
                // finaliza o loop que vai mostrar os dados
            } while ($arrayProntuario = mysqli_fetch_assoc($selectProntuario));
            // fim do if 
        }
    }
?>