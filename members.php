<?php
include 'includes/header.php';
require_once "php/fetchApi.php";
require_once "php/adminCrude.php";
include 'includes/lang.php';
include "includes/secnav.php";
include "includes/navbar.php";

ob_start();
if(!isset($_SESSION)){
  session_start();
}
?>

      
<style type="text/css">
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>

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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<main style="background-image: url(assets/img/background.jpg); background-size: cover;">
<div class="container">
  <div class="row">

     <div class="col-md-6">
  <div class="px-4 py-5  text-center text-white">
    <h1 class="display-5 fw-bold">Register As A member</h1>
    <div class=" mx-auto">
      <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Back to Web</button>
      </div>
    </div>
  </div>

    </div><!--right-->



    <div class="col-md-6 bg-light mt-5 rounded-3">

    <img class="d-block mx-auto mb-4 rounded-circle" src="assets/img/pp.png" alt="" width="72" height="57">
        <form action="members.php"   method="POST" enctype="multipart/form-data">

          <div>
            <label for="firstName">Full name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="name" value="<?php echo $_SESSION['name'] ?>" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="row mb-2">
            <div class="col">
              <label for="firstName">City</label>
              <select class="form-select" aria-label="Default select example" name="city"
                    onchange="hCityz(this.value)" >
                <option><?php echo $lang['city'] ?></option>
                <?php 
                require_once 'php/fetchApi.php';
                  $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
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
            
            <div  class="col">
              <label for="firstName">Sub city</label>
              
                  <div id="subHx">
                 <?php
                        require_once 'php/fetchApi.php';
                        $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
                        $city = array();
                        if($locc->num_rows != 0){
                          ?>
                                    <select class="form-select" aria-label="Default select example" name="subCity">
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
            </div>

            
            <div class="col">
              <label for="firstName">woreda</label>
              <select class="form-select"  name="wereda" aria-label="Default select example">

                 <option   ><?php echo $lang['Wereda'] ?></option>
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

          <div class="row mb-2">
            <div class="col" >
            <label for="firstName">Phone number</label>
            <input type="text" class="form-control" id="firstName" placeholder="" name="phone1" value="<?php echo $_SESSION['phone'] ?>" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

            <div class="col" >
            <label for="phone2">Additional Phone number</label>
            <input type="text" class="form-control" id="phone2" placeholder="" name="phone2" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
            
          </div>

          <div class="row mb-2">
            <div class="col-md-6" >
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">What does initiate you to do work with us?</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="what_does_initiate" rows="3"></textarea>
          </div>
          </div>

            <div class="col-md-6" >
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Do you have another Job?</label>
            <textarea class="form-control" name="do_you_have_other_job" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          </div>
            
          </div>

          <div class="row mb-2">
            <div class="col-md-6">
            <p>Have you work as a broker before?</p>
            <div class="form-check form-check-inline">

        <input class="form-check-input" type="radio" name="broker_before" id="inlineRadio1" value="YES">
        <label class="form-check-label" for="inlineRadio1">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="broker_before" id="inlineRadio2" value="NO">
        <label class="form-check-label" for="inlineRadio2">No</label>
      </div>
        </div>  
            <div class="col-md-6">
            <p>Do you have a business License?</p>
            <div class="form-check form-check-inline">

        <input class="form-check-input" type="radio" name="business_license" id="inlineRadio1" value="YES">
        <label class="form-check-label" for="inlineRadio1">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="business_license" id="inlineRadio2" value="NO">
        <label class="form-check-label" for="inlineRadio2">No</label>
      </div>
        </div>
       </div>


       <div class="row">
        <label>What kind of commission will you work with us?</label>
        <div class="col">
          <div class="form-check">
            <input class="form-check-input" type="checkbox"   name="House_and_land_Selling" value="House_and_land_Selling" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            House and land Selling
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="House_Renting" name="House_Renting" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              House Renting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Real_Estate_Renting_and_Selling" name="Real_Estate_Renting_and_Selling" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Real Estate Renting and Selling
            </label>
          </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Car_Selling" name="Car_Selling" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Car Selling
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Car_Renting" name="Car_Renting" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Car Renting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Other_Work" name="Other_Work" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Other Work
            </label>
          </div>
        </div>
      </div>

          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Do you have any question for us?</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>  
        </div>


          <div class="row">
          <div class="col mt-3">

            <label for="file-upload" class="custom-file-upload bg-warning text-dark">
                 Upload Your Scanned Id
            </label>
            <input id="file-upload" name="photo" type="file" onchange="readURL(this);"/>

          </div> 

         <div class="col">
            <img class="d-block mx-auto mb-4 rounded" src="#" alt="display Here" width="50" height="50" id="blah">
          </div> 

        </div>
        <hr class="mb-4">
        
        <div class="d-flex justify-content-center">
          
        <button class="btn btn-primary btn-lg btn-block w-50 " type="submit">Register</button>
        </div>
            
         
      
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
          if(isset($_GET['subCity'])){
            $subcity = $_GET['subCity'];
          }

          $up = uploadSinglePhoto('mambership', $photoPath1);
          if($up[4] == 'error'){
            echo 'error file';
            print_r($up);
          }else{
            $mem = member($name, $city, $wereda, $phone1, $phone2, $what_does_initiate, $do_you_have_other_job, $up[0], $broker_before, $business_license, $commission, $question, $userId, $subcity);
            
            if($mem){
              header('Location: memberNotice.php');
            }else{
              echo 'error';
            }
          }
          
          
          


        }

      ?>
    </div><!-- left-->






   
    
  </div><!---row-->
</div>
  </main>


  <?php 
include "includes/footer.php"
  ?>
<script type="text/javascript">
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

