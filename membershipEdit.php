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

<script>
            // function pChange(){
             
             
       
                
       
            //     //  e.preventDefault()
            //      $.ajax({
            //        url: 'admin/editHandler.php',
            //        type: 'post',
            //        data:  new FormData( this ),
            //        success : function(data){
                   
            //          alert('inform')
            //          $('#alertVacancy').text(data)
            //          // $('#alertVacancy').delay(3200).fadeOut(300);
            //        },
            //        processData: false,
            //    contentType: false
            //      })
                 
            //      return false;
       
          
            //     }
</script>

  </head>
  <body class="bg-light">
    <div class="container">

<?php
if(isset($_GET['memberId'])){
  $postId = $_GET['memberId'];
}

// if(isset($_GET['edit'])){



$memb = allPostListerOnColumen('mambership', 'id', $postId);

$row = $memb->fetch_assoc();



?>


  <div class="py-5 text-center">
    <h2>Membership Registration</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">

    <div class="col-md-8 ">
      
      <h4 class="mb-3">Member</h4>
      <form action="membershipEdit.php?memberId=<?php echo $postId ?>"   method="POST" enctype="multipart/form-data"  >
        <div class="row">


        </div>
        <div class="row">
                <div class="">
                  <div class="col mb-3">
                    <label for="firstName">Full name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" name="name" value="<?php echo $_SESSION['name'] ?>" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
                </div>
              
          </div>

            <?php
            ?>

                    <div class="row">
                <div class="col-lg-6">
                  <div  class="input-group mb-3" >
                    <select  class="form-select" aria-label="Default select example" name="city"
                    onchange="hCityz(this.value)" id="">
                      <option><?php echo $row['city'] ?></option>
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
                </div>
                <div class="col-lg-6">
                     
                  <div id="subHx"   class="input-group mb-3" >
