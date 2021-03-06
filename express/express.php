<?php
    require_once('../config.php');
?>
<!DOCTYPE html>
<html>
<head>

    <title> Atendimento ENEL </title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Fabio Henrique Silva furtado" content="">

    <link rel="shortcut icon" href="<?php echo BASE;?>/img/icon.png" type="image/x-icon" />

    <!-- Manifest JSON-->
    <link rel="manifest" href="../manifest.json">

    <!-- jQuery AJax-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE;?>/js/signature.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE;?>/css/carga.css">

    <!-- Bootstrap core CSS-->
    <link href="<?php echo BASE;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page level plugin CSS-->
    <link href="<?php echo BASE;?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="<?php echo BASE;?>/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE;?>/vendor/font-awesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">

    <?php
    $mes = date('m');
    if($mes=='09'){//setembro amarelo
        echo '<style>#nav,#footer{background-color:#f9be07 !important;}</style>';
    }
    if($mes=='10'){//outubro rosa
        echo '<style>#nav,#footer{background-color:#ff4787 !important;}</style>';
    }
    if($mes=='11'){//novembro azul
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
            <a class="navbar-brand mr-1" href="../index.php"style="background-color: white; border-radius: 6px;"><img src="<?php echo BASE;?>/img/logo.png" height="50px"></a>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid" style="display: none">
        <div class="container">
            <div class="row justify-content-center"> <h2 class="justify-content-center"> Serviços <i class="fas fa-plug"></i></h2></div><hr/>
            <div class="row justify-content-center">

                <!-- <div class="card justify-content-center text-center" width="100%">
                    <div class="card text-center btn cardopt" name="formularioCarga" id="formularioCarga">
                        <div class="card-body">
                            <i class="fas fa-file-medical fa-6x"></i>
                        </div>
                        <div class="card-footer">
                            Relação de Carga
                        </div>
                    </div>
                </div> -->
                <div class="card justify-content-center text-center" id="novaLigacao" name="novaLigacao" width="100%">
                    <div class="card-header">
                        Nova Ligação
                    </div>
                    <div class="row card-body">
                        <div class="card text-center btn cardopt" name="novaLigacaoPF" id="novaLigacaoPF">
                            <div class="card-body">
                                <i class="fas fa-user fa-6x"></i>
                            </div>
                            <div class="card-footer">
                                Pessoa Física
                            </div>
                        </div>
                        <div class="card text-center btn cardopt" name="novaLigacaoPJ" id="novaLigacaoPJ">
                            <div class="card-body">
                                <i class="fas fa-briefcase fa-6x"></i>
                            </div>
                            <div class="card-footer">
                                Pessoa Jurídica
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card justify-content-center text-center" id="novaLigacao" name="novaLigacao" width="100%">
                    <div class="card-header">
                        Alteração de Contrato
                    </div>
                    <div class="row card-body">
                        <div class="card text-center btn cardopt" name="cancelarContrato" id="cancelarContrato">
                            <div class="card-body">
                                <i class="fas fa-ban fa-6x"></i>
                            </div>
                            <div class="card-footer">
                                Cancelamento
                            </div>
                        </div>
                        <div class="card text-center btn cardopt" name="trocarTitularidade" id="trocarTitularidade">
                            <div class="card-body">
                                <i class="fas fa-exchange-alt fa-6x"></i>
                            </div>
                            <div class="card-footer">
                                Trocar Titular
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div class="footer" id="footer" align="center">
        Powered by: <img src="<?php echo BASE;?>/img/logos.png" width="90px" alt=""> &copy;
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
    <script src="<?php echo BASE;?>/js/carga.js"></script>
    </body>
</html>