<?php

  $login = $_POST['username'];

  $entrar = $_POST['entrar'];

  $senha = $_POST['password'];

  $connect = mysql_connect('localhost','id13009607_dev','HJdcidZQqn<AZ>6L');

  $db = mysql_select_db('id13009607_bancodedados');

    if (isset($entrar)) {

      $verifica = mysql_query("SELECT * FROM login WHERE username = '$login' AND password = '$senha' ") or die("erro ao selecionar");

        if (mysql_num_rows($verifica)<=0){

          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";

          die();

        }else{

          setcookie("login",$login);

          header("Location:index.php");

        }

    }

?>