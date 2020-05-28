<?php
    session_start();
    $nome = $_POST['nomeIdoso'];
    $cpf = $_POST['cpfIdoso'];
    $dataNasc = $_POST['dataNascIdoso'];
    $idResponsavel = $_SESSION['idResponsavel'];
    $idIdoso = $_SESSION['idIdoso'];

    $connect = new mysqli("localhost", "root", "", "asiloemfoco");

    isset($nome)?? $_SESSION['nome'];
    isset($cpf)?? $_SESSION['cpf'];
    isset($dataNasc)?? $_SESSION['dataNasc'];

    
    if ($query = mysqli_query($connect, "UPDATE idoso SET nome = '$nome', cpf = '$cpf', dataNasc = '$dataNasc', responsavelId = '$idResponsavel' WHERE idIdoso = '$idIdoso'")) {
        echo "<script language='javascript' type='text/javascript'>alert('Idoso atualizado com sucesso!');javascript:window.location='gerenciamentoIdosos.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possivel atualizar o idoso!');;</script>";
    }