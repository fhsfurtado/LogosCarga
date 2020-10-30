<?php
    require_once('../config.php');
    require_once('conn/connect.php');
    date_default_timezone_set('America/Sao_Paulo');
    $status='';
    $diff = rand(1, 9999); //diferenciador entre possíveis clientes cadastrados ao mesmo tempo
    $tipoAtend = $_POST['tipoAtendimento'];
    switch($tipoAtend){
        case 'cpf':
            $nome = $_POST['inputNome'];
            $cpf = $_POST['inputCPF'];
            $endereco = $_POST['inputEndereco'];
            $numeroEndereco = $_POST['inputNumero'];
            $complementoEndereco = $_POST['inputComplemento'];
            $bairro = $_POST['inputBairro'];
            $municipio = $_POST['inputMunicipio'];
            $cep = $_POST['inputCEP'];
            $email = $_POST['inputEmail'];
            $telfixo = $_POST['inputFixo'];
            $telcelular = $_POST['inputCelular'];
            $tipoLigacao = $_POST['radioTipoLigacao'];
            $clienteReceberInfos = $_POST['radioReceberInfo'];
            $qtdeEquips = $_POST['qtdeEquipAdd'];
            $protocolo = 'NLPF';
            $protocolo .= date('Y');
            $protocolo .= date('m');
            $protocolo .= date('d');
            $protocolo .= date('H');
            $protocolo .= date('i');
            $protocolo .= date('s');
            $protocolo .= str_pad($diff, 4, 0, STR_PAD_LEFT);
            $assinatura = $_POST['imageCheck'];
            $atendido = 'nao';
            // o protocolo gerado acima é único
            //salvar dados do cliente no BD
            $stmt = $bd->prepare('INSERT INTO tb_clientes(nome_cliente,cpfcnpj,endereco,numero,complemento,bairro,municipio,cep,email,telefone,celular,tipo_ligacao,receberInfo,protocolo,assinatura,atendido) VALUES (:nome_cliente,:cpfcnpj,:endereco,:numero,:complemento,:bairro,:municipio,:cep,:email,:telefone,:celular,:tipo_ligacao,:receberInfo,:protocolo,:assinatura,:atendido)');
            $stmt->bindParam(':nome_cliente',$nome);
            $stmt->bindParam(':cpfcnpj',$cpf);
            $stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':numero',$numeroEndereco);
            $stmt->bindParam(':complemento',$complementoEndereco);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':municipio',$municipio);
            $stmt->bindParam(':cep',$cep);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':telefone',$telfixo);
            $stmt->bindParam(':celular',$telcelular);
            $stmt->bindParam(':tipo_ligacao',$tipoLigacao);
            $stmt->bindParam(':receberInfo',$clienteReceberInfos);
            $stmt->bindParam(':protocolo',$protocolo);
            $stmt->bindParam(':assinatura',$assinatura);
            $stmt->bindParam(':atendido',$atendido);
            $stmt->execute();
            // agora, salvar os equipamentos que foram repassados na relação de carga
            $porta=1;
            for($i=0;$i<$qtdeEquips;$i++){
                $stmt = $bd->prepare('INSERT INTO tb_solicitacao(prot_solicitacao,nome_equip,qtde_equip,potencia_equip) VALUES (:prot_solicitacao,:nome_equip,:qtde_equip,:potencia_equip)');
                $stmt->bindParam(':prot_solicitacao',$protocolo);
                $stmt->bindParam(':nome_equip',$_POST['hiddenDataNomeEquip'.$i]);
                $stmt->bindParam(':qtde_equip',$porta);
                $stmt->bindParam(':potencia_equip',$_POST['hiddeninputPotencia'.$i]);
                $stmt->execute();
            }
            $status='OK';
            break;
        case 'cnpj':
            $nome = $_POST['inputNome'];
            $cnpj = $_POST['inputCNPJ'];
            $endereco = $_POST['inputEndereco'];
            $numeroEndereco = $_POST['inputNumero'];
            $complementoEndereco = $_POST['inputComplemento'];
            $bairro = $_POST['inputBairro'];
            $municipio = $_POST['inputMunicipio'];
            $cep = $_POST['inputCEP'];
            $email = $_POST['inputEmail'];
            $telfixo = $_POST['inputFixo'];
            $telcelular = $_POST['inputCelular'];
            $tipoLigacao = $_POST['radioTipoLigacao'];
            $clienteReceberInfos = $_POST['radioReceberInfo'];
            $qtdeEquips = $_POST['qtdeEquipAdd'];
            $protocolo = 'NLPJ';
            $protocolo .= date('Y');
            $protocolo .= date('m');
            $protocolo .= date('d');
            $protocolo .= date('H');
            $protocolo .= date('i');
            $protocolo .= date('s');
            $protocolo .= str_pad($diff, 4, 0, STR_PAD_LEFT);
            $assinatura = $_POST['imageCheck'];
            $atendido = 'nao';
            // o protocolo gerado acima é único
            //salvar dados do cliente no BD
            $stmt = $bd->prepare('INSERT INTO tb_clientes(nome_cliente,cpfcnpj,endereco,numero,complemento,bairro,municipio,cep,email,telefone,celular,tipo_ligacao,receberInfo,protocolo,assinatura,atendido) VALUES (:nome_cliente,:cpfcnpj,:endereco,:numero,:complemento,:bairro,:municipio,:cep,:email,:telefone,:celular,:tipo_ligacao,:receberInfo,:protocolo,:assinatura,:atendido)');
            $stmt->bindParam(':nome_cliente',$nome);
            $stmt->bindParam(':cpfcnpj',$cnpj);
            $stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':numero',$numeroEndereco);
            $stmt->bindParam(':complemento',$complementoEndereco);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':municipio',$municipio);
            $stmt->bindParam(':cep',$cep);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':telefone',$telfixo);
            $stmt->bindParam(':celular',$telcelular);
            $stmt->bindParam(':tipo_ligacao',$tipoLigacao);
            $stmt->bindParam(':receberInfo',$clienteReceberInfos);
            $stmt->bindParam(':protocolo',$protocolo);
            $stmt->bindParam(':assinatura',$assinatura);
            $stmt->bindParam(':atendido',$atendido);
            $stmt->execute();
            // agora, salvar os equipamentos que foram repassados na relação de carga
            $porta=1;
            for($i=0;$i<$qtdeEquips;$i++){
                $stmt = $bd->prepare('INSERT INTO tb_solicitacao(prot_solicitacao,nome_equip,qtde_equip,potencia_equip) VALUES (:prot_solicitacao,:nome_equip,:qtde_equip,:potencia_equip)');
                $stmt->bindParam(':prot_solicitacao',$protocolo);
                $stmt->bindParam(':nome_equip',$_POST['hiddenDataNomeEquip'.$i]);
                $stmt->bindParam(':qtde_equip',$porta);
                $stmt->bindParam(':potencia_equip',$_POST['hiddeninputPotencia'.$i]);
                $stmt->execute();
            }
            $status='OK';
            break;
        case 'canc':
            $nome = $_POST['inputNome'];
            $numDocumento = $_POST['inputDoc'];
            $unidadeConsumidora = $_POST['inputUC'];
            $cep = $_POST['inputCEP'];
            $endereco = $_POST['inputEndereco'];
            $complementoEndereco = $_POST['inputComplemento'];
            $bairro  = $_POST['inputBairro'];
            $municipio = $_POST['inputMunicipio'];
            $numeroEndereco = $_POST['inputNumero'];
            $email = $_POST['inputEmail'];
            $telfixo = $_POST['inputFixo'];
            $telcelular = $_POST['inputCelular'];
            $classificacao = $_POST['radioClassificacao'];
            $assinatura = $_POST['imageCheck'];
            $atendido = 'nao';
            $protocolo = 'CANC';
            $protocolo .= date('Y');
            $protocolo .= date('m');
            $protocolo .= date('d');
            $protocolo .= date('H');
            $protocolo .= date('i');
            $protocolo .= date('s');
            $protocolo .= str_pad($diff, 4, 0, STR_PAD_LEFT);
            $receberinfo = 'sim';
            //salvar no banco
            $stmt = $bd->prepare('INSERT INTO tb_clientes(nome_cliente,cpfcnpj,num_uc,cep,endereco,numero,complemento,bairro,municipio,email,telefone,celular,tipo_ligacao,receberInfo,protocolo,assinatura,atendido) VALUES (:nome_cliente,:cpfcnpj,:num_uc,:cep,:endereco,:numero,:complemento,:bairro,:municipio,:email,:telefone,:celular,:tipo_ligacao,:receberInfo,:protocolo,:assinatura,:atendido)');
            $stmt->bindParam(':nome_cliente',$nome);
            $stmt->bindParam(':cpfcnpj',$numDocumento);
            $stmt->bindParam(':num_uc',$unidadeConsumidora);
            $stmt->bindParam(':cep',$cep);
            $stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':numero',$numeroEndereco);
            $stmt->bindParam(':complemento',$complementoEndereco);
            $stmt->bindParam(':bairro',$bairro);
            $stmt->bindParam(':municipio',$municipio);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':telefone',$telfixo);
            $stmt->bindParam(':celular',$telcelular);
            $stmt->bindParam(':tipo_ligacao',$classificacao);
            $stmt->bindParam(':assinatura',$assinatura);
            $stmt->bindParam(':protocolo',$protocolo);
            $stmt->bindParam(':atendido',$atendido);
            $stmt->bindParam(':receberInfo',$receberinfo);
            $stmt->execute();
            $status='OK';
            break;
        case 'trtl':
            var_dump($_POST);
            break;
        default:
            $status='FAIL';
            break;
    }
    header("refresh:15;url=express.php");
    if($status == 'OK'){
        $saudacao = 'Tudo certo, '.$nome.'!';
        $gif = '<img src="../img/check.gif" alt="OK!">';
        $mensagem = 'Obrigado pelas informações! Agora, basta aguardar a sua senha ser chamada no painel para prosseguir com a solicitação!';
        $rodape = 'Protocolo nº: '.$protocolo;
    } else {
        $saudacao = 'Ops! Ocorreu um erro...';
        $gif = '<img src="../img/error.png" alt="OPS!">';
        $mensagem = 'Por favor, aguarde para que possamos fazer outra tentativa. Se o erro persistir, contacte um dos nossos colaboradores.';
        $rodape = 'Em 10 segundos, você será redirecionado para nossa página inicial';
    }
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

    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />

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
            <a class="navbar-brand mr-1" href="index.php"style="background-color: white; border-radius: 6px;"><img src="<?php echo BASE;?>/img/logo.png" height="50px"></a>
        </nav>
    </div>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="<?php echo BASE;?>/img/preloader.gif"><br>
	    Carregando...
	</div>
    <div id="content" class="content container-fluid" style="display: none">
        <div class="card justify-content-center text-center">
            <div class="card-header">
                <h4><?php echo $saudacao?></h4>
            </div>
            <div class="card-body">
                <?php echo $gif?>
            </div>
            <div class="card-body">
                <?php echo $mensagem?>
            </div>
            <div class="card-footer">
                <?php echo $rodape?>
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