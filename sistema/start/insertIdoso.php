<?php
session_start();

$idResponsavel = $_SESSION['idResponsavel'];
$nome = $_POST['nomeIdoso'];
$cpf = $_POST['cpfIdoso'];
$dataNasc = $_POST['dataNascIdoso'];

$connect = new mysqli('127.0.0.1', 'root', '', 'asiloemfoco');
$query_select = $connect->query("SELECT cpf FROM idoso WHERE cpf='$cpf'");
//$row = $query_select->fetch_row();
$row = mysqli_num_rows($query_select);

if ($row > 0) {
    echo "<script language='javascript' type='text/javascript'>alert('Esse CPF já está cadastrado.');window.location.href='./gerenciamentoIdosos.php';</script>";
    die();
} else {

    if ($query = mysqli_query($connect, "INSERT INTO idoso (`nome`, `dataNasc`, `cpf`, `responsavelId`) VALUES ('$nome', '$dataNasc', '$cpf', '$idResponsavel')")) {
        echo "<script language='javascript' type='text/javascript'>alert('Idoso cadastrado com sucesso!');window.location.href='./gerenciamentoIdosos.php'</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Idoso.');window.location.href='./gerenciamentoIdosos.php'</script>";
    }
}
