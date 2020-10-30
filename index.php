<?php
    require_once('config.php');
    $msgGet = NULL;
    if(isset($_GET['erro'])){
        $action = @$_GET['erro'];
        if($action==0){
            $msgGet = '<div class="alert alert-danger" role="alert"> Usuário desabilitado. Favor contacte o gestor para averiguar seu status. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        if($action==1){
            $msgGet = '<div class="alert alert-danger" role="alert"> Ops... Usuário e/ou senha não conferem. Verifique seus dados e tente novamente. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>

    <title> ENEL Agiliza </title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Fabio Henrique Silva furtado" content="">

    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />

    <!-- Manifest JSON-->
    <link rel="manifest" href="manifest.json">
    <!-- jQuery AJax-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE;?>/js/signature.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carga.css">

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/font-awesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">

    <?php
    $mes = date('m');
    if($mes=='09'){
        echo '<style>#nav,#footer{background-color:#f9be07 !important;}</style>';
    }
    if($mes=='10'){
        echo '<style>#nav,#footer{background-color:#ff4787 !important;}</style>';
    }
    if($mes=='11'){
        echo '<style>#nav,#footer{background-color:#42a7a4 !important;}</style>';
    }
    ?>
    <script type="text/javascript">
    $(window).load(function() {
        document.getElementById("loading").style.display = "none";
        document.getElementById("content").style.display = "inline";
    });
    </script>
</head>
<body>
    <div id="sidebar">
        <nav id="nav" class="navbar navbar-collapse navbar-expand static-top" role="navigation" style="margin-bottom: 0">
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid justify-content-center text-center" style="display: none">
        <div class="container">
            <?php echo $msgGet;?>
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 card">
                    <div class="card-header">
                        <a class="navbar-brand mr-1" href="index.php"><img src="img/logo.png" width="220" alt="ENEL Atendimento"></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <form action="login.php" method="POST">
                            <p class="card-text">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputLogin" name="inputLogin" placeholder="Login" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="Senha" required>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Entrar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div></br>
            <div class="row justify-content-center text-center">
                OU
            </div><hr/>
            <div class="row justify-content-center text-center">
                <a class="btn btn-outline-info" href="express/express.php">Modo Express</a>
            </div><hr/>
        </div>
    </div>
    <div class="footer" id="footer" align="center">
        Powered by: <img src="img/logos.png" width="90px" alt=""> &copy;
    </div>
    
    <!-- END OF CODE -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/font-awesome/js/all.min.js"></script>
    <script src="vendor/font-awesome/js/fontawesome.min.js"></script>
    <script src="js/carga.js"></script>
    <script src="sw.js"></script>
    </body>
</html>