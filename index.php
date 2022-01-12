
<!-- <head> -->
<?php

ob_start();
session_start();
// $_SESSION['location'] = '';

include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";

if(isset($_GET['loc'])){
  $_SESSION['location'] = $_GET['loc'];
}

$pageLocation = $_SESSION['location'];
	?>

<!-- </head> -->
<body>
<main class="container-fluid">
  
  <div class="row">
  <section class="col-lg-8 ">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/salon.jpg" class="d-block mx-auto card-img-top" style="max-height: 450px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/ecommerce.png" class="d-block mx-auto card-img-top"  style="max-height: 450px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/salon.jpg" class="d-block  mx-auto card-img-top" style="max-height:450px;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<div class="row col-md-4 p-3">
  <div class="card">
  <img src="assets/img/work-7.jpg" class="card-img-top" alt="...">
</div>
</div>  
  </div>

<!--section 1 -->
<!--section 1 -->
<!--section 1 -->
<!--section 1 -->

  <div class="album py-5 bg-light">
    <div class="container">
 <div class="jumbotron">
    <div class="container">
      <h5>Sponsored big discount</h5>
    </div>
 </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    <?php
    if($pageLocation != 'All'){
      $home = $get->allPostListerOn2Columen('ad', 'bigDiscount', 'ACTIVE', 'address', $pageLocation);
    }else{
      $home = $get->allPostListerOnColumen('ad', 'bigDiscount', 'ACTIVE');
    }
    if($home->num_rows != 0){

    $i1= 1;
    while($row1 = $home->fetch_assoc()){
      // if($i1 == 5){break;}
      ?>
        <div class="col">
          <div class="card shadow-sm">
          <a href="Description.php?cat=ad&postId=<?php echo $row1['id'] ?>&label=Big%20Discount%20Advertisment&type=big" class="stretched-link">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"><?php echo $row1['title'] ?></h5>
              <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row1['price'] ?></span> </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                  <h6 class="card-text">Location: <?php echo $row1['address'] ?></h6>
                <small class="text-muted"> <?php echo $row1['view'] ?> views </small>
              </div>
            </div>
          </div>
        </div>
      <?php
      $i1++;
    }
  }else{
    echo 'No Results';
  }
    ?>

  </div>

      <div class="album py-5 bg-light">
    <div class="container">


 <div class="jumbotron">
    <div class="container">
      <h5>House</h5>
      
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    <?php
    if($pageLocation != 'All'){
      $home = $get->allPostListerOn2Columen('housesell', 'houseOrLand', 'HOUSE', 'city', $pageLocation);
    }else{
      $home = $get->allPostListerOnColumen('housesell','houseOrLand', 'HOUSE');
    }

    if($home->num_rows != 0){

    $i1= 1;
    while($row1 = $home->fetch_assoc()){
      
      ?>
        <div class="col">
          <div class="card shadow-sm">
          <a href="Description.php?cat=housesell&type=house&postId=<?php echo $row1['id'] ?>&label=House%20Posts" class="stretched-link">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"><?php echo $row1['title'] ?></h5>
              <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row1['cost'] ?></span> </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                  <h6 class="card-text">Location: <?php echo $row1['city'] ?></h6>
                <small class="text-muted"> <?php echo $row1['view'] ?> views </small>
              </div>
            </div>
          </div>
        </div>
      <?php
      if($i1 == 5){break;}
      $i1++;
    }
  }else{
    echo 'No Result';
  }
    ?>
  </div>

<div class="album py-5 bg-light">
    <div class="container">


 <div class="jumbotron">
    <div class="container">
      <h5>Cars</h5>
      
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    <?php
    if($pageLocation != 'All'){
      $home = $get->allPostListerOnColumen('car','address', $pageLocation);
    }else{
      $home = $get->allPostListerOnTable('car');
    }
    if($home->num_rows != 0){
    $i1= 1;
    while($row1 = $home->fetch_assoc()){
      
      ?>
        <div class="col">
          <div class="card shadow-sm">
          <a href="Description.php?cat=car&type=house&postId=<?php echo $row1['id'] ?>&label=House%20Posts" class="stretched-link">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"><?php echo $row1['title'] ?></h5>
              <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row1['price'] ?></span> </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                  <h6 class="card-text">Location: <?php echo $row1['address'] ?></h6>
                <small class="text-muted"> <?php echo $row1['view'] ?> views </small>
              </div>
            </div>
          </div>
        </div>
      <?php
      if($i1 == 5){break;}
      $i1++;
    }
  }else{
    echo 'No Result';
  }
    ?>
  </div>
    </div>
  </div>

<div class="album py-5 bg-light">
    <div class="container">


 <div class="jumbotron">
    <div class="container">
      <h5>Electronics Items</h5>
      
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    <?php
    if($pageLocation != 'All'){
      $home = $get->allPostListerOnColumen('electronics', 'address', $pageLocation);
    }else{
      $home = $get->allPostListerOnTable('electronics');
    }
    if($home->num_rows != 0){

    $i1= 1;
    while($row1 = $home->fetch_assoc()){
      // if($i1 == 5){break;}
      ?>
        <div class="col">
          <div class="card shadow-sm">
          <a href="Description.php?cat=electronics&postId=<?php echo $row1['id'] ?>&label=Electronics%20Post&type=" class="stretched-link">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"><?php echo $row1['title'] ?></h5>
              <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row1['price'] ?></span> </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                  <h6 class="card-text">Location: <?php echo $row1['address'] ?></h6>
                <small class="text-muted"> <?php echo $row1['view'] ?> views </small>
              </div>
            </div>
          </div>
        </div>
      <?php
      $i1++;
    }
  }else{
    echo 'No Results';
  }
    ?>

  </div>
      </div>
    </div>
<!--offers-->
<!--offers-->
<div class="album py-5 bg-light">
    <div class="container">

 <div class="jumbotron">
    <div class="container">
      <h5>Land</h5>
      
    </div>
  </div>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    <?php
    if($pageLocation != 'All'){
      $home = $get->allPostListerOn2Columen('housesell', 'houseOrLand', 'LAND', 'city', $pageLocation);
    }else{
      $home = $get->allPostListerOnColumen('housesell','houseOrLand', 'LAND');
    }

    if($home->num_rows != 0){

    $i1= 1;
    while($row1 = $home->fetch_assoc()){
      
      ?>
        <div class="col">
          <div class="card shadow-sm">
          <a href="Description.php?cat=housesell&type=land&postId=<?php echo $row1['id'] ?>&label=Land%20Posts" class="stretched-link">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

            <div class="card-body">
              <h5 class="card-title"><?php echo $row1['title'] ?></h5>
              <h6 class="card-text">Price:<span class="text-danger small"><?php echo $row1['cost'] ?></span> </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                  <h6 class="card-text">Location: <?php echo $row1['city'] ?></h6>
                <small class="text-muted"> <?php echo $row1['view'] ?> views </small>
              </div>
            </div>
          </div>
        </div>
      <?php
      if($i1 == 5){break;}
      $i1++;
    }
  }else{
    echo 'No Result';
  }
    ?>
  </div>

      </div>
    </div>
</main>

	<?php
include "includes/footer.php";
?>
</body>
</html>