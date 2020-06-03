<?php
session_start();

$idAsilo = $_SESSION['idAsilo'];

$login = $_POST['loginFuncionario'];
$senha = $_POST['senhaFuncionario'];
$confirmaSenha = $_POST['confirmaSenhaFuncionario'];

$nome = $_POST['nomeFuncionario'];
$cpf = $_POST['cpfFuncionario'];
$dataNasc = $_POST['dataNascFuncionario'];
$telefone = $_POST['telefoneFuncionario'];
$tipoTel = $_POST['tipoTelFuncionario'];
$email = $_POST['emailFuncionario'];
$logradouro = $_POST['logradouroFuncionario'];
$cidade = $_POST['cidadeFuncionario'];
$complemento = $_POST['complementoFuncionario'];
$numero = $_POST['numeroFuncionario'];
$cep = $_POST['cepFuncionario'];
$bairro = $_POST['bairroFuncionario'];
$estado = $_POST['estadoFuncionario'];

$tipoFormacao = $_POST['tipoFormacaoFuncionario'];
$estadoCoren = $_POST['estadoCorenFuncionario'];
$corenNumero = $_POST['numeroCorenFuncionario'];
$coren = "COREN".$estadoCoren.$corenNumero;

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');
$query_select = $connect->query("SELECT cpf FROM funcionario WHERE cpf='$cpf'");
$row = $query_select->fetch_row();

if ($row[0] > 0) {
  echo "<script language='javascript' type='text/javascript'>alert('Esse CPF já está cadastrado.');window.location.href='login.html';</script>";
  die();
} else {

    $queryLogin = mysqli_query($connect, "INSERT INTO login (username, password, confirmPassword, perfil) VALUES ('$login', '$senha', '$confirmaSenha', '3')");
    $ultimoIdLogin = mysqli_insert_id($connect);

    $queryContato = mysqli_query($connect, "INSERT INTO contato (tipo, telefone) VALUES ('$tipoTel', '$telefone')");  
    $ultimoIdContato = mysqli_insert_id($connect);

    $queryEndereco = mysqli_query($connect, "INSERT INTO endereco (cidade, logradouro, numero, cep, bairro, complemento, estadoId) VALUES ('$cidade', '$logradouro', '$numero', '$cep', '$bairro', '$complemento', '$estado')");
    $ultimoIdEndereco = mysqli_insert_id($connect);

    $queryFormacao = mysqli_query($connect, "INSERT INTO formacaoFuncionario (`tipoFormacao`, `coren`) VALUES ('$tipoFormacao', '$coren')");
    $ultimoIdFormacaoFuncionario = mysqli_insert_id($connect);

    if ($queryFuncionario = mysqli_query($connect, "INSERT INTO `funcionario`(`nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `enderecoId`, `asiloId`, `loginId`, `formacaoId`) VALUES ('$nome', '$cpf', '$email', '$dataNasc', '$ultimoIdContato', '$ultimoIdEndereco',$idAsilo, '$ultimoIdLogin', '$ultimoIdFormacaoFuncionario')")) {
        echo "<script language='javascript' type='text/javascript'>alert('Funcionário cadastrado com sucesso!');window.location.href='./start/gerenciamentoFuncionarios.php'</script>";
        die();
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse funcionário');window.location.href='./start/gerenciamentoFuncionarios.php'</script>";
        die();
    }
}
