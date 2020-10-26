<?php
    header('Access-Control-Allow-Origin: *');
    require_once('../config.php');
    require_once('../session.php');
?> 
<!DOCTYPE html>
<html>
<head>
    <title> Painel do Colaborador </title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Fabio Henrique Silva furtado" content="">

    <link rel="shortcut icon" href="<?php echo BASE;?>/img/icon.png" type="image/x-icon" />

    <!-- jQuery AJax-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE;?>/js/signature.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href= "<?php echo BASE;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE;?>/css/novaligacao.css">

    <!-- Bootstrap core CSS-->
    <link href="<?php echo BASE;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="<?php echo BASE;?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="<?php echo BASE;?>/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE;?>/vendor/font-awesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
    $(window).load(function() {
        document.getElementById("loading").style.display = "none";
        document.getElementById("content").style.display = "inline";
    });
    </script>
    <style>
        #saudacao{
            width: 100%;
            right: 15% !important;
        }
    </style>
    <?php
        $zero = 0;
        // troca a cor do nav e footer de acordo com o mês
        //setembro amarelo, outubro rosa, novembro azul
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
</head>
<body>
    <div id="sidebar">
        <nav id="nav" class="navbar navbar-collapse navbar-expand static-top" role="navigation">
            <a class="navbar-brand mr-1" href="#"style="background-color: white; border-radius: 6px;"><img src="<?php echo BASE;?>/img/logo.png" height="50px"></a>
            <div id="saudacao" name="saudacao" align="right">
                <span id="span-saudacao" class="text-white"> Olá, <?php echo $nome_colaborador;?> </span>
                <a class="btn btn-outline-light" data-toggle="modal" data-target="#modalSair">Sair</a>
            </div>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
    </div>
    <div id="content" class="container" style="display: none">
        teste
        <?php var_dump($_SESSION);?>
    </div>
    <div class="footer" id="footer" align="center">
        Powered by: <img src="<?php echo BASE;?>/img/logos.png" width="90px" alt=""> &copy;
    </div>
    <div class="modal fade" id="modalSair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desconectar do ENEL Agiliza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Você deseja realmente sair?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fechar</button>
                    <a type="button" class="btn btn-outline-danger" href="sair.php">Sair do sistema</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- END OF CODE -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE;?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE;?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo BASE;?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE;?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE;?>/vendor/font-awesome/js/all.min.js"></script>
    <script src="<?php echo BASE;?>/vendor/font-awesome/js/fontawesome.min.js"></script>
    <script src="<?php echo BASE;?>/js/novaligacao.js"></script>
    </body>
</html>