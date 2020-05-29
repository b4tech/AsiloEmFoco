<?php
session_start();

$idIdoso = $_SESSION['idIdoso'];
$data = $_POST['dataProntuario'];
$hora = $_POST['horaProntuario'];
$descricao = $_POST['descricaoProntuario'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');

if ($query = mysqli_query($connect, "INSERT INTO `prontuario` (`data`, `hora`, `descricao`, `idosoId`) VALUES ('$data', '$hora', '$descricao', '$idIdoso')")) {
    echo "<script language='javascript' type='text/javascript'>alert('Prontuário cadastrado com sucesso!');window.location.href='./gerenciamentoProntuarios.php'</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse prontuário.');window.location.href='./gerenciamentoProntuarios.php'</script>";
}