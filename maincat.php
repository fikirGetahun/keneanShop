<?php
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
	?>

<div id="view" class="row">
  <div id="loop" class="container">
    <?Php
    echo 'bithcccccccccc';

      if(isset($_GET['cat'], $_GET['status'],$_GET['off'], $_GET['label'])){
        echo 'in api';
          $cat = $_GET['cat'];
          $status = $_GET['status'];
          $off = $_GET['off'];
          $label = $_GET['label'];
          if($status == ' '){
            // echo 'elc';
            $fetchPost = $get->allPostListerOnTable($cat);
          }else{
            // echo 'sdf--- '.$off;
            $fetchPost = $get->allPostListerOnColumen($cat, $status, $off);
          }
          
?>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
  <div class="jumbotron">
  <div  class="container">
      <h5><?php echo $label ?></h5>
  </div>
    </div>
    <br>
<?php
          while($row = $fetchPost->fetch_assoc()){


            ?>
            

      
        <div class="col">
          <div class="card shadow-sm">
          <a href="description.php" class="stretched-link"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"> Title : <?php echo $row['title'] ?></h5>
              <?php 
              if($cat != 'charity' && $cat != 'tender'){
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


          }
          ?>
          </div>
          </div>
          </div>
          <?php
      }
    
    ?>
 

      <?php
      include 'includes/footer.php';
  ?>