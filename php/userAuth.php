<?php
    require_once('../includes/header.php');
    require_once('../php/auth.php');

if(isset($_POST['username'], $_POST['password'])){
    $us = $_POST['username'];
    $pa = $_POST['password'];
    $check = $auth->loginAuth($us, $pa);
    if($check->num_rows == 0){
        echo 'no ok no';
        $login = 'NOT_USER';

    }else if($check->num_rows > 0){
        

        while($row = $check->fetch_assoc()){
            if($row['username'] == $us && $row['password'] == $pa){
                $_SESSION['idz'] = $row['id'];
                
                header('Location: admin.php');
            }

        }

    }
    
}
?>