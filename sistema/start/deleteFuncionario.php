<?php
$id = $_GET['delete'];
include_once 'conexao.php';

if ($query = mysqli_query($connect, "DELETE FROM funcionario WHERE idFuncionario = '$id'")) {
    echo "<script language='javascript' type='text/javascript'>alert('Funcionário deletado com sucesso!');javascript:window.location='gerenciamentoFuncionarios.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar Funcionário!');javascript:window.location='gerenciamentoFuncionarios.php';</script>";
}
