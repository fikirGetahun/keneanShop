<?php

require_once "../php/adminCrude.php";
require_once "../php/auth.php";


////////////Register A uSER ///////////////////////
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
$_POST['password'],$_POST['email'])){

 echo 'in';
    $firstName =$_POST['firstName'] ;
    $lastName =$_POST['lastName'] ;
    $username =$_POST['email'] ;
    $password =$_POST['password'] ;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $authr ='USER';
    $job = '';
    $phoneNumber= $_POST['phoneNumber'];
    $about =$_POST['email'];

    $u = $auth->loginAuth($username);
    $num = $u->num_rows;

    if($num >= 1){
        echo 'Username alrady exist! please change';
    }


    




   //to add user data and photo upload if user adds photo since its optional
    elseif(isset($_FILES['photoq'])){
     $tempName = $_FILES['photoq']['tmp_name'];
     $fileName = $_FILES['photoq']['name'];
               //to upload photo
               $up = $admin->uploadPhoto($fileName, $tempName);
               $out = $admin->userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, $up, $job, $about ); 

               if($out){
                   echo "Registerd Succesfully!";
               }else{
                   echo 'Register Unsuccesfull db ERROR';
               }
   }else{
    //to add user data
    $out = $admin->userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, '', $job, $about); 

    if($out){
        echo "Registerd Succesfully!";
    }else{
        echo 'Register Unsuccesfull db ERROR';
    }
   }


}

//////////////////LOGIN USER //////////////////////////

if(isset($_POST['username'], $_POST['password'])){
    echo 'in login';
    $us = $_POST['username'];
    $pa = $_POST['password'];
    $check = $auth->loginAuth($us);
    // $check = $auth->loginAuth()
    if($check->num_rows == 0){
        $login = 'Not valid password or Username';
        echo $login;

    }else{
        

        $row = $check->fetch_assoc();
            
           echo password_verify($pa, $row['password']);
            if(password_verify($pa, $row['password'])){
                ob_start();
                session_start();
                $_SESSION['userId'] = $row['id'];
                
                header('Location: ../index.php');
            }else{
                echo 'password not correct';
            }

        

    }
    
}





?>