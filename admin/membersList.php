<?php
  include "../includes/header.php";
  include "../includes/adminSide.php";
  require_once '../php/fetchApi.php';
  include "../includes/lang.php";
?>
<?php
include "../includes/header.php";
  require_once "../php/adminCrude.php";

  $url = $_SERVER['REQUEST_URI'];
ob_start();
if(!isset($_SESSION)){
    session_start();
}
  $uid = $_SESSION['idz'];

?> 

<body>
<div >
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
    <?php

$_SESSION['mbScroll'] = 1;
if(isset($_GET['forward'], $_GET['tb'], $_GET['post'], $_GET['client'])){
  $tbb = $_GET['tb'];
  $pos = $_GET['post'];
  $client = $_GET['client'];
  $forward = $_GET['forward'];
}else{
  $tbb = false;
  $pos =false;
  $client = false;
  $forward = false;
}
?>




<div class="input-group mb-3 col-3">
<?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;

              ?> 
<div class="input-group-prepend">
  <span class="input-group-text" id="basic-addon1"><?php echo $lang['location'] ?></span>
</div>
<select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01"  onchange="location=this.value;" >
  <option selected >  <?php echo $_SESSION['location'] ?></option>
  <!-- <option value="All"> All </option> -->
  <?php
    foreach($city as $loc){
      $urlll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
      $urlll = parse_str($urlll['query'], $params); // to make an assoc array of all the parameter key with the value
      //to unset the subcity and kebele get params. this helps us to eleminate when user changes city the subcity of the pervious city will not query to the database
      if($params['dyCol'] && $params['dyArg']  ){
        unset($params['dyCol']);
        unset($params['dyArg']);
      }
      if($params['dyCol2'] && $params['dyArg2']){ 
        unset($params['dyCol2']);
        unset($params['dyArg2']);
      }
      // TO UNSET THE LOCATION GET REQUST IF ALRADY EXIST IN THE URL
      if($params['loc']){
        unset($params['loc']);
      }

      $string = http_build_query($params); // to build the corrected requst to normal get query format
      ?>
      
      <!-- <label onclick="reload('<?php echo $loc;  ?>')" ><?php echo $loc ?><option value="<?php echo  $_SERVER['REQUEST_URI']?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option></label> -->
    
      <option value="<?php echo $urlll['path'].'?'.$string?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option>
      <!-- <option value="<?php echo $loc ?>" > <?php echo $loc ?></option> -->

      <?php

      $i++;
    }
  ?>
</select>
</div>


<div id="subHx"   class="input-group mb-3" >
        <?php
      require_once '../php/fetchApi.php';
  $locc= $get->allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', $_SESSION['location']);
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
}else{
  ?>
  <option>No Sub City here!</option>
  <?php
}
  ?>
  </select>
      </div>
 <?php

    if(isset($_GET['list'])){

        if(isset($_GET['loc'])){
          $member = $get->allPostListerOnColumenD('mambership', 'city', $_SESSION['location'] , 1 , 2);
        }
        $member = $get->allPostListerOnTableD('mambership', 1 , 2);

        ?>
                <script>
          function scr(){
            $.ajax({
              url: 'editHandler.php',
              type: 'GET',
              data : {cSession : 's'},
              success: function(dt){
                $.ajax({
              url: 'memberScroll.php',
              type: 'get',
              data : {
                forward : '<?php  echo $forward ?>',
                tb: '<?php echo $tbb ?>',
                post : '<?php echo $pos ?>',
                client : '<?php echo $client ?>'
              },  
              success: function(dtc){
                $('#mb').append(dtc)
              }
            })
                
              }
            })
          }
        </script>
        <div id="mb" class="row">

        <?php
        while( $row = $member[0]->fetch_assoc()){

            ?>
            <div id="adVieww" class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">      
              <div class="card-body">
                <p class="card-text"><?php echo $row['name'] ?></p>
                <!-- <p class="card-text"><?php echo $row['price'] ?> Birr</p> -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">

                    <?php
                      if(isset($_GET['forward'], $_GET['tb'], $_GET['post'], $_GET['client'])){
                        $tbb = $_GET['tb'];
                        $pos = $_GET['post'];
                        $client = $_GET['client'];
                        ?>
                        <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>&tb=<?php echo $tbb ?>&post=<?php echo $pos ?>&forward=true&client=<?php echo $client ?>"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                        
                        <a href="../Account.php?message=true&inner=true&tb=<?php echo $tbb ?>&reciver=<?php echo $row['userId'] ?>&post=<?php echo $pos ?>&forwarded=true&client=<?php echo $client ?>" > Send Link</a> 
                        <?php
                      }else{
                        ?>
                        <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                        <?php
                      }
                    ?>
                  </div>
                  <!-- <small class="text-muted">9 mins</small> -->
                </div>
              </div>
            </div>
          </div>

              <?php
         
          }
          ?>
         
          </div>
          <button onclick="scr()">View More</button>
          <?php
        }

