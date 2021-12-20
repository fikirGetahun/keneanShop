<?php
require_once "../php/adminCrude.php";

?>

<form id="registerBox"  method="POST" enctype="multipart/form-data" >
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
    <label for="exampleInputEmail1">Job</label>
          <input type="text" class="form-control" id="lastName" 
          aria-describedby="emailHelp" name="jobt" placeholder="Job">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


          <label for="exampleInputEmail1">About</label>
          <textarea type="text" class="form-control" id="location2" 
          aria-describedby="emailHelp" name="about" placeholder="About Your Self"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     

        <button class="btn btn-light">Change Profile Photo</button>
        <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo</label>
          <input type="file" class="form-control" id="photo" 
           name="photoq" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div id="uploadStat"></div>


      <input class="btn btn-light" type="submit" value="Register">
 
  </form>