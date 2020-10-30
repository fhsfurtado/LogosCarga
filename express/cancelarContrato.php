<?php
    header('Access-Control-Allow-Origin: *');
    require_once('../config.php');
?> 
<!DOCTYPE html>
<html>
<head>
    <title> Nova Ligação - Pessoa Física </title>
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
        <nav id="nav" class="navbar navbar-collapse navbar-expand static-top" role="navigation" style="margin-bottom: 0">
            <a class="navbar-brand mr-1" href="<?php echo BASE;?>/express/express.php"style="background-color: white; border-radius: 6px;"><img src="<?php echo BASE;?>/img/logo.png" height="50px"></a>
            <input type="hidden" id="data-hora" class="col justify-content-center text-center">
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid" style="display: none">
        <form id="formNovaLigacao" name="formNovaLigacao" action="cadNovaLigacao.php" method="POST">
            <!-- PARTE 1 - DADOS DO CLIENTE -->
            <input type="hidden" id="tipoAtendimento" name="tipoAtendimento" value="canc">
            <div class="card container" name="dadosCliente" id="dadosCliente">
                <div class="card-header row justify-content-center">
                    <label for="dadosCliente"><h4> Cancelamento de Contrato </h4></label>
                </div></br>
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h5>Dados Pessoais</h5></label>
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label for="inputNome">Nome do Titular / Solicitante*:</label>
                        <input type="text" class="form-control p01" id="inputNome" name="inputNome" placeholder="Nome Completo" required>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label for="inputCPF">CPF*:</label>
                        <input type="tel" class="form-control p01" id="inputDoc" name="inputDoc" onkeydown="return fMasc(this,mCPF)" placeholder="Nº do CPF" minlength="14" maxlength="14" required>
                    </div>
                    <div class="form-group col-lg">
                        <label for="inputNumero">Nº da Unidade Consumidora*:</label>
                        <input type="tel" class="form-control" id="inputUC" name="inputUC" onkeypress="return SoNumeros();" placeholder="Nº da UC" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="inputCEP">CEP da Unidade Consumidora*:</label>
                        <input type="tel" class="form-control p01" id="inputCEP" name="inputCEP" onkeydown="fMasc(this,mCEP)" placeholder="CEP" minlength="10" maxlength="10" required>
                        
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pesquisarCEP" class="text-white">Pesquisar</label>
                        <button type="button" id="pesquisarCEP" class="btn btn-outline-primary">Pesquisar CEP</button>
                    </div>
                </div>
                <div class="row address-field">
                    <div class="form-group col-lg-8">
                        <label for="inputEndereco">Endereço da ligação*:</label>
                        <input type="text" class="form-control p01" id="inputEndereco" name="inputEndereco" placeholder="Rua, Avenida, Estrada, etc..." required>
                        
                    </div>
                </div>
                <div class="row address-field">
                    <div class="form-group col-lg-6">
                        <label for="inputComplemento">Complemento*:</label>
                        <input type="text" class="form-control p01" id="inputComplemento" name="inputComplemento" placeholder="Complemento" required>
                        
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputBairro">Bairro*</label>
                        <input type="text" class="form-control p01" id="inputBairro" name="inputBairro" placeholder="Bairro" required>
                        
                    </div>
                </div>
                <div class="row address-field">
                    <div class="form-group col-lg-8">
                        <label for="inputMunicipio">Município*:</label>
                        <input type="text" class="form-control p01" id="inputMunicipio" name="inputMunicipio" placeholder="Municipio" required>
                        
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputNumero">Nº:</label>
                        <input type="tel" class="form-control" id="inputNumero" name="inputNumero" onkeypress="return SoNumeros();" placeholder="Nº do imóvel">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="inputEmail">E-mail*:</label>
                        <input type="email" class="form-control p01" id="inputEmail" name="inputEmail" placeholder="seuemail@exemplo.com" required>
                        
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputFixo">Telefone Fixo:</label>
                        <input type="tel" class="form-control" id="inputFixo" name="inputFixo" onkeydown="fMasc(this,mTel)" minlength="13" maxlength="13" placeholder="(XX) XXXX-XXXX">
                        
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputCelular">Telefone Celular*:</label>
                        <input type="tel" class="form-control p01" id="inputCelular" name="inputCelular" onkeydown="fMasc(this,mTel)" minlength="14" maxlength="14" placeholder="(XX) X XXXX-XXXX" required>
                        
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <div class="form-group col-lg">
                        <div class="form-check">
                            <label for="inputEndereco">Classificação:</label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioClassificacao" id="radioClassificacao1" value="residencial" checked>
                            <label class="form-check-label" id="radioClassificacao1" for="radioClassificacao1">
                                Residencial
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioClassificacao" id="radioClassificacao2" value="comercial">
                            <label class="form-check-label" id="radioClassificacao2" for="radioClassificacao2">
                                Comercial
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioClassificacao" id="radioClassificacao3" value="industrial">
                            <label class="form-check-label" id="radioClassificacao3" for="radioClassificacao3">
                                Industrial
                            </label>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back" id="back"><i class="fas fa-undo-alt"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next" id="next"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 1 -->
            <!-- PARTE 2 - ASSINATURA -->
            <div class="card container" name="dadosAssinatura" id="dadosAssinatura" style="display: none">
                <div class="card row justify-content-center text-center">
                    <div class="card-header">
                        <label for="tipoServico">Assinatura</label>
                    </div>
                    <div class="card-body" id="canvas" width="500" height="300">
                        <canvas id="signature-pad" name="signature-pad" width="500" height="300" style="border-style: ridge;"></canvas>
                    </div>
                    <div class="col justify-content-center text-center">
                        <a class="btn btn-outline-primary col-lg-4" id="clearCanvasSimple">Limpar</a>
                    </div>
                    <div class="card-footer">
                    Para confirmar o cancelamento, preencha o campo com a sua assinatura.
                    </div>
                </div>
                <textarea name="imageCheck" id="imageCheck" cols="30" rows="10" hidden></textarea>
                <hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back01" id="back01"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="save" id="save"><i class="far fa-save"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 4 -->
        </form>
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
    <script src="<?php echo BASE;?>/js/cancelaContrato.js"></script>
    </body>
</html>