<?php
include "includes/header.php";
require_once "php/adminCrude.php";
require_once "php/auth.php";
require_once "php/fetchApi.php";
?>
<body style=" background-color: #F9F9F9;">

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

<div class="container" style="width: 700px;">

<main>
    <div class="py-5 text-center">
      <h2 class="text-primary">Please Sign In</h2>
     
    </div>
          <div class="container mx-auto">
        <h4 class="mb-3">Register</h4>
        <form class="needs-validation"  method="POST" enctype="multipart/form-data" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email <span class="text-muted">(Username)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>


            <div class="col-sm-6">
              <label for="address" class="form-label"> Phone number  </label>
              <input type="text" class="form-control" name="phoneNumber"  id="address" placeholder="09..." required>
              <div class="invalid-feedback">
                Please enter your Valid phone number.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="lastName" placeholder="" value="" required>
            </div>
            <div id="registerBox">
    <label for="exampleInputEmail1">Password Recovery Keyword</label>
          <input type="text" class="form-control" id="username" 
           name="recover" placeholder="Username">
          <small id="emailHelp" class="form-text text-muted">This here is a key word you have to remember your password when you forget it.</small>
    </div>
            <div class="col-sm-6">
              <label for="country" class="form-label">Location</label>
              <select class="form-select" id="country" name="address" required>
              <?php 
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                foreach($city as $loc){
                  ?>
                  <option value="<?php echo $loc ?>"><?php echo $loc ?></option> 
                  <?php
                }
              ?>                

              </select>
              <div class="invalid-feedback">
                Please select a valid country. 
              </div>

            </div>
            <div id="registerBox">
          <label for="exampleInputEmail1">Upload Profile Photo</label>
          <input type="file" class="form-control" id="photo" 
           name="photoq" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
            <hr class="my-4">
          <button class="w-50 btn btn-primary mx-auto " type="submit">Continue to checkout</button>
          <div id="alertVacancy" ></div>
          </div>

          
          </div>

          
        </form>
      </div>

  </main>
</div>
</body>