<?php
    include '../includes/header.php';
    include "../includes/adminSide.php";

    require_once "../php/adminCrude.php";


    






    //  }

     

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <script>
    //   $(document).ready(function(){
    //     $('form').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'admin/adminRegister.php',
    //     type: 'post',
    //     data:  new FormData( this ),
    //     success : function(){
    //       $('#alertVacancy').text('Register SUCCESSFULL!  ')
    //     },
    //     processData: false,
    // contentType: false
    //   })
    //   return false;

    // })
    //   })
  </script>
    <main id="main" class="main">


<div class="pagetitle">
  <h1>Dashboard x</h1>
  <h4><?php echo $row2['firstName'].''.$row2['lastName']  ?></h4>  <br>
  <h6>AUTHERIZATION: <?php echo $row2['auth'] ?></h6>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div> 
<div id="postBox" class="container">
<div class="container">
  <form action="adminRegister.php"  method="POST" enctype="multipart/form-data" >
    <div id="registerBox2">
    <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" id="firstName" 
          aria-describedby="emailHelp" name="firstName" placeholder="First Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" id="lastName" 
          aria-describedby="emailHelp" name="lastName" placeholder="Last Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="phoneNumber" 
          aria-describedby="emailHelp" name="phoneNumber" placeholder="phoneNumber">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">UserName</label>
          <input type="email" class="form-control" id="username" 
          aria-describedby="emailHelp" name="username" placeholder="Username">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Password</label>
          <input type="text" class="form-control" id="password" 
          aria-describedby="emailHelp" name="password" placeholder="password">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> AUTHERIZATION</label>
        </div>
        <select class="custom-select" name="auth" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="ADMIN">ADMIN</option>
          <option value="EDITOR">EDITOR</option>
          <option value="USER">USER</option>
        </select>
        </div>
        
        
        <div id="registerBox">
    <label for="exampleInputEmail1">Password Recovery Keyword</label>
          <input type="text" class="form-control" id="username" 
           name="recover" placeholder="Username">
          <small id="emailHelp" class="form-text text-muted">This here is a key word you have to remember your password when you forget it.</small>
    </div>





          <label for="exampleInputEmail1">About</label>
          <textarea type="text" class="form-control" id="location2" 
          aria-describedby="emailHelp" name="about" placeholder="About Your Self"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     

        <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo</label>
          <input type="file" class="form-control" id="photo" 
           name="photoq" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div id="uploadStat"></div>


      <input class="btn btn-light" type="submit" value="Register">

 
  </form>
  <div id="alertVacancy"></div>
  <?php
      
      if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['username'],
      $_POST['password'], $_POST['auth'], $_POST['about'], $_FILES['photoq'], $_POST['recover'])){
               $firstName =$_POST['firstName'] ;
              $lastName =$_POST['lastName'] ;
              $phoneNumber =$_POST['phoneNumber'] ;
              $username =$_POST['username'] ;
              $password =$_POST['password'] ;
              $auth =$_POST['auth'] ;
              $about =$_POST['about'];
              $recover = $_POST['recover'];
              $password = password_hash($password, PASSWORD_DEFAULT);
     
     
     
              //to add user data
             //  $out = userAdder($firstName, $lastName, $phoneNumber, $username, $password, $auth, '', $job, $about); 
     
             //to add user data and photo upload if user adds photo since its optional
             //  if(isset($_FILES['photoq'])){
               $tempName = $_FILES['photoq']['tmp_name'];
               $fileName = $_FILES['photoq']['name'];
                         //to upload photo
                         $up = uploadPhoto($fileName, $tempName);
                         $out = userAdder($firstName, $lastName, $phoneNumber, $username, $password, $auth, $up, $about, $recover ); 
     
             // }
     
               if($out){
                 echo '<span class="text-success">REGISTERD</span> ';
               }else{
                 echo 'error';
               }
              }
     
        ?>
    
  </div>
</div>
    </main>
  <?php

include "../includes/adminFooter.php";
?>