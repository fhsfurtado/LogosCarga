<?php
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
    <link rel="stylesheet" href="<?php echo BASE;?>/css/novaligacaoPF.css">

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
            <a class="navbar-brand mr-1" href="<?php echo BASE;?>/index.php"style="background-color: white; border-radius: 6px;"><img src="<?php echo BASE;?>/img/logo.png" height="50px"></a>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid" style="display: none">
        <form id="formNovaLigacao" name="formNovaLigacao" class="needs-validation was-validated" action="cadNovaLigacao.php" method="POST">
            <!-- PARTE 1 - DADOS DO CLIENTE -->
            <input type="hidden" name="tipoAtendimento" value="cpf">
            <div class="card container" name="dadosCliente" id="dadosCliente">
                <div class="card-header row justify-content-center">
                    <label for="dadosCliente"><h4>Cliente</h4></label>
                </div></br>
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h5>Dados Pessoais</h5></label>
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label for="inputNome">Nome Completo*:</label>
                        <input type="text" class="form-control p01" id="inputNome" name="inputNome" placeholder="Nome Completo" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label for="inputCPF">CPF*:</label>
                        <input type="tel" class="form-control p01" id="inputCPF" name="inputCPF" onkeydown="return fMasc(this,mCPF)" placeholder="Nº do CPF" minlength="14" maxlength="14" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-10">
                        <label for="inputEndereco">Endereço da ligação*:</label>
                        <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Rua, Avenida, Estrada, etc..." required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="inputNumero">Nº:</label>
                        <input type="tel" class="form-control" id="inputNumero" name="inputNumero" onkeypress="return SoNumeros();" placeholder="Nº do imóvel">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="inputComplemento">Complemento*:</label>
                        <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputBairro">Bairro*</label>
                        <input type="text" class="form-control" id="inputBairro" name="inputBairro" placeholder="Bairro" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="inputMunicipio">Município*:</label>
                        <input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" placeholder="Municipio" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputCEP">CEP*:</label>
                        <input type="text" class="form-control" id="inputCEP" name="inputCEP" onkeypress="fMasc(this,mCEP)" placeholder="CEP" minlength="10" maxlength="10" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="inputEmail">E-mail*:</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="seuemail@exemplo.com" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputFixo">Telefone Fixo:</label>
                        <input type="text" class="form-control" id="inputFixo" name="inputFixo" onkeypress="fMasc(this,mTel)" placeholder="(XX) XXXX-XXXX">
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputCelular">Telefone Celular*:</label>
                        <input type="text" class="form-control" id="inputCelular" name="inputCelular" onkeypress="fMasc(this,mTel)" placeholder="(XX) X XXXX-XXXX" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back" id="back"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next" id="next"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 1 -->
            <!-- PARTE 2 - SOBRE O IMÓVEL -->
            <div class="card container" name="dadosInfo" id="dadosInfo" style="display: none">
                <div class="card-header row justify-content-center">
                    <label for="dadosCliente"><h4>Tipo de ligação</h4></label>
                </div>
                <div class="row card-body text-center justify-content-center">
                    <div class="form-group col-lg">
                        <div class="form-check">
                            <label for="inputEndereco">Tipo de Ligação:</label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioTipoLigacao" id="radioTipoLigacao1" value="monofasico" checked>
                            <label class="form-check-label" id="labelTipoLigacao1" for="radioTipoLigacao1">
                                Monofásica
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioTipoLigacao" id="radioTipoLigacao2" value="bifasico">
                            <label class="form-check-label" id="labelTipoLigacao2" for="radioTipoLigacao2">
                                Bifásica
                            </label>
                        </div>
                        <div class="form-check form-check-inline text-center">
                            <input class="form-check-input" type="radio" name="radioTipoLigacao" id="radioTipoLigacao3" value="trifasico">
                            <label class="form-check-label" id="labelTipoLigacao3" for="radioTipoLigacao3">
                                Trifásica
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-header row justify-content-center">
                    <label for="dadosCliente"><h4>Nossos Informativos</h4></label>
                </div>
                <div class="row card-body justify-content-center text-center" >
                    <div class="form-group col-lg-8">
                        <div class="form-check">
                            <label for="inputBairro">Deseja receber informações e serviços da ENEL via e-mail Fácil e Torpedo Fácil?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioReceberInfo" id="inlineSim" value="sim" checked>
                            <label class="form-check-label text-black" for="inlineRadio1"> Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioReceberInfo" id="inlineNao" value="nao">
                            <label class="form-check-label text-black" for="inlineRadio2"> Não</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center buttons-action">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back01" id="back01"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next01" id="next01"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 2-->
            <!-- INICIO PARTE 3 - RELAÇÃO DE CARGA -->
            <div class="card container" name="dadosRelCarga" id="dadosRelCarga" style="display: none">
                <div class="card row justify-content-center text-center">
                    <div class="card-header">
                        <label for="tipoServico">Relação de Carga:</label>
                    </div>
                    <div class="card-body">
                        <div class="card-body row justify-content-center text-center">
                            <div class="col-lg-4">
                                <label for="selEquipamento"></label>
                                <select name="selEquipamento" id="selEquipamento" class="col-lg-6">
                                    <option value="Lâmpada Compacta/Fria">Lâmpada Compacta/Fria</option>
                                    <option value="Lâmpada Incandescente">Lâmpada Incandescente</option>
                                    <option value="Lâmpada Fluorescente">Lâmpada Fluorescente</option>
                                    <option value="Tomada de Uso Geral">Tomada de Uso Geral</option>
                                    <option value="Tomada de Uso Específico">Tomada de Uso Específico</option>
                                    <option value="Torneira Elétrica">Torneira Elétrica</option>
                                    <option value="Chuveiro Elétrico">Chuveiro Elétrico</option>
                                    <option value="Máquina de Lavar Louça">Máquina de Lavar Louça</option>
                                    <option value="Secadora de Roupas">Secadora de Roupas</option>
                                    <option value="Forno Microondas">Forno Microondas</option>
                                    <option value="Forno Elétrico">Forno Elétrico</option>
                                    <option value="Ferro Elétrico">Ferro Elétrico</option>
                                    <option value="Ar Condicionado">Ar Condicionado</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <input type="tel" name="inputPotenciaEquipamento" id="inputPotenciaEquipamento" class="col-lg-3" onkeypress="return SoNumeros();" placeholder="Potência. Ex.: 25, 60, etc.">
                                <label for="inputPotenciaEquipamento" id="labelPotenciaEquip">Watts</label>
                                <label for="inputPotenciaEquipamento" id="labelPotenciaAr">BTU's</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="hidden" name="qtdeEquipAdd" id="qtdeEquipAdd" value="<?php echo $zero;?>">
                                <a class="btn btn-outline-primary col-lg-6" id="addEquip" name="addEquip" onclick="addEquip()"><i class="fas fa-plus-square"></i> Adicionar Equipamento</a>
                            </div>
                        </div>
                        <hr/>
                        <label for="nothing">Lista de Equipamentos</label>
                        <div class="row justify-content-center text-center" id="listEquipamentos">
                            <label for="nothing too" id="semEquip" name="semEquip">Não há dispositivos adicionados à lista!</label>
                        </div><hr/>
                    </div>
                </div><hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back02" id="back02"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next02" id="next02"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 3 -->
            <!-- PARTE 4 - ASSINATURA -->
            <div class="card container" name="dadosAssinatura" id="dadosAssinatura" style="display: none">
                <div class="card row justify-content-center text-center">
                    <div class="card-header">
                        <label for="tipoServico">Assinatura</label>
                    </div>
                    <div class="card-body" id="canvas" width="500" height="300">
                        <canvas id="signature-pad" name="signature-pad" width="500" height="300"></canvas>
                    </div>
                    <a class="btn btn-outline-primary col-lg-4" id="clearCanvasSimple">Limpar</a>
                    <div class="card-footer">
                    Para finalizar a solicitação, faça acima a sua assinatura.
                    </div>
                </div>
                <textarea name="imageCheck" id="imageCheck" cols="30" rows="10" hidden></textarea>
                <hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back03" id="back03"><i class="fas fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-lg btn-primary justify-content-end" name="save" id="save"><i class="far fa-save"></i></button>
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
    <script src="<?php echo BASE;?>/js/novaligacaoPF.js"></script>
    </body>
</html>