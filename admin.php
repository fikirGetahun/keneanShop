<?php
ob_start();
session_start();
include "./includes/header.php";

$_SESSION['id'] = '';

if(isset($_SESSION['idz']) && !empty($_SESSION['idz'])){
    // echo 'in';
    include("admin/adminPanel.php");
}else{
    include("admin/adminLogin.php");
}


?>