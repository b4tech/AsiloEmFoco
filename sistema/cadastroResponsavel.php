<?php

    $tipoCadastro = $_POST['tipoCadastro'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha'];
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

    $connect = mysql_connect('localhost','root','');

    $db = mysql_select_db('sistemadelogin');

    if ($tipoCadastro == 1){
      $query_select = "SELECT cnpj FROM asilo WHERE cnpj='$cnpj'";
      $select = mysql_query($query_select, $connect);
      $array = mysql_fetch_array($select);
      $logarray = $array['cnpj'];
    } else if ($tipoCadastro == 2){
      $query_select = "SELECT cpf FROM responsavel WHERE cpf='$cpf'";
      $select = mysql_query($query_select, $connect);
      $array = mysql_fetch_array($select);
      $logarray = $array['cpf'];
    }

    
          if($logarray == $cnpj && $tipoCadastro == 1 || $logarray == $cpf && $tipoCadastro == 2){
    
            echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
    
            die();

          }else{

            if($tipoCadastro == 1){
              $query ="INSERT INTO asilo (login, senha, razaoSocial, cnpj, email, telefone, tipoTel, cep, logradouro, numero, complemento, bairro, cidade, estado)
              VALUES ('$login','$senha', '$razaoSocial', '$cnpj', '$email', '$telefone', '$tipoTel', '$cep', '$logradouro', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
              $insert = mysql_query($query,$connect);
            }else if($tipoCadastro == 2){
              $query ="INSERT INTO responsavel (login, senha, nome, cpf, dataNasc, email, telefone, tipoTel, cep, logradouro, numero, complemento, bairro, cidade, estado)
              VALUES ('$login','$senha', '$nome', '$cpf', '$dataNasc', '$email', '$telefone', '$tipoTel', '$cep', '$logradouro', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
              $insert = mysql_query($query,$connect);
            }
    
            if($insert){
    
              echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
    
            }else{
    
              //echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='login.html'</script>";
    
            }
    
          }
    
    ?>

?>