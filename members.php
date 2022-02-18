<?php
include 'includes/header.php';
require_once "php/fetchApi.php";
require_once "php/adminCrude.php";
include 'includes/lang.php';

ob_start();
if(!isset($_SESSION)){
  session_start();
}
?>
    <style>

      .container {
       max-width: 960px;
      }
      .lh-condensed { line-height: 1.25; }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Membership Registration</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">

    <div class="col-md-8 ">
      
      <h4 class="mb-3">Member</h4>
      <form action="members.php"   method="POST" enctype="multipart/form-data"  >
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Full name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="name" value="<?php echo $_SESSION['name'] ?>" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

        </div>
        <!-- <div class="row"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<script>


// sub city filter api
function hCityz(x){
  // alert(x)
  $.ajax({
      url: 'user/userApi.php',
      type: 'post',
      data: {
        cityH: x
      },
      success: function(data){
        // alert(data)
        $('#subHx').empty()
        $('#subHx').append(data)
      }
    })
}
</script>

<div  class="input-group mb-3" >
      <select  class="form-select" aria-label="Default select example" name="city"
       onchange="hCityz(this.value)" id="">
        <option><?php echo $lang['city'] ?></option>
        <?php 
            require_once 'php/fetchApi.php';
              $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
              $city = array();
              while($rowLoc = $locc->fetch_assoc()){
                  $city[]= $rowLoc['category'];
              }
              sort($city);
              $i = 0;
              foreach($city as $loc){
                if($loc == 'Addis Ababa'){
                  ?>
                  <option selected ><?php echo $loc ?></option>
                  <?php
                }else{
                  ?>
                   <option value="<?php echo $loc ?>" ><?php echo $loc ?></option>
                  <?php
                }
                ?>
                
              
                <?php
                $i++;
              }
            ?> 
      </select>
      </div>

      
      <div id="subHx"   class="input-group mb-3" >
        <?php
      require_once 'php/fetchApi.php';
  $locc= $get->allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
  $city = array();
  if($locc->num_rows != 0){
    ?>
              <select  class="form-select" aria-label="Default select example" name="subcity" >
        <option><?php echo $lang['subCity'] ?></option>
    <?php
  while($rowLoc = $locc->fetch_assoc()){
      $city[]= $rowLoc['category'];
  }
  sort($city);
  $i = 0;
  foreach($city as $loc){
    if($loc == 'Addis Ababa'){
      ?>
      <option selected ><?php echo $loc ?></option>
      <?php
    }else{
      ?>
       <option value="<?php echo $loc ?>" ><?php echo $loc ?></option>
      <?php
    }
    ?>
    
  
    
    <?php
    $i++;
  }
}
  ?>
  </select>
      </div>


      


    <!-- kebele list -->
    <div class="form-group">
      <select class="form-select" aria-label="Default select example" name="wereda"  id="inputGroupSelect01">
        <option ><?php echo $lang['Wereda'] ?></option>
        <?php 
           for($y=1;$y<=30;$y++){
             if($y <= 9 ){
               ?>
               <option value="<?php echo '0'.$y ?>"><?php echo '0'.$y ?></option>
               <?php
             }else{
              ?>
              <option value="<?php echo $y ?>"><?php echo $y ?></option>
              <?php
             }

          }
        ?>
        

      </select>
      </div>

        </div>
        <div class="row">
          
        
        <div class="col-md-6">
          <label for="username">Main Phone Number</label>
          <div class="input-group">
            <input type="text" class="form-control" id="username" placeholder="Username" name="phone1" value="<?php echo $_SESSION['phone'] ?>" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <label for="username">Additional Phone Number</label>
          <div class="input-group">
            <input type="text" class="form-control" id="username" placeholder="phone" name="phone2" value=" " required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">What does initiate you to do work with us?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="what_does_initiate" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Do you have another Job?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="do_you_have_other_job" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Have you work as a broker before?</label>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="broker_before" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="broker_before" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Do you have a business License?</label>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="business_license" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="business_license" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">What kind of commission will you work with us? </label>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="House_and_land_Selling" id="inlineRadio1" value="House_and_land_Selling">
          <label class="form-check-label" for="inlineRadio1">House_and_land_Selling</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="House_Renting" id="inlineRadio2" value="House_Renting">
          <label class="form-check-label" for="inlineRadio2">House_Renting</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="Real_Estate_Renting_and_Selling" id="inlineRadio2" value="Real_Estate_Renting_and_Selling">
          <label class="form-check-label" for="inlineRadio2">Real_Estate_Renting_and_Selling</label>
        </div>

        
        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="Car_Selling" id="inlineRadio2" value="Car_Selling">
          <label class="form-check-label" for="inlineRadio2">Car_Selling</label>
        </div>

        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="Car_Renting" id="inlineRadio2" value="Car_Renting">
          <label class="form-check-label" for="inlineRadio2">Car_Renting</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Other_Work" id="inlineRadio2" value="Other_Work">
          <label class="form-check-label" for="inlineRadio2">Other_Work</label>
        </div>

        </div>


        <div id="form-group">
        <label for="exampleInputEmail1">Upload scaned identification card here</label>
          <input type="file"  class="form-control" id="photoid" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">If you have any question write it down here?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="question" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
      </form>
      <?php
        if(isset($_POST['name'], $_POST['city'], $_POST['wereda'], $_POST['phone1'], $_POST['phone2'], $_POST['what_does_initiate'], $_POST['do_you_have_other_job'], $_POST['broker_before'], $_FILES['photo'], $_POST['question'], $_POST['business_license'])){

          $commission_type = array();
          if(isset($_POST['House_and_land_Selling'])){
            $commission_type[] = $_POST['House_and_land_Selling'];
          }

          if(isset($_POST['House_Renting'])){
            $commission_type[] = $_POST['House_Renting'];
          }
          if(isset($_POST['Real_Estate_Renting_and_Selling'])){
            $commission_type[] = $_POST['Real_Estate_Renting_and_Selling'];
          }
          if(isset($_POST['Car_Selling'])){
            $commission_type[] = $_POST['Car_Selling'];
          }
          if(isset($_POST['Car_Renting'])){
            $commission_type[] = $_POST['Car_Renting'];
          }
          if(isset($_POST['Other_Work'])){
            $commission_type[] = $_POST['Other_Work'];
          }
          
          echo 'innsz';

          
        $commission = implode(',', $commission_type);

          $name =$_POST['name'];
          $city = $_POST['city'];
          $wereda = $_POST['wereda'];
          $phone1 = $_POST['phone1'];
          $phone2 = $_POST['phone2']; 
          $what_does_initiate = $_POST['what_does_initiate']; 
          $do_you_have_other_job = $_POST['do_you_have_other_job']; 
          $photoPath1 = $_FILES['photo'];
          $broker_before = $_POST['broker_before']; 
          $business_license = $_POST['business_license'];
          $question = $_POST['question'];
          $userId = $_SESSION['userId'];

          $subcity = ' ';
          if(isset($_GET['subcity'])){
            $subcity = $_GET['subcity'];
          }

          $up = $admin->uploadSinglePhoto('mambership', $photoPath1);
          if($up[4] == 'error'){
            echo 'error file';
            print_r($up);
          }else{
            $mem = $get->member($name, $city, $wereda, $phone1, $phone2, $what_does_initiate, $do_you_have_other_job, $up[0], $broker_before, $business_license, $commission, $question, $userId);
            if($mem){
              echo 'Registerd ';
            }else{
              echo 'error';
            }
          }



        }

      ?>
    </div>
  </div>




  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

</html>
