<?php
ob_start();

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'en';
}elseif(isset($_GET['lang']) && $_GET['lang'] != $_SESSION['lang'] && !empty($_GET['lang'])){
    if($_GET['lang'] == "en"){
        $_SESSION['lang'] = 'en';
    }
    if($_GET['lang'] == "amharic"){
        $_SESSION['lang'] = 'amharic';
    }
}

require_once "lan/". $_SESSION['lang']."php";
?>