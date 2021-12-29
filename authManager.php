<?php
ob_start();
session_start();

if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
    include "login.php";
}else{
    header('Location: index.php');
}


?>