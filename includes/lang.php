<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'eng';
}elseif(isset($_GET['lang']) && $_GET['lang'] != $_SESSION['lang'] && !empty($_GET['lang'])){
    if($_GET['lang'] == "eng"){
        $_SESSION['lang'] = 'eng';
    }
    if($_GET['lang'] == "amh"){
        $_SESSION['lang'] = 'amh';
    }
}

require_once "". $_SESSION['lang'].".php";
?>