/// this block is to view the members info
        if(isset($_GET['view'], $_GET['mid'])){
          $mid = $_GET['mid'];
          $member = $get->allPostListerOnColumen('mambership', 'id', $mid);
          $row = $member->fetch_assoc();
          ?>
          <div class="container">
          <div class="card w-25 float-left ">
        <?php
        if($row['photoPath1'] != ' '){
          ?>
          <img class="img-thumbnail" src="assets/img/zumra.png)" class="card-img-top" alt="...">
          <?php
                      if(isset($_GET['forward'], $_GET['tb'], $_GET['post'], $_GET['client'])){
                        $tbb = $_GET['tb'];
                        $pos = $_GET['post'];
                        $client = $_GET['client'];
                        ?>
                        <a href="../Account.php?message=true&inner=true&tb=<?php echo $tbb ?>&reciver=<?php echo $row['userId'] ?>&post=<?php echo $pos ?>&forwarded=true&client=<?php echo $client ?>" > Send Link</a> 
                        <?php
                      }
                    ?>
          <?php
        }else{
          ?>
                <img class="img-thumbnail" src="<?php echo '../'.$row['photoPath1']?>" class="card-img-top" alt="...">
                <?php
                      if(isset($_GET['forward'], $_GET['tb'], $_GET['post'], $_GET['client'])){
                        $tbb = $_GET['tb'];
                        $pos = $_GET['post'];
                        $client = $_GET['client'];
                        ?>
                        <a href="../Account.php?message=true&inner=true&tb=<?php echo $tbb ?>&reciver=<?php echo $row['userId'] ?>&post=<?php echo $pos ?>&forwarded=true&client=<?php echo $client ?>" > Send Link</a> 
                        <?php
                      }
                    ?>

          <?php
        }
        ?>
    
      </div>

      <h5 >Name : <?php echo $row['name']?></h5><br>
    <h5> Location <?php echo $row['city'] ?>  </h5><br>
    <h5> Wereda: <?php echo $row['wereda'] ?> </h5><br>
    <h5> Phone 1: <?php echo $row['phone1'] ?> </h5><br>
    <h5> Phone 2: <?php echo $row['phone2'] ?> </h5><br>
    <h5> what does initiate: <?php echo $row['what_does_initiate'] ?> </h5><br>
    <h5> do you have other job: <?php echo $row['do_you_have_other_job'] ?> </h5><br>
    <h5> Have You done Broker Before : <?php echo $row['broker_before'] ?> </h5><br>
    <h5> Do You have business License : <?php echo $row['business_license'] ?> </h5><br>
    <h5> Commission Type: <?php echo $row['commission_type'] ?> </h5><br>
    <h5> question: <?php echo $row['question'] ?> </h5><br>

          </div>
          
          <?php
        }
    
    ?>
</div>
      </div>
</main>
      </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

