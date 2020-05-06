<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGA - Início</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <?php

    $login_cookie = $_COOKIE['login'];

    if (isset($login_cookie)) {

        // echo "Bem-Vindo, $login_cookie <br>";

        // echo "Essas informações <font color='red'>PODEM</font> ser acessadas por você";

        header("Location:start/index.php");

    } else {

        echo "Bem-Vindo, convidado <br>";

        echo "Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";

        echo "<br><a href='login.php'>Faça Login</a> Para ler o conteúdo";
    }
    ?>
</body>

</html>