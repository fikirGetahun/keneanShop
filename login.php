<?php
include "includes/header.php";
?>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<script src="assets/jquery.js" ></script>
  <script>
$(document).ready(function(){
      
  $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'user/userApi.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              // $('#alertVacancy').delay(5200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          

    })
})
  </script>
    <!-- Custom styles for this template -->
    <link href="assets/css/loginstyle.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form  method="POST" >
    <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address / Phone Number</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
   <a href="./register.php"><label>Register</label></a>
   <button class="w-50 btn btn-primary mx-auto " type="submit">Continue to checkout</button>

    <!-- <a class="w-100 btn btn-lg btn-primary" type="submit">Sign in</a> -->
    <div id="alertVacancy" ></div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>