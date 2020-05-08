<?php

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

$selectIdLogin = mysqli_query($connect, "SELECT * FROM `login` WHERE username='$login' AND password='$senha'");

// Comando para criar matriz de dados de acordo com o select acima
$aux = mysqli_fetch_assoc($selectIdLogin);
$auxIdLogin = $aux["idLogin"];

$selectIdAsilo = mysqli_query($connect, "SELECT * FROM `asilo` WHERE idAsilo=$auxIdLogin");
// Comando para criar matriz de dados de acordo com o select acima
$aux = mysqli_fetch_assoc($selectIdAsilo);
$auxIdAsilo = $aux["idAsilo"];

if (isset($entrar)) {

  if (mysqli_num_rows($selectIdLogin) <= 0) {

    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos.');window.location.href='login.html';</script>";
    die();
  } else {

    //setcookie("login",$login);

    session_start();
    $_SESSION['idLogin'] = $auxIdLogin;
    $_SESSION['login'] = $aux["username"];
    $_SESSION['idAsilo'] = $auxIdAsilo;
    $_SESSION['razaoSocial'] = $aux["razaoSocial"];
    header("Location:start/index.php");
  }
}
