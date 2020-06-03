<?php 

$id = $_GET['edit'];
$connect = new mysqli("localhost", "root", "", "asiloemfoco");
$query = mysqli_query($connect, "SELECT * FROM idoso WHERE idIdoso = $id");
$arrayIdoso = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Atualizar Idoso</title>

    <link rel="shortcut icon" href="/asiloemfoco/ferramentas/graficos/ico.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>

    <!-- Navigation -->
    <?php include './header.php'; ?>
    <?php $_SESSION['nomeIdoso'] = $arrayIdoso['nome']; ?>
    <?php $_SESSION['cpfIdoso'] = $arrayIdoso['cpf']; ?>
    <?php $_SESSION['dataNascIdoso'] = $arrayIdoso['dataNasc']; ?>
    <?php $_SESSION['idIdoso'] = $id ?>
    <!-- Page Content -->
    <center>
        <div id="mainAsilo">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="updateIdoso.php" method="POST">
                        <div class="form-group" id="asilo">
                            <label for="nomeIdoso">Nome completo: </label><input type="text" name="nomeIdoso" id="nomeIdoso" required class="form-control" value="<?php echo $arrayIdoso['nome']; ?>"><br />
                            <label for="cfpIdoso">CPF:</label> <input type="text" name="cpfIdoso" id="cpfIdoso" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $arrayIdoso['cpf']; ?>"><br />
                            <label for="dataNasc">Data de Nascimento: </label><br /><input type="date" id="dataNascIdoso" name="dataNascIdoso" required value="<?php echo $arrayIdoso['dataNasc']; ?>"><br /><br />
                        </div>
                        <center>
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='index.php';" />
                            <input type="submit" value="Atualizar" name="atualizarAsilo" id="atualizarAsilo">
                        </center>
                    </form>
                </section>
            </div>
        </div>
    </center>
</body>

</html>