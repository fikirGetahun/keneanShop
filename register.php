<?php
    include('./includes/header.php');
?>
  <script src="../assets/jquery.js" type="text/javascript"></script>

  <form action="register.php" method="POST">
    <div id="registerBox">
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

    <button type="submit" class="btn btn-primary">Regester</button>
  </form>
    
  </div>