<?php
$id = $_GET['delete'];
$connect = new mysqli("localhost", "root", "", "asiloemfoco");
$contatoId = mysqli_query($connect, "SELECT contatoId FROM asilo WHERE idAsilo = $id");
$enderecoId = mysqli_query($connect, "SELECT enderecoId FROM asilo WHERE idAsilo = $id");
$loginId = mysqli_query($connect, "SELECT loginId FROM asilo WHERE idAsilo = $id");

$query = mysqli_query($connect, "DELETE FROM asilo WHERE idAsilo = $id");
$query2 = mysqli_query($connect, "DELETE FROM contato WHERE idContato = $contatoId");
$query3 = mysqli_query($connect, "DELETE FROM endereco WHERE idEndereco = $enderecoId");

if ($query4 = mysqli_query($connect, "DELETE FROM login WHERE idLogin = $loginId")) {
    echo "<script language='javascript' type='text/javascript'>alert('Asilo deletado com sucesso!');javascript:window.location='gerenciamentoFuncionarios.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar Asilo!');javascript:window.location='gerenciamentoFuncionarios.php';</script>";
}
