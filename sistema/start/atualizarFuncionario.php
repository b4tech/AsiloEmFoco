<?php

$id = $_GET['edit'];
$_SESSION['idFuncionario'] = $id;
$connect = new mysqli("localhost", "root", "", "asiloemfoco");
$selectFuncionario = mysqli_query($connect, "SELECT * FROM funcionario WHERE idFuncionario = $id");
$arrayFuncionario = mysqli_fetch_assoc($selectFuncionario);

$loginId = $arrayFuncionario['loginId'];

$contatoId = $arrayFuncionario['contatoId'];

$enderecoId = $arrayFuncionario['enderecoId'];

$formacaoId = $arrayFuncionario['formacaoId'] ;

$selectLogin = mysqli_query($connect, "SELECT `password` FROM `login` WHERE idLogin = '$loginId'");
$arrayLogin = mysqli_fetch_assoc($selectLogin);

$selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = '$contatoId'");
$arrayContato = mysqli_fetch_assoc($selectContato);

$selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = '$enderecoId'");
$arrayEndereco = mysqli_fetch_assoc($selectEndereco);
$estadoId = $arrayEndereco['estadoId'];

$selectFormacao = mysqli_query($connect, "SELECT * FROM `formacaofuncionario` WHERE idFormacaoFuncionario = '$formacaoId'");
$arrayFormacao = mysqli_fetch_assoc($selectFormacao);

$selectEstado = mysqli_query($connect, "SELECT nome FROM `estado` WHERE idEstado = '$estadoId'");
$arrayEstado = mysqli_fetch_assoc($selectEstado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Atualizar Funcionário</title>

    <link rel="shortcut icon" href="/asiloemfoco/ferramentas/graficos/ico.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>

    <style>
        .margin {
            margin-top: 5%;
        }

        .main {
            margin-bottom: 5%;
        }
    </style>

    <!-- Navigation -->
    <?php include './header.php'; ?>
    <?php
        $_SESSION['idContatoFuncionario'] = $contatoId;
        $_SESSION['idLoginFuncionario'] = $loginId;
        $_SESSION['idEnderecoFuncionario'] = $enderecoId;
        $_SESSION['idFormacaoFuncionario'] = $arrayFormacao['tipoFormacao'];
    ?>

    <!-- Page Content -->
    <center>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="updateFuncionario.php" method="POST">
                        <div class="form-group margin" id="funcionario">
                            <label for="senhaAtualFuncionario">Senha atual:</label> <input class="form-control" type="text" id="senhaAtualFuncionario" name="senhaAtualFuncionario"value="<?php echo $arrayLogin['password']; ?>" ><br />
                            <label for="senhaNovaFuncionario">Nova senha:</label> <input class="form-control" type="password" id="senhaNovaFuncionario" name="senhaNovaFuncionario" ><br />
                            <label for="confirmarSenhaNovaFuncionario">Confirmar senha:</label> <input class="form-control" type="password" id="confirmarSenhaNovaFuncionario" name="confirmarSenhaNovaFuncionario" ><br />
                            <label for="nomeFuncionario">Nome completo:</label> <input class="form-control" type="text" id="nomeFuncionario" name="nomeFuncionario"  value="<?php echo $arrayFuncionario['nome']; ?>"><br />
                            <label for="cpfFuncionario">CPF: </label> <input class="form-control" type="text" id="cpfFuncionario" name="cpfFuncionario"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arrayFuncionario['cpf']; ?>"><br />
                            <label for="dataNascFuncionario">Data de Nascimento: </label> <input class="form-control" type="date" id="dataNascFuncionario" name="dataNascFuncionario" value="<?php echo $arrayFuncionario['dataNasc']; ?>"><br /><br />
                            <label for="emailFuncionario">E-Mail: </label> <input class="form-control" type="email" name="emailFuncionario" id="emailFuncionario" value="<?php echo $arrayFuncionario['email']; ?>"><br />
                            <label for="telefoneFuncionario">Telefone: </label><input class="form-control" type="text" name="telefoneFuncionario" id="telefoneFuncionario"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arrayContato['telefone']; ?>"><br />
                            <label for="telefoneFuncionario">Tipo do Telefone:</label>
                            <select class="form-control" name="tipoTelFuncionario" id="tipoTelFuncionario">
                                <option value="1" <?php echo $arrayContato['tipo'] == 1 ? 'selected' : ''; ?>>Residencial</option>
                                <option value="2" <?php echo $arrayContato['tipo'] == 2 ? 'selected' : ''; ?>>Celular</option>
                                <option value="3" <?php echo $arrayContato['tipo'] == 3 ? 'selected' : ''; ?>>Comercial</option>
                            </select><br />
                            <label for="tipoFormnacaoFuncionario">Tipo de formação:</label>
                            <select class="form-control" name="tipoFormacaoFuncionario" id="tipoFormacaoFuncionario">
                                <option value="1" <?php echo $arrayFormacao['tipoFormacao'] == 1 ? 'selected' : ''; ?>>Enfermeiro</option>
                                <option value="2" <?php echo $arrayFormacao['tipoFormacao'] == 2 ? 'selected' : ''; ?>>Técnico em enfermagem</option>
                            </select><br />
                            <label for="cepFuncionario">CEP: </label> <input class="form-control" type="text" name="cepFuncionario" id="cepFuncionario"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arrayEndereco['cep']; ?>"><br />
                            <label for="logradouroFuncionario">Logradouro: </label> <input class="form-control" type="text" name="logradouroFuncionario" id="logradouroFuncionario" value="<?php echo $arrayEndereco['logradouro']; ?>"><br />
                            <label for="numeroFuncionario">Número: </label> <input class="form-control" type="text" name="numeroFuncionario" id="numeroFuncionario"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arrayEndereco['numero']; ?>"><br />
                            <label for="complementoFuncionario">Complemento: </label> <input class="form-control" type="text" name="complementoFuncionario" id="complementoFuncionario" value="<?php echo $arrayEndereco['complemento']; ?>"><br />
                            <label for="bairroFuncionario">Bairro: </label> <input class="form-control" type="text" name="bairroFuncionario" id="bairroFuncionario" value="<?php echo $arrayEndereco['bairro']; ?>"><br />
                            <label for="cidadeFuncionario">Cidade: </label> <input class="form-control" type="text" name="cidadeFuncionario" name="cidadeFuncionario" value="<?php echo $arrayEndereco['cidade']; ?>"><br />
                            <label for="estadoFuncionario">Estado:</label>
                            <select class="form-control" name="estadoFuncionario" id="estadoFuncionario">
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
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoFuncionarios.php';" />
                            <input type="submit" value="Atualizar" name="atualizarAsilo" id="atualizarAsilo">
                        </center>
                    </form>
                </section>
            </div>
        </div>
    </center>
</body>

</html>