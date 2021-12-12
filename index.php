<?php
    ob_start();
    session_start();

    if(isset($_SESSION['id'], $_SESSION['auth'])){
        if($_SESSION['auth'] == 'ADMIN'){
            include('admin/admin.php');
        }else{
            include('home.php');
        }
    }else{
        include('login.php');
    }

?>