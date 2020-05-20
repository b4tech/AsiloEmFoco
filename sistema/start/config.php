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
        #mainAsilo,
        #mainResponsavel,
        #mainFuncionario {
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include './header.php'; ?>

    <?php $perfil = $_SESSION['perfil'];

    switch ($perfil) {
        case '1':
            $asilo = "block";
            $responsavel = "none";
            $funcionario = "none";
            break;
        case '2':
            $asilo = "none";
            $responsavel = "block";
            $funcionario = "none";
            break;
        case '3':
            $asilo = "none";
            $responsavel = "none";
            $funcionario = "block";
            break;
    } ?>

    <style>
        #mainAsilo {
            display: <?php echo $asilo; ?>
        }

        #mainResponsavel {
            display: <?php echo $responsavel; ?>
        }

        #mainFuncionario {
            display: <?php echo $funcionario; ?>
        }
    </style>

    <!-- Page Content -->
    <center>
        <div id="mainAsilo">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="atualizarAsilo.php" method="POST">
                        <div class="form-group" id="asilo">
                            <label for="senha">Senha atual:</label> <input type="text" id="senhaAtualAsilo" name="senhaAtualAsilo" required class="form-control" value="<?php echo $_SESSION['senhaAsilo']; ?>"><br />
                            <label for="senha">Nova Senha:</label> <input type="password" id="novaSenhaAsilo" name="novaSenhaAsilo" required class="form-control"><br />
                            <label for="senha">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenhaAsilo" name="confirmaNovaSenhaAsilo" required class="form-control"><br />
                            <label for="razaoSocial">Razão Social: </label><input type="text" name="razaoSocial" id="razaoSocial" required class="form-control" value="<?php echo $_SESSION['razaoSocial']; ?>"><br />
                            <label for="cnpj">CNPJ:</label> <input type="text" name="cnpj" id="cnpj" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cnpj']; ?>"><br />
                            <label for="email">E-Mail:</label> <input type="email" name="emailAsilo" id="emailAsilo" required class="form-control" class="form-control" value="<?php echo $_SESSION['emailAsilo']; ?>"><br />
                            <label for="telefone">Telefone:</label><input type="text" name="telefoneAsilo" id="telefoneAsilo" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['telefoneAsilo']; ?>"><br />
                            <label for="telefone">Tipo do Telefone:</label>
                            <select name="tipoTel" id="tipoTelAsilo" class="form-control">
                                <option value="1">Residencial</option>
                                <option value="2">Celular</option>
                                <option value="3">Comercial</option>
                            </select><br />
                            <label for="cep">CEP: </label><input type="text" name="cepAsilo" id="cepAsilo" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cepAsilo']; ?>"><br />
                            <label for="logradouro">Logradouro: </label> <input type="text" name="logradouroAsilo" id="logradouroAsilo" required class="form-control" value="<?php echo $_SESSION['logradouroAsilo']; ?>"><br />
                            <label for="numero">Número: </label> <input type="text" name="numeroAsilo" id="numeroAsilo" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['numeroAsilo']; ?>"><br />
                            <label for="complemento">Complemento: </label> <input type="text" name="complementoAsilo" id="complementoAsilo" class="form-control" value="<?php echo $_SESSION['complementoAsilo']; ?>"><br />
                            <label for="bairro">Bairro: </label> <input type="text" name="bairroAsilo" id="bairroAsilo" required class="form-control" value="<?php echo $_SESSION['bairroAsilo']; ?>"><br />
                            <label for="cidade">Cidade: </label> <input type="text" name="cidadeAsilo" name="cidadeAsilo" required class="form-control" value="<?php echo $_SESSION['cidadeAsilo']; ?>"><br />
                            <label for="estado">Estado:</label>
                            <select name="estadoAsilo" id="estadoAsilo" class="form-control">
                                <option value="1" <?php echo $_SESSION['estadoAsilo'] == 'Acre' ? 'selected' : ''; ?>>Acre</option>
                                <option value="2" <?php echo $_SESSION['estadoAsilo'] == 'Alagoas' ? 'selected' : ''; ?>>Alagoas</option>
                                <option value="3" <?php echo $_SESSION['estadoAsilo'] == 'Amapá' ? 'selected' : ''; ?>>Amapá</option>
                                <option value="4" <?php echo $_SESSION['estadoAsilo'] == 'Amazonas' ? 'selected' : ''; ?>>Amazonas</option>
                                <option value="5" <?php echo $_SESSION['estadoAsilo'] == 'Bahia' ? 'selected' : ''; ?>>Bahia</option>
                                <option value="6" <?php echo $_SESSION['estadoAsilo'] == 'Ceará' ? 'selected' : ''; ?>>Ceará</option>
                                <option value="7" <?php echo $_SESSION['estadoAsilo'] == 'Destrito Federal' ? 'selected' : ''; ?>>Distrito Federal</option>
                                <option value="8" <?php echo $_SESSION['estadoAsilo'] == 'Espírito Santo' ? 'selected' : ''; ?>>Espírito Santo</option>
                                <option value="9" <?php echo $_SESSION['estadoAsilo'] == 'Goiás' ? 'selected' : ''; ?>>Goiás</option>
                                <option value="10" <?php echo $_SESSION['estadoAsilo'] == 'Maranhão' ? 'selected' : ''; ?>>Maranhão</option>
                                <option value="11" <?php echo $_SESSION['estadoAsilo'] == 'Mato Grosso' ? 'selected' : ''; ?>>Mato Grosso</option>
                                <option value="12" <?php echo $_SESSION['estadoAsilo'] == 'Mato Grosso do Sul' ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                                <option value="13" <?php echo $_SESSION['estadoAsilo'] == 'Minas Gerais' ? 'selected' : ''; ?>>Minas Gerais</option>
                                <option value="14" <?php echo $_SESSION['estadoAsilo'] == 'Pará' ? 'selected' : ''; ?>>Pará</option>
                                <option value="15" <?php echo $_SESSION['estadoAsilo'] == 'Paraíba' ? 'selected' : ''; ?>>Paraíba</option>
                                <option value="16" <?php echo $_SESSION['estadoAsilo'] == 'Paraná' ? 'selected' : ''; ?>>Paraná</option>
                                <option value="17" <?php echo $_SESSION['estadoAsilo'] == 'Pernambuco' ? 'selected' : ''; ?>>Pernambuco</option>
                                <option value="18" <?php echo $_SESSION['estadoAsilo'] == 'Piauí' ? 'selected' : ''; ?>>Piauí</option>
                                <option value="19" <?php echo $_SESSION['estadoAsilo'] == 'Rio de Janeiro' ? 'selected' : ''; ?>>Rio de Janeiro</option>
                                <option value="20" <?php echo $_SESSION['estadoAsilo'] == 'Rio Grande do Norte' ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                                <option value="21" <?php echo $_SESSION['estadoAsilo'] == 'Rio Grande do Sul' ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                                <option value="22" <?php echo $_SESSION['estadoAsilo'] == 'Rondônia' ? 'selected' : ''; ?>>Rondônia</option>
                                <option value="23" <?php echo $_SESSION['estadoAsilo'] == 'Roraima' ? 'selected' : ''; ?>>Roraima</option>
                                <option value="24" <?php echo $_SESSION['estadoAsilo'] == 'Santa Catarina' ? 'selected' : ''; ?>>Santa Catarina</option>
                                <option value="25" <?php echo $_SESSION['estadoAsilo'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="26" <?php echo $_SESSION['estadoAsilo'] == 'Sergipe' ? 'selected' : ''; ?>>Sergipe</option>
                                <option value="27" <?php echo $_SESSION['estadoAsilo'] == 'Tocantins' ? 'selected' : ''; ?>>Tocantins</option>
                            </select><br />
                        </div>
                        <center>
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='index.php';" />
                            <input type="submit" value="Atualizar" name="atualizarAsilo" id="atualizarAsilo">
                        </center>
                    </form>
                </section>
            </div>
        </div>
        <div id="mainResponsavel">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="atualizarResponsavel.php" method="POST">
                        <div class="form-group" id="responsavel">
                            <label for="senha">Senha atual:</label> <input type="text" id="senhaAtualResponsavel" name="senhaAtualResponsavel" required class="form-control" value="<?php echo $_SESSION['senhaResponsavel']; ?>"><br />
                            <label for="senha">Nova Senha:</label> <input type="password" id="novaSenhaResponsavel" name="novaSenhaResponsavel" required class="form-control"><br />
                            <label for="senha">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenhaResponsavel" name="confirmaNovaSenhaResponsavel" required class="form-control"><br />
                            <label for="razaoSocial">Nome: </label><input type="text" name="nomeResponsavel" id="nomeResponsavel" required class="form-control" value="<?php echo $_SESSION['nomeResponsavel']; ?>"><br />
                            <label for="cnpj">CPF:</label> <input type="text" name="cfpResponsavel" id="cpfResponsavel" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cpfResponsavel']; ?>"><br />
                            <label for="email">E-Mail:</label> <input type="email" name="emailResponsavel" id="emailResponsavel" required class="form-control" class="form-control" value="<?php echo $_SESSION['emailResponsavel']; ?>"><br />
                            <label for="telefone">Telefone:</label><input type="text" name="telefoneResponsavel" id="telefoneResponsavel" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['telefoneResponsavel']; ?>"><br />
                            <label for="telefone">Tipo do Telefone:</label>
                            <select name="tipoTelResponsavel" id="tipoTelResponsavel" class="form-control">
                                <option value="1">Residencial</option>
                                <option value="2">Celular</option>
                                <option value="3">Comercial</option>
                            </select><br />
                            <label for="cep">CEP: </label><input type="text" name="cepResponsavel" id="cepResponsavel" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cepResponsavel']; ?>"><br />
                            <label for="logradouro">Logradouro: </label> <input type="text" name="logradouroResponsavel" id="logradouroResponsavel" required class="form-control" value="<?php echo $_SESSION['logradouroResponsavel']; ?>"><br />
                            <label for="numero">Número: </label> <input type="text" name="numeroResponsavel" id="numeroResponsavel" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['numeroResponsavel']; ?>"><br />
                            <label for="complemento">Complemento: </label> <input type="text" name="complementoResponsavel" id="complementoResponsavel" class="form-control" value="<?php echo $_SESSION['complementoResponsavel']; ?>"><br />
                            <label for="bairro">Bairro: </label> <input type="text" name="bairroResponsavel" id="bairroResponsavel" required class="form-control" value="<?php echo $_SESSION['bairroResponsavel']; ?>"><br />
                            <label for="cidade">Cidade: </label> <input type="text" name="cidadeResponsavel" name="cidadeResponsavel" required class="form-control" value="<?php echo $_SESSION['cidadeResponsavel']; ?>"><br />
                            <label for="estado">Estado:</label>
                            <select name="estadoResponsavel" id="estadoResponsavel" class="form-control">
                                <option value="1" <?php echo $_SESSION['estadoResponsavel'] == 'Acre' ? 'selected' : ''; ?>>Acre</option>
                                <option value="2" <?php echo $_SESSION['estadoResponsavel'] == 'Alagoas' ? 'selected' : ''; ?>>Alagoas</option>
                                <option value="3" <?php echo $_SESSION['estadoResponsavel'] == 'Amapá' ? 'selected' : ''; ?>>Amapá</option>
                                <option value="4" <?php echo $_SESSION['estadoResponsavel'] == 'Amazonas' ? 'selected' : ''; ?>>Amazonas</option>
                                <option value="5" <?php echo $_SESSION['estadoResponsavel'] == 'Bahia' ? 'selected' : ''; ?>>Bahia</option>
                                <option value="6" <?php echo $_SESSION['estadoResponsavel'] == 'Ceará' ? 'selected' : ''; ?>>Ceará</option>
                                <option value="7" <?php echo $_SESSION['estadoResponsavel'] == 'Destrito Federal' ? 'selected' : ''; ?>>Distrito Federal</option>
                                <option value="8" <?php echo $_SESSION['estadoResponsavel'] == 'Espírito Santo' ? 'selected' : ''; ?>>Espírito Santo</option>
                                <option value="9" <?php echo $_SESSION['estadoResponsavel'] == 'Goiás' ? 'selected' : ''; ?>>Goiás</option>
                                <option value="10" <?php echo $_SESSION['estadoResponsavel'] == 'Maranhão' ? 'selected' : ''; ?>>Maranhão</option>
                                <option value="11" <?php echo $_SESSION['estadoResponsavel'] == 'Mato Grosso' ? 'selected' : ''; ?>>Mato Grosso</option>
                                <option value="12" <?php echo $_SESSION['estadoResponsavel'] == 'Mato Grosso do Sul' ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                                <option value="13" <?php echo $_SESSION['estadoResponsavel'] == 'Minas Gerais' ? 'selected' : ''; ?>>Minas Gerais</option>
                                <option value="14" <?php echo $_SESSION['estadoResponsavel'] == 'Pará' ? 'selected' : ''; ?>>Pará</option>
                                <option value="15" <?php echo $_SESSION['estadoResponsavel'] == 'Paraíba' ? 'selected' : ''; ?>>Paraíba</option>
                                <option value="16" <?php echo $_SESSION['estadoResponsavel'] == 'Paraná' ? 'selected' : ''; ?>>Paraná</option>
                                <option value="17" <?php echo $_SESSION['estadoResponsavel'] == 'Pernambuco' ? 'selected' : ''; ?>>Pernambuco</option>
                                <option value="18" <?php echo $_SESSION['estadoResponsavel'] == 'Piauí' ? 'selected' : ''; ?>>Piauí</option>
                                <option value="19" <?php echo $_SESSION['estadoResponsavel'] == 'Rio de Janeiro' ? 'selected' : ''; ?>>Rio de Janeiro</option>
                                <option value="20" <?php echo $_SESSION['estadoResponsavel'] == 'Rio Grande do Norte' ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                                <option value="21" <?php echo $_SESSION['estadoResponsavel'] == 'Rio Grande do Sul' ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                                <option value="22" <?php echo $_SESSION['estadoResponsavel'] == 'Rondônia' ? 'selected' : ''; ?>>Rondônia</option>
                                <option value="23" <?php echo $_SESSION['estadoResponsavel'] == 'Roraima' ? 'selected' : ''; ?>>Roraima</option>
                                <option value="24" <?php echo $_SESSION['estadoResponsavel'] == 'Santa Catarina' ? 'selected' : ''; ?>>Santa Catarina</option>
                                <option value="25" <?php echo $_SESSION['estadoResponsavel'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="26" <?php echo $_SESSION['estadoResponsavel'] == 'Sergipe' ? 'selected' : ''; ?>>Sergipe</option>
                                <option value="27" <?php echo $_SESSION['estadoResponsavel'] == 'Tocantins' ? 'selected' : ''; ?>>Tocantins</option>
                            </select><br />
                        </div>
                        <center>
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='index.php';" />
                            <input type="submit" value="Atualizar" name="atualizarResponsavel" id="atualizarResponsavel">
                        </center>
                    </form>
                </section>
            </div>
        </div>
        <div id="mainFuncionario">
            <div class="col-md-6 col-sm-12">
                <section>
                    <form action="atualizarFuncionario.php" method="POST">
                        <div class="form-group" id="funcionario">
                            <label for="senha">Senha atual:</label> <input type="text" id="senhaAtualFuncionario" name="senhaAtualFuncionario" required class="form-control" value="<?php echo $_SESSION['senhaFuncionario']; ?>"><br />
                            <label for="senha">Nova Senha:</label> <input type="password" id="novaSenhaFuncionario" name="novaSenhaFuncionario" required class="form-control"><br />
                            <label for="senha">Confirmar Nova Senha:</label> <input type="password" id="confirmaNovaSenhaFuncionario" name="confirmaNovaSenhaFuncionario" required class="form-control"><br />
                            <label for="razaoSocial">Nome: </label><input type="text" name="nomeFuncionario" id="nomeFuncionario" required class="form-control" value="<?php echo $_SESSION['nomeFuncionario']; ?>"><br />
                            <label for="cnpj">CPF:</label> <input type="text" name="cfpFuncionario" id="cpfFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cpfFuncionario']; ?>"><br />
                            <label for="email">E-Mail:</label> <input type="email" name="emailFuncionario" id="emailFuncionario" required class="form-control" class="form-control" value="<?php echo $_SESSION['emailFuncionario']; ?>"><br />
                            <label for="telefone">Telefone:</label><input type="text" name="telefoneFuncionario" id="telefoneFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['telefoneFuncionario']; ?>"><br />
                            <label for="telefone">Tipo do Telefone:</label>
                            <select name="tipoTelFuncionario" id="tipoTelFuncionario" class="form-control">
                                <option value="1">Residencial</option>
                                <option value="2">Celular</option>
                                <option value="3">Comercial</option>
                            </select><br />
                            <label for="cep">CEP: </label><input type="text" name="cepFuncionario" id="cepFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['cepFuncionario']; ?>"><br />
                            <label for="logradouro">Logradouro: </label> <input type="text" name="logradouroFuncionario" id="logradouroFuncionario" required class="form-control" value="<?php echo $_SESSION['logradouroFuncionario']; ?>"><br />
                            <label for="numero">Número: </label> <input type="text" name="numeroFuncionario" id="numeroFuncionario" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $_SESSION['numeroFuncionario']; ?>"><br />
                            <label for="complemento">Complemento: </label> <input type="text" name="complementoFuncionario" id="complementoFuncionario" class="form-control" value="<?php echo $_SESSION['complementoFuncionario']; ?>"><br />
                            <label for="bairro">Bairro: </label> <input type="text" name="bairroFuncionario" id="bairroFuncionario" required class="form-control" value="<?php echo $_SESSION['bairroFuncionario']; ?>"><br />
                            <label for="cidade">Cidade: </label> <input type="text" name="cidadeFuncionario" name="cidadeFuncionario" required class="form-control" value="<?php echo $_SESSION['cidadeFuncionario']; ?>"><br />
                            <label for="estado">Estado:</label>
                            <select name="estadoFuncionario" id="estadoFuncionario" class="form-control">
                                <option value="1" <?php echo $_SESSION['estadoFuncionario'] == 'Acre' ? 'selected' : ''; ?>>Acre</option>
                                <option value="2" <?php echo $_SESSION['estadoFuncionario'] == 'Alagoas' ? 'selected' : ''; ?>>Alagoas</option>
                                <option value="3" <?php echo $_SESSION['estadoFuncionario'] == 'Amapá' ? 'selected' : ''; ?>>Amapá</option>
                                <option value="4" <?php echo $_SESSION['estadoFuncionario'] == 'Amazonas' ? 'selected' : ''; ?>>Amazonas</option>
                                <option value="5" <?php echo $_SESSION['estadoFuncionario'] == 'Bahia' ? 'selected' : ''; ?>>Bahia</option>
                                <option value="6" <?php echo $_SESSION['estadoFuncionario'] == 'Ceará' ? 'selected' : ''; ?>>Ceará</option>
                                <option value="7" <?php echo $_SESSION['estadoFuncionario'] == 'Destrito Federal' ? 'selected' : ''; ?>>Distrito Federal</option>
                                <option value="8" <?php echo $_SESSION['estadoFuncionario'] == 'Espírito Santo' ? 'selected' : ''; ?>>Espírito Santo</option>
                                <option value="9" <?php echo $_SESSION['estadoFuncionario'] == 'Goiás' ? 'selected' : ''; ?>>Goiás</option>
                                <option value="10" <?php echo $_SESSION['estadoFuncionario'] == 'Maranhão' ? 'selected' : ''; ?>>Maranhão</option>
                                <option value="11" <?php echo $_SESSION['estadoFuncionario'] == 'Mato Grosso' ? 'selected' : ''; ?>>Mato Grosso</option>
                                <option value="12" <?php echo $_SESSION['estadoFuncionario'] == 'Mato Grosso do Sul' ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                                <option value="13" <?php echo $_SESSION['estadoFuncionario'] == 'Minas Gerais' ? 'selected' : ''; ?>>Minas Gerais</option>
                                <option value="14" <?php echo $_SESSION['estadoFuncionario'] == 'Pará' ? 'selected' : ''; ?>>Pará</option>
                                <option value="15" <?php echo $_SESSION['estadoFuncionario'] == 'Paraíba' ? 'selected' : ''; ?>>Paraíba</option>
                                <option value="16" <?php echo $_SESSION['estadoFuncionario'] == 'Paraná' ? 'selected' : ''; ?>>Paraná</option>
                                <option value="17" <?php echo $_SESSION['estadoFuncionario'] == 'Pernambuco' ? 'selected' : ''; ?>>Pernambuco</option>
                                <option value="18" <?php echo $_SESSION['estadoFuncionario'] == 'Piauí' ? 'selected' : ''; ?>>Piauí</option>
                                <option value="19" <?php echo $_SESSION['estadoFuncionario'] == 'Rio de Janeiro' ? 'selected' : ''; ?>>Rio de Janeiro</option>
                                <option value="20" <?php echo $_SESSION['estadoFuncionario'] == 'Rio Grande do Norte' ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                                <option value="21" <?php echo $_SESSION['estadoFuncionario'] == 'Rio Grande do Sul' ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                                <option value="22" <?php echo $_SESSION['estadoFuncionario'] == 'Rondônia' ? 'selected' : ''; ?>>Rondônia</option>
                                <option value="23" <?php echo $_SESSION['estadoFuncionario'] == 'Roraima' ? 'selected' : ''; ?>>Roraima</option>
                                <option value="24" <?php echo $_SESSION['estadoFuncionario'] == 'Santa Catarina' ? 'selected' : ''; ?>>Santa Catarina</option>
                                <option value="25" <?php echo $_SESSION['estadoFuncionario'] == 'São Paulo' ? 'selected' : ''; ?>>São Paulo</option>
                                <option value="26" <?php echo $_SESSION['estadoFuncionario'] == 'Sergipe' ? 'selected' : ''; ?>>Sergipe</option>
                                <option value="27" <?php echo $_SESSION['estadoFuncionario'] == 'Tocantins' ? 'selected' : ''; ?>>Tocantins</option>
                            </select><br />
                        </div>
                        <center>
                            <input type="button" class="submit" value="Voltar" class="special" onclick="location.href='index.php';" />
                            <input type="submit" value="Atualizar" name="atualizarFuncionario" id="atualizarFuncionario">
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