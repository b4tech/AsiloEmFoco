<?php
$id = $_GET['delete'];
$connect = new mysqli("localhost", "root", "", "asiloemfoco");

$selectResponsavel = mysqli_query($connect, "SELECT * FROM responsavel WHERE idResponsavel = $id");
$arrayResponsavel = mysqli_fetch_assoc($selectResponsavel);
$contatoId = $arrayAsilo['contatoId'];
$enderecoId = $arrayAsilo['enderecoId'];
$loginId = $arrayResponsavel['loginId'];

$query = mysqli_query($connect, "DELETE FROM responsavel WHERE idResponsavel = $id");
$query2 = mysqli_query($connect, "DELETE FROM contato WHERE idContato = $contatoId");
$query3 = mysqli_query($connect, "DELETE FROM endereco WHERE idEndereco = $enderecoId");

if ($query4 = mysqli_query($connect, "DELETE FROM login WHERE idLogin = $loginId")) {
    echo "<script language='javascript' type='text/javascript'>alert('Asilo deletado com sucesso!');javascript:window.location='gerenciamentoResponsaveis.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar Asilo!');javascript:window.location='gerenciamentoResponsaveis.php';</script>";
}
