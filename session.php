<?php
    session_start();
    require_once('conn/connect.php');
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
        $nome_colaborador = $result['nome_user'];
    }
    ?>