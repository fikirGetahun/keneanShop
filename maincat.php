<?php
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";

//// we unset all the sesssions becouse there must be no data when we navigate to other catagory since its all from a single page each time this page reloads, it deletes previious session data
unset($_SESSION['cat'], $_SESSION['status'], $_SESSION['off'], $_SESSION['label'], $_SESSION['type'], $_SESSION['arg']);
//// this all part is for recording the navigation for the adaptive scroll page can scroll new content from this session variables

$_SESSION['userScroll'] = array();

if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'])){
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['status'] = $_GET['status'];
  $_SESSION['off'] = $_GET['off'];
  $_SESSION['label'] = $_GET['label'];
}

////for vacancy
if(isset($_GET['type'])){
  $_SESSION['type'] = $_GET['type'];
}

$userId = $_SESSION['userId'];
echo $userId;

///for house land
if(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
  $_SESSION['type'] = $_GET['type'];
  $_SESSION['userScroll'] = array();
  $_SESSION['arg'] = $_GET['arg'];
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['label'] = $_GET['label'];
}


	?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="assets/jquery.js" ></script>  
<script>
$(document).ready(function(){

  window.scrollTo(0, 0);
  

      $(window).scroll(function(){
    if($(window).scrollTop() >= $('#all').offset().top + $('#all').outerHeight() - window.innerHeight +100 ){
      // alert('scroll')




      // $.ajax({
      //   url:'user/userScrollView.php',
      //   type: 'GET', 
      //   data : 'types=good',
      //   success: function(data){
      //     $('#all').append(data)
      //   }
      // })
    }
  })

})
function fav(pid, id, table){
  $.ajax({
    url: 'user/userApi.php',
    data: 'postId='+pid+'&uid='+'<?php echo $_SESSION['userId'] ?>'+'&table='+table,
    success: function(data){
      $('#fav'+pid).text(data)
    }
  })
}

</script>



</head>
<body>

<div id="all" class="container-fluid">
<div class="row">

  <!-- <div class=".d-sm-none .d-md-block"> -->
      

<div id="sideNav" class="col-2">
<ul class="nav flex-column">
<?php 
  if(isset($_GET['cat'])){
    // this category lister exclude the hometutor and zebegna because thy dont have the type colomen
    if($_GET['cat'] != 'jobhometutor' && $_GET['cat'] != 'zebegna' && $_GET['cat'] != 'charity' && $_GET['cat'] != 'hotelhouse'){
      ?>
      <h4>Categories</h4>
      <?php
      $tab = $_GET['cat'];
      
      $category = $get->categorySelecter($tab, 'type');
      while($rowc = $category->fetch_assoc()){

      
      ?>
      
      <?php
          if(isset($_GET['status'], $_GET['off'], $_GET['label'])){
            ?>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&status=<?php echo $_GET['status'] ?>&off=<?php echo $_GET['off'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>"><?php echo $rowc['type'] ?></a>
              </li> 
            <?php
          }elseif(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
            ?>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>"><?php echo $rowc['type'] ?></a>
              </li> 
            <?php
          }elseif(isset($_GET['type'])){
            ?>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>">"><?php echo $rowc['type'] ?></a>
              </li>             
            <?php
          }else{
            ?>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&dbType=<?php echo $rowc['type'] ?>">"><?php echo $rowc['type'] ?></a>
              </li>               
            <?php
          }
      ?>




      <?php
    }

    }else{

      ?>
      <h4>Cv Work Seekers</h4>
      <li><a class="dropdown-item"  href="./maincat.php?cat=jobhometutor&type=homeTutor&label=Home Tutor"  >Home Tutor Job Applicaion</a></li>
            <li><a class="nav-link" aria-current="page"  href="./maincat.php?cat=hotelhouse&type=hotelWorker&label=Hotel Job Seeker"   >Hotel Worker Job Application</a></li>
            <li><a class="nav-link" aria-current="page"  href="./maincat.php?cat=hotelhouse&type=houseWorker&label=Home Keeper Seeker"   >Home Keeper Job Application</a></li>
            <li><a class="nav-link" aria-current="page"  href="./maincat.php?cat=zebegna&type=zebegna&label=Security Gaurd Job Seeker"  >Security Gaurd Job Application</a></li>
      <?php


    }
  }

?>

</ul>
<!-- </div> -->
  </div>
  <div id="loop" class="col-md-8">
    <?Php

      if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'],$_GET['type'])){
          $cat = $_GET['cat'];
          $status = $_GET['status'];
          $off = $_GET['off'];
          $label = $_GET['label'];
          if($status == ' '){
            // echo 'elc';
            $fetchPost = $get->allPostListerOnTable($cat);
          }elseif($status != ' '){
            // echo 'sdf--- '.$off;
            $fetchPost = $get->allPostListerOnColumen($cat, $status, $off);
          }elseif($status == ' ' && isset($_GET['dbType'])){
            $dbType = $_GET['dbType'];
            $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
          }elseif($status != ' ' && isset($_GET['dbType'])){
            $dbType = $_GET['dbType'];
            $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off, 'type', $dbType);
          }
          
