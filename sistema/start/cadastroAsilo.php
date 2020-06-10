<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Sobre</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include './header.php'; ?>

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
        .margin {
            margin-top: 20px
        }
    </style>

<div id="main" class="margin">
    <div class="container">
            <form class="form-group" action="insertAsilo.php" method="POST">
                <div class="asilo" id="asilo">
                    <label for="login">Usuário:</label> <input class="form-control" type="text" id="login" name="login" required><br />
                    <label for="senha">Senha:</label> <input class="form-control" type="password" id="senha" name="senha" required><br />
                    <label for="senha">Confirmar senha:</label> <input class="form-control" type="password" id="confirmaSenha" name="confirmaSenha" required><br />
                    <label for="razaoSocial">Razão Social: </label><input class="form-control" type="text" name="razaoSocial" id="razaoSocial" required><br />
                    <label for="cnpj">CNPJ:</label> <input class="form-control" type="text" name="cnpj" id="cnpj" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                    <label for="email">E-Mail:</label> <input  class="form-control" type="email" name="email" id="email" required><br />
                    <label for="telefone">Telefone:</label><input class="form-control" type="text" name="telefone" id="telefone" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                    <label for="telefone">Tipo do Telefone:</label>
                    <select class="form-control" name="tipoTel" id="tipoTel">
                        <option value="1">Residencial</option>
                        <option value="2">Celular</option>
                        <option value="3">Comercial</option>
                    </select><br />
                    <label for="cep">CEP: </label><input class="form-control" type="text" name="cep" id="cep" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                    <label for="logradouro">Logradouro: </label> <input class="form-control" type="text" name="logradouro" id="logradouro" required><br />
                    <label for="numero">Número: </label> <input class="form-control" type="text" name="numero" id="numero" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
                    <label for="complemento">Complemento: </label> <input class="form-control" type="text" name="complemento" id="complemento"><br />
                    <label for="bairro">Bairro: </label> <input class="form-control" type="text" name="bairro" id="bairro" required><br />
                    <label for="cidade">Cidade: </label> <input class="form-control" type="text" name="cidade" name="cidade" required><br />
                    <label for="estado">Estado:</label>
                    <select class="form-control" name="estado" id="estado">
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
                    <input class="form-control" type="button" class="submit" value="Voltar" class="special" onclick="location.href='login.html';" /><br />
                    <input class="form-control" type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
                </center>
            </form>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>