<?php

    $tipoCadastro = $_POST['tipoCadastro'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $razaoSocial = $_POST['razaoSocial'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST ['cnpj'];
    $dataNasc = $_POST['dataNasc'];
    $telefone = $_POST['telefone'];
    $tipoTel = $_POST['tipoTel'];
    $email = $_POST['email'];
    $logradouro = $_POST['logradouro'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];

    $connect = mysql_connect('localhost','root','usbw');

    $db = mysql_select_db('sistemadelogin');

    $query_select = "SELECT login FROM usuarios WHERE login='$login'";

    $select = mysql_query($query_select, $connect);

    $array = mysql_fetch_array($select);

    $logarray = $array['login'];

    if($login == "" || $login == null){

        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
    
        }else{
    
          if($logarray == $login){
    
            echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
    
            die();
    
     
    
          }else{
    
            $query ="INSERT INTO usuarios (login, senha) VALUES ('$login','$senha')";
    
            $insert = mysql_query($query,$connect);
    
            if($insert){
    
              echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
    
            }else{
    
              echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
    
            }
    
          }
    
        }
    
    ?>

?>