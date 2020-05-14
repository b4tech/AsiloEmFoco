<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Configurações</title>

    <link rel="shortcut icon" href="/asiloemfoco/ferramentas/graficos/ico.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        #main {
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include './header.php'; ?>

    <!-- Page Content -->
    <center>
        <div id="main">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="atualizarAsilo.php" method="POST">
                        <div class="form-group" id="asilo">
                            <label for="login">Usuário:</label> <input type="text" id="login" name="login" required class="form-control" value=<?php echo $_SESSION['login']; ?>><br />
                            <label for="senha">Senha atual:</label> <input type="text" id="senhaAtual" name="senhaAtual" required class="form-control" value=<?php echo $_SESSION['senha']; ?>><br />
                            <label for="senha">Nova Senha:</label> <input type="password" id="novaSenha" name="novaSenha" required class="form-control"><br />
                            <label for="senha">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenha" name="confirmaNovaSenha" required class="form-control"><br />
                            <label for="razaoSocial">Razão Social: </label><input type="text" name="razaoSocial" id="razaoSocial" required class="form-control" value=<?php echo $_SESSION['razaoSocial']; ?>><br />
                            <label for="cnpj">CNPJ:</label> <input type="text" name="cnpj" id="cnpj" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value=<?php echo $_SESSION['cnpj']; ?>><br />
                            <label for="email">E-Mail:</label> <input type="email" name="email" id="email" required class="form-control" class="form-control" value=<?php echo $_SESSION['email']; ?>><br />
                            <label for="telefone">Telefone:</label><input type="text" name="telefone" id="telefone" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value=<?php echo $_SESSION['telefone']; ?>><br />
                            <label for="telefone">Tipo do Telefone:</label>
                            <select name="tipoTel" id="tipoTel" class="form-control">
                                <option value="1">Residencial</option>
                                <option value="2">Celular</option>
                                <option value="3">Comercial</option>
                            </select><br />
                            <label for="cep">CEP: </label><input type="text" name="cep" id="cep" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value=<?php echo $_SESSION['cep']; ?>><br />
                            <label for="logradouro">Logradouro: </label> <input type="text" name="logradouro" id="logradouro" required class="form-control" value=<?php echo $_SESSION['logradouro']; ?>><br />
                            <label for="numero">Número: </label> <input type="text" name="numero" id="numero" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value=<?php echo $_SESSION['numero']; ?>><br />
                            <label for="complemento">Complemento: </label> <input type="text" name="complemento" id="complemento" class="form-control"><?php echo $_SESSION['complemento']; ?><br />
                            <label for="bairro">Bairro: </label> <input type="text" name="bairro" id="bairro" required class="form-control" value=<?php echo $_SESSION['bairro']; ?>><br />
                            <label for="cidade">Cidade: </label> <input type="text" name="cidade" name="cidade" required class="form-control" value=<?php echo $_SESSION['cidade']; ?>><br />
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado" class="form-control">
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
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='index.php';" />
                            <input type="submit" value="Atualizar" name="atualizar" id="atualizar">
                        </center>
                    </form>
                </section>
            </div>
        </div>
    </center>
    <!-- /.container -->

    <!-- Footer -->
    <?php include './footer.php'; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>