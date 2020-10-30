<?php
    session_start();
    require_once('src/conn/connect.php');
    date_default_timezone_set('America/Fortaleza');
    if($_SESSION == '' || $_SESSION == NULL){
        header('Location: ../index.php');
        die();
    } else{
        $user = $_SESSION['user'];
        $lotacao = $_SESSION['lotacao'];
        $level = $_SESSION['nivel'];
        $sess = $bd->prepare('SELECT * FROM tb_users WHERE id_user = :id');
        $sess->bindParam(':id',$user);
        $sess->execute();
        $result = $sess->fetch();
        $nome_completo = $result['nome_user'];
        $nome_curto = explode(' ', $nome_completo);
    }
    ?>