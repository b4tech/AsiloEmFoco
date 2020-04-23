<?php

  $login = $_POST['login'];

  $entrar = $_POST['entrar'];

  $senha = $_POST['senha'];

  //$connect = mysql_connect('sql309.ihostfull.com','uoolo_25596133','#b4technologies#');
  $connect = mysql_connect('localhost','root','usbw');

  $db = mysql_select_db('asiloemfoco');

    if (isset($entrar)) {

      $verifica = mysql_query("SELECT * FROM login WHERE username = '$login' AND password = '$senha' ") or die("erro ao selecionar");

        if (mysql_num_rows($verifica)<=0){

          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";

          die();

        }else{

          setcookie("login",$login);

          // header("Location:index.php");

          header("Location:home.php");

        }

    }

?>