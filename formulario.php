<!DOCTYPE html>
<html>
<head>
    <title> Relação de Carga </title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Fabio Henrique Silva furtado" content="">

    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />

    <!-- jQuery AJax-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
            <a class="navbar-brand mr-1" href="index.php"style="background-color: white; border-radius: 6px;"><img src="img/logo.png" height="50px"></a>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid" style="display: none">
        <form class="needs-validation was-validated" action="" method="post">
            <!-- INICIO PARTE 1 -->
            <div class="card container" name="dadosCliente" id="dadosCliente">
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h2>Cliente</h2></label>
                </div>
                <hr/>
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h4>Dados Pessoais</h4></label>
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label for="inputNome">Nome Completo / Razão Social:</label>
                        <input type="text" class="form-control p01" id="inputNome" name="inputNome" placeholder="Nome Completo / Razão Social" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="inputCPFCNPJ">CPF / CNPJ</label>
                        <input type="text" class="form-control p01" id="inputCPFCNPJ" name="inputCPFCNPJ" placeholder="CPF / CNPJ" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputRG">RG</label>
                        <input type="text" class="form-control p01" id="inputRG" name="inputRG" placeholder="Nº do Registro Geral" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-10">
                        <label for="inputEndereco">Endereço:</label>
                        <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Rua, Avenida, Estrada, etc..." required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="inputNumero">Nº:</label>
                        <input type="text" class="form-control" id="inputNumero" name="inputNumero" placeholder="Nº do imóvel" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" id="inputBairro" name="inputBairro" placeholder="Bairro" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="inputMunicipio">Município:</label>
                        <input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" placeholder="Municipio" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="inputCEP">CEP:</label>
                        <input type="text" class="form-control" id="inputCEP" name="inputCEP" placeholder="CEP" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="inputEmail">E-mail:</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="seuemail@exemplo.com" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputFixo">Telefone Fixo:</label>
                        <input type="text" class="form-control" id="inputFixo" name="inputFixo" placeholder="(XX) XXXX-XXXX" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputCelular">Telefone Celular:</label>
                        <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="(XX) X XXXX-XXXX" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h4>Imóvel</h4></label>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="inputAreaConstr">Área Construída (m²):</label>
                        <input type="tel" class="form-control" id="inputAreaConstr" name="inputAreaConstr" placeholder="Área Construída" min="0" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputQtdeComodos">Nº de Cômodos:</label>
                        <input type="tel" class="form-control" id="inputQtdeComodos" name="inputQtdeComodos" placeholder="Qtde. Cômodos" min="0" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="inputTipoEdif">Tipo de Edificação:</label>
                        <input type="text" class="form-control" id="inputTipoEdif" name="inputTipoEdif" placeholder="Tipo de Edificação" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="inputNumInstalacao">Nº Instalação:</label>
                        <input type="text" class="form-control" id="inputNumInstalacao" name="inputNumInstalacao" placeholder="Nº Inst." required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="inputNumParceiro">Nº Parcero de Negócio:</label>
                        <input type="text" class="form-control" id="inputNumParceiro" name="inputNumParceiro" placeholder="Nº Parceiro" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="inputNumNota">Nº Nota de Serviço:</label>
                        <input type="text" class="form-control" id="inputNumNota" name="inputNumNota" placeholder="Nº Nota" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="inputNumNotaAnterior">Nota Técnica Anterior (se houver):</label>
                        <input type="text" class="form-control" id="inputNumNotaAnterior" name="inputNumNotaAnterior" placeholder="Nº Nota Anterior">
                        <div class="valid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row text-center" >
                    <div class="form-group col-lg-4">
                        <label for="inputNumInstalacaoVizinho">Nº da instalação do vizinho mais próximo:</label>
                        <input type="text" class="form-control" id="inputNumInstalacaoVizinho" name="inputNumInstalacaoVizinho" placeholder="Complemento" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
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
                </div><hr/>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-warning justify-content-start disabled" name="back" id="back"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next" id="next"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 1 -->
            <!-- INICIO PARTE 2 -->
            <div class="card container" name="dadosSolicitante" id="dadosSolicitante" style="display: none">
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h2>Dados do Solicitante</h2></label>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="form-group col-lg">
                        <div class="form-check">
                            <label for="inputBairro">Os dados do solicitante são os mesmos do cliente?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioSolicIsCliente" id="inlineSim" value="sim" checked>
                            <label class="form-check-label text-black" for="inlineRadio1"> Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioSolicIsCliente" id="inlineNao" value="nao">
                            <label class="form-check-label text-black" for="inlineRadio2"> Não</label>
                        </div>
                    </div>
                </div>
                <div id="mesmoCliente" name="mesmoCliente" style="display: none">
                    <div class="row">
                        <div class="form-group col-lg">
                            <label for="inputNome">Nome Completo / Razão Social:</label>
                            <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome Completo / Razão Social" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="inputCPFCNPJ">CPF / CNPJ</label>
                            <input type="text" class="form-control" id="inputCPFCNPJ" name="inputCPFCNPJ" placeholder="CPF / CNPJ" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputRG">RG</label>
                            <input type="text" class="form-control" id="inputRG" name="inputRG" placeholder="Nº do Registro Geral" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10">
                            <label for="inputEndereco">Endereço:</label>
                            <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Rua, Avenida, Estrada, etc..." required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="inputNumero">Nº:</label>
                            <input type="text" class="form-control" id="inputNumero" name="inputNumero" placeholder="Nº do imóvel" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="inputComplemento">Complemento</label>
                            <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="inputBairro" placeholder="Bairro" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="inputMunicipio">Município:</label>
                            <input type="text" class="form-control" id="inputMunicipio" name="inputMunicipio" placeholder="Municipio" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputCEP">CEP:</label>
                            <input type="text" class="form-control" id="inputCEP" name="inputCEP" placeholder="CEP" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="inputEmail">E-mail:</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="seuemail@exemplo.com" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputFixo">Telefone Fixo:</label>
                            <input type="text" class="form-control" id="inputFixo" name="inputFixo" placeholder="(XX) XXXX-XXXX" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputCelular">Telefone Celular:</label>
                            <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="(XX) X XXXX-XXXX" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center buttons-action">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back01" id="back01"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next01" id="next01"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 2-->
            <!-- PARTE 3-->
            <div class="card container" name="dadosSolicitacao" id="dadosSolicitacao" style="display: none">
                <div class="row justify-content-center">
                    <label for="dadosCliente"><h2>Solicitação de Atendimento Técnico / Serviços</h2></label>
                </div>
                <hr/>
                <div class="row justify-content-center text-center">
                    <div class="form-group col-lg">
                        <label for="dadosCliente">Tipo de Serviço:</label></br>
                        <select name="tipoServico" id="tipoServico">
                            <option value="0">Selecione um serviço</option>
                            <option value="Nova Ligação">Nova Ligação</option>
                            <option value="Alteração de Carga / Modificação">Alteração de Carga / Modificação</option>
                            <option value="Ligação Provisória">Ligação Provisória</option>
                            <option value="Ligação Especial / Via Pública">Ligação Especial / Via Pública</option>
                            <option value="Ligação Provisória (Obras)">Ligação Provisória (Obras)</option>
                            <option value="Acréscimo de Carga">Acréscimo de Carga</option>
                            <option value="Decréscimo de Carga">Decréscimo de Carga</option>
                            <option value="Outros">Outros (Troca de madeira, viseira, etc)</option>
                        </select>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
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
                <div class="row text-center justify-content-center">
                    <div class="form-group col-lg">
                        <div class="form-check">
                            <label for="inputEndereco">Finalidade:</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioFinalidade" id="radioFinalidade1" value="residencial" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Residencial
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioFinalidade" id="radioFinalidade2" value="comercial">
                            <label class="form-check-label" for="gridRadios2">
                                Comercial
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioFinalidade" id="radioFinalidade3" value="industrial">
                            <label class="form-check-label" for="gridRadios1">
                                Industrial
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center buttons-action">
                    <a class="btn btn-lg btn-warning justify-content-start" name="back02" id="back02"><i class="fas fa-arrow-circle-left"></i></a>
                    <a class="btn btn-lg btn-primary justify-content-end" name="next02" id="next02"><i class="fas fa-arrow-circle-right"></i></a>
                </div></br>
            </div>
            <!-- FIM PARTE 3-->
        </form>
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
    </body>
</html>