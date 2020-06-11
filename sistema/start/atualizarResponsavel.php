<?php

$id = $_GET['edit'];
$_SESSION['idResponsavel'] = $id;
$connect = new mysqli("localhost", "root", "", "asiloemfoco");
$selectResponsavel = mysqli_query($connect, "SELECT * FROM responsavel WHERE idResponsavel = $id");
$arrayResponsavel = mysqli_fetch_assoc($selectResponsavel);

$loginId = $arrayResponsavel['loginId'];

$contatoId = $arrayResponsavel['contatoId'];

$enderecoId = $arrayResponsavel['enderecoId'];

$selectLogin = mysqli_query($connect, "SELECT `password` FROM `login` WHERE idLogin = '$loginId'");
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
    $_SESSION['idResponsavel'] = $id;
    $_SESSION['senhaAtualResponsavel'] = $arrayLogin['password'];
    $_SESSION['nomeResponsavel'] = $arrayResponsavel['nome'];
    $_SESSION['cpfResponsavel'] = $arrayResponsavel['cpf'];
    $_SESSION['emailResponsavel'] = $arrayResponsavel['email'];
    $_SESSION['dataNascResponsavel'] = $arrayResponsavel['dataNasc'];
    $_SESSION['telefoneResponsavel'] = $arrayContato['telefone'];
    ?>

    <!-- Main -->
    <div id="main" class="margin">
        <div class="container">
            <form action="updateResponsavel.php" method="POST">
                <div class="form-group" id="responsavel">
                    <label for="senhaAtualResponsavel">Senha atual:</label> <input type="text" id="senhaAtualResponsavel" name="senhaAtualResponsavel" class="form-control" value="<?php echo $_SESSION['senhaResponsavel']; ?>"><br />
                    <label for="novaSenhaResponsavel">Nova Senha:</label> <input type="password" id="novaSenhaResponsavel" name="novaSenhaResponsavel" class="form-control"><br />
                    <label for="password">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenhaResponsavel" name="confirmaNovaSenhaResponsavel" class="form-control"><br />
                    <label for="nomeResponsavel">Nome: </label><input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control" value="<?php echo $_SESSION['nomeResponsavel']; ?>"><br />
                    <label for="cfpResponsavel">CPF:</label> <input type="text" name="cpfResponsavel" id="cpfResponsavel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cpfResponsavel']; ?>"><br />
                    <label for="emailResponsavel">E-Mail:</label> <input type="email" name="emailResponsavel" id="emailResponsavel" class="form-control" class="form-control" value="<?php echo $_SESSION['emailResponsavel']; ?>"><br />
                    <label for="dataNascResponsavel">Data de Nascimento: </label> <input type="date" id="dataNascResponsavel" name="dataNascResponsavel" class="form-control" value="<?php echo $_SESSION['dataNascResponsavel']; ?>"><br />
                    <label for="telefoneResponsavel">Telefone:</label><input type="text" name="telefoneResponsavel" id="telefoneResponsavel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['telefoneResponsavel']; ?>"><br />
                    <label for="tipoTelResponsavel">Tipo do Telefone:</label>
                    <select name="tipoTelResponsavel" id="tipoTelResponsavel" class="form-control">
                        <option value="1" <?php echo $arrayContato['tipo'] == 1 ? 'selected' : ''; ?>>Residencial</option>
                        <option value="2" <?php echo $arrayContato['tipo'] == 2 ? 'selected' : ''; ?>>Celular</option>
                        <option value="3" <?php echo $arrayContato['tipo'] == 3 ? 'selected' : ''; ?>>Comercial</option>
                    </select><br />
                    <label for="cepResponsavel">CEP: </label><input type="text" name="cepResponsavel" id="cepResponsavel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cepResponsavel']; ?>"><br />
                    <label for="logradouroResponsavel">Logradouro: </label> <input type="text" name="logradouroResponsavel" id="logradouroResponsavel" class="form-control" value="<?php echo $_SESSION['logradouroResponsavel']; ?>"><br />
                    <label for="numeroResponsavel">Número: </label> <input type="text" name="numeroResponsavel" id="numeroResponsavel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['numeroResponsavel']; ?>"><br />
                    <label for="complementoResponsavel">Complemento: </label> <input type="text" name="complementoResponsavel" id="complementoResponsavel" class="form-control" value="<?php echo $_SESSION['complementoResponsavel']; ?>"><br />
                    <label for="bairroResponsavel">Bairro: </label> <input type="text" name="bairroResponsavel" id="bairroResponsavel" class="form-control" value="<?php echo $_SESSION['bairroResponsavel']; ?>"><br />
                    <label for="cidadeResponsavel">Cidade: </label> <input type="text" name="cidadeResponsavel" name="cidadeResponsavel" class="form-control" value="<?php echo $_SESSION['cidadeResponsavel']; ?>"><br />
                    <label for="estadoResponsavel">Estado:</label>
                    <select name="estadoResponsavel" id="estadoResponsavel" class="form-control">
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
                    <input class="form-control" type="submit" value="Atualizar" name="atualizarResponsavel" id="atualizarResponsavel">
                    <input class="form-control" type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoResponsaveis.php';" /><br />
                </center>
            </form>
        </div>
    </div>

</body>

</html>