?>
<br>
 
  <div  class="container row">
      <h5><?php echo $label ?></h5> <h6><?php if(isset($_GET['dbType'])){ echo $_GET['dbType']; } ?></h6>
  </div>
    
    <br>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
          while($row = $fetchPost->fetch_assoc()){

            if(!in_array($row['id'], $_SESSION['userScroll'])){
              $pid = $row['id'];
            ?>
            

      
            <div  class="col-md-4">
          <div class="card mb-4 box-shadow">
          
          <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $_GET['type'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">

              <h5 class="card-title">  <?php echo $row['title'] ?></h5>
              <?php 
              if($cat != 'charity'){
?>
              <h6 class="card-text"><span class="text-danger small"><?php echo $row['price'] ?> Birr</span> </h6>

<?php
              }
              $date = $get->time_elapsed_string($row['postedDate']);
              
              ?>
              <h6 class="card-text">Location: <?php echo $row['address'] ?></h6>
              <div class="d-flex justify-content-between align-items-center">
                  
              <span class="text-danger small"><?php echo $date ?></span>
              <small class="text-muted"><?php echo $row['view'] ?> views</small>
              </div>
              
            </div>
          </div>
          <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>
        </div>
     
    
  

            <?php
            array_push($_SESSION['userScroll'], $row['id']);
            }
          }
          ?>
          </div>
          
          
          <?php



      }



      

      elseif(isset($_GET['cat'])){
        if($_GET['cat'] == 'vacancy'){
          $cat = $_GET['cat'];
          if(isset($_GET['dbType'])){
            $dbType = $_GET['dbType'];
            $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
          }else{
            $fetchPost = $get->allPostListerOnTable($cat);
          }

          while($row = $fetchPost->fetch_assoc()){
            if(!in_array($row['id'], $_SESSION['userScroll'])){
          ?>
       			<div class="card">
                <div class="card-header">
                  <?php echo $row['type'] ?>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title"><?php echo $row['companyName'] ?></h5>
                  </div>
                  <?php 
                    $date = $get->time_elapsed_string($row['postedDate']);
                    $dt = new DateTime($row['postedDate']);

                    $now = new DateTime();
                    $future_date = new DateTime($row['postedDate']);

                    $interval = $future_date->diff($now);

                    ;
                  ?>
                    <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                  </div>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
                  <p><small class="text-muted">Location: <?php echo $row['address'] ?></small></p>
                  <p><small class="text-muted">Phone:</small></p>
                  <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a href="./Description.php?cat=vacancy&label=Vacancy Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">View</a>
                                <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>
                              </div>
                              <small class="text-muted">Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></small>
                            </div>
                </div>
              </div>
          <?php
                      array_push($_SESSION['userScroll'], $row['id']);
                    }
          }
        }
      

      ////tender
        if($_GET['cat'] == 'tender'){
          $cat = $_GET['cat'];
          if(isset($_GET['dbType'])){
            $dbType = $_GET['dbType'];
            $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
          }else{
            $fetchPost = $get->allPostListerOnTable($cat);
          }

          while($row = $fetchPost->fetch_assoc()){
            if(!in_array($row['id'], $_SESSION['userScroll'])){
          ?>
       			<div class="card">
                <div class="card-header">
                  <?php echo $row['title'] ?>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title"><?php echo $row['type'] ?></h5>
                  </div>
                  <?php 
                    $date = $get->time_elapsed_string($row['postedDate']);
                    $sdate = $get->time_elapsed_string($row['startingDate']);
                    $dt = new DateTime($row['postedDate']);

                    $now = new DateTime();
                    $future_date = new DateTime($row['postedDate']);
                    $future_date2 = new DateTime($row['startingDate']);
                    $sinterval = $future_date2->diff($now);
                    $snow = new DateTime();

                    $interval = $future_date->diff($now);


                    ;
                  ?>
                    <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                  </div>
                  <label>Starting Date : <?php echo $sdate; ?> or <?php echo $sinterval->format("%a days, %h hours")  ?></label>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
                  <p><small class="text-muted">Location: <?php echo $row['address'] ?></small></p>
                  <p><small class="text-muted">Phone:</small></p>
                  <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a href="./Description.php?cat=tender&label=Tender Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">View</a>
                                <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>                              </div>
                              <small class="text-muted">Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></small>
                            </div>
                </div>
              </div>
          <?php
                      array_push($_SESSION['userScroll'], $row['id']);
                    }
          }
        }
      }

      /////////// house post view
      if(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
        if($_GET['type'] == 'house'){


          $cat = $_GET['cat'];
          $cat = $_GET['cat'];
          // $status = $_GET['status'];
          $arg = $_GET['arg'];
          $label = $_GET['label'];

         
          if(isset($_GET['dbType'])){
          $dbType = $_GET['dbType'];
          $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType); 
          }else{
          $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg);
          }
          
          
