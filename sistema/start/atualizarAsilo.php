<?php

$id = $_GET['edit'];
include_once 'conexao.php';
$selectAsilo = mysqli_query($connect, "SELECT * FROM asilo WHERE idAsilo = $id");
$arrayAsilo = mysqli_fetch_assoc($selectAsilo);

$loginId = $arrayAsilo['loginId'];

$contatoId = $arrayAsilo['contatoId'];

$enderecoId = $arrayAsilo['enderecoId'];

$selectLogin = mysqli_query($connect, "SELECT * FROM `login` WHERE idLogin = '$loginId'");
$arrayLogin = mysqli_fetch_assoc($selectLogin);

$selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = '$contatoId'");
$arrayContato = mysqli_fetch_assoc($selectContato);

$selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = '$enderecoId'");
$arrayEndereco = mysqli_fetch_assoc($selectEndereco);
$estadoId = $arrayEndereco['estadoId'];

$selectEstado = mysqli_query($connect, "SELECT nome FROM `estado` WHERE idEstado = '$estadoId'");
$arrayEstado = mysqli_fetch_assoc($selectEstado);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>SGA - Atualizar Responsável</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="shortcut icon" href="../ferramentas/graficos/ico.png">
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>

    <style>
        .margin {
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>

    <!-- Header -->
    <?php include './header.php'; ?>

    <?php
    $_SESSION['idAsilo'] = $id;
    $_SESSION['senhaAtualAsilo'] = $arrayLogin['password'];
    $_SESSION['idLoginAsilo'] = $arrayLogin['idLogin'];
    $_SESSION['razaoSocialAsilo'] = $arrayAsilo['razaoSocial'];
    $_SESSION['cnpjAsilo'] = $arrayAsilo['cnpj'];
    $_SESSION['emailAsilo'] = $arrayAsilo['email'];
    $_SESSION['telefoneAsilo'] = $arrayContato['telefone'];
    ?>

    <!-- Main -->
    <div id="main" class="margin">
        <div class="container">
            <form action="updateAsilo.php" method="POST">
                <div class="form-group" id="Asilo">
                    <label for="senhaAtualAsilo">Senha atual:</label> <input type="text" id="senhaAtualAsilo" name="senhaAtualAsilo" class="form-control" value="<?php echo $_SESSION['senhaAtualAsilo']; ?>"><br />
                    <label for="novaSenhaAsilo">Nova Senha:</label> <input type="password" id="novaSenhaAsilo" name="novaSenhaAsilo" class="form-control"><br />
                    <label for="password">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenhaAsilo" name="confirmaNovaSenhaAsilo" class="form-control"><br />
                    <label for="razaoSocialAsilo">razaoSocial: </label><input type="text" name="razaoSocialAsilo" id="razaoSocialAsilo" class="form-control" value="<?php echo $_SESSION['razaoSocialAsilo']; ?>"><br />
                    <label for="cnpjAsilo">CNPJ:</label> <input type="text" name="cnpjAsilo" id="cnpjAsilo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cnpjAsilo']; ?>"><br />
                    <label for="emailAsilo">E-Mail:</label> <input type="email" name="emailAsilo" id="emailAsilo" class="form-control" class="form-control" value="<?php echo $_SESSION['emailAsilo']; ?>"><br />
                    <label for="telefoneAsilo">Telefone:</label><input type="text" name="telefoneAsilo" id="telefoneAsilo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['telefoneAsilo']; ?>"><br />
                    <label for="tipoTelAsilo">Tipo do Telefone:</label>
                    <select name="tipoTelAsilo" id="tipoTelAsilo" class="form-control">
                        <option value="1" <?php echo $arrayContato['tipo'] == 1 ? 'selected' : ''; ?>>Residencial</option>
                        <option value="2" <?php echo $arrayContato['tipo'] == 2 ? 'selected' : ''; ?>>Celular</option>
                        <option value="3" <?php echo $arrayContato['tipo'] == 3 ? 'selected' : ''; ?>>Comercial</option>
                    </select><br />
                    <label for="cepAsilo">CEP: </label><input type="text" name="cepAsilo" id="cepAsilo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cepAsilo']; ?>"><br />
                    <label for="logradouroAsilo">Logradouro: </label> <input type="text" name="logradouroAsilo" id="logradouroAsilo" class="form-control" value="<?php echo $_SESSION['logradouroAsilo']; ?>"><br />
                    <label for="numeroAsilo">Número: </label> <input type="text" name="numeroAsilo" id="numeroAsilo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['numeroAsilo']; ?>"><br />
                    <label for="complementoAsilo">Complemento: </label> <input type="text" name="complementoAsilo" id="complementoAsilo" class="form-control" value="<?php echo $_SESSION['complementoAsilo']; ?>"><br />
                    <label for="bairroAsilo">Bairro: </label> <input type="text" name="bairroAsilo" id="bairroAsilo" class="form-control" value="<?php echo $_SESSION['bairroAsilo']; ?>"><br />
                    <label for="cidadeAsilo">Cidade: </label> <input type="text" name="cidadeAsilo" name="cidadeAsilo" class="form-control" value="<?php echo $_SESSION['cidadeAsilo']; ?>"><br />
                    <label for="estadoAsilo">Estado:</label>
                    <select name="estadoAsilo" id="estadoAsilo" class="form-control">
                        <option value="1" <?php echo $arrayEstado['nome'] == 'Acre' ? 'selected' : ''; ?>>Acre</option>
                        <option value="2" <?php echo $arrayEstado['nome'] == 'Alagoas' ? 'selected' : ''; ?>>Alagoas</option>
                        <option value="3" <?php echo $arrayEstado['nome'] == 'Amapá' ? 'selected' : ''; ?>>Amapá</option>
                        <option value="4" <?php echo $arrayEstado['nome'] == 'Amazonas' ? 'selected' : ''; ?>>Amazonas</option>
                        <option value="5" <?php echo $arrayEstado['nome'] == 'Bahia' ? 'selected' : ''; ?>>Bahia</option>
                        <option value="6" <?php echo $arrayEstado['nome'] == 'Ceará' ? 'selected' : ''; ?>>Ceará</option>
                        <option value="7" <?php echo $arrayEstado['nome'] == 'Distrito Federal' ? 'selected' : ''; ?>>Distrito Federal</option>
                        <option value="8" <?php echo $arrayEstado['nome'] == 'Espítito Santo' ? 'selected' : ''; ?>>Espírito Santo</option>
                        <option value="9" <?php echo $arrayEstado['nome'] == 'Goiás' ? 'selected' : ''; ?>>Goiás</option>
                        <option value="10" <?php echo $arrayEstado['nome'] == 'Maranhão' ? 'selected' : ''; ?>>Maranhão</option>
                        <option value="11" <?php echo $arrayEstado['nome'] == 'Mato Grosso' ? 'selected' : ''; ?>>Mato Grosso</option>
                        <option value="12" <?php echo $arrayEstado['nome'] == 'Mato Gosso do Sul' ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                        <option value="13" <?php echo $arrayEstado['nome'] == 'Minas Gerais' ? 'selected' : ''; ?>>Minas Gerais</option>
                        <option value="14" <?php echo $arrayEstado['nome'] == 'Pará' ? 'selected' : ''; ?>>Pará</option>
                        <option value="15" <?php echo $arrayEstado['nome'] == 'Paraíba' ? 'selected' : ''; ?>>Paraíba</option>
                        <option value="16" <?php echo $arrayEstado['nome'] == 'Paraná' ? 'selected' : ''; ?>>Paraná</option>
                        <option value="17" <?php echo $arrayEstado['nome'] == 'Pernambuco' ? 'selected' : ''; ?>>Pernambuco</option>
                        <option value="18" <?php echo $arrayEstado['nome'] == 'Piauí' ? 'selected' : ''; ?>>Piauí</option>
                        <option value="19" <?php echo $arrayEstado['nome'] == 'Rio de Janeiro' ? 'selected' : ''; ?>>Rio de Janeiro</option>
                        <option value="20" <?php echo $arrayEstado['nome'] == 'Rio Grande do Norte' ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                        <option value="21" <?php echo $arrayEstado['nome'] == 'Rio Grande do Sul' ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                        <option value="22" <?php echo $arrayEstado['nome'] == 'Rondônia' ? 'selected' : ''; ?>>Rondônia</option>
                        <option value="23" <?php echo $arrayEstado['nome'] == 'Roraima' ? 'selected' : ''; ?>>Roraima</option>
                        <option value="24" <?php echo $arrayEstado['nome'] == 'Santa Catarina' ? 'selected' : ''; ?>>Santa Catarina</option>
                        <option value="25" <?php echo $arrayEstado['nome'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
                        <option value="26" <?php echo $arrayEstado['nome'] == 'Sergipe' ? 'selected' : ''; ?>>Sergipe</option>
                        <option value="27" <?php echo $arrayEstado['nome'] == 'Tocantins' ? 'selected' : ''; ?>>Tocantins</option>
                    </select><br />
                </div>
                <center>
                    <input class="form-control" type="submit" value="Atualizar" name="atualizarAsilo" id="atualizarAsilo">
                    <input class="form-control" type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoAsilos.php';" /><br />
                </center>
            </form>
        </div>
    </div>

</body>

</html>