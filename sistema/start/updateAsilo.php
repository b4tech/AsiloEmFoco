<?php
session_start();
$idAsilo = $_SESSION['idAsilo'];
$idLoginAsilo = $_SESSION['idLoginAsilo'];
$idEnderecoAsilo = $_SESSION['enderecoIdAsilo'];
$idContatoAsilo = $_SESSION['idContatoAsilo'];

//login
$senha = $_SESSION['senhaAtualAsilo'];
$novaSenha = $_POST['novaSenhaAsilo'];
$confirmaNovaSenha = $_POST['confirmaNovaSenhaAsilo'];

//asilo
$razaoSocial = $_POST['razaoSocialAsilo'];
$cnpj = $_POST['cnpjAsilo'];
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

include_once 'conexao.php';

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
        $query = mysqli_query($connect, "UPDATE login SET password = '$novaSenha', confirmPassword = '$confirmaNovaSenha' WHERE idLogin = $idLoginAsilo");
        $query = mysqli_query($connect, "UPDATE asilo SET razaoSocial = '$razaoSocial', cnpj = '$cnpj', email = '$email' WHERE idAsilo = $idAsilo");
        $query = mysqli_query($connect, "UPDATE contato SET tipo = '$tipoTel', telefone = '$telefone'  WHERE idContato = $idContatoAsilo");
        $query = mysqli_query($connect, "UPDATE endereco SET cidade = '$cidade', logradouro = '$logradouro', numero = '$numero', cep = '$cep', bairro = '$bairro', complemento = '$complemento', estadoId = $estado WHERE idEndereco = $idEnderecoAsilo");
        // if () {
        //     echo "Record updated successfully";
        // } else {
        //     echo "Error updating record: " . mysqli_error($connect);
        // }
        // Voltar para a home
        echo "<script language='javascript' type='text/javascript'>alert('Asilo atualizado com sucesso!');javascript:window.location='gerenciamentoAsilos.php';</script>";
    } catch (\Throwable $th) {
        echo $th;
    }
} catch (\Throwable $th) {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar cadastro. Tente novamente.');javascript:window.location='gerenciamentoAsilos.php';</script>";
}
