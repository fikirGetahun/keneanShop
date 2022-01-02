<?php  
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
require_once "php/auth.php";
require_once "php/adminCrude.php";

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy');

$user = $get->aSinglePostView($_SESSION['userId'], 'user');
$urow = $user->fetch_assoc();
?>
<script src="assets/jquery.js" ></script>
<script>
  $(document).ready(function(){

  })

  function editNav(type, pid){
    $('#cont').load('admin/editPost.php?type='+type+'&pid='+pid);
  }
</script>

<div class="container">
	<div class="row">

		<div class="col-md-2">

			
		</div>
		<!-- middle section-->

		<div class="col-md-8" >

    <div style="background-image: url(admin/assets/img/zumra.png);">
      <div class="card w-25 float-left ">
      <img src="<?php echo $urow['photoPath']?>" class="card-img-top" alt="...">
    
      </div>
      <h5 class="float-left">Name : <?php echo $urow['firstName'].' '.$urow['lastName'] ?></h5>
  <div class="card-header">
  <nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link active" href="#">Your Posts</a>
  <a class="nav-item nav-link" href="#">Messages</a>
  <a class="nav-item nav-link" href="#">Settings</a>
  <a class="nav-item nav-link disabled" href="#">Disabled</a>
</nav>
</div>
    </div>
  <div id="cont">
    <?php 
    
    if(isset($_GET['yourPost'])){

      ?>
      
      <?php


foreach($dbTables as $posts){  
    $oneTablePostList = $auth->userPostsLister($_SESSION['userId'], $posts);
    
    ?>

      <div class="row">
        <h2><?php echo $posts ?></h2>
      <?php
      while($row = $oneTablePostList->fetch_assoc()){  
  
        ?>
          <div  class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $row['title'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#viewDiscription"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                      <button type="button" onclick="editNav('<?php echo $posts ?>', '<?php echo $row['id'] ?>')" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted"><?php echo $row['view'] ?> views</small>
                  </div>
                </div>
              </div>
            </div>
        
        <?php

      }
    
    
}

?>
      
      <?php

    }

    if(isset($_GET['edit'])){


    }
    
    ?>



    </div>


		
		<!--right section0-->

		<div class="col-md-2">
			<div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
</div>
			
		</div>
		
	</div>
	
</div>
