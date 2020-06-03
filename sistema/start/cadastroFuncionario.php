<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>SGA - Cadastro de Funcionário</title>
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
            margin-top: 5%;
        }

        .main {
            margin-bottom: 5%;
        }
    </style>

    <!-- Navigation -->
    <?php include './header.php'; ?>

    <div class="main">
        <div class="container">
            <section>
                <form action="insertFuncionario.php" method="POST">
                    <div class="form-group margin" id="funcionario">
                        <label for="loginFuncionario">Usuário:</label> <input class="form-control" type="text" id="loginFuncionario" name="loginFuncionario" required><br />
                        <label for="senhaFuncionario">Senha:</label> <input class="form-control" type="password" id="senhaFuncionario" name="senhaFuncionario" required><br />
                        <label for="senhaFuncionario">Confirmar senha:</label> <input class="form-control" type="password" id="confirmaSenhaFuncionario" name="confirmaSenhaFuncionario" required><br />
                        <label for="nomeFuncionario">Nome completo:</label> <input class="form-control" type="text" id="nomeFuncionario" name="nomeFuncionario" required><br />
                        <label for="cpfFuncionario">CPF: </label> <input class="form-control" type="text" id="cpfFuncionario" name="cpfFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="dataNascFuncionario">Data de Nascimento: </label> <input class="form-control" type="date" id="dataNascFuncionario" name="dataNascFuncionario" required><br /><br />
                        <label for="emailFuncionario">E-Mail: </label> <input class="form-control" type="email" name="emailFuncionario" id="emailFuncionario" required><br />
                        <label for="telefoneFuncionario">Telefone: </label><input class="form-control" type="text" name="telefoneFuncionario" id="telefoneFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="telefoneFuncionario">Tipo do Telefone:</label>
                        <select class="form-control" name="tipoTelFuncionario" id="tipoTelFuncionario">
                            <option value="1">Residencial</option>
                            <option value="2">Celular</option>
                            <option value="3">Comercial</option>
                        </select><br />
                        <label for="corenFuncionario">COREN</label>
                        <select class="form-control" name="estadoCorenFuncionario" id="estadoCorenFuncionario">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select><br />
                        <input class="form-control" type="text" name="numeroCorenFuncionario" id="numeroCorenFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="tipoFormnacaoFuncionario">Tipo de formação:</label>
                        <select class="form-control" name="tipoFormacaoFuncionario" id="tipoFormacaoFuncionario">
                            <option value="1">Enfermagem</option>
                            <option value="2">Técnico em enfermagem</option>
                        </select><br />
                        <label for="cepFuncionario">CEP: </label> <input class="form-control" type="text" name="cepFuncionario" id="cepFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="logradouroFuncionario">Logradouro: </label> <input class="form-control" type="text" name="logradouroFuncionario" id="logradouroFuncionario" required><br />
                        <label for="numeroFuncionario">Número: </label> <input class="form-control" type="text" name="numeroFuncionario" id="numeroFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                        <label for="complementoFuncionario">Complemento: </label> <input class="form-control" type="text" name="complementoFuncionario" id="complementoFuncionario"><br />
                        <label for="bairroFuncionario">Bairro: </label> <input class="form-control" type="text" name="bairroFuncionario" id="bairroFuncionario" required><br />
                        <label for="cidadeFuncionario">Cidade: </label> <input class="form-control" type="text" name="cidadeFuncionario" name="cidadeFuncionario" required><br />
                        <label for="estadoFuncionario">Estado:</label>
                        <select class="form-control" name="estadoFuncionario" id="estadoFuncionario">
                            <option value="1">Acre</option>
                            <option value="2">Alagoas</option>
                            <option value="3">Amapá</option>
                            <option value="4">Amazonas</option>
                            <option value="5">Bahia</option>
                            <option value="6">Ceará</option>
                            <option value="7">Distrito Federal</option>
                            <option value="8">Espírito Santo</option>
                            <option value="9">Goiás</option>
                            <option value="10">Maranhão</option>
                            <option value="11">Mato Grosso</option>
                            <option value="12">Mato Grosso do Sul</option>
                            <option value="13">Minas Gerais</option>
                            <option value="14">Pará</option>
                            <option value="15">Paraíba</option>
                            <option value="16">Paraná</option>
                            <option value="17">Pernambuco</option>
                            <option value="18">Piauí</option>
                            <option value="19">Rio de Janeiro</option>
                            <option value="20">Rio Grande do Norte</option>
                            <option value="21">Rio Grande do Sul</option>
                            <option value="22">Rondônia</option>
                            <option value="23">Roraima</option>
                            <option value="24">Santa Catarina</option>
                            <option value="25">São Paulo</option>
                            <option value="26">Sergipe</option>
                            <option value="27">Tocantins</option>
                        </select><br />
                    </div>
                    <center>
                        <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='gerenciamentoFuncionarios.php';" />
                        <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
                    </center>
                </form>
            </section>
        </div>
    </div>
</body>

</html>