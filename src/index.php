<?php
    header('Access-Control-Allow-Origin: *');
    require_once('../config.php');
    require_once('../session.php');
    header("Refresh: 120");
    //var_dump($_SESSION);
    $at = $bd->prepare('SELECT * FROM tb_clientes WHERE atendido = "nao" ORDER BY id_cliente ASC');
    $at->execute();
    $solicitacoes = $at->fetchAll(PDO::FETCH_OBJ);
    $total_s = count($solicitacoes);
    $total_nlpf = 0;
    $total_nlpj = 0;
    $total_canc = 0;
    $total_trtl = 0;
    foreach($solicitacoes as $solicitacao){
        $string = substr($solicitacao->protocolo,0,4);
        if($string =='NLPF'){
            $total_nlpf++;
        } else if($string =='NLPJ'){
            $total_nlpj++;
        } else if($string =='CANC'){
            $total_canc++;
        } else if($string =='TRTL'){
            $total_trtl++;
        }
        $string = NULL;
    }
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
        #span-saudacao{
            margin: 25px;
        }
        .msg-badge{
            width: 100px;
            margin: 5px;
        }
        .list{
            border-width: 1px;
            border-color: #dcd0b9;
            border-style: solid;
            border-radius: 7%;
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
                <span id="span-saudacao" class="text-white"> Olá, <?php echo $nome_curto[0];?> </span>
                <a class="btn btn-outline-light" data-toggle="modal" data-target="#modalSair">Sair</a>
            </div>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
    </div>
    <div id="content" style="display: none">
        <script>
            var width = 0;
            window.onload = function(e){
                setInterval(function () {
                    width = width >= 100 ? 0 : width+0.1;
                    document.getElementById('progress-bar').style.width = width + '%'; }, 120);
            }
        </script>
        <div class="progress" style="height: 5px;">
        <div id="progress-bar" class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%; height: 5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="container-fluid">
            <div class="card justify-content-center text-center">
                <div class="card-header">
                    <h3>Menu Inicial</h3>
                </div>
                <?php if($_SESSION['isMobile']==FALSE){ ?>
                <div class="row card-body">
                    <div class="col badge badge-primary" width="20%">
                        Abertos
                        <span class="badge badge-light"><?php echo $total_s;?></span>
                    </div>
                    <div class="col badge badge-info" width="20%">
                        Nova Ligação P. Física
                        <span class="badge badge-light"><?php echo $total_nlpf;?></span>
                    </div>
                    <div class="col badge badge-warning" width="20%">
                        Nova Ligação P. Jurídica
                        <span class="badge badge-light"><?php echo $total_nlpj;?></span>
                    </div>
                    <div class="col badge badge-danger" width="20%">
                        Cancelamento de Contrato
                        <span class="badge badge-light"><?php echo $total_canc;?></span>
                    </div>
                    <div class="col badge badge-success" width="20%">
                        Troca de Titularidade
                        <span class="badge badge-light"><?php echo $total_trtl;?></span>
                    </div>
                </div>
                <?php } else{?>
                    <div class="card-body" width="100%" style="border-style: groove; border-radius: 2%; ">
                    <div class="col-10 badge badge-primary" width="20%">
                        Abertos
                        <span class="badge badge-light"><?php echo $total_s;?></span>
                    </div>
                    <div class="col-5 badge badge-info" width="20%">
                        NL - CPF
                        <span class="badge badge-light"><?php echo $total_nlpf;?></span>
                    </div>
                    <div class="col-5 badge badge-warning" width="20%">
                        NL -CNPJ
                        <span class="badge badge-light"><?php echo $total_nlpj;?></span>
                    </div>
                    <div class="col-5 badge badge-danger" width="20%">
                        Cancelamento
                        <span class="badge badge-light"><?php echo $total_canc;?></span>
                    </div>
                    <div class="col-5 badge badge-success" width="20%">
                        Troca Titular
                        <span class="badge badge-light"><?php echo $total_trtl;?></span>
                    </div>
                </div>
                <?php }?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableProt" width="100%" cellspacing="0">
                            <thead class="bg-danger text-light">
                                <tr>
                                    <th scope="col">Protocolo</th>
                                    <th scope="col">Tipo Atendimento</th>
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">CPF / CNPJ</th>
                                    <th scope="col">Data de Abertura</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($total_s > 0){
                                    foreach( $solicitacoes as $solicitacao){
                                        echo '<tr>';
                                        echo '<th scope="row">'. $solicitacao->protocolo .'</th>';
                                        $tipoAtend = substr($solicitacao->protocolo,0,4);
                                        if($tipoAtend =='NLPF'){
                                            echo '<td> Nova Ligação - Pessoa Física </td>';
                                        } else if($tipoAtend =='NLPJ'){
                                            echo '<td> Nova Ligação - Pessoa Jurídica </td>';
                                        } else if($tipoAtend =='CANC'){
                                            echo '<td> Cancelamento de Contrato </td>';
                                        } else if($tipoAtend =='TRTL'){
                                            echo '<td> Troca de Titularidade </td>';
                                        }
                                        $tipoAtend = NULL;
                                        echo '<td>'. $solicitacao->nome_cliente .'</td>';
                                        echo '<td>'. $solicitacao->cpfcnpj .'</td>';
                                        echo '<td>'. date('d/m/Y @ H:i:s', strtotime($solicitacao->data_abertura)) .'</td>';
                                        echo '<td> Ver Detalhes </td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    <div class="card-footer small text-muted">Atualizado em: <span><?php echo date("d/m/Y H:i:s"); ?></span> </div>
                </div>
            </div>
        </div>
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

    <script>
    $(document).ready(function() {
        $('#dataTableProt').DataTable({
            "language": {
            "sProcessing":    "Processando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "Ops! Não há nenhum registro.",
            "sEmptyTable":    "Nenhum atendimento disponível.",
            "sInfo":          "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros de 0 a 0 de um total de 0 registros",
            "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sLast":    "Último",
                "sNext":    "Seguinte",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Ativar para ordenar a coluna de forma ascendente",
                "sSortDescending": ": Ativar para ordenar a coluna de forma descendente"
            }
        }
        });
    } );
    </script>
</body>
</html>
<!-- 

<div class="card-body row justify-content-center">
                    <div class="col-lg-5 card" style="margin: 1px;">
                        <div class="card-header">
                            <h4>Abertas</h4>
                        </div>
                        <div class="card-body">
                        
                        </div>
                    </div>
                    <div class="col-lg-5 card" style="margin: 1px;">
                        <div class="card-header">
                            <h4>Em Atendimento</h4>
                        </div>
                        <div class="card-body">
                        
                        </div>
                    </div></br>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="col-lg-10 card">
                        <div class="card-header">
                            <h4>Todas (<?php //echo date('d/m/Y');?>)</h4>
                        </div>
                        <div class="card-body">
                        
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h6>Atualizado em: <?php //echo date('d/m/Y');?> às <?php //echo date('');?></h6>
                </div>

-->