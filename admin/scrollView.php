<?php
        ob_start();
        session_start();
        $website = "Description.php";
$content_per_page = 6;
$page = $_SESSION['adminPage'];
$startPage = ($page * $content_per_page) - $content_per_page;
// echo $startPage.'z';
$endPage =  $content_per_page;
// echo $endPage;
  if(isset($_GET['type'])){

      $idArr = $_SESSION['scroll'];
      $ty = $_SESSION['type']; 
    
      
    require_once "../php/adminCrude.php";
    require_once "../php/fetchApi.php";
    if($ty == 'vacancy'){
      $data = allPostListerOnTableD('vacancy', $startPage, $endPage );
      while($row = $data[0]->fetch_assoc()){
          if(!in_array($row['id'],$idArr)){
            $idArr[]= $row['id'];  
          ?>
                <h6>Vacancy Post</h6>


<div id="sc"  class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">Position :<?php echo $row['title'] ?></h5>
            <p class="card-text">Job Type :<?php echo $row['positionType'] ?></p>
            <p class="card-text">Deadline :<?php echo $row['deadLine'] ?></p>
            <p class="card-text">Requierd Position :<?php echo $row['positionNum'] ?></p>
            <p class="card-text">Job Type :<?php echo $row['info'] ?></p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
            <a href="../<?php echo $website ?>?cat=vacancy&label=Vacancy%20Post&postId=<?php echo $row['id'] ?>&type=" >View</a>
            <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                <i class="bi-cart-fill me-1"></i>
                View User 
            </a>  
            </div>
        </div>
    </div>
</div>


          <?php
          array_push($_SESSION['scroll'], $row['id'] );
      }
    }
  
  }
  ///////////////////////////////////////////////////////////////
  if($ty == 'tender'){

    $data = allPostListerOnTableD('tender', $startPage, $endPage);
    while($row = $data[0]->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
            $idArr[]= $row['id']; 
        ?>
                <h6>Tender Post</h6>
                <?php
                $date1 = date('Y/m/d');
                $date2 = $row['deadLine'];
                // Calculating the difference in timestamps
                $diff = strtotime($date2) - strtotime($date1);
            
                // 1 day = 24 hours
                // 24 * 60 * 60 = 86400 seconds
                $difff= abs(round($diff / 86400));
                
                if($difff < 3 ){
                    ?>
                    <div class="card mb-3" style="max-width: 540px; box-shadow:  10px 10px red; ">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <?php 
                        $p = photoSplit($row['photoPath1']);
                        if(!empty($p)){
                          ?>
                          <img src="<?php echo '../'.$p[0]; ?>" class="img-fluid rounded-start" alt="...">
                          <?php
                        }if(empty($row['photoPath1'])){
                          ?>
                          <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                          <?php
                        }
                        
                        ?> 
                                                </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo $row['info'] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                            <a href="../<?php echo $website ?>?cat=tender&label=Tender%20Post&postId=<?php echo $row['id'] ?>&type=" >View</a>
                            <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>   
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php
                }else{

                
                  
                ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        
                        <?php 
                        $p = photoSplit($row['photoPath1']);
                        if(!empty($p)){
                          ?>
                          <img src="<?php echo '../'.$p[0]; ?>" class="img-fluid rounded-start" alt="...">
                          <?php
                        }if(empty($row['photoPath1'])){
                          ?>
                          <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                          <?php
                        }
                        
                        ?> 
                        

                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo $row['info'] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                            <a href="../<?php echo $website ?>?cat=tender&label=Tender%20Post&postId=<?php echo $row['id'] ?>&type=" >View</a>
                            <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>    
                        </div>
                        </div>
                    </div>
                </div>

        <?php
        array_push($_SESSION['scroll'], $row['id'] );

        }
    }
    }
        
      
    
    

  }

  //////////////////ad post////////////
  if($ty == 'ad' ){


    $ad = allPostListerOnTableD('ad', $startPage, $endPage);    ?>
    <div class="row">
      <script>

      </script>
    <?php
    while($row = $ad[0]->fetch_assoc()){

      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id']; 
        ?>

                
<div id="adVieww" class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $row['title'] ?></p>
                  <p class="card-text"><?php echo $row['price'] ?> Birr</p>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=ad&postId=<?php echo $row['id'] ?>&label=Advertisment%20Post&type=product" >View</a>
                  <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>     
                  </div>
                </div>
              </div>
            </div>


        <?php
    array_push($_SESSION['scroll'], $row['id'] );  
    }
    }
    ?>
    </div>
    <?php


  }