<?php
            if($row['subcity'] != ""){ 
           
                        require_once 'php/fetchApi.php';
                        $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
                        $city = array();
                        if($locc->num_rows != 0){
                          ?>
                                    <select  class="form-select" aria-label="Default select example" name="subCity" >
                              <option><?php echo $row['subcity'] ?></option>
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
              <?php
            }
            
            ?>
 </div>
          <div class="row">
            <div class="col-lg-12">
                  <!-- kebele list -->
    <label for="username">Wereda</label>
    <div class="form-group col-12">
      <select class="form-select" aria-label="Default select example" name="wereda"  id="inputGroupSelect01">
        <option ><?php echo $row['wereda'] ?></option>
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



   


      

</div>


         <div class="row">
          
        
        <div class="col-md-6">
          <label for="username">Main Phone Number</label>
          <div class="input-group">
            <input type="text" class="form-control" id="username" placeholder="Username" name="phone1" value="<?php echo $_SESSION['phone'] ?>" >
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <label for="username">Additional Phone Number</label>
          <div class="input-group">
            <input type="text" class="form-control" id="username" placeholder="phone" name="phone2" value="<?php echo $row['phone2'] ?>" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>
        <div class="container" >
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">What does initiate you to do work with us?</label>
                  <textarea type="text" class="form-control" id="des2" 
                  aria-describedby="emailHelp" name="what_does_initiate" placeholder="info"> <?php echo $row['what_does_initiate'] ?> </textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Do you have another Job?</label>
                  <textarea type="text" class="form-control" id="des2" 
                    aria-describedby="emailHelp" name="do_you_have_other_job" placeholder="info"> <?php echo $row['do_you_have_other_job'] ?></textarea>
                  </div>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Have you work as a broker before?</label> <br>
                      <p class="text-danger" > Answer:</p> <span> <?php echo ' '.$row['broker_before'] ?></span><br>
                      <span class="text-success" >Change Answer?</span>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="broker_before" id="inlineRadio1" value="YES">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="broker_before" id="inlineRadio2" value="NO">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Do you have a business License?</label> <br>
                    <p class="text-danger" > Answer:</p> <span> <?php echo ' '.$row['business_license'] ?></span><br>
                      <span class="text-success" >Change Answer?</span>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" required type="radio" name="business_license" id="inlineRadio1" value="YES">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" required type="radio" name="business_license" id="inlineRadio2" value="NO">
                      <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                <label for="exampleInputEmail1">What kind of commission will you work with us? </label> <br>
                </div>
                <?php
                  $type = explode(',', $row['commission_type']);
                  function inTheCollection($toBeChecked, $arr){
                    if(in_array($toBeChecked, $arr)){
                      echo 'checked';
                    } 

                  }
                
                ?>
                <div class="col-lg-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input"  type="checkbox" name="House_and_land_Selling" id="inlineRadio1" value="House_and_land_Selling" <?php inTheCollection('House_and_land_Selling', $type ) ?>  > 
                      <label class="form-check-label" for="inlineRadio1">House_and_land_Selling</label>
                    </div> <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="House_Renting" id="inlineRadio2" value="House_Renting"  <?php inTheCollection("House_Renting", $type ) ?>  >
                      <label class="form-check-label" for="inlineRadio2">House_Renting</label>
                    </div><br>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input"  type="checkbox" name="Real_Estate_Renting_and_Selling" id="inlineRadio2" value="Real_Estate_Renting_and_Selling"  <?php inTheCollection("Real_Estate_Renting_and_Selling", $type ) ?>  >
                      <label class="form-check-label" for="inlineRadio2">Real_Estate_Renting_and_Selling</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input"  type="checkbox" name="Car_Selling" id="inlineRadio2" value="Car_Selling"  <?php inTheCollection("Car_Selling", $type ) ?>  >
                      <label class="form-check-label" for="inlineRadio2">Car_Selling</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input"  type="checkbox" name="Car_Renting" id="inlineRadio2" value="Car_Renting"  <?php inTheCollection("Car_Renting", $type ) ?>  >
                      <label class="form-check-label" for="inlineRadio2">Car_Renting</label>
                    </div><br>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="Other_Work" id="inlineRadio2" value="Other_Work"   <?php inTheCollection("Other_Work", $type ) ?> >
                      <label class="form-check-label" for="inlineRadio2">Other_Work</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                  
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                  
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                  
                </div>
            </div>
        </div>






        </div>
  <!-- </div> -->

  


        <!-- <div id="form-group">
        <label for="exampleInputEmail1">Upload scaned identification card here</label>
          <input type="file"  class="form-control" id="photoid" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div> -->


        <div class="form-group">
          <label for="exampleInputEmail1">If you have any question write it down here?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="question" placeholder="info"> <?php echo ' '.$row['question'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Save Changes!</button>
      </form>
      <script>
  // photo updater and deleter
             function pUpdate(divz, photo){
              $('#'+divz).empty()
              $.ajax({
                url: 'membershipPhotoEdit.php',
                type: 'post',
                data: {photoPath: photo, tableName: "mambership", pid: "<?php echo $postId ?>"},
                success: function(returnedData){
                  $('#'+divz).append(returnedData)        
              }
              })
     
             }
  
  
          
            
  
           </script>
             <?php
             $i = 0;
             $pp = photoSplit($row['photoPath1']);
             if(!empty($row['photoPath1'])){
             foreach($pp as $photo){
               ?>
               <div class="row">
                 <div class="col-6">
                 <div id="<?php echo $i ?>">
                    <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                    <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark"><?php echo $lang['deletePhoto'] ?></button>
                    </div>
                 </div>
               </div>
             
               <?php
               $i ++;
             }
            }else{
              ?>
                    <form   method="POST"  enctype="multipart/form-data" >
                    <input hidden name="pid" value="<?php echo $postId; ?>">
                    <input hidden name="tName" value="mambership">
                    <div class="row">
                    <div id="registerBox">
                    <label for="exampleInputEmail1"><?php echo $lang['up'] ?>  </label>
                    <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                    
                    </div>
                    </div>
  
                    <input type="submit" class="btn btn-success" value="Change Photo">
                    </form>
              
              <?php
            }
             ?>
  
              <?php
              
                      //deleting photo api
  
  
  ///////////////////////////////////////////////////////////////////
  // echo 'edit handler';  
          //input updated photos to database
          ///THE NEXT API
          if(isset($_FILES['photo'], $_POST['pid'], $_POST['tName'])){
            require_once "php/adminCrude.php";
            // echo 'photo updater api';
  
            $p = $_FILES['photo'];
            $pid = $_POST['pid'];
            $tName = $_POST['tName'];
            $upd = photoUpdater($tName, $pid, $p);
            return $upd;
          }
              ?>
  
              <div id="alertVacancy">
  
              </div>
              <?php

 
      include "php/connect.php";
        if(isset($_POST['name'], $_POST['city'], $_POST['wereda'], $_POST['phone1'], $_POST['phone2'], $_POST['what_does_initiate'], $_POST['do_you_have_other_job'], $_POST['broker_before'], $_POST['question'], $_POST['business_license'])){

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
          
          // echo 'innsz';

          
        $commission = implode(',', $commission_type);

          $name =$_POST['name'];
          $city = $_POST['city'];
          $wereda = $_POST['wereda'];
          $phone1 = $_POST['phone1'];
          $phone2 = $_POST['phone2']; 
          $what_does_initiate = $_POST['what_does_initiate']; 
          $do_you_have_other_job = $_POST['do_you_have_other_job']; 
          $broker_before = $_POST['broker_before']; 
          $business_license = $_POST['business_license'];
          $question = $_POST['question'];
          $userId = $_SESSION['userId'];

          $subcity = ' ';
          if(isset($_GET['subCity'])){
            $subcity = $_GET['subCity'];
          }

          // $up = uploadSinglePhoto('mambership', $photoPath1);
          // if($up[4] == 'error'){
          //   echo 'error file';
          //   print_r($up);
          // }else{

            $q = "UPDATE `mambership` SET `city`='$city',`subcity`='$subcity',`wereda`='$wereda',`phone2`='$phone2',`what_does_initiate`='$what_does_initiate',`do_you_have_other_job`='$do_you_have_other_job',`broker_before`='$broker_before',`business_license`='$business_license',`commission_type`='$commission',`question`='$question' WHERE `mambership`.`id` = '$postId' ";


            $mem = $mysql->query($q);
            echo $mysql->error;
            if($mem){
              echo '<span class="text-success">Saved Changed</span>';  
            }else{
              echo 'error';
            }
          // }
          
          
          


        }

      ?>
    </div>
  </div>
  <?php
  
// }

 ?>



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