?>
<br>
  <div  class="container">
      <h5><?php echo $label ?></h5>
  </div>
    
    <br>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
          while($row = $fetchPost->fetch_assoc()){

            if(!in_array($row['id'], $_SESSION['userScroll'])){
            ?>
            

      
                  <div  class="col-md-3">
              <div class="card mb-4 box-shadow">
          
          <a class="img-thumbnail stretched-link" href="./Description.php?cat=housesell&type=house&postId=<?php echo $row['id'] ?>&label=House Posts" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title">  <?php echo $row['title'] ?></h5>
              <?php 
              if($cat != 'charity'){
?>
              <h6 class="card-text"><span class="text-danger small"><?php echo $row['cost'] ?></span> </h6>

<?php
              }
              $date = $get->time_elapsed_string($row['postedDate']);
              ?>
               <h6 class="card-text"> Location:  <?php echo $row['city'] ?></h6>
              <div class="d-flex justify-content-between align-items-center">
              <span class="text-danger small"><?php echo $date ?></span>
                  <small class="text-muted"><?php echo $row['view'] ?> views</small>

              </div>
              
            </div>
          </div>
          <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>
        </div>
     
    
  

            <?php
                      array_push($_SESSION['userScroll'], $row['id']);
                    }

          }
        
?> </div> <?php

        }
      


      ///// land post view
        if($_GET['type'] == 'land'){


          $cat = $_GET['cat'];
          // $status = $_GET['status']; 
          $arg = $_GET['arg'];
          $label = $_GET['label'];

          if(isset($_GET['dbType'])){
            $dbType = $_GET['dbType'];
            $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType); 
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg);
          }
          
