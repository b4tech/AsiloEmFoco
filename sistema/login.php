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
// Select Asilo

$selectAsilo = mysqli_query($connect, "SELECT * FROM `asilo` WHERE idAsilo=$auxIdLogin");
// Comando para criar matriz de dados de acordo com o select acima
$arrayAsilo = mysqli_fetch_assoc($selectAsilo);


// Select Responsalvel

$selectResponsavel = mysqli_query($connect, "SELECT * FROM `responsavel`");
// Comando para criar matriz de dados de acordo com o select acima
$arrayResponsavel = mysqli_fetch_assoc($selectLogin);

// Tabela Funcionario

$selectFuncionario = mysqli_query($connect, "SELECT * FROM `funcionario`");
// Comando para criar matriz de dados de acordo com o select acima
$arrayFuncionario = mysqli_fetch_assoc($selectFuncionario);

// Tabela Idoso 

$selectIdoso = mysqli_query($connect, "SELECT * FROM `idoso`");
// Comando para criar matriz de dados de acordo com o select acima
$arrayIdoso = mysqli_fetch_assoc($selectIdoso);

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

        // tabela Asilo
        $_SESSION['idAsilo'] = $arrayAsilo['idAsilo'];
        $_SESSION['razaoSocial'] = $arrayAsilo['razaoSocial'];

        header("Location:start/index.php");

        break;
      
      case '2':
        // Tabela login
        $_SESSION['idLogin'] = $arrayLogin['idLogin'];
        $_SESSION['login'] = $arrayLogin["username"];
        $_SESSION['senha'] = $arrayLogin["password"];

        // Tabela Responsavel
        $_SESSION['idResponsavel'] = $arrayResponsavel['idResponsavel'];
        $_SESSION['nome'] = $arrayResponsavel['nome'];
        $_SESSION['cpf'] = $arrayResponsavel['cpf'];
        $_SESSION['email'] = $arrayResponsavel['email'];
        $_SESSION['dataNasc'] = $arrayResponsavel['dataNasc'];
        $_SESSION['cantatoId'] = $arrayResponsavel['cantatoId'];
        $_SESSION['idosoId'] = $arrayResponsavel['idosoId'];
        $_SESSION['enderecoId'] = $arrayResponsavel['enderecoId'];
        $_SESSION['asiloId'] = $arrayResponsavel['asiloId'];
        $_SESSION['loginId'] = $arrayResponsavel['loginId'];
        
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
