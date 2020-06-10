<?php
$id = $_GET['delete'];
$connect = new mysqli("localhost", "root", "", "asiloemfoco");

$selectAsilo = mysqli_query($connect, "SELECT * FROM asilo WHERE idAsilo = $id");
$arrayAsilo = mysqli_fetch_assoc($selectAsilo);
$contatoId = $arrayAsilo['contatoId'];
$enderecoId = $arrayAsilo['enderecoId'];
$loginId = $arrayAsilo['loginId'];

$query = mysqli_query($connect, "DELETE FROM asilo WHERE idAsilo = $id");
$query2 = mysqli_query($connect, "DELETE FROM contato WHERE idContato = $contatoId");
$query3 = mysqli_query($connect, "DELETE FROM endereco WHERE idEndereco = $enderecoId");

if ($query4 = mysqli_query($connect, "DELETE FROM login WHERE idLogin = $loginId")) {
    echo "<script language='javascript' type='text/javascript'>alert('Asilo deletado com sucesso!');javascript:window.location='gerenciamentoAsilos.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar Asilo!');javascript:window.location='gerenciamentoAsilos.php';</script>";
}
