


<?php

ob_start();
session_start();
require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";



?>


<?Php

if(isset($_SESSION['cat'], $_SESSION['status'],$_SESSION['off'], $_SESSION['label'])){
    $cat = $_SESSION['cat'];
    $status = $_SESSION['status'];
    $off = $_SESSION['off'];
    $label = $_SESSION['label'];
    if($status == ' '){
      // echo 'elc';
      $fetchPost = $get->allPostListerOnTable($cat);
    }else{
      // echo 'sdf--- '.$off;
      $fetchPost = $get->allPostListerOnColumen($cat, $status, $off);
    }
    
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
    while($row = $fetchPost->fetch_assoc()){

      if(!in_array($row['id'], $_SESSION['userScroll'])){

      ?>
      


  <div class="col">
    <div class="card shadow-sm">
    <a href="description.php" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

      <div class="card-body">
        <h5 class="card-title"> Title : <?php echo $row['title'] ?></h5>
        <?php 
        if($cat != 'charity'){
?>
        <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row['price'] ?></span> </h6>

<?php
        }
        ?>
        
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-text">Location: <?php echo $row['address'] ?></h6>
          <small class="text-primary">View</small>
        </div>
      </div>
    </div>
  </div>




      <?php
      array_push($_SESSION['userScroll'], $row['id']);
      }
    }
    ?>
    </div>
    
    
    <?php



}

if(isset($_SESSION['cat'])){
  if($_SESSION['cat'] == 'vacancy'){
    $cat = $_SESSION['cat'];
    $fetchPost = $get->allPostListerOnTable($cat);

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
                          <a href="vacdescription.php" type="button" class="btn btn-sm btn-outline-primary">View</a>
                          <a type="button" class="btn btn-sm btn-outline-warning">Fav</a>
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
}

/////////// house post view
if(isset($_SESSION['type'], $_SESSION['arg'], $_SESSION['label'], $_SESSION['cat'])){
  if($_SESSION['type'] == 'house'){


    $cat = $_SESSION['cat'];
    $cat = $_SESSION['cat'];
    // $status = $_SESSION['status'];
    $arg = $_SESSION['arg'];
    $label = $_SESSION['label'];

    $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg);
    
    
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
    while($row = $fetchPost->fetch_assoc()){

      if(!in_array($row['id'], $_SESSION['userScroll'])){
      ?>
      


  <div class="col">
    <div class="card shadow-sm">
    <a href="description.php" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

      <div class="card-body">
        <h5 class="card-title"> Title : <?php echo $row['title'] ?></h5>
        <?php 
        if($cat != 'charity'){
?>
        <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row['cost'] ?></span> </h6>

<?php
        }
        ?>
        
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-text">Location: <?php echo $row['city'] ?></h6>
          <small class="text-primary">View</small>
        </div>
      </div>
    </div>
  </div>




      <?php
                array_push($_SESSION['userScroll'], $row['id']);
              }

    }
  
?> </div> <?php

  }
}


///// land post view
if(isset($_SESSION['type'],  $_SESSION['arg'], $_SESSION['label'], $_SESSION['cat'])){
  if($_SESSION['type'] == 'land'){


    $cat = $_SESSION['cat'];
    // $status = $_SESSION['status']; 
    $arg = $_SESSION['arg'];
    $label = $_SESSION['label'];

    $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg);
    
    
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">


<?php
    while($row = $fetchPost->fetch_assoc()){
      if(!in_array($row['id'], $_SESSION['userScroll'])){

      ?>
      


  <div class="col">
    <div class="card shadow-sm">
    <a href="description.php" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

      <div class="card-body">
        <h5 class="card-title"> Title : <?php echo $row['title'] ?></h5>
        <?php 
        if($cat != 'charity'){
?>
        <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row['cost'] ?></span> </h6>

<?php
        }
        ?>
        
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-text">Location: <?php echo $row['city'] ?></h6>
          <small class="text-primary">View</small>
        </div>
      </div>
    </div>
  </div>




      <?php
                array_push($_SESSION['userScroll'], $row['id']);
              }


    }
  
?> </div> <?php

  }
}

/// for a all post besed on a table list
if(isset($_SESSION['cat'])){
  $cat = $_SESSION['cat'];
  $fetch23 = $get->allPostListerOnTable($cat);
  while($row2 = $fetch23->fetch_assoc()){

    if(!in_array($row2['id'], $_SESSION['userScroll'])){

      ?>
      


  <div class="col-2">
    <div class="card shadow-sm">
    <a > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

      <div class="card-body">
        <h5 class="card-title text-center">  <?php echo $row2['title'] ?></h5>
        <?php 
        if($cat != 'charity'){
?>
        <h6 class="card-text"><span class="text-danger small"><?php echo $row2['price'] ?> Birr</span> </h6>

<?php
        }
        $date = $get->time_elapsed_string($row2['postedDate']);
        $pid = $row2['id'];
        ?>
        
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-text">Location: <?php echo $row2['address'] ?></h6>
           <!-- <a href="<?php echo './Description.php?cat='.$cat.'&postId='.$row2['id'] ?>">View</a> -->

           <a href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>">View</a>
        </div>
        <span class="text-danger small"><?php echo $date ?></span> <span class="text-danger small"><?php echo $row2['view'] ?>Views</span>
      </div>
    </div>
  </div>




      <?php
      array_push($_SESSION['userScroll'], $row2['id']);
      }

  }
}



?>