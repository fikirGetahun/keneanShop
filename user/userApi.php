<?php

require_once "../php/adminCrude.php";
require_once "../php/auth.php";
require_once "../php/fetchApi.php";

ob_start();
if(!isset($_SESSION)){
  session_start();
}


////////////Register A uSER ///////////////////////
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
$_POST['password'],$_POST['email'], $_POST['address'], $_POST['recover'])){

    $firstName =$_POST['firstName'] ;
    $lastName =$_POST['lastName'] ;
    $username =$_POST['email'] ;
    $password =$_POST['password'] ;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $authr ='USER';
    $job = ' ';
    $recover = $_POST['recover'];
    $phoneNumber= $_POST['phoneNumber'];
    $about =$_POST['address'];

    $u = $auth->loginAuth($username);
    $num = $u->num_rows;
    $up = ' ';
    if($num >= 1){
        echo 'Username alrady exist! please change';
    }







   //to add user data and photo upload if user adds photo since its optional
    elseif(isset($_FILES['photoq'])){
     $tempName = $_FILES['photoq']['tmp_name'];
     $fileName = $_FILES['photoq']['name'];
               //to upload photo
               $up = $admin->uploadPhoto($fileName, $tempName);
               $out = $admin->userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, $up, $about, $recover ); 

               if($out){
                   echo "Registerd Succesfully!";
               }else{
                   echo 'Register Unsuccesfull db ERROR1';
               }
   }else{
    //to add user data
    $out = $admin->userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, ' ', $job, $about); 

    if($out){
        echo "Registerd Succesfully!";
    }else{
        echo 'Register Unsuccesfull db ERROR2';
    }
   }


}





/////// favourites page
  require_once "../php/fetchApi.php";

  if(isset($_GET['postId'], $_GET['uid'], $_GET['table'])){
    $pid = $_GET['postId'];
    $uid = $_SESSION['userId'];
    $table = $_GET['table'];
    $fav = $get->favouritesAdder($pid, $uid, $table);
    if($fav){
      echo "Added to Fav";
    }else{
      echo "error";
    }

  }




/////////////user ban
if(isset($_POST['ban'], $_POST['id'])){
    $uid =$_POST['id'];
    if($_POST['ban'] == 'BAN'){
    $ban = $get->userBan($uid);
    if($ban){
        echo 'USER BANNED!';
    }else{
        echo 'ERROR';
    }
    }elseif($_POST['ban'] == 'UNBAN'){
        $ban = $get->unBanuser($uid);
        if($ban){
            echo 'USER UNBANNED!';
        }else{
            echo 'ERROR';
        }
    }
}

//location changer
if(isset($_GET['loc'])){
    $_SESSION['location'] = $_GET['loc'];
  }else{
    $_SESSION['location'] = 'All';
  }
  

 // page number changer
 if(isset($_POST['page'])){
   $_SESSION['page'] = $_POST['page'];
 }else{
   $_SESSION['page'] = 1;
 }

//// address selecter jiji style
if(isset($_POST['address'])){
    $add = $_POST['address'];
    $_SESSION['address'] = $add;
}


// message sending api
if(isset($_POST['tabel'], $_POST['reciver'], $_POST['postFocus'], $_POST['msg'])){
  $tb = $_POST['tabel'];
  $msg = $_POST['msg'];
  $reciver = $_POST['reciver'];
  $postFocus = $_POST['postFocus'];

  $send = $get->msgSender($tb, $postFocus, $_SESSION['userId'], $reciver, $msg);
  if($send){
    echo 'msg sent';
  }else{
    echo 'error';
  }

}


?>