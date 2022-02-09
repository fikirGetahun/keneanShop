<?php
        ob_start();
        session_start();
        
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
      $data = $get->allPostListerOnTableD('vacancy', $startPage, $endPage );
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
                            <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                                <i class="bi-cart-fill me-1"></i>
                                View User <?php echo $row['posterId'] ?>
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

    $data = $get->allPostListerOnTableD('tender', $startPage, $endPage);
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
                        $p = $admin->photoSplit($row['photoPath1']);
                        if(!empty($p)){
                          ?>
                          <img src="<?php echo $p[0]; ?>" class="img-fluid rounded-start" alt="...">
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
                            <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                                <i class="bi-cart-fill me-1"></i>
                                View User <?php echo $row['posterId'] ?>
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


    $ad = $get->allPostListerOnTableD('ad', $startPage, $endPage);    ?>
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
        <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
        <div class="card-body">
          <p class="card-text"><?php echo $row['title'] ?></p>
          <p class="card-text"><?php echo $row['price'] ?> Birr</p>
          <div class="d-flex justify-content-between align-items-center">
          <a href="../<?php echo $website ?>?cat=ad&postId=<?php echo $row['id'] ?>&label=Advertisment%20Post&type=product" >View</a>
          <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
              <i class="bi-cart-fill me-1"></i>
              View User <?php echo $row['posterId'] ?>
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

  $carOut = $admin->carPostLister();
  ?>
  <div class="row">
  <?php
  
  while($cars = $carOut->fetch_assoc()){

    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id']; 
      ?>
      
          
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
          <div class="card-body">
            <p class="card-text"><?php echo $cars['title'] ?></p>
            <p class="card-text"><?php echo $cars['price'] ?> Birr</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" onclick="viewCar(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" onclick="editCar(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
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

  $hOut = $admin->houseOrLandPostLister();
  ?>
  <div class="row">
  <?php
  
  while($cars = $hOut->fetch_assoc()){
    
    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id']; 
      ?>
      
          
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
          <div class="card-body">
            <p class="card-text"><?php echo $cars['title'] ?></p>
            <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
            <h6><?php echo $cars['cost'] ?> Birr</h6>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" onclick="houseView(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" onclick="editHouse(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
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

  $hOut = $admin->electronicsViewLister();
  ?>
  <script>
    function elcView(id){
      $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

    }

    function editElc(id){
      $('#allin').load('editPost.php?'+$.param({type: 'electronics', pid: id}))

    }

  </script>
  <div class="row">
  <?php
  
  while($cars = $hOut->fetch_assoc()){

    if(!in_array($cars['id'],$idArr)){
      $idArr[]= $cars['id'];
      ?>
      
          
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
          <div class="card-body">
            <p class="card-text"><?php echo $cars['title'] ?></p>
            <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
            <h6><?php echo $cars['price'] ?> Birr</h6>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" onclick="elcView(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" onclick="editElc(<?php echo $cars['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
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

  $out = $admin->allPostsLister('charity');
  ?>
        <script>
        function elcView(id){
          $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('editPost.php?'+$.param({type: 'charity', pid: id}))

        }

      </script>
      <div class="row">
      <?php
      
      while(  $row = $out->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['phone'] ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
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
        <script>
        function elcView(id){
          $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('editPost.php?'+$.param({type: 'ad', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
        $out = $admin->bigDiscountLister();
      while($row = $out->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
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


  $out = $admin->allPostsLister('jobhometutor');
  
  ?>
  

  <script>
        function elcView(id){
          $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('editPost.php?'+$.param({type: 'homeTutor', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
      while(  $row = $out->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
          $idArr[]= $row['id'];
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text">Name: <?php echo $row['Name'] ?></p>
                <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
                <p class="card-text">Info : <?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['Price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
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

  $out = $admin->allPostColumenView('hotelOrHouse', 'hotelhouse', 'HOTEL');

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
    while(  $row = $out->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
        
            
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
            <div class="card-body">
              <p class="card-text">Name: <?php echo $row['name'] ?></p>
              <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
              <p class="card-text">Info : <?php echo $row['experience'] ?> Birr</p>
              <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
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

  $out = $admin->allPostColumenView('hotelOrHouse', 'hotelhouse', 'HOUSE');

  ?>
  
  <script>
      function elcView(id){
        $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

      }

      function editElc(id){
        $('#allin').load('editPost.php?'+$.param({type: 'houseKeeper', pid: id})) 

      }

    </script>
    <div class="row">
    <?php
    while(  $row = $out->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
        
            
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
            <div class="card-body">
              <p class="card-text">Name: <?php echo $row['name'] ?></p>
              <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
              <p class="card-text">Info : <?php echo $row['experience'] ?> Birr</p>
              <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
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

  $out = $admin->allPostsLister('zebegna');

  ?>
  
  <script>
      function elcView(id){
        $('#allin').load('discriptionPage.php', {type: 'electronics',pid: id})

      }

      function editElc(id){
        $('#allin').load('editPost.php?'+$.param({type: 'zebegna', pid: id})) 

      }

    </script>
    <div class="row">
    <?php
    while(  $row = $out->fetch_assoc()){
      if(!in_array($row['id'],$idArr)){
        $idArr[]= $row['id'];
        ?>
        
            
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
            <div class="card-body">
              <p class="card-text">Name: <?php echo $row['name'] ?></p>
              <p class="card-text">Sex: <?php echo $row['sex'] ?></p>
              <p class="card-text">phone : <?php echo $row['phone'] ?> Birr</p>
              <h6> : <?php echo $row['address']  ?> Birr</h6>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" onclick="elcView(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" onclick="editElc(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
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