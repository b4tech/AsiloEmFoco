<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGA - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include './header.php'; ?>

    <?php $perfil = $_SESSION['perfil'];

    switch ($perfil) {
        case '0':
            $admin = "block";
            $asilo = "none";
            $responsavel = "none";
            $funcionario = "none";
            break;
        case '1':
            $admin = "none";
            $asilo = "block";
            $responsavel = "none";
            $funcionario = "none";
            break;
        case '2':
            $admin = "none";
            $asilo = "none";
            $responsavel = "block";
            $funcionario = "none";
            break;
        case '3':
            $admin = "none";
            $asilo = "none";
            $responsavel = "none";
            $funcionario = "block";
            break;
    } ?>

    <style>
        .mainAdmin {
            display: <?php echo $admin; ?>
        }

        .mainAsilo {
            display: <?php echo $asilo; ?>
        }

        .mainResponsavel {
            display: <?php echo $responsavel; ?>
        }

        .mainFuncionario {
            display: <?php echo $funcionario; ?>
        }
    </style>

    <div class="container">

        <div class="row">

            <!-- Menu lateral -->
            <?php include './nav-left.php'; ?>

            <div class="col-lg-9 my-4">
                <!-- PERFIL: ADMINISTRADOR -->
                <div class="mainAdmin">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 1</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 2</a>
                                    </h4>
                                    <h5>R$ 2300.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 3</a>
                                    </h4>
                                    <h5>R$ 1000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 4</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 5</a>
                                    </h4>
                                    <h5>R$ 800.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 6</a>
                                    </h4>
                                    <h5>R$ 1200.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PERFIL: ASILO -->
                <div class="mainAsilo">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 1</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 2</a>
                                    </h4>
                                    <h5>R$ 2300.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 3</a>
                                    </h4>
                                    <h5>R$ 1000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 4</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 5</a>
                                    </h4>
                                    <h5>R$ 800.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 6</a>
                                    </h4>
                                    <h5>R$ 1200.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PERFIL: RESPONSÁVEL -->
                <div class="mainResponsavel">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 1</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 2</a>
                                    </h4>
                                    <h5>R$ 2300.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 3</a>
                                    </h4>
                                    <h5>R$ 1000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 4</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 5</a>
                                    </h4>
                                    <h5>R$ 800.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 6</a>
                                    </h4>
                                    <h5>R$ 1200.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PERFIL: FUNCIONÁRIO -->
                <div class="mainFuncionario">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 1</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 2</a>
                                    </h4>
                                    <h5>R$ 2300.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 3</a>
                                    </h4>
                                    <h5>R$ 1000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 4</a>
                                    </h4>
                                    <h5>R$ 2000.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 5</a>
                                    </h4>
                                    <h5>R$ 800.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Asilo 6</a>
                                    </h4>
                                    <h5>R$ 1200.00/mês</h5>
                                    <p class="card-text">
                                        Rua A - Vila Cisper<br />
                                        Tel.? (11) 2222.3333<br />
                                        Email: asilo1@contato.com.br
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include './footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>