<?php
session_start();
$idAsilo = $_SESSION['idAsilo'];
$idLoginAsilo = $_SESSION['idLoginAsilo'];
$idEnderecoAsilo = $_SESSION['enderecoIdAsilo'];
$idContatoAsilo = $_SESSION['idContatoAsilo'];

//login
$senha = $_POST['senhaAtualAsilo'];
$novaSenha = $_POST['novaSenhaAsilo'];
$confirmaNovaSenha = $_POST['confirmaNovaSenhaAsilo'];

//asilo
$razaoSocial = $_POST['razaoSocial'];
$cnpj = $_POST['cnpj'];
$email = $_POST['emailAsilo'];

// telefone
$telefone = $_POST['telefoneAsilo'];
$tipoTel = $_POST['tipoTelAsilo'];

// endereco
$logradouro = $_POST['logradouroAsilo'];
$cidade = $_POST['cidadeAsilo'];
$complemento = $_POST['complementoAsilo'];
$numero = $_POST['numeroAsilo'];
$cep = $_POST['cepAsilo'];
$bairro = $_POST['bairroAsilo'];

// estado
$estado = $_POST['estadoAsilo'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

if ($novaSenha != null) {
    if ($novaSenha != $confirmaNovaSenha) {
        echo "<script language='javascript' type='text/javascript'>alert('Senhas nao coincide!');</script>";
        header("Location:start/config.php");
        die();
    }
}

try {
    $query = mysqli_query($connect, "UPDATE login SET senha = '$novaSenha', confirmarSenha = '$confirmaNovaSenha' WHERE idLogin = $idLoginAsilo");
    $query = mysqli_query($connect, "UPDATE asilo SET razaoSocial = '$razaoSocial', cnpj = '$cnpj', email = '$email' WHERE idAsilo = $idAsilo");
    $query = mysqli_query($connect, "UPDATE contato SET tipo = '$tipoTel', telefone = '$telefone'  WHERE idContato = $idContatoAsilo");
    $query = mysqli_query($connect, "UPDATE endereco SET cidade = '$cidade', logradouro = '$logradouro', numero = '$numero', cep = '$cep', bairro = '$bairro', complemento = '$complemento', estadoId = $estado WHERE idEndereco = $idEnderecoAsilo");
    // if () {
    //     echo "Record updated successfully";
    // } else {
    //     echo "Error updating record: " . mysqli_error($connect);
    // }
} catch (\Throwable $th) {
    echo $th;
}

echo "<script language='javascript' type='text/javascript'>alert('Asilo atualizado com sucesso!');</script>";

// Voltar para a home
session_destroy();

header("Location:login.html");
