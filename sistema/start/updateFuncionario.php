<?php
session_start();
$connect = new mysqli("localhost", "root", "", "asiloemfoco");

$idFuncionario = $_SESSION['idFuncionario'];
$idContatoFuncionario = $_SESSION['idContatoFuncionario'];
$idEnderecoFuncionario = $_SESSION['idEnderecoFuncionario'];
$idFuncionario = $_SESSION['idFuncionario'];
$idLoginFuncionario = $_SESSION['idLoginFuncionario'];
$idFormacaoFuncionario = $_SESSION['idFormacaoFuncionario'];

$senhaAtual = $_POST['senhaAtualFuncionario'];
$senhaNova = $_POST['senhaNovaFuncionario'];
$confirmarSenhaNova = $_POST['confirmarSenhaNovaFuncionario'];
$nome = $_POST['nomeFuncionario'];
$cpf = $_POST['cpfFuncionario'];
$email = $_POST['emailFuncionario'];
$dataNasc = $_POST['dataNascFuncionario'];
$telefone = $_POST['telefoneFuncionario'];
$tipoTel = $_POST['tipoTelFuncionario'];
$tipoFormacao = $_POST['tipoFormacaoFuncionario'];
$cep = $_POST['cepFuncionario'];
$logradouro = $_POST['logradouroFuncionario'];
$numero = $_POST['numeroFuncionario'];
$complemento = $_POST['numeroFuncionario'];
$bairro = $_POST['bairroFuncionario'];
$cidade = $_POST['cidadeFuncionario'];
$estado = $_POST['estadoFuncionario'];

if ($senhaNova != null) {
    if ($senhaNova != $confirmarsenhaNova) {
        echo "<script language='javascript' type='text/javascript'>alert('Senhas nao coincide!');</script>";
        header("Location:atualizarFuncionario.php");
        die();
    }
}
if ($senhaNova == null && $confirmarSenhaNova == null) {
    $senhaNova = $senhaAtual;
    $confirmarSenhaNova = $senhaAtual;
}

try {
    try {
        $query = mysqli_query($connect, "UPDATE login SET password = '$senhaNova', confirmPassword = '$confirmarSenhaNova' WHERE idLogin = '$idLoginFuncionario'");
        $query = mysqli_query($connect, "UPDATE funcionario SET nome = '$nome', cpf = '$cpf', email = '$email', dataNasc = '$dataNasc' WHERE idFuncionario = '$idFuncionario'");
        $query = mysqli_query($connect, "UPDATE contato SET tipo = '$tipoTel', telefone = '$telefone'  WHERE idContato = '$idContatoFuncionario'");
        $query = mysqli_query($connect, "UPDATE endereco SET cidade = '$cidade', logradouro = '$logradouro', numero = '$numero', cep = '$cep', bairro = '$bairro', complemento = '$complemento', estadoId = $estado WHERE idEndereco = '$idEnderecoFuncionario'");
        $query = mysqli_query($connect, "UPDATE formacaofuncionario SET tipoFormacao = '$tipoFormacao' WHERE idFormacaoFuncionario = '$idFuncionario'");
        // if () {
        //     echo "Record updated successfully";
        // } else {
        //     echo "Error updating record: " . mysqli_error($connect);
        // }
        echo "<script language='javascript' type='text/javascript'>alert('Funcionário atualizado com sucesso!');javascript:window.location='gerenciamentoFuncionarios.php';</script>";
    } catch (\Throwable $th) {
        echo $th;
    }
} catch (\Throwable $th) {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar cadastro. Tente novamente.');javascript:window.location='atualizarFuncionario.php';</script>";
}
