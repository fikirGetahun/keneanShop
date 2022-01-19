<?php
ob_start();
session_start();
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";

if(isset($_SESSION['userId'])){
  $userId = $_SESSION['userId'];
}
unset($_SESSION['cat'], $_SESSION['status'], $_SESSION['off'], $_SESSION['label'], $_SESSION['type'], $_SESSION['arg'], $_SESSION['dyCol'], $_SESSION['dyArg']);

//// we unset all the sesssions becouse there must be no data when we navigate to other catagory since its all from a single page each time this page reloads, it deletes previious session data
//// this all part is for recording the navigation for the adaptive scroll page can scroll new content from this session variables
$_SESSION['userScroll'] = array();

if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'], $_GET['type'])){
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['status'] = $_GET['status'];
  $_SESSION['off'] = $_GET['off'];
  $_SESSION['label'] = $_GET['label'];
  $_SESSION['type'] = $_GET['type'];
}

////for vacancy
if(isset($_GET['type'])){
  $_SESSION['type'] = $_GET['type'];
}

if(isset($_GET['dbType'])){
  $_SESSION['dbType'] = $_GET['dbType'];
}


// echo $userId;
if(isset($_GET['dyCol'], $_GET['dyArg'])){
  $_SESSION['dyCol'] = $_GET['dyCol'];
  $_SESSION['dyArg'] = $_GET['dyArg'];
}

///for house land
if(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
  $_SESSION['type'] = $_GET['type'];
  $_SESSION['userScroll'] = array();
  $_SESSION['arg'] = $_GET['arg'];
  $_SESSION['cat'] = $_GET['cat'];
  $_SESSION['label'] = $_GET['label'];
}

if(isset($_GET['label'])){
  $allLabel = $_GET['label'];
}

	?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script>
  
