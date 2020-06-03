<?php
$id = $_GET['delete'];
$connect = new mysqli("localhost", "root", "", "asiloemfoco");

if ($query = mysqli_query($connect, "DELETE FROM funcionario WHERE idFuncionario = '$id'")) {
    echo "<script language='javascript' type='text/javascript'>alert('Funcionário deletado com sucesso!');javascript:window.location='gerenciamentoFuncionario.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar Funcionário!');javascript:window.location='gerenciamentoFuncionario.php';</script>";
}
