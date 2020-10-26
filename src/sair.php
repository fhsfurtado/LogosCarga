<?php
$_SESSION['user'] = NULL;
$_SESSION['lotacao'] = NULL;
$_SESSION['nivel'] = NULL;
session_destroy();
header('Location: ../index.php');

?>