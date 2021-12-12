<?php
ob_start();
session_start();

$_SESSION['id'] = '';

if(isset($_SESSION['idz']) && !empty($_SESSION['idz'])){
    echo 'in';
    include("adminPanel.php");
}else{
    include("adminLogin.php");
}


?>