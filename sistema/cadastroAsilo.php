<?php

//$login = $_POST['login'];
//$senha = $_POST['senha'];
$razaoSocial = $_POST['razaoSocial'];
$cnpj = $_POST['cnpj'];
// $telefone = $_POST['telefone'];
// $tipoTel = $_POST['tipoTel'];
// $email = $_POST['email'];
// $logradouro = $_POST['logradouro'];
// $cidade = $_POST['cidade'];
// $complemento = $_POST['complemento'];
// $numero = $_POST['numero'];
// $cep = $_POST['cep'];
// $bairro = $_POST['bairro'];
// $estado = $_POST['estado'];

$connect = mysql_connect('localhost', 'root', 'usbw');
$db = mysql_select_db('asiloemfoco');
$query_select = "SELECT cnpj FROM asilo WHERE cnpj='$cnpj'";
$select = mysql_query($query_select, $connect);
$array = mysql_fetch_array($select);
$logarray = $array['cnpj'];

if ($logarray == $cnpj && $cnpj != null) {
  echo "<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
  die();
} else {
  $query = "INSERT INTO asilo (razaoSocial, contatoId, cnpj, enderecoId, responsavelId, loginId)
              VALUES ('$razaoSocial', '1', '$cnpj', '1', '1', '1')";
  $insert = mysql_query($query, $connect);
  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
  } else {

    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='login.html'</script>";
  }
}
