


<?php

ob_start();
session_start();
if(isset($_SESSION['userId'])){
$userId = $_SESSION['userId'];
}

include "../includes/header.php";
require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";

// include "../includes/header.php";

?>
<!-- <script src="assets/jquery.js" ></script> -->

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->


  <?php

    if(isset($_SESSION['cat'], $_SESSION['status'],$_SESSION['off'], $_SESSION['label'],$_SESSION['type'])){
        $cat = $_SESSION['cat'];
        $status = $_SESSION['status'];
        $off = $_SESSION['off'];
        $label = $_SESSION['label'];
        if($status == ' ' && $_SESSION['location'] == 'All' && !isset($_SESSION['dbType']) && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
          // echo 'elc';
          if(isset($_SESSION['search'])){/// if search data is there
            $search = $_SESSION['search'];
            $fetchPost = $get->searchC($cat, $search );
          }else{
            $fetchPost = $get->allPostListerOnTable($cat);
          }
        }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] == 'All' && $status == ' ' ){ //dynamic colomen and arg with location all
          $dyCol = $_SESSION['dyCol'];
          $dyArg = $_SESSION['dyArg'];
          if(isset($_SESSION['search'])){/// if search data is there
            $search = $_SESSION['search'];
            $fetchPost = $get->search1C($cat, $dyCol, $dyCArg, $search );
          }else{
            $fetchPost = $get->allPostListerOnColumen($cat, $dyCol, $dyArg);
          }
        }elseif($status == ' ' && $_SESSION['location'] != 'All' && !isset($_SESSION['dbType']) && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){// for location based output
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
          }else{
            $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
          }
        }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] != 'All' && $status == ' ' && !isset($_SESSION['dbType'] )){ //dynamic colomen and arg with location selected
          $dyCol = $_SESSION['dyCol'];
          $dyArg = $_SESSION['dyArg'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search2C($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $search);
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, $dyCol, $dyArg, 'address', $_SESSION['location']);
          }
        }elseif($status != ' ' && $_SESSION['location'] == 'All' && !isset($_SESSION['dbType']) && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
          // echo 'sdf--- '.$off;
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search1C($cat, $status, $off, $search);
          }else{
            $fetchPost = $get->allPostListerOnColumen($cat, $status, $off);
          }
        }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $status != ' ' && $_SESSION['location'] == 'All' && !isset($_SESSION['dbType'])){ //dynamic colomen and arg with location selected
          $dyCol = $_SESSION['dyCol'];
          $dyArg = $_SESSION['dyArg'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search1C($cat, $dyCol, $dyArg, 'address', $_SESSION['location'], $search);
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off , $dyCol, $dyArg);
          }
        }
        
        elseif($status != ' ' && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){ // for location based output
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search2C($cat, $status, $off, 'address', $_SESSION['location'], $search);
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off, 'address', $_SESSION['location']);
          }
        }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $status != ' ' && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
          $dyCol = $_SESSION['dyCol'];
          $dyArg = $_SESSION['dyArg'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search3C($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg, $search);
          }else{
            $fetchPost = $get->allPostListerOn3Columen($cat, $status, $off, 'address', $_SESSION['location'],$dyCol, $dyArg);
          }
        }
        elseif($status == ' ' && isset($_SESSION['dbType']) && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
          $dbType = $_SESSION['dbType'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search1C($cat, 'type', $dbType,$search);
          }else{
            $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
          }
        }elseif($status == ' ' && isset($_SESSION['dbType']) && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){ // for location based output
          $dbType = $_SESSION['dbType'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search);
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
          }
        }
        elseif($status != ' ' && isset($_SESSION['dbType'])  && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){          
          $dbType = $_SESSION['dbType'];
          if(isset($_SESSION['search'])){ // if search is occured
            $search = $_SESSION['search'];
            $fetchPost = $get->search2C($cat, $status, $off, 'type', $dbType,$search);
          }else{
            $fetchPost = $get->allPostListerOn2Columen($cat, $status, $off, 'type', $dbType);           
          }

        } 
        
        
  ?>
  <br>
  
    <div  class="container">
    </div>
      
      <br>
    <!-- <div id="vc" class="row"> -->


  <?php
      if($fetchPost->num_rows != 0){
            while($row = $fetchPost->fetch_assoc()){

              if(!in_array($row['id'], $_SESSION['userScroll'])){
                $pid = $row['id'];
              ?>
              

        
              <div  class="col-3">
            <div class="card mb-4 box-shadow">
            
            <a class="img-thumbnail stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>&type=<?php echo $_SESSION['type'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

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
 
            
            <?php



        }



        

        elseif(isset($_SESSION['cat'])){
          if($_SESSION['cat'] == 'vacancy'){
            $cat = $_SESSION['cat'];
            if(isset($_SESSION['dbType']) && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat, 'type', $dbType ,$search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
              }
            }elseif(isset($_SESSION['dbType']) && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'],$search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
              }
            }elseif($_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->searchC($cat, $search);
              }else{
                $fetchPost = $get->allPostListerOnTable($cat);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
              }
            }
            elseif($_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
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
          elseif($_SESSION['cat'] == 'tender'){
            $cat = $_SESSION['cat'];
            if(isset($_SESSION['dbType']) && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat, 'type', $dbType, $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'type', $dbType );
              }
            }elseif(isset($_SESSION['dbType']) && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search2C($cat, 'type', $dbType, 'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'type', $dbType, 'address', $_SESSION['location'] );
              }
            }
            elseif($_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->searchC($cat, $search);
              }else{
                $fetchPost = $get->allPostListerOnTable($cat);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
              }
            }
            
            elseif($_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
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
        if(isset($_SESSION['cat']) && $_SESSION['cat'] == 'blog'){
          // echo 'yer';
          $cat = $_SESSION['cat'];
          if(isset($_SESSION['dbType']) ){
            $dbType = $_SESSION['dbType'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search1C($cat, 'title', $dbType , $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'title', $dbType );
            }
          }
          elseif(isset($_SESSION['search'])){
            // if search is occured
              $search = $_SESSION['search'];
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
        if(isset($_SESSION['type'], $_SESSION['arg'], $_SESSION['label'], $_SESSION['cat'])){
          if($_SESSION['type'] == 'house'){


            $cat = $_SESSION['cat'];
            $cat = $_SESSION['cat'];
            // $status = $_SESSION['status'];
            $arg = $_SESSION['arg'];
            $label = $_SESSION['label'];

          
            if(isset($_SESSION['dbType']) && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
            $dbType = $_SESSION['dbType'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, $search);
            }else{
              $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType); 
            }
            }elseif(isset($_SESSION['dbType']) && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search4C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn4Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location']); 
              }
            }elseif($_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search2C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search3C($cat,$dyCol, $dyArg, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg,$dyCol, $dyArg);
              }
            }
            
            
            elseif($_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search3C($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search4C($cat,$dyCol, $dyArg,'address', $_SESSION['location'],'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn4Columen($cat,$dyCol, $dyArg,'houseOrLand', 'HOUSE', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
              }
            }
            
            
  ?>
  <br>
    <div  class="container">
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
          if($_SESSION['type'] == 'land'){

            
            $cat = $_SESSION['cat'];
            // $status = $_SESSION['status']; 
            $arg = $_SESSION['arg'];
            $label = $_SESSION['label'];

            if(isset($_SESSION['dbType'])&& $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType); 
              }
            }if(isset($_SESSION['dbType'])&& $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
              $dbType = $_SESSION['dbType'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search4C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn4Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'type', $dbType, 'city', $_SESSION['location']); 
              }
            }elseif($_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search2C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search);
              }else{
                $fetchPost = $get->allPostListerOn2Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] == 'All'  ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search3C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell' , $arg,$dyCol, $dyArg);
              }
            }

            elseif($_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search3C($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn3Columen($cat, 'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
              }
            }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
              $dyCol = $_SESSION['dyCol'];
              $dyArg = $_SESSION['dyArg'];
              if(isset($_SESSION['search'])){ // if search is occured
                $search = $_SESSION['search'];
                $fetchPost = $get->search4C($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location'], $search);
              }else{
                $fetchPost = $get->allPostListerOn4Columen($cat,$dyCol, $dyArg,'houseOrLand', 'LAND', 'forRentOrSell', $arg, 'city', $_SESSION['location']);
              }
            }
            
            
  ?>
  <br>
    <div  class="container">
    
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
        if(isset($_SESSION['cat'], $_SESSION['type'], $_SESSION['label'])){
          $cat = $_SESSION['cat'];
          $type = $_SESSION['type'];
          $label = $_SESSION['label'];

          if($type == "homeTutor" && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) || $type == 'zebegna' && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->searchC($cat, $search);
            }else{
              $fetchPost = $get->allPostListerOnTable($cat);
            }
          }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "homeTutor" && $_SESSION['location'] == 'All' || isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == 'zebegna' && $_SESSION['location'] == 'All'){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search1C($cat,$dyCol, $dyArg, $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat,$dyCol, $dyArg);
            }
          }
          
          
          elseif($type == "homeTutor" && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])  || $type == 'zebegna' && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search1C($cat, 'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'address', $_SESSION['location']);
            }
          }
          elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "homeTutor" && $_SESSION['location'] != 'All' || isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == 'zebegna' && $_SESSION['location'] != 'All'){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat,$dyCol, $dyArg , 'address', $_SESSION['location'] , $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,  'address', $_SESSION['location']);
            }
          }
          
          elseif($type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOUSE', $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOUSE');
            }
          }
          elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "houseWorker" && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg']) ){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE', $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE');
            }
          }
          elseif($type == "houseWorker" && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, 'hotelOrHouse', 'HOUSE',  'address', $_SESSION['location']);
            }
          }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "houseWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search3C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOUSE' ,  'address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn3Columen($cat,$dyCol, $dyArg, 'hotelOrHouse', 'HOUSE',   'address', $_SESSION['location']);
            }
          }
          
          elseif($type == "hotelWorker" && $_SESSION['location'] == 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search1C($cat, 'hotelOrHouse', 'HOTEL', $search);
            }else{
              $fetchPost = $get->allPostListerOnColumen($cat, 'hotelOrHouse', 'HOTEL');
            }
          }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] == 'All' ){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL');
            }
          }
          
          
          elseif($type == "hotelWorker" && $_SESSION['location'] != 'All' && !isset($_SESSION['dyCol'], $_SESSION['dyArg'])){
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location'], $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat, 'hotelOrHouse', 'HOTEL','address', $_SESSION['location']);
            }
          }elseif(isset($_SESSION['dyCol'], $_SESSION['dyArg']) && $type == "hotelWorker" && $_SESSION['location'] != 'All' ){ //dynamic colomen and arg with location selected
            $dyCol = $_SESSION['dyCol'];
            $dyArg = $_SESSION['dyArg'];
            if(isset($_SESSION['search'])){ // if search is occured
              $search = $_SESSION['search'];
              $fetchPost = $get->search2C($cat,$dyCol, $dyArg ,'hotelOrHouse', 'HOTEL', $search);
            }else{
              $fetchPost = $get->allPostListerOn2Columen($cat,$dyCol, $dyArg,'hotelOrHouse', 'HOTEL');
            }
          }

          
          ?>
          <br>
          <div  class="container">
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

