    
    <?php
    ob_start();
    if(!isset($_SESSION)){
        session_start();
    }
    require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
$pageLocation = $_SESSION['location'];

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell');

 
for($z=0;$z<14;$z++){
  $r = rand(0,4); 
  $tab = $dbTables[$r];// to choose random table to fetch data off
  // echo $tab;
  if($pageLocation != 'All'){
    if($tab == 'housesell'){
      $home = allPostListerOnColumen($tab,'city', $pageLocation); // if city is not all, then a city is selected so it always fetch data based on a city
    }else{
    $home = allPostListerOnColumen($tab,'address', $pageLocation); // if city is not all, then a city is selected so it always fetch data based on a city
    }
  }else{
    $home = allPostListerOnTable($tab); // it fetches data from all city
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
          src="<?php $p = photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

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