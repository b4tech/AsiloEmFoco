<?php
    session_start();
    $idAsilo = $_SESSION['idAsilo'];
    $idLoginAsilo = $_SESSION['idLoginAsilo'];
    $idEnderecoAsilo = $_SESSION['idEnderecoAsilo'];
    $idEstadoAsilo = $_SESSION['idEstadoAsilo'];
    $idContatoAsilo = $_SESSION['idContatoAsilo'];

    //login
    $senha = $_POST['senhaAtualAsilo'];
    $novaSenha = $_POST['novaSenhaAtualAsilo'];
    $confirmaNovaSenha = $_POST['confirmaNovaSenhaAsilo'];
    
    // if ($senha == $novaSenha || $senha == $confirmaNovaSenha) {
    //     echo "<script language='javascript' type='text/javascript'>alert('Digite uma senha diferente da atual!')</script>";
    // } else if (!$novaSenha == $confirmaNovaSenha) {
    //     echo "<script language='javascript' type='text/javascript'>alert('')</script>";
    // } else {
        
    // }

    //asilo
    $razaoSocial = $_POST['razaoSocialAsilo'];
    $cnpj = $_POST['cnpj'];
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

    $connect = new msqli('127.0.0.1', 'root', '', 'asiloemfoco');
    
    if ($novaSenha == $confirmaNovaSenha) {
        echo "<script language='javascript' type='text/javascript'>alert('Senhas nao coincide!');</script>";
    }

    $query = sqli_query("UPDATE FROM `login` SET WHERE loginId = $idLoginAsilo");

    $query = sqli_query("UPDATE FROM `asilo` SET  WHERE asiloId = $idAsilo");
    
    $query = sqli_query("UPDATE FROM `contato` SET  WHERE contatoId = $idContatoAsilo");
    
    $query = sqli_query("UPDATE FROM `endereco` SET WHERE enderecoId = $idEnderecoAsilo");

    $query = sqli_query("UPDATE FROM `estado` SET WHERE estadoId = $idEstadoAsilo");
?>