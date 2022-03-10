<?php
  include "../includes/header.php";
  include "../includes/adminSide.php";
  require_once '../php/fetchApi.php';
  include "../includes/lang.php";

  
  
  

?>
<?php
include "../includes/header.php";
  require_once "../php/adminCrude.php";

  $_SESSION['mbScroll'] = 0; // this automaticaly sets the page session to 0 so that when the page is loaded again, it doesnt resume previous page number

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

<?php

if(isset($_GET['list']) || isset($_GET['pending'])){
?>

<div class="row" >

<div class="col-3">
<?php 
              require_once '../php/fetchApi.php';
                $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;

              ?> 
 
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
    
      <option value="<?php echo '?'.$string?>&loc=<?php echo $loc?>" > <?php echo $loc ?></option>
      <!-- <option value="<?php echo $loc ?>" > <?php echo $loc ?></option> -->

      <?php

      $i++;
    }
  ?>
</select>
</div>


<div id="subHx"   class="col-3"  >
        <?php
      require_once '../php/fetchApi.php';
      $suburl = parse_url($_SERVER['REQUEST_URI']);
      $setSub = parse_str($suburl['query'], $sub);

      unset($sub['sub']); // to unset the existing subcity get request in the url. so that when another subcity is selected the old one will be removed

      $subC = http_build_query($sub);

  $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', $_SESSION['location']);
  $city = array();
  if($locc->num_rows != 0){
    ?>
              <select  class="form-select" aria-label="Default select example" onchange="location=this.value;"  name="subcity" >
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
       <option value="<?php echo '?'.$subC ?>&sub=<?php echo $loc ?>" ><?php echo $loc ?></option>
      <?php
    }
    ?>
    
  
    
    <?php
    $i++;
  }
  ?> </select>
    </div><?php
}else{
  ?>
  <span class="text-warning" >No Sub City here!</span>
  
</div>
  <?php
}
  ?>
 
          <!-- kebele list -->
          <div class="form-group col-3">
            <?php
            $weredaurl = parse_url($_SERVER['REQUEST_URI']);
            $WU = parse_str($weredaurl['query'], $wer);

            unset($wer['wereda']);
            $wer = http_build_query($wer);
            ?>
        <select class="form-select" aria-label="Default select example" name="wereda" onchange="location=this.value;"  id="inputGroupSelect01">
          <option ><?php echo $lang['Wereda'] ?></option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                 ?>
                 <option value="<?php echo '?'.$wer  ?>&wereda=<?php echo $y ?>"><?php echo '0'.$y ?></option>
                 <?php
               }else{
                ?>
                <option value="<?php echo '?'.$wer  ?>&wereda=<?php echo $y ?>"><?php echo $y ?></option>
                <?php
               }

            }
          ?>
          

        </select>
        </div>

        <!-- lavel filter  -->
        <div class="form-group col-3">
            <?php
            $weredaurl = parse_url($_SERVER['REQUEST_URI']);
            $WU = parse_str($weredaurl['query'], $wer);

            if(isset($wer['label'])){
              unset($wer['label']);
            }
           
            $wer = http_build_query($wer);
            ?>
        <select class="form-select" aria-label="Default select example" name="wereda" onchange="location=this.value;"  id="inputGroupSelect01">
          <option value="<?php echo '?'.$wer  ?>&label=4" >Level 4</option>
          <option value="<?php echo '?'.$wer  ?>&label=3" >Level 3</option>
          <option value="<?php echo '?'.$wer  ?>&label=2" >Level 2</option>
          <option value="<?php echo '?'.$wer  ?>&label=1" >Level 1</option>
        </select>
        </div>


