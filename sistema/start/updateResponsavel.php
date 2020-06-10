<?php
session_start();
$idResponsavel = $_SESSION['idResponsavel'];
$idLoginResponsavel = $_SESSION['idLoginResponsavel'];
$idEnderecoResponsavel = $_SESSION['idEnderecoResponsavel'];
$idContatoResponsavel = $_SESSION['idContatoResponsavel'];

//login
$senha = $_SESSION['senhaResponsavel'];
$novaSenha = $_POST['novaSenhaResponsavel'];
$confirmaNovaSenha = $_POST['confirmaNovaSenhaResponsavel'];

//responsável
$nome = $_POST['nomeResponsavel'];
$cpf = $_POST['cpfResponsavel'];
$email = $_POST['emailResponsavel'];
$dataNasc = $_POST['dataNascResponsavel'];

// telefone
$telefone = $_POST['telefoneResponsavel'];
$tipoTel = $_POST['tipoTelResponsavel'];

// endereco
$logradouro = $_POST['logradouroResponsavel'];
$cidade = $_POST['cidadeResponsavel'];
$complemento = $_POST['complementoResponsavel'];
$numero = $_POST['numeroResponsavel'];
$cep = $_POST['cepResponsavel'];
$bairro = $_POST['bairroResponsavel'];
$estado = $_POST['estadoResponsavel'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

if ($novaSenha != null) {
    if ($novaSenha != $confirmaNovaSenha) {
        echo "<script language='javascript' type='text/javascript'>alert('Senhas nao coincide!');</script>";
        header("Location:start/config.php");
        die();
    }
}
if ($novaSenha == null && $confirmaNovaSenha == null) {
    $novaSenha = $senha;
    $confirmaNovaSenha = $senha;
}

try {
    try {
        $query = mysqli_query($connect, "UPDATE login SET password = '$novaSenha', confirmPassword = '$confirmaNovaSenha' WHERE idLogin = $idLoginResponsavel");
        $query = mysqli_query($connect, "UPDATE responsavel SET nome = '$nome', cpf = '$cpf', email = '$email', dataNasc = '$dataNasc' WHERE idResponsavel = $idResponsavel");
        $query = mysqli_query($connect, "UPDATE contato SET tipo = '$tipoTel', telefone = '$telefone'  WHERE idContato = $idContatoResponsavel");
        $query = mysqli_query($connect, "UPDATE endereco SET cidade = '$cidade', logradouro = '$logradouro', numero = '$numero', cep = '$cep', bairro = '$bairro', complemento = '$complemento', estadoId = $estado WHERE idEndereco = $idEnderecoResponsavel");
        // if () {
        //     echo "Record updated successfully";
        // } else {
        //     echo "Error updating record: " . mysqli_error($connect);
        // }
        echo "<script language='javascript' type='text/javascript'>alert('Responsável atualizado com sucesso!');javascript:window.location='login.html';</script>";
        session_destroy();
    } catch (\Throwable $th) {
        echo $th;
    }
} catch (\Throwable $th) {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar cadastro. Tente novamente.');</script>";
}
