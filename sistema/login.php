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
      case '1':
        // Tabela login
        $_SESSION['idLogin'] = $arrayLogin['idLogin'];
        $_SESSION['login'] = $arrayLogin["username"];
        $_SESSION['senha'] = $arrayLogin["password"];

        // Select Asilo
        $selectAsilo = mysqli_query($connect, "SELECT * FROM `asilo` WHERE idAsilo=$auxIdLogin");
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
        $selectEstado = mysqli_query($connect ,"SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['cidade'] = $arrayEndereco['cidade'];
        $_SESSION['logradouro'] = $arrayEndereco['logradouro'];
        $_SESSION['numero'] = $arrayEndereco['numero'];
        $_SESSION['cep'] = $arrayEndereco['cep'];
        $_SESSION['bairro'] = $arrayEndereco['bairro'];
        $_SESSION['complemento'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['sigla'] = $arrayEstado['sigla'];
        $_SESSION['estado'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['tipoTel'] = $arrayContato['tipo'];
        $_SESSION['telefone'] = $arrayContato['telefone'];

        // tabela Asilo
        $_SESSION['idAsilo'] = $arrayAsilo['idAsilo'];
        $_SESSION['razaoSocial'] = $arrayAsilo['razaoSocial'];
        $_SESSION['cnpj'] = $arrayAsilo['cnpj'];
        $_SESSION['email'] = $arrayAsilo['email'];

        // echo $_SESSION['cidade'] ."<br />";
        // echo $_SESSION['logradouro'] ."<br />";
        // echo $_SESSION['numero'] ."<br />";
        // echo $_SESSION['cep'] ."<br />";
        // echo $_SESSION['bairro'] ."<br />";
        // echo $_SESSION['complemento'] ."<br />";
        // echo $_SESSION['sigla'] ."<br />";
        // echo $_SESSION['estado'] ."<br />";
        // echo $_SESSION['tipoTel'] ."<br />";
        // echo $_SESSION['telefone'] ."<br />";

        header("Location:start/index.php");

        break;
      
      case '2':
        // Tabela login
        $_SESSION['idLogin'] = $arrayLogin['idLogin'];
        $_SESSION['login'] = $arrayLogin["username"];
        $_SESSION['senha'] = $arrayLogin["password"];

        // Select Responsalvel
        $selectResponsavel = mysqli_query($connect, "SELECT * FROM `responsavel`");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayResponsavel = mysqli_fetch_assoc($selectLogin);
        $auxIdContato = $arrayResponsavel['contatoId'];
        $auxIdendereco = $arrayResponsavel['enderecoId'];

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
        $selectEstado = mysqli_query($connect ,"SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['cidade'] = $arrayEndereco['cidade'];
        $_SESSION['logradouro'] = $arrayEndereco['logradouro'];
        $_SESSION['numero'] = $arrayEndereco['numero'];
        $_SESSION['cep'] = $arrayEndereco['cep'];
        $_SESSION['bairro'] = $arrayEndereco['bairro'];
        $_SESSION['complemento'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['sigla'] = $arrayEstado['sigla'];
        $_SESSION['estado'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['tipoTel'] = $arrayContato['tipo'];
        $_SESSION['telefone'] = $arrayContato['telefone'];

        // Tabela Responsavel
        $_SESSION['idResponsavel'] = $arrayResponsavel['idResponsavel'];
        $_SESSION['nome'] = $arrayResponsavel['nome'];
        $_SESSION['cpf'] = $arrayResponsavel['cpf'];
        $_SESSION['email'] = $arrayResponsavel['email'];
        $_SESSION['dataNasc'] = $arrayResponsavel['dataNasc'];
        $_SESSION['idosoId'] = $arrayResponsavel['idosoId'];

        // Tabela Idoso 
        $selectIdoso = mysqli_query($connect, "SELECT * FROM `idoso`");
        // Comando para criar matriz de dados de acordo com o select acima
        $arrayIdoso = mysqli_fetch_assoc($selectIdoso);
        
        // Tabela Idoso
        $_SESSION['idIdoso'] = $arrayIdoso['idIdoso'];
        $_SESSION['dataNasc'] = $arrayIdoso['dataNasc'];
        $_SESSION['cpf'] = $arrayIdoso['cpf'];
        $_SESSION['nome'] = $arrayIdoso['nome'];
        $_SESSION['responsavelId'] = $arrayIdoso['responsavelId'];

        header("Location:start/index.php");

        break;

      case '3':
        // Tabela login
        $_SESSION['idLogin'] = $arrayLogin['idLogin'];
        $_SESSION['login'] = $arrayLogin["username"];
        $_SESSION['senha'] = $arrayLogin["password"];

        // Tabela Funcionario
        $selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario`");
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
        $selectEstado = mysqli_query($connect ,"SELECT * FROM `estado` WHERE idEstado = $auxIdEstado");
        // comando para criar matriz de dados de acordo com o select acima
        $arrayEstado = mysqli_fetch_assoc($selectEstado);

        // tabela endereco
        $_SESSION['cidade'] = $arrayEndereco['cidade'];
        $_SESSION['logradouro'] = $arrayEndereco['logradouro'];
        $_SESSION['numero'] = $arrayEndereco['numero'];
        $_SESSION['cep'] = $arrayEndereco['cep'];
        $_SESSION['bairro'] = $arrayEndereco['bairro'];
        $_SESSION['complemento'] = $arrayEndereco['complemento'];

        // tabela estado
        $_SESSION['sigla'] = $arrayEstado['sigla'];
        $_SESSION['estado'] = $arrayEstado['nome'];

        // tabela contato
        $_SESSION['tipoTel'] = $arrayContato['tipo'];
        $_SESSION['telefone'] = $arrayContato['telefone'];

        // Tabela funcionario
        $_SESSION['idFuncionario'] = $arrayFuncionario['idFuncionario'];
        $_SESSION['nome'] = $arrayFuncionario['nome'];
        $_SESSION['cpf'] = $arrayFuncionario['cpf'];
        $_SESSION['email'] = $arrayFuncionario['email'];
        $_SESSION['dataNasc'] = $arrayFuncionario['dataNasc'];
        $_SESSION['contatoId'] = $arrayFuncionario['cantatoId'];
        $_SESSION['asiloId'] = $arrayFuncionario['asiloId'];
        $_SESSION['enderecoId'] = $arrayFuncionario['enderecoId'];
        $_SESSION['formacaoId'] = $arrayFuncionario['formacaoId'];
        $_SESSION['loginId'] = $arrayFuncionario['loginId'];

        header("Location:start/index.php");

        break;
        
    }

    

    

    

    

    
  }
}