?>
<br>
  <div  class="container">
      <h5><?php echo $label ?></h5>
  
    </div>
    <br>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
          while($row = $fetchPost->fetch_assoc()){
            if(!in_array($row['id'], $_SESSION['userScroll'])){

            ?>
            

      
                  <div  class="col-md-3">
              <div class="card mb-4 box-shadow">
          
          <a class="img-thumbnail stretched-link" href="./Description.php?cat=housesell&type=land&postId=<?php echo $row['id'] ?>&label=Land Posts" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title">  <?php echo $row['title'] ?></h5>
              <?php 
              if($cat != 'charity'){
?>
              <h6 class="card-text"><span class="text-danger small"><?php echo $row['cost'] ?></span> </h6>

<?php
              }
              $date = $get->time_elapsed_string($row['postedDate']);
              ?>
              
              <h6 class="card-text"> Location:  <?php echo $row['city'] ?></h6>
              <div class="d-flex justify-content-between align-items-center">
              <span class="text-danger small"><?php echo $date ?></span>
                  <small class="text-muted"><?php echo $row['view'] ?> views</small>

              </div>
            </div>
          </div>
          <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>
        </div>
     
    
  

            <?php
                      array_push($_SESSION['userScroll'], $row['id']);
                    }


          }
        
?> </div> <?php

        }
      }

      
      ///////////////cv seekers
      elseif(isset($_GET['cat'], $_GET['type'], $_GET['label'])){
        $cat = $_GET['cat'];
        $type = $_GET['type'];
        $label = $_GET['label'];

        if($type == "homeTutor" || $type == 'zebegna'){
          $fetchPost = $get->allPostListerOnTable($cat);
        }elseif($type == "houseWorker"){
          $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOUSE');
        }elseif($type == "hotelWorker"){
          $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOTEL');
        }

        
        ?>
        <br>
        <div  class="container">
            <h5><?php echo $label ?></h5>
        </div>
          
          <br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
        <?php
        
 

       

        while($row = $fetchPost->fetch_assoc()){
          

          if(!in_array($row['id'], $_SESSION['userScroll'])){
            $pid = $row['id'];
          ?>
          

    
                <div  class="col-md-3">
              <div class="card mb-4 box-shadow">
        
        <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $type ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

          <div class="card-body">

            <p class="card-text">Name:  <?php echo $row['name'] ?></p>
            <p> Sex: <?php $row['sex'] ?></p>
            <?php 
              if($type == 'hometTutor'){
                ?>
                <h5> <h5><?php echo $row['Price'] ?></h5>  <?php $row['paymentStatus'] ?></h5>
                <?php
              }
              if($type == 'houseKeeper'){
                ?> <h3>Religion: <?php echo $row['religion'] ?></h3> <?php
              }
            ?>
            <?php 

            $date = $get->time_elapsed_string($row['postedDate']);
            
            ?>
             <h6 class="card-text">Location: <?php echo $row['address'] ?></h6>
            <div class="d-flex justify-content-between align-items-center">
            <span class="text-danger small"><?php echo $date ?></span>
            <span class="text-muted"><?php echo $row['view'] ?> views</span>         

            </div>

          </div>
        </div>
        <?php
          $faz = $get->favouritesSelector($cat, $userId, $row['id'] );
          // $row = $faz->fetch_assoc();
          // echo $row['fav'];
            if($faz->num_rows > 0){
              ?>
              <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>             
              <?php
            }else{
              ?>
             <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Fav</a>
              <?php
            }
          
          ?>
      </div>
   
  


          <?php
          array_push($_SESSION['userScroll'], $row['id']);
          }
        }
        
        

      }
    
    ?>
   </div>

</div>
<div style="clear:both;"></div>

</div>
<div style="clear:both;"></div>
      <?php
      
  ?>
</body>
<?php

include 'includes/footer.php';
?>