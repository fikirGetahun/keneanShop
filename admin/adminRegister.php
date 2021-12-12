<?php
    include('../includes/header.php');
    require_once "../php/adminCrude.php";

    if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['username'],
     $_POST['password'], $_POST['auth'])){
         $firstName =$_POST['firstName'] ;
         $lastName =$_POST['lastName'] ;
         $phoneNumber =$_POST['phoneNumber'] ;
         $username =$_POST['username'] ;
         $password =$_POST['password'] ;
         $auth =$_POST['auth'] ;

         $out = $admin->userAdder($firstName, $lastName, $phoneNumber, $username, $password, $auth); 
     }

?>
  <script src="../assets/jquery.js" type="text/javascript"></script>
  <script>
      $(document).ready(function(){
        $('#registerBox').on('submit', function(e){
      e.preventDefault()
      $.ajax({
        url: 'adminRegister.php',
        type: 'post',
        data: $('#registerBox').serialize(),
        success : function(){
          $('#alertVacancy').text('POST SUCCESSFULL!  ')
        }
      })
      return false;

    })
      })
  </script>
<div class="container">
  <form id="registerBox" action="adminRegister.php" method="POST">
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


      <input class="btn btn-light" type="submit" value="Register">
 
  </form>
  <div id="alertVacancy"></div>
    
  </div>