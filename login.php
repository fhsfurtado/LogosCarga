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
    $mobile = FALSE;
   $user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric");
    $modelo = "Desktop";
   foreach($user_agents as $user_agent){
     if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
        $modelo	= $user_agent;
        $mobile = TRUE;
	    break;
     }
   }
    if(isset($_POST)){
        require_once('src/conn/connect.php');
        $user = @$_POST['inputLogin'];
        $psw = @md5($_POST['inputSenha']);
        $stmt = $bd->prepare('SELECT * FROM tb_users');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $meuip = json_decode(file_get_contents('https://api.ipify.org?format=json'),true);
        foreach($result as $res){
            if($user == $res->matr_user && $psw == $res->senha){
                if($res->ativo == 1){
                    echo $_SERVER['REMOTE_ADDR'];
                    $save = $bd->prepare('INSERT INTO tb_login (id_user,id_lotacao,ip,dispositivo,data_login) VALUES (:user,:lotacao,:ip,:dispositivo,NOW())');
                    $save->bindParam(':user',$res->id_user);
                    $save->bindParam(':lotacao',$res->lotacao);
                    $save->bindParam(':dispositivo',$modelo);
                    $save->bindParam(':ip',$meuip['ip']);
                    $save->execute();
                    session_start();
                    $_SESSION['user'] = $res->id_user;
                    $_SESSION['lotacao'] = $res->lotacao;
                    $_SESSION['nivel'] = $res->nivel;
                    $_SESSION['isMobile'] = $mobile;
                    require_once('session.php');
                    header('Location: src/index.php');
                    exit();
                } else{
                    header('Location: index.php?erro=0');
                }
            } else{
                header('Location: index.php?erro=1');
            }
        }
    }
    ?>
</head>
<body>
    <div id="sidebar">
        <nav id="nav" class="navbar navbar-collapse navbar-expand static-top" role="navigation" style="margin-bottom: 0">
        </nav>
    </div>
    </br></br></br></br>
    <div id="loading" style="display: block" class="loading" align="center">
		<img src="img/preloader.gif"><br>
	    Carregando...
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