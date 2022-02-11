
<!-- <head> -->
<?php

// ob_start();
// session_start();
// 
include "includes/lang.php";
include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";


// if(isset($_GET['loc'])){
//   $_SESSION['location'] = $_GET['loc'];
// }else{
//   $_SESSION['location'] = 'All';
// }
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


 <div class="card">
   <br>
   <br>
    <div class="container">
      <h5>House</h5>
      
    </div>
    <br>
    <br>
  </div>
  <br>
  <br>

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
          <a href="Description.php?cat=housesell&type=house&postId=<?php echo $row1['id'] ?>&label=House%20Posts" class=" ">
           <img class="bd-placeholder-img card-img-top" width="100%" height="150"
            src="<?php $p = $admin->photoSplit($row1['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

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


 <div class="card">
   <br>
    <div class="container">
      <h5>Others</h5>
      
    </div>
    <br>
  </div>

  <br>
  <br>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
    
    <?php

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell');

 
for($z=0;$z<14;$z++){
  $r = rand(0,4); 
  $tab = $dbTables[$r];// to choose random table to fetch data off
  // echo $tab;
  if($pageLocation != 'All'){
    if($tab == 'housesell'){
      $home = $get->allPostListerOnColumen($tab,'city', $pageLocation); // if city is not all, then a city is selected so it always fetch data based on a city
    }else{
    $home = $get->allPostListerOnColumen($tab,'address', $pageLocation); // if city is not all, then a city is selected so it always fetch data based on a city
    }
  }else{
    $home = $get->allPostListerOnTable($tab); // it fetches data from all city
  }
  if($home->num_rows != 0){  // if only a result occurs
  $i1= 1;
  while($row12 = $home->fetch_assoc()){
    
    ?>
      <div class="col-3">
        <div class="card shadow-sm">
          <?php 
          if($tab == 'ad'){
            ?>
              <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Advertisment%20Post&type=product" class="">
            <?php
          }elseif($tab == 'car'){
            ?>
            <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Cars%20Post%20&type=" class="">
          <?php  
          }elseif($tab == 'charity'){
            ?>
            <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Charity%20Post&type=" class="">
          <?php  
          }elseif($tab == 'electronics'){
            ?>
            <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Electronics%20Post&type=" class="">
          <?php  
          }
          
          elseif($tab == 'housesell'){
            ?>
            <a href="Description.php?cat=<?php echo $tab ?>&type=house&postId=<?php echo $row12['id'] ?>&label=House%20Posts" class="">
          <?php  
          }

          ?>
         <img class="bd-placeholder-img card-img-top" width="100%" height="150"
          src="<?php $p = $admin->photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

          <div class="card-body">
            <?php 
              if($tab == 'housesell' || $tab == 'car'){
                ?>
                <h5 class="card-title"><?php echo $row12['forRentOrSell'] ?></h5>
                <?php
              }
            ?>
            <h5 class="card-title"><?php echo $row12['title'] ?></h5>
            <?php

            if($tab != 'housesell' && $tab != 'charity'){
              ?><h6 class="card-text"><span class="text-danger small"><?php echo $row12['price'] ?></span> </h6>
              <?php
            }elseif($tab == 'housesell'){
              ?>
              <h6 class="card-text"><span class="text-danger small"><?php echo $row12['cost'] ?></span> </h6>
              <?php
            }
            ?>
            
            
            <div class="d-flex justify-content-between align-items-center">
              <?php
              if($tab != 'charity' && $tab != 'housesell'){
                ?>
                 <h6 class="card-text">  <?php echo $row12['address'] ?></h6>
                <?php
              }elseif($tab == 'housesell'){
                ?>
                 <h6 class="card-text"> <?php echo $row12['city'] ?></h6>
                <?php
              }
              ?>
               
            </div>
          </div>
        </div>
      </div>
    <?php
    if($i1 == 2){break;}
    $i1++;
  }
}else{
  echo 'No Result';
}

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