</div>
 <?php
}
    if(isset($_GET['list'])){

      $filterArr = array(); // this array holds the location, subcity, and wereda in a single arry when they are set. so that we implode it to string and pass it to the scroll view so that it loads the appropretelly filtered data

      // echo $_SESSION['location'];
        if(isset($_GET['loc']) || isset($_SESSION['location']) || isset($_GET['label']) || !isset($_GET['label'])){


          // echo $filterArr[3];
         
          $_GET['loc'] = $_SESSION['location'];
          $filterArr[0] = $_GET['loc'];
          $filterArr[1] = 1;
          $filterArr[2] = 2;
          if(isset($_GET['label'])){
            $leee = $_GET['label'];
            $filterArr[3] = $leee;
          }else{
            $leee = 4;
            $filterArr[3] = $leee;
          }



          if(isset($_GET['sub'], $_GET['wereda'])){
            $filterArr[1] = $_GET['sub'];
            $filterArr[2] = $_GET['wereda'];
            $we = $_GET['wereda'];
            $su = $_GET['sub'];
            $member = allPostListerOn5ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'wereda', $we, 'subCity', $su, 'label', $leee ,0 , 2);
          }elseif(isset($_GET['sub'])){
            $filterArr[1] = $_GET['sub'];
            $subReq = $_GET['sub'];
            $member = allPostListerOn4ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'subCity', $subReq , 'label', $leee ,0 , 2);
          }elseif(isset($_GET['wereda'])){
            $filterArr[2] = $_GET['wereda'];
            $we = $_GET['wereda'];
            $member = allPostListerOn4ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'wereda', $we , 'label', $leee ,0 , 2);
          }elseif($_GET['loc'] == 'All'){ // IF THE location is seted to 'ALL'
            $filterArr[0] = 'All';
            $member = allPostListerOn2ColumenD('mambership', 'approved', 'YES', 'label', $leee , 1, 2);
          }
          else{
            // $filterArr[0] = 'All';
            $member = allPostListerOn3ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES' , 'label', $leee ,0 , 2);
          }
        }else{
          $filterArr[0] = 'All';
          $member = allPostListerOn2ColumenD('mambership', 'approved', 'YES', 'label', $leee , 1, 2);
        }
        $filter = implode(',',$filterArr); // implode the arry values to string so that we pass it through a single parameter in the ajax script bellow
        // $member = allPostListerOnTableD('mambership', 1 , 2);
        print_r($filterArr);

        ?>
                <script>
          function scr(){
            // alert('<?php echo $filter ?>')
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
                client : '<?php echo $client ?>',
                filter:  '<?php echo $filter ?>'
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
        if($member[0]->num_rows != 0){
        while( $row = $member[0]->fetch_assoc()){

            ?>
            <div id="adVieww" class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">      
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
                        <span class="btn btn-sm btn-outline-secondary text-success" >Level <?php echo $row['label'] ?></span>
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
        }else{
          echo 'No Result Found!';
        }
        }

/// this block is to view the members info
        if(isset($_GET['view'], $_GET['mid'])){
          $mid = $_GET['mid'];


          /// to update level
          if(isset($_POST['level'])){
            $ps = $_POST['level'];
            $cl = updateOnColomen('mambership', 'label', $ps, $mid);
            if($cl){
              echo '<span class="text-warning"> Level Changed!</span>';
            }else{
              echo '<span class="text-danger"> error</span>';
            }
          }
        
        

          $member = allPostListerOnColumen('mambership', 'id', $mid);
          $row = $member->fetch_assoc();
          ?>
          <div class="container">
          <div class="card w-25  ">
        <?php
        if($row['photoPath1'] == null){
          ?>
          <img class="img-thumbnail" src="assets/img/zumra.png" class="card-img-top" >
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

    <!-- // a script tag to handle the accept and decline of members -->
    <script>
      function accDecl(choice){
        if(choice == 'del'){
          if(confirm('Are you sure you want to delete this user?') == true){
            $.ajax({
          url: 'editHandler.php',
          type: 'get',
          data: {
            accOrdec : choice,
            pid : '<?php echo $row['id'] ?>'
          },
          success: function(){
            location = 'http://localhost/shop2/admin/membersList.php?pending=true'
          }
        })
          }
        }else{
          $.ajax({
          url: 'editHandler.php',
          type: 'get',
          data: {
            accOrdec : choice,
            pid : '<?php echo $row['id'] ?>'
          },
          success: function(x){
            location = 'http://localhost/shop2/admin/membersList.php?pending=true'
          }
        })
        }

      }
    </script>


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

                      /// to accept or decline a member button when the 'pendingx' parameter is set that means the view page is requested from the pending page
                      if(isset($_GET['pendingx'])){
                        ?>
                        <button class="btn btn-success" onclick="accDecl('accept')" > Accept</button>
                        <button class="btn btn-danger"  onclick="accDecl('del')" > Decline </button>
                        <?php
                      }

                    ?>

          <?php
        }
        ?>
    
      </div> <br>

   
    <form action="./membersList.php?view=true&mid=<?php echo $mid ?>" method="POST" >
<div class="input-group mb-3 col-5">
<select class="form-select" aria-label="Default select example" name="level" id="inputGroupSelect01">
  <option selected> Change Level </option>
  <option value="4" >Level 4</option>
  <option value="2" >Level 2</option>
  <option value="1" >Level 1</option>
  <option value="3" >Level 3</option>
</select>
</div>
<input type="submit" value="Change">
      </form>

<h4 class="text-success" > LEVEL <?php echo ' '.$row['label']?> </h4>
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

  ////////////////////////////////////--------------------------------////////////////////

        /// pending membership list
        if(isset($_GET['pending'])){
          $filterArr = array(); // this array holds the location, subcity, and wereda in a single arry when they are set. so that we implode it to string and pass it to the scroll view so that it loads the appropretelly filtered data

          // echo $_SESSION['location'];
            if(isset($_GET['loc'])){
              $filterArr[0] = $_GET['loc'];
              if(isset($_GET['sub'], $_GET['wereda'])){
                $filterArr[1] = $_GET['sub'];
                $filterArr[2] = $_GET['wereda'];
                $we = $_GET['wereda'];
                $su = $_GET['sub'];
                $member = allPostListerOn4ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', null, 'wereda', $we, 'subCity', $su ,0 , 2);
              }elseif(isset($_GET['sub'])){
                $filterArr[1] = $_GET['sub'];
                $subReq = $_GET['sub'];
                $member = allPostListerOn3ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'subCity', $subReq ,1 , 2);
              }elseif($_GET['loc'] == 'All'){ // IF THE location is seted to 'ALL'
                $filterArr[0] = 'All';
                $member = allPostListerOnColumenD('mambership', 'approved', null, 1, 2);
              }
              else{
                // $filterArr[0] = 'All';
                $member = allPostListerOn2ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', null ,0 , 2);
              }
            }else{
              $filterArr[0] = 'All';
              $member = allPostListerOnColumenD('mambership', 'approved', null, 1, 2);
            }
            $filter = implode($filterArr); // implode the arry values to string so that we pass it through a single parameter in the ajax script bellow
            // $member = allPostListerOnTableD('mambership', 1 , 2);
    
            ?>
                    <script>
              function scrx(){
                // alert('<?php echo $filter ?>')
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
                    client : '<?php echo $client ?>',
                    filter:  '<?php echo $filter ?>',
                    // this is a flag to show the page is in a pending membership page
                    pending : 'true'  

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
            if($member[0]->num_rows != 0){
            while( $row = $member[0]->fetch_assoc()){
    
                ?>
                <div id="adVieww" class="col-md-4">
                <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">      
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
                            <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>&pendingx=true"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
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
              <button onclick="scrx()">View More Pending</button>
              <?php
            }else{
              echo 'No Result Found!';
            }
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