//////////////////car post///////////

if($ty == 'car' ){

  $carOut =allPostListerOnTableD('car', $startPage, $endPage)
  ?>
  <div class="row">
  <?php
  
  while($cars = $carOut[0]->fetch_assoc()){

    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id']; 
      ?>
      
      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = photoSplit($cars['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['price'] ?> Birr</p>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=car&postId=<?php echo $cars['id'] ?>&label=Cars%20For%20Sell&type=" >View</a>
                  <a href="./userInfo.php?poster=<?php echo $cars['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                  </div>
                </div>
              </div>
            </div>
      <?php
     array_push($_SESSION['scroll'], $cars['id'] );  
  }
  }
  ?>
  </div>
  <?php

  




}

/////////////////// house post////////////
if($ty == 'house' ){

  $hOut = allPostListerOnColumenD('housesell','houseOrLand', 'HOUSE' , $startPage, $endPage);
  ?>
  <div class="row">
  <?php
  
  while($cars = $hOut[0]->fetch_assoc()){
    
    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id']; 
      ?>
      
                
      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = photoSplit($cars['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                  <h6><?php echo $cars['cost'] ?> Birr</h6>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=housesell&type=house&postId=<?php echo $cars['id'] ?>&label=House%20Posts" >View</a>
                  <a href="./userInfo.php?poster=<?php echo $cars['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                  </div>
                </div>
              </div>
            </div>
      <?php
    array_push($_SESSION['scroll'], $cars['id'] );  
  }
  }
  ?>
  </div>
  <?php

}

////LAND POST
if($ty == 'land' ){

  $hOut = allPostListerOnColumenD('housesell','houseOrLand', 'LAND' , $startPage, $endPage);
  ?>
  <div class="row">
  <?php
  
  while($cars = $hOut[0]->fetch_assoc()){
    
    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id']; 
      ?>
      
                
      <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = photoSplit($cars['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                  <h6><?php echo $cars['cost'] ?> Birr</h6>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=housesell&type=house&postId=<?php echo $cars['id'] ?>&label=House%20Posts" >View</a>
                  <a href="./userInfo.php?poster=<?php echo $cars['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                  </div>
                </div>
              </div>
            </div>
      <?php
    array_push($_SESSION['scroll'], $cars['id'] );  
  }
  }
  ?>
  </div>
  <?php

}

//////////////////electronics/////////

if($ty == 'electronics'){

  $hOut = allPostListerOnTableD('electronics', $startPage, $endPage);
  ?>

  <div class="row">
  <?php
  
  while($cars = $hOut[0]->fetch_assoc()){

    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id'];
      ?>
      
          
      <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($cars['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $cars['title'] ?></p>
                <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                <h6><?php echo $cars['price'] ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=electronics&postId=<?php echo $cars['id'] ?>&label=Electronics%20Post&type=" >View</a>
                <a href="./userInfo.php?poster=<?php echo $cars['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>   
                </div>
              </div>
            </div>
          </div>
      <?php
      array_push($_SESSION['scroll'], $cars['id'] );  
  }
  }
  ?>
  </div>
  <?php

}

////////////////////charity view//
if($ty == 'charity'){

  $out = allPostListerOnTableD('charity', $startPage, $endPage);
  ?>
 
      <div class="row">
      <?php
      
      while(  $row = $out[0]->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['phone'] ?> </h6>
                <div class="d-flex justify-content-between align-items-center"> 
                <a href="../<?php echo $website ?>?cat=charity&postId=<?php echo $row['id'] ?>&label=Charity%20Post&type=" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
              </div>
            </div>
          </div>
  
  <?php
        array_push($_SESSION['scroll'], $row['id'] ); 
      }
    }
    ?>
      </div>
    <?php
}

/////////////big discount
if($ty == 'bigDiscount'){

  ?>
      <div class="row">
      <?php
        $out = allPostListerOnColumenD('housesell','bigDiscount', 'ACTIVE' , $startPage, $endPage);
      while($row = $out[0]->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center"> 
                <a href="../<?php echo $website ?>?cat=ad&postId=<?php echo $row['id'] ?>&label=Big%20Discount%20Advertisment&type=big" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
              </div>
            </div>
          </div>
  
  <?php
        array_push($_SESSION['scroll'], $row['id'] ); 
      }
    }
    ?>
    </div>
  <?php
}

//////////////home tutor
if($ty == 'homeTutor'){


  $out = allPostListerOnTableD('jobhometutor', $startPage, $endPage);
  
  ?>
  

 
      <div class="row">
      <?php
      while(  $row = $out[0]->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text">Name: <?php echo $row['Name'] ?></p>
                <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
                <p class="card-text">Info : <?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['Price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=jobhometutor&postId=<?php echo $row['id'] ?>&label=Home%20Tutor&type=homeTutor" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
              </div>
            </div>
          </div>
  
  <?php
  array_push($_SESSION['scroll'], $row['id'] );
        }

      }
      ?>
      </div>
    <?php

}

/////////////hotel
if($ty == 'hotel'){

  $out = allPostListerOnColumenD('hotelOrHouse', 'hotelhouse', 'HOTEL', $startPage, $endPage);

  ?>
  
  <script>
      function elcView(id){
        $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

      }

      function editElc(id){
        $('#allin').load('editPost.php?'+$.param({type: 'hotel', pid: id})) 

      }

    </script>
    <div class="row">
    <?php
    while(  $row = $out[0]->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
        
            
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text">Name: <?php echo $row['name'] ?></p>
                <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
                <p class="card-text">Info : <?php echo $row['experience'] ?> Birr</p>
                <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=hotelhouse&postId=<?php echo $row['id'] ?>&label=Hotel%20Job%20Seeker&type=hotelWorker" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
              </div>
            </div>
          </div>

<?php
  array_push($_SESSION['scroll'], $row['id'] );
}
    }
    ?>
    </div>
  <?php

}


////////////////house keeper
if($ty == 'houseKeeper'){

  $out =  allPostListerOnColumenD('hotelOrHouse', 'hotelhouse', 'HOUSE', $startPage, $endPage);

  ?>
  
 
    <div class="row">
    <?php
    while(  $row = $out[0]->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
        
            
              
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text">Name: <?php echo $row['name'] ?></p>
                <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
                <p class="card-text">Info : <?php echo $row['experience'] ?> Birr</p>
                <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=hotelhouse&postId=<?php echo $row['id'] ?>&label=Home%20Keeper%20Seeker&type=houseWorker" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>   
                </div>
              </div>
            </div>
          </div>

<?php
  array_push($_SESSION['scroll'], $row['id'] );
}
    }
    ?>
    </div>
  <?php

}

//////////////////zebegna
if($ty == 'zebegna'){

  $out = allPostListerOnTableD('zebegna',1,6);

  ?>
  

    <div class="row">
    <?php
    while(  $row = $out[0]->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text">Name: <?php echo $row['name'] ?></p>
                <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
                <p class="card-text">phone : <?php echo $row['phone'] ?> Birr</p>
                <h6> : <?php echo $row['address']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
              </div>
            </div>
          </div>

<?php
array_push($_SESSION['scroll'], $row['id'] );
}
    }
    ?>
    </div>
  <?php
}

}


?>
<script>

</script>