<?php

$login = $_POST['login'];
$senha = $_POST['senha'];
$confirmaSenha = $_POST['confirmaSenha'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
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

include_once './start/conexao.php';
$query_select = $connect->query("SELECT cpf FROM responsavel WHERE cpf='$cpf'");
$row = $query_select->fetch_row();

if ($row[0] > 0) {
  echo "<script language='javascript' type='text/javascript'>alert('Esse CPF já está cadastrado.');window.location.href='login.html';</script>";
  die();
} else {

  //Prepara o comando SQL
  $estadoSQL1 = $connect->prepare(
    "INSERT INTO login (username, password, confirmPassword, perfil) VALUES ('$login', '$senha', '$confirmaSenha', '2');"
  );

  $estadoSQL1->execute();

  $estadoSQL1->close();

  $ultimoIdLogin = mysqli_insert_id($connect);

  $estadoSQL2 = $connect->prepare(
    "INSERT INTO contato (tipo, telefone) VALUES ('$tipoTel', '$telefone');"
  );

  $estadoSQL2->execute();

  $estadoSQL2->close();

  $ultimoIdContato = mysqli_insert_id($connect);

  $estadoSQL3 = $connect->prepare(
    "INSERT INTO endereco (cidade, logradouro, numero, cep, bairro, complemento, estadoId) VALUES ('$cidade', '$logradouro', '$numero', '$cep', '$bairro', '$complemento', '$estado');"
  );

  $estadoSQL3->execute();

  $estadoSQL3->close();

  $ultimoIdEndereco = mysqli_insert_id($connect);

  $estadoSQL4 = $connect->prepare(
    "INSERT INTO `responsavel`(`nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `enderecoId`, `asiloId`, `loginId`) VALUES ('$nome', '$cpf', '$email', '$dataNasc', '$ultimoIdContato', '$ultimoIdEndereco',null, '$ultimoIdLogin');"
  );

  $estadoSQL4->execute();

  $estadoSQL4->close();

  if ($estadoSQL4) {
    echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='login.html'</script>";
  }
}
