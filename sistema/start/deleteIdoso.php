<?php
    $id = $_GET['delete'];
    include_once 'conexao.php';

    if ($query = mysqli_query($connect, "DELETE FROM idoso WHERE idIdoso = '$id'")) {
        echo "<script language='javascript' type='text/javascript'>alert('Idoso deletado com sucesso!');javascript:window.location='gerenciamentoIdosos.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar idoso!');javascript:window.location='gerenciamentoIdosos.php';</script>";
    }