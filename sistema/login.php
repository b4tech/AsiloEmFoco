<?php

  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];

  $connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');
  $result = mysqli_query($connect, "SELECT * FROM `login` WHERE username='$login' AND password='$senha'");

    if (isset($entrar)) {

      if (mysqli_num_rows($result)<=0) {
        
        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos.');window.location.href='login.html';</script>";
        die();
        
      } else {
       
        setcookie("login",$login);
        header("Location:home.php");
        }
    
      }
?>