<?php

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

// Select Login
$selectLogin = mysqli_query($connect, "SELECT * FROM `login` WHERE username='$login' AND password='$senha'");
// Comando para criar matriz de dados de acordo com o select acima
$arrayLogin = mysqli_fetch_assoc($selectLogin);
$perfil = $arrayLogin['perfil'];
$auxIdLogin = $arrayLogin['idLogin'];

if (isset($entrar)) {

  if (mysqli_num_rows($selectLogin) <= 0) {

    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos.');window.location.href='login.html';</script>";
    die();
  } else {

    session_start();

    switch ($perfil) {
      case '0': // Administrador
        // Tabela login
        $_SESSION['idLoginAdm'] = $arrayLogin['idLogin'];
        $_SESSION['loginAdm'] = $arrayLogin["username"];
        $_SESSION['senhaAdm'] = $arrayLogin["password"];
        $_SESSION['perfil'] = $arrayLogin["perfil"];

        // Select Asilo
        $selectAsilo = mysqli_query($connect, "SELECT * FROM `asilo`");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayAsilo = mysqli_fetch_assoc($selectAsilo);
        $auxIdContato = $arrayAsilo['contatoId'];
        $auxIdEndereco = $arrayAsilo['enderecoId'];

        // select contato
        $selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = $auxIdContato");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayContato = mysqli_fetch_assoc($selectContato);

        // Select endereco
        $selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = $auxIdEndereco");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEndereco = mysqli_fetch_assoc($selectEndereco);
        $auxIdEstado = $arrayEndereco['estadoId'];

        // select estado
        $selectEstado = mysqli_query($connect, "SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['enderecoIdAsilo'] = $arrayEndereco['idEndereco'];
        $_SESSION['cidadeAsilo'] = $arrayEndereco['cidade'];
        $_SESSION['logradouroAsilo'] = $arrayEndereco['logradouro'];
        $_SESSION['numeroAsilo'] = $arrayEndereco['numero'];
        $_SESSION['cepAsilo'] = $arrayEndereco['cep'];
        $_SESSION['bairroAsilo'] = $arrayEndereco['bairro'];
        $_SESSION['complementoAsilo'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['idEstadoAsilo'] = $arrayEndereco['estadoId'];
        $_SESSION['siglaAsilo'] = $arrayEstado['sigla'];
        $_SESSION['estadoAsilo'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['idContatoAsilo'] = $arrayContato['idContato'];
        $_SESSION['tipoTelAsilo'] = $arrayContato['tipo'];
        $_SESSION['telefoneAsilo'] = $arrayContato['telefone'];

        // tabela Asilo
        $_SESSION['idAsilo'] = $arrayAsilo['idAsilo'];
        $_SESSION['razaoSocial'] = $arrayAsilo['razaoSocial'];
        $_SESSION['cnpj'] = $arrayAsilo['cnpj'];
        $_SESSION['emailAsilo'] = $arrayAsilo['email'];

        // Tabela funcionario
        $_SESSION['idFuncionario'] = $arrayFuncionario['idFuncionario'];
        $_SESSION['nomeFuncionario'] = $arrayFuncionario['nome'];
        $_SESSION['cpfFuncionario'] = $arrayFuncionario['cpf'];
        $_SESSION['emailFuncionario'] = $arrayFuncionario['email'];
        $_SESSION['dataNascFuncionario'] = $arrayFuncionario['dataNasc'];
        $_SESSION['contatoIdFuncionario'] = $arrayFuncionario['cantatoId'];
        $_SESSION['asiloId'] = $arrayFuncionario['asiloId'];
        $_SESSION['enderecoId'] = $arrayFuncionario['enderecoId'];
        $_SESSION['formacaoId'] = $arrayFuncionario['formacaoId'];
        $_SESSION['loginId'] = $arrayFuncionario['loginId'];

        header("Location:start/index.php");

        break;
      case '1': // Asilo
        // Tabela login
        $_SESSION['idLoginAsilo'] = $arrayLogin['idLogin'];
        $_SESSION['loginAsilo'] = $arrayLogin["username"];
        $_SESSION['senhaAsilo'] = $arrayLogin["password"];
        $_SESSION['perfil'] = $arrayLogin["perfil"];

        // Select Asilo
        $selectAsilo = mysqli_query($connect, "SELECT * FROM `asilo` WHERE loginId = $auxIdLogin");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayAsilo = mysqli_fetch_assoc($selectAsilo);
        $auxIdContato = $arrayAsilo['contatoId'];
        $auxIdEndereco = $arrayAsilo['enderecoId'];

        // select contato
        $selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = $auxIdContato");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayContato = mysqli_fetch_assoc($selectContato);

        // Select endereco
        $selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = $auxIdEndereco");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEndereco = mysqli_fetch_assoc($selectEndereco);
        $auxIdEstado = $arrayEndereco['estadoId'];

        // select estado
        $selectEstado = mysqli_query($connect, "SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // Select Responsável  
        $selectResponsavel = mysqli_query($connect, "SELECT * FROM `responsavel` WHERE loginId=$auxIdLogin");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayResponsavel = mysqli_fetch_assoc($selectResponsavel);
        $auxIdContato = $arrayResponsavel['contatoId'];
        $auxIdEndereco = $arrayResponsavel['enderecoId'];

        // select Funcionário
        $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario` WHERE asiloId = $auxIdLogin");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayFuncionario = mysqli_fetch_assoc($selectFuncionario);

        // tabela endereco
        $_SESSION['enderecoIdAsilo'] = $arrayEndereco['idEndereco'];
        $_SESSION['cidadeAsilo'] = $arrayEndereco['cidade'];
        $_SESSION['logradouroAsilo'] = $arrayEndereco['logradouro'];
        $_SESSION['numeroAsilo'] = $arrayEndereco['numero'];
        $_SESSION['cepAsilo'] = $arrayEndereco['cep'];
        $_SESSION['bairroAsilo'] = $arrayEndereco['bairro'];
        $_SESSION['complementoAsilo'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['idEstadoAsilo'] = $arrayEndereco['estadoId'];
        $_SESSION['siglaAsilo'] = $arrayEstado['sigla'];
        $_SESSION['estadoAsilo'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['idContatoAsilo'] = $arrayContato['idContato'];
        $_SESSION['tipoTelAsilo'] = $arrayContato['tipo'];
        $_SESSION['telefoneAsilo'] = $arrayContato['telefone'];

        // tabela Asilo
        $_SESSION['idAsilo'] = $arrayAsilo['idAsilo'];
        $_SESSION['razaoSocial'] = $arrayAsilo['razaoSocial'];
        $_SESSION['cnpj'] = $arrayAsilo['cnpj'];
        $_SESSION['emailAsilo'] = $arrayAsilo['email'];

        // Tabela Responsavel
        $_SESSION['idResponsavel'] = $arrayResponsavel['idResponsavel'];
        $_SESSION['nomeResponsavel'] = $arrayResponsavel['nome'];
        $_SESSION['cpfResponsavel'] = $arrayResponsavel['cpf'];
        $_SESSION['emailResponsavel'] = $arrayResponsavel['email'];
        $_SESSION['dataNascResponsavel'] = $arrayResponsavel['dataNasc'];

        // Tabela funcionario
        $_SESSION['idFuncionario'] = $arrayFuncionario['idFuncionario'];
        $_SESSION['nomeFuncionario'] = $arrayFuncionario['nome'];
        $_SESSION['cpfFuncionario'] = $arrayFuncionario['cpf'];
        $_SESSION['emailFuncionario'] = $arrayFuncionario['email'];
        $_SESSION['dataNascFuncionario'] = $arrayFuncionario['dataNasc'];
        $_SESSION['contatoIdFuncionario'] = $arrayFuncionario['cantatoId'];
        $_SESSION['asiloId'] = $arrayFuncionario['asiloId'];
        $_SESSION['enderecoId'] = $arrayFuncionario['enderecoId'];
        $_SESSION['formacaoId'] = $arrayFuncionario['formacaoId'];
        $_SESSION['loginId'] = $arrayFuncionario['loginId'];

        header("Location:start/index.php");

        break;

      case '2': // Responsavel
        // Tabela login
        $_SESSION['idLoginResponsavel'] = $arrayLogin['idLogin'];
        $_SESSION['loginResponsavel'] = $arrayLogin["username"];
        $_SESSION['senhaResponsavel'] = $arrayLogin["password"];
        $_SESSION['perfil'] = $arrayLogin["perfil"];

        // Select Responsalvel  
        $selectResponsavel = mysqli_query($connect, "SELECT * FROM `responsavel` WHERE loginId=$auxIdLogin");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayResponsavel = mysqli_fetch_assoc($selectResponsavel);
        $auxIdContato = $arrayResponsavel['contatoId'];
        $auxIdEndereco = $arrayResponsavel['enderecoId'];

        // select contato
        $selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = $auxIdContato");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayContato = mysqli_fetch_assoc($selectContato);

        // Select endereco
        $selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = $auxIdEndereco");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEndereco = mysqli_fetch_assoc($selectEndereco);
        $auxIdEstado = $arrayEndereco['estadoId'];

        // select estado
        $selectEstado = mysqli_query($connect, "SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['idEnderecoResponsavel'] = $arrayEndereco['idEndereco'];
        $_SESSION['cidadeResponsavel'] = $arrayEndereco['cidade'];
        $_SESSION['logradouroResponsavel'] = $arrayEndereco['logradouro'];
        $_SESSION['numeroResponsavel'] = $arrayEndereco['numero'];
        $_SESSION['cepResponsavel'] = $arrayEndereco['cep'];
        $_SESSION['bairroResponsavel'] = $arrayEndereco['bairro'];
        $_SESSION['complementoResponsavel'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['idEstadoResponsavel'] = $arrayEstado['idEstado'];
        $_SESSION['siglaResponsavel'] = $arrayEstado['sigla'];
        $_SESSION['estadoResponsavel'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['idContatoResponsavel'] = $arrayContato['idContato'];
        $_SESSION['tipoTelResponsavel'] = $arrayContato['tipo'];
        $_SESSION['telefoneResponsavel'] = $arrayContato['telefone'];

        // Tabela Responsavel
        $_SESSION['idResponsavel'] = $arrayResponsavel['idResponsavel'];
        $_SESSION['nomeResponsavel'] = $arrayResponsavel['nome'];
        $_SESSION['cpfResponsavel'] = $arrayResponsavel['cpf'];
        $_SESSION['emailResponsavel'] = $arrayResponsavel['email'];
        $_SESSION['dataNascResponsavel'] = $arrayResponsavel['dataNasc'];

        header("Location:start/index.php");

        break;

      case '3':
        // Tabela login
        $_SESSION['idLoginFuncionario'] = $arrayLogin['idLogin'];
        $_SESSION['loginFuncionario'] = $arrayLogin["username"];
        $_SESSION['senhaFuncionario'] = $arrayLogin["password"];
        $_SESSION['perfil'] = $arrayLogin["perfil"];

        // Tabela Funcionario
        $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario` WHERE loginId=$auxIdLogin");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayFuncionario = mysqli_fetch_assoc($selectFuncionario);
        $auxIdContato = $arrayFuncionario['contatoId'];
        $auxIdendereco = $arrayFuncionario['enderecoId'];

        // select contato
        $selectContato = mysqli_query($connect, "SELECT * FROM `contato` WHERE idContato = $auxIdContato");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayContato = mysqli_fetch_assoc($selectContato);

        // Select endereco
        $selectEndereco = mysqli_query($connect, "SELECT * FROM `endereco` WHERE idEndereco = $auxIdEndereco");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEndereco = mysqli_fetch_assoc($selectEndereco);
        $auxIdEstado = $arrayEndereco['estadoId'];

        // select estado
        $selectEstado = mysqli_query($connect, "SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['idEnderecoFuncionario'] = $arrayEndereco['idEndereco'];
        $_SESSION['cidadeFuncionario'] = $arrayEndereco['cidade'];
        $_SESSION['logradouroFuncionario'] = $arrayEndereco['logradouro'];
        $_SESSION['numeroFuncionario'] = $arrayEndereco['numero'];
        $_SESSION['cepFuncionario'] = $arrayEndereco['cep'];
        $_SESSION['bairroFuncionario'] = $arrayEndereco['bairro'];
        $_SESSION['complementoFuncionario'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['idEstadoFuncionario'] = $arrayEstado['idEstado'];
        $_SESSION['siglaFuncionario'] = $arrayEstado['sigla'];
        $_SESSION['estadoFuncionario'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['idContatoFuncionario'] = $arrayContato['idContato'];
        $_SESSION['tipoTelFuncionario'] = $arrayContato['tipo'];
        $_SESSION['telefoneFuncionario'] = $arrayContato['telefone'];

        // Tabela funcionario
        $_SESSION['idFuncionario'] = $arrayFuncionario['idFuncionario'];
        $_SESSION['nomeFuncionario'] = $arrayFuncionario['nome'];
        $_SESSION['cpfFuncionario'] = $arrayFuncionario['cpf'];
        $_SESSION['emailFuncionario'] = $arrayFuncionario['email'];
        $_SESSION['dataNascFuncionario'] = $arrayFuncionario['dataNasc'];
        $_SESSION['contatoIdFuncionario'] = $arrayFuncionario['cantatoId'];
        $_SESSION['asiloId'] = $arrayFuncionario['asiloId'];
        $_SESSION['enderecoId'] = $arrayFuncionario['enderecoId'];
        $_SESSION['formacaoId'] = $arrayFuncionario['formacaoId'];
        $_SESSION['loginId'] = $arrayFuncionario['loginId'];

        header("Location:start/index.php");

        break;
    }
  }
}
