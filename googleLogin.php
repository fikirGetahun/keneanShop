<?php
ob_start();
if(!isset($_SESSION)) { 
  session_start(); 
} 

require "./php/auth.php";
include "php/connect.php";
if(isset($_GET['usernameG'], $_GET['nameG'], $_GET['lastName'])){
  $us = $_GET['usernameG'];
  $name = $_GET['nameG'];
  $lastName = $_GET['lastName'];
  $check = loginAuth($us); 
  if($check->num_rows == 1){// if email or username exist this means this user has registerd before so we have to automaticaly log in him 
    // $check = loginAuth()
    $row = $check->fetch_assoc();
    if($row['userStatus'] == 'BAN'){
      header('Location: ./banPage.php');
    }else{
     $_SESSION['userId'] = $row['id'];
       $_SESSION['auth'] = $row['auth'];
       $_SESSION['phone'] = $row['phone'];
       $_SESSION['name'] = $row['firstName'].' '.$row['lastName'];
      header('Location: ./index.php');
     
    }

  }else{ /// if the username or email is not in the database, then this user has to be registerd in the database
    echo 'before';
$date = date('Y-m-d H:i:s');
    $qu = "INSERT INTO `user`(  `username`,  `firstName`, `lastName`, `email`, `auth`,   `recover`, `postedDate`) VALUES ('$us','$name','$lastName','$us','USER','google','$date' )";

    $ask = $mysql->query($qu);
    echo $mysql->error;
    
    if($ask){ 
      // after google user is registerd, we have to find the id of the user so that he automaticaly login after registeration. so we have to fetch the row that the new google user is registerd

      header('Location: '.$_SERVER['REQUEST_URI']);
    //   header('Location: '.$_SERVER['REQUEST_URI']);
    //   header('Location: '.$_SERVER['REQUEST_URI']);
    //   echo 'after';
    //   $check = loginAuth($us); 
    //   $row = $check->fetch_assoc();

    //   if($row['userStatus'] == 'BAN'){
    //     header('Location: ./banPage.php');
    //   }else{
    //     $_SESSION['userId'] = $row['id'];
       
    //      $_SESSION['auth'] = $row['auth'];
    //      $_SESSION['phone'] = $row['phone'];
    //      $_SESSION['name'] = $row['firstName'].' '.$row['lastName'];
    //     header('Location: ./index.php');
     
    //   }
      

    }else{
      echo '<span class="text-danger" >An ERROR OCCUERD!</span>';
    }
    



  }
}
?>