$(document).ready(function(){

  window.scrollTo(0, 0);
  

  $(window).scroll(function(){
    if($(window).scrollTop() >= $('#loop').offset().top + $('#loop').outerHeight() - window.innerHeight  ){
      // alert('scroll')

      // $.ajax({
      //   url:'user/userScrollView.php',
      //   type: 'GET', 
      //   success: function(htmlz){
      //     $('#vc').append(htmlz)
          
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
      
<div id="accordion" class="col-2">
  <div class="">

<!-- <div id="sideNav" class="col-2"> -->
<?php 
  if(isset($_GET['cat'])){
    // this category lister exclude the hometutor and zebegna because thy dont have the type colomen
    if($_GET['cat'] != 'jobhometutor' && $_GET['cat'] != 'zebegna' && $_GET['cat'] != 'charity' && $_GET['cat'] != 'hotelhouse' && $_GET['cat'] != 'blog'){
      ?>
  <div class="card-title" id="headingOne">
      <h5 class="mb-0">
        <label class="nav-link" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne">
        Categories        </label>
      </h5>
    </div>
    <div id="collapseOne1" class="collapse show border-0" aria-labelledby="headingOne" aria-expanded="false" data-parent="#accordion">
      <div class="card-body">
      <div class="list-group border-0" id="list-tab" role="tablist">
      <div class="row ">

      <?php
      $tab = $_GET['cat'];
      
      $category = $get->categorySelecter($tab, 'type');
      while($rowc = $category->fetch_assoc()){

      
      ?>
      
      <?php
          if(isset($_GET['status'], $_GET['off'], $_GET['label'], $_GET['type'])){
            ?>
              <a class="list-group-item list-group-item-action" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&status=<?php echo $_GET['status'] ?>&off=<?php echo $_GET['off'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>&type=<?php echo $_GET['type'] ?>" ><?php echo $rowc['type'] ?></a>
            <?php
          }elseif(isset($_GET['type'], $_GET['arg'], $_GET['label'], $_GET['cat'])){
            ?>
              <a class="list-group-item list-group-item-action" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>"><?php echo $rowc['type'] ?></a>
            <?php
          }elseif(isset($_GET['type'])){
            ?>
              <a class="list-group-item list-group-item-action" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&type=<?php echo $_GET['type'] ?>&dbType=<?php echo $rowc['type'] ?>&label=<?php echo $_GET['label'] ?>"><?php echo $rowc['type'] ?></a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" aria-current="page" 
              href="./maincat.php?cat=<?php echo $tab ?>&dbType=<?php echo $rowc['type'] ?>"><?php echo $rowc['type'] ?></a>
            <?php
          }


      ?>




      <?php
    }

    }    elseif($_GET['cat'] == 'blog'){
      echo 'not yet';
    }

//if car
if($_GET['cat'] == 'car' && $_GET['off'] == 'For Rent' ){
  ?>
<div class="card-title" id="headingOne">
  <h5 class="mb-0">
    <label class="nav-link" data-toggle="collapse" data-target="#collapseOnezp" aria-expanded="false" aria-controls="collapseOne">
      Purpose
</label>
  </h5>
</div>

<div id="collapseOnezp" class="collapse show" aria-labelledby="headingOne" aria-expanded="false" data-parent="#accordion">
  <div class="card-body">
  <div class="row">
<div class="list-group" id="list-tab" role="tablist">

          <?php

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'All'){//active class
            ?>
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All</a>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Private'){//active class
            ?> 
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private" role="tab" aria-controls="home">Private</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private" role="tab" aria-controls="home">Private</a>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Govormental Offices'){//active class
            ?> 
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Govormental Offices" role="tab" aria-controls="home">Govormental Offices</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Govormental Offices" role="tab" aria-controls="home">Govormental Offices</a>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'NGO'){//active class
            ?> 
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=NGO" role="tab" aria-controls="home">NGO</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=NGO" role="tab" aria-controls="home">NGO</a>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'Private Company'){//active class
            ?> 
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private Company" role="tab" aria-controls="home">Private Company</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=Private Company" role="tab" aria-controls="home">Private Company</a>        
            <?php
          }

          if(isset($_GET['dyArg']) && $_GET['dyArg'] == 'All'){//active class
            ?> 
      <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All</a>
            <?php
          }else{
            ?>
              <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=car&type=<?php echo $_GET['type'] ?>&status=<?php echo $_GET['status'] ?>&label=<?php echo $allLabel  ?>&off=<?php echo $_GET['off'] ?>&dyCol=forWho&dyArg=All" role="tab" aria-controls="home">All</a>        
            <?php
          }

?>


</div>
  </div>

</div>      </div>

  <?php
}

    if($_GET['cat'] == 'housesell' ){
      ?>
    <div class="card-title" id="headingOne">
      <h5 class="mb-0">
        <label class="nav-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Sub City
    </label>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" aria-expanded="false" data-parent="#accordion">
      <div class="card-body">
      <div class="row">
    <div class="list-group" id="list-tab" role="tablist">
    <?php
        $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'SUBCITY');
        $city = array();
        while($rowLoc = $locc->fetch_assoc()){
            $city[]= $rowLoc['category'];
        }
        sort($city);
        $i = 0;
        foreach($city as $loc){
          ?>
          <?php
          if(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' && $_GET['arg'] == 'For Sell' ){
            if(isset($_GET['dyArg']) && $_GET['dyArg'] == $loc ){ // to make active class
              ?>
            <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>
              <?php
            }else{// to make unactive class
              ?>
            <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>   
              <?php
            }
          }elseif(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'land' && $_GET['arg'] == 'For Sell' ){
            if(isset($_GET['dyArg']) && $_GET['dyArg'] == $loc ){ // to make active class
              ?>
            <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>
              <?php
            }else{// to make unactive class
              ?>
            <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>   
              <?php
            }
          }elseif(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'house' && $_GET['arg'] == 'For Rent' ){
            if(isset($_GET['dyArg']) && $_GET['dyArg'] == $loc ){ // to make active class
              ?>
            <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>
              <?php
            }else{// to make unactive class
              ?>
            <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>   
              <?php
            }
          }elseif(isset($_GET['type'], $_GET['arg']) && $_GET['type'] == 'land' && $_GET['arg'] == 'For Rent' ){
            if(isset($_GET['dyArg']) && $_GET['dyArg'] == $loc ){ // to make active class
              ?>
            <a class="list-group-item list-group-item-action active" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>
              <?php
            }else{// to make unactive class
              ?>
            <a class="list-group-item list-group-item-action" id="list-home-list" href="maincat.php?cat=housesell&type=<?php echo $_GET['type'] ?>&arg=<?php echo $_GET['arg'] ?>&label=<?php echo $allLabel  ?>&dyCol=subCity&dyArg=<?php echo $loc?>" role="tab" aria-controls="home"><?php echo $loc?></a>   
              <?php
            }
          }
          
          ?>
        
          <?php
          $i++;
        }
      ?>


    </div>
      </div>
 
</div>      </div>
    
      <?php
    }



    
  }

?>

<!-- </ul> -->
    </div>
</div>
</div>
</div>  
</div>
  </div>
  <div id="loop" class="col-md-10">
    <?Php

      if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'],$_GET['type'])){
          $cat = $_GET['cat'];
          $status = $_GET['status'];
          $off = $_GET['off'];
          $label = $_GET['label'];
          if($status == ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){
            // echo 'elc';
            if(isset($_GET['search'])){/// if search data is there
              $search = $_GET['search'];
              $fetchPost = $get->searchC($cat, $search );
            }else{
              $fetchPost = $get->allPostListerOnTable($cat);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' && $status == ' ' ){ //dynamic colomen and arg with location all
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){/// if search data is there
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $dyCol, $dyCArg, $search );
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, $dyCol, $dyArg);
            }
          }elseif($status == ' ' && $_SESSION['location'] != 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){// for location based output
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' && $status == ' ' && !isset($_GET['dbType'] )){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, $dyCol, $dyArg, 'address', $_SESSION['location']);
            }
          }elseif($status != ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType']) && !isset($_GET['dyCol'], $_GET['dyArg'])){
            // echo 'sdf--- '.$off;
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $status, $off, $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, $status, $off);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $status != ' ' && $_SESSION['location'] == 'All' && !isset($_GET['dbType'])){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off , $dyCol, $dyArg);
            }
          }
          
          elseif($status != ' ' && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){ // for location based output
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $status, $off, 'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off, 'address', $_SESSION['location']);
            }
          }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $status != ' ' && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
            $dyCol = $_GET['dyCol'];
            $dyArg = $_GET['dyArg'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search3C($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg, $search);
            }else{
              $fetchPost = $get->allPostListerOn3Columen($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg);
            }
          }
          elseif($status == ' ' && isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search1C($cat, 'type', $dbType,$search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
            }
          }elseif($status == ' ' && isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){ // for location based output
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
            }
          }
          elseif($status != ' ' && isset($_GET['dbType'])  && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){          
            $dbType = $_GET['dbType'];
            if(isset($_GET['search'])){ // if search is occured
              $search = $_GET['search'];
              $fetchPost = $get->search2C($cat, $status, $off, 'type', $dbType,$search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off, 'type', $dbType);           
            }

          } 
          
          
    ?>
    <br>
    
      <div  class="container">
          <h5><?php echo $label ?></h5> <h6><?php if(isset($_GET['dbType'])){ echo $_GET['dbType']; } ?></h6>
      </div>
        
        <br>
      <div id="vc" class="row">


    <?php
        if($fetchPost->num_rows != 0){
              while($row = $fetchPost->fetch_assoc()){

                if(!in_array($row['id'], $_SESSION['userScroll'])){
                  $pid = $row['id'];
                ?>
                

          
                <div  class="col-3">
              <div class="card mb-4 box-shadow">
              
              <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $_GET['type'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

                <div class="post-details">

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
              if(isset($_SESSION['userId'])){
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
              }
              ?>
            </div>
        
        
      

                <?php
                array_push($_SESSION['userScroll'], $row['id']);
                }
              }
            }else{
              echo 'No Result Found';
            }

              $pg = $fetchPost->num_rows / 9;

              ?>
              </div>
        </div>
              
              <?php



          }



          

          elseif(isset($_GET['cat'])){
            if($_GET['cat'] == 'vacancy'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'type', $dbType ,$search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->searchC($cat, $search);
                }else{
                  $fetchPost = $get->allPostListerOnTable($cat);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
                }
              }
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg, 'address', $_SESSION['location']);
                }
              }
              if($fetchPost->num_rows != 0){

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
            if(isset($_SESSION['userId'])){
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
            }else{
              echo 'No Results Found.';
            }
            }
          

          ////tender
            elseif($_GET['cat'] == 'tender'){
              $cat = $_GET['cat'];
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'type', $dbType, $search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
                }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
                }
              }
              elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->searchC($cat, $search);
                }else{
                  $fetchPost = $get->allPostListerOnTable($cat);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
                }
              }
              
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat,$dyCol, $dyArg,'address', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg, 'address', $_SESSION['location']);
                }
              }
              if($fetchPost->num_rows != 0){

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
            if(isset($_SESSION['userId'])){
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
            }else{
              echo 'No Result Found';
            }
            }


          //////////////blog post view
          if(isset($_GET['cat']) && $_GET['cat'] == 'blog'){
            // echo 'yer';
            $cat = $_GET['cat'];
            if(isset($_GET['dbType']) ){
              $dbType = $_GET['dbType'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'title', $dbType , $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'title', $dbType );
              }
            }
            elseif(isset($_GET['search'])){
              // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->searchC($cat, $search);
              }else{
                $fetchPost = $get->allPostListerOnTable($cat);
              }
            

            if($fetchPost->num_rows != 0){

            while($row = $fetchPost->fetch_assoc()){
              if(!in_array($row['id'], $_SESSION['userScroll'])){
            ?>
              <div class="card" >
                  <div class="card-header">
                    <?php echo $row['frontLabel'] ?>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    </div>
                    <?php 

                      $dt = new DateTime($row['postedDate']);
                      $date = $get->time_elapsed_string($row['postedDate']);
                      $c = date_create($row['postedDate']);
                      $PD = date_format($c, "Y/m/d");

                      $now = new DateTime();
                      $future_date = new DateTime($row['postedDate']);
                      $sinterval = $future_date->diff($now);
                      $snow = new DateTime();

                      $interval = $future_date->diff($now);


                      ;
                    ?>
                      <small class="text-muted">Posted: <span class="text-success"><?php echo $PD; ?></span></small>
    </div>
                    
                    <p class="card-text"  style="height:8%; overflow:hidden; text-overflow: ellipsis; "> <?php echo $row['content'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">

                              </div>
                  </div>
                </div>
                <div class="btn-group">
                                  <a href="./Description.php?cat=blog&label=Blog Post&postId=<?php echo $row['id'] ?>&type= " type="button" class="btn btn-sm btn-outline-primary">Read More...</a>
                                </div>
            <?php
                        array_push($_SESSION['userScroll'], $row['id']);
                      }
            }
          }else{
            echo 'No Result Found';
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

            
              if(isset($_GET['dbType']) && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
              $dbType = $_GET['dbType'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType); 
              }
              }elseif(isset($_GET['dbType']) && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn4Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location']); 
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat,$dyCol, $dyArg, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search);
                }else{
                  $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg,$dyCol, $dyArg);
                }
              }
              
              
              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat,$dyCol, $dyArg,'address', $_SESSION['location'],'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn4Columen($cat,$dyCol, $dyArg,'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
                }
              }
              
              
    ?>
    <br>
      <div  class="container">
          <!-- <h5><?php echo $label ?></h5> -->
      </div>
        
        <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


    <?php
        if($fetchPost->num_rows != 0){

              while($row = $fetchPost->fetch_assoc()){

                if(!in_array($row['id'], $_SESSION['userScroll'])){
                ?>
                

          
                      <div  class="row-col-3 row-col-sm-12 row-col-md-3">
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
              if(isset($_SESSION['userId'])){
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
              }
              ?>
            </div>
        
        
      

                <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }

              }
            }else{
              echo 'No Result Found';
            }
            
    ?> </div> <?php

            }
          


          ///// land post view
            if($_GET['type'] == 'land'){

              
              $cat = $_GET['cat'];
              // $status = $_GET['status']; 
              $arg = $_GET['arg'];
              $label = $_GET['label'];

              if(isset($_GET['dbType'])&& $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, $search);
                }else{
                  $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType); 
                }
              }if(isset($_GET['dbType'])&& $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
                $dbType = $_GET['dbType'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn4Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location']); 
                }
              }elseif($_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search2C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search);
                }else{
                  $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] == 'All'  ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search);
                }else{
                  $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell' , $arg,$dyCol, $dyArg);
                }
              }

              elseif($_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
                }
              }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
                $dyCol = $_GET['dyCol'];
                $dyArg = $_GET['dyArg'];
                if(isset($_GET['search'])){ // if search is occured
                  $search = $_GET['search'];
                  $fetchPost = $get->search4C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
                }else{
                  $fetchPost = $get->allPostListerOn4Columen($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
                }
              }
              
              
    ?>
    <br>
      <div  class="container">
          <h5><?php echo $label ?></h5>
      
        </div>
        <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


    <?php
        if($fetchPost->num_rows != 0){

              while($row = $fetchPost->fetch_assoc()){
                if(!in_array($row['id'], $_SESSION['userScroll'])){

                ?>
                

          
                      <div  class="row-col-3 row-col-sm-12 row-col-md-3">
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
              if(isset($_SESSION['userId'])){
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
              }
              ?>
            </div>
        
        
      

                <?php
                          array_push($_SESSION['userScroll'], $row['id']);
                        }


              }
            }else{
              echo 'No Result Found';
            }
            
    ?> </div> <?php

            }
          }

          
          ///////////////cv seekers
          if(isset($_GET['cat'], $_GET['type'], $_GET['label'])){
            $cat = $_GET['cat'];
            $type = $_GET['type'];
            $label = $_GET['label'];

            if($type == "homeTutor" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) || $type == 'zebegna' && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->searchC($cat, $search);
              }else{
                $fetchPost = $get->allPostListerOnTable($cat);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "homeTutor" && $_SESSION['location'] == 'All' || isset($_GET['dyCol'], $_GET['dyArg']) && $type == 'zebegna' && $_SESSION['location'] == 'All'){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
              }
            }
            
            
            elseif($type == "homeTutor" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])  || $type == 'zebegna' && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
              }
            }
            elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "homeTutor" && $_SESSION['location'] != 'All' || isset($_GET['dyCol'], $_GET['dyArg']) && $type == 'zebegna' && $_SESSION['location'] != 'All'){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg , 'address', $_SESSION['location'] , $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,  'address', $_SESSION['location']);
              }
            }
            
            elseif($type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOUSE', $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOUSE');
              }
            }
            elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg']) ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE', $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE');
              }
            }
            elseif($type == "houseWorker" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location']);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "houseWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search3C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE' ,  'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE',   'address', $_SESSION['location']);
              }
            }
            
            elseif($type == "hotelWorker" && $_SESSION['location'] == 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOTEL', $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOTEL');
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL');
              }
            }
            
            
            elseif($type == "hotelWorker" && $_SESSION['location'] != 'All' && !isset($_GET['dyCol'], $_GET['dyArg'])){
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location']);
              }
            }elseif(isset($_GET['dyCol'], $_GET['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_GET['dyCol'];
              $dyArg = $_GET['dyArg'];
              if(isset($_GET['search'])){ // if search is occured
                $search = $_GET['search'];
                $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL');
              }
            }

            
            ?>
            <br>
            <div  class="container">
                <!-- <h5><?php echo $label ?></h5> -->
            </div>
              
              <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
            <?php
            
    

            if($fetchPost->num_rows != 0){


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
            if(isset($_SESSION['userId'])){
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
            }
              ?>
          </div>
      
      


              <?php
              array_push($_SESSION['userScroll'], $row['id']);
              }
            }
          }else{
            echo 'No Result Found';
          }

            
            
            

          }




        
        ?>
      </div>

</div>
<div style="clear:both;"></div>

<!-- </div> -->
<div style="clear:both;"></div>
      <?php
      
  ?>
</body>
<?php

include 'includes/footer.php';
?>