<?php
include "includes/lang.php";
include "includes/header.php";
include "includes/secnav.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
// ob_start();

// session_start();
	?>
	<style>

/* .:hover { */
  /* transform: scale(1.5);  */
  /* (150%  - Note: if the  is too large, it will go outside of the viewport) */
/* } */
</style>

<script>
  $(document).ready(function(){
  //   $(window).scroll(function(){
  //   if($(window).scrollTop() >= $('#recent').offset().top + $('#recent').outerHeight() - window.innerHeight +100 ){
  //     // alert('scroll')




  //     $.ajax({
  //       url:'user/userScrollView.php',
  //       type: 'GET', 
  //       data : 'types=good',
  //       success: function(data){
  //         $('#recent').append(data)
  //       }
  //     })
  //   }
  // })

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php 

  if(isset($_GET['cat'], $_GET['postId'], $_GET['label'], $_GET['type'])){
    $type = $_GET['cat'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $tt = $_GET['type'];
    $fetch = aSinglePostView($pid, $type);    
        
    $row = $fetch->fetch_assoc();

      ?>
      <?php
      ?> 
        <h2><?php echo $label; ?></h2>
        <div class="row" style="width: 100%;">
          <div class="col-9">
      <?php

      /////////////////////////////////////car post description ///////////////
      if($_GET['cat'] == 'car'){
        // to add aview count to this post
        $viewadd = viewAdder($type, $pid);

        ?>
        
      <div class="container-fluid"> 
        <div class=" mb-3">
        <div class="row g-0 w-150 p-3">
 
          <div class="col-md-6 col-sm-12">
          <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>



                                <?php
                                $p = photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div> 
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Purpose: </label> <?php echo $row['forRentOrSell'] ?></p>

              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
              <?php
                
                if($_SESSION['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR'){
                  ?>
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p>

                  <?php
                }else{
                  ?>
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Status: </label><?php echo $row['status'] ?></p>

                  <?php
                }
                  
              ?>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Status: </label><?php echo $row['status'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fule Kind:</label>< <?php echo $row['fuleKind'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Transmission: </label><?php echo $row['transmission'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">KM: </label> <?php echo $row['km'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Body Status: </label> <?php echo $row['bodyStatus'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixidOrN'] ?></p>

              <p class="card-text"> <?php echo  number_format($row['price']) ?><small class="text-muted"> Br</small></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
              <p class="card-text">Phone No:<span class="fw-bolder">+251933418787</span> </p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

                  <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>

                <div class="d-flex justify-content-between align-items-center">
                  <?php
                  $date = time_elapsed_string($row['postedDate']);
                  ?>
                  <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                    <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                    </div>

            </div>
          </div>
        </div>
      </div>
  </div>
        <?php
      }

      //////////////////////////////ad post 
      if($_GET['type'] == 'product'){
        // to add aview count to this post
        $viewadd = viewAdder($type, $pid);

        ?>
        
      <div class="container-fluid"> 
        <div class="mb-3">
        <div class="row g-0 w-150 p-3">
          <div class="col-6 col-sm-12 col-md-6">
          <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>  
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
              <?php 
              if($row['for'] != ' '){
                ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p><?php
              }
              ?>
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Phone :</label> <?php echo $row['phone'] ?></p>

              <p class="card-text"> <?php echo number_format($row['price']) ?><small class="text-muted"> Br</small></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
              <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
              <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
              </div>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
                <div class="d-flex justify-content-between align-items-center">
                  <?php
                  $date = time_elapsed_string($row['postedDate']);
                  ?>
                  <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                    <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                    </div>

            </div>
          </div>
        </div>
      </div>
  <!-- </div> -->
        <?php
      }

      
      ?>

      <?php

    // }

  /////////////big discount
  if($_GET['type'] == 'big'){
    // to add aview count to this post
    $viewadd = viewAdder($type, $pid);

    ?>
    
  <div class="container-fluid"> 
    <div class=" mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-6 col-sm-12 col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>  
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <?php 
          if($row['for'] != ' '){
            ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p><?php
          }
          ?>
           <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Phone :</label> <?php echo $row['phone'] ?></p>

          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder">+251933418787</span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
    <?php
  }


  //////////////////house post
  if(isset($_GET['type']) && $_GET['type'] == 'house'){
    // to add aview count to this post
    $viewadd = viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="mb-3">
    <div class="row g-0 w-100 p-3">
      <div class="col-md-6 col-sm-12 col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>  
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"> </label> <?php echo $row['forRentOrSell'] ?></p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p> -->
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">City: </label><?php echo $row['city'] ?></p>
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda:</label>< <?php echo $row['wereda'] ?></p> -->
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area: </label><?php echo $row['area'] ?> MeterSquare</p>
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Bed Room:</label> <?php echo $row['bedRoomNo'] ?></p> -->
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Bath Room: </label> <?php echo $row['bathRoomNo'] ?></p> -->
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixedOrN'] ?></p>
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p> -->
          <p class="card-text"> <?php echo number_format($row['cost']) ?><small class="text-muted"> Br</small></p>
           <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">
              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
    <?php
  }


  //////// land post////
  if(isset($_GET['type']) && $_GET['type'] == 'land'){
    // to add aview count to this post
    $viewadd = viewAdder($type, $pid);

    ?>
    
  <div class="container-fluid"> 
    <div class="mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item ">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>  
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For Rent or Sell: </label> <?php echo $row['forRentOrSell'] ?></p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">City: </label><?php echo $row['city'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda:</label>< <?php echo $row['wereda'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area: </label><?php echo $row['area'] ?> MeterSquare</p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixedOrN'] ?></p>

          <p class="card-text"> <?php echo number_format($row['cost']) ?><small class="text-muted"> Br</small></p>
           <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
    <?php
  }
  ///////////////////////////electronics/////////////
  if($_GET['cat'] == 'electronics'){
    // to add aview count to this post
    $viewadd = viewAdder($type, $pid);

    ?>
    
  <div class="container-fluid"> 
    <div class="mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>  
                        
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type : </label> <?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Status: </label><?php echo $row['status'] ?></p>
        <?php
          if(($row['ram'] != " " && $row['core'] != " " && $row['processor'] != " " && $row['size']  != " " )){
            ?>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Ram: </label><?php echo ' '.$row['ram'] ?> GB</p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Core: </label><?php echo ' '.$row['core'] ?> </p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Processor: </label><?php echo ' '.$row['processor'] ?> Ghz</p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Size: </label><?php echo ' '.$row['size'] ?> Inch</p>
            <?php
          }
        
        ?>

       
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"> <?php echo $lang['labelPrice'] ?> : </label>  <?php echo  ' '.number_format($row['price'])  ?><small class="text-muted"> Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo ' '.$row['address'] ?></span> </p>
           <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo ' '.$row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
    <?php
  }


  ////////////////////////charity bithch
  if($_GET['cat'] == 'charity'){
    // to add aview count to this post
    $viewadd = viewAdder($type, $pid);

    ?>
    
  <div class="container-fluid"> 
    <div class="mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>  
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>


           <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
    <?php
  }

/////////////////vacancy 
if($_GET['cat'] == 'vacancy'){
  // to add aview count to this post
  $viewadd = viewAdder($type, $pid);

  ?>
  
<div class="container-fluid"> 
  <div class=" mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-md-4">
    <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                      <ol  class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>

                      </ol>
                      <div  class="carousel-inner">
                          <div class="carousel-item active">
                          <img class="d-block w-100" src="admin/assets/img/zumra.png" alt="First slide">
                          </div>

                      </div>

                      </div>  
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
        <div class="card">
                <div class="card-header">
                <h5 class="card-title"><?php echo $row['companyName'] ?></h5>

                  <?php 
                    $date = time_elapsed_string($row['postedDate']);
                    // $sdate = time_elapsed_string($row['startingDate']);
                    $dt = new DateTime($row['postedDate']);

                    $dated=date_create($row['postedDate']);
                    $exdate = date_format($dated,"F j, Y ");


                    $now = new DateTime();
                    $future_date = new DateTime($row['postedDate']);

                    $snow = new DateTime();

                    $interval = $future_date->diff($now);

                    $sinterval = $future_date->diff($snow);

                    ;
                  ?>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h6>Deadline: <span class="text-danger"><?php echo $exdate ?></span></h6>
                      <h6 class="card-title"> Category: <?php echo $row['type'] ?></h6>
                      <h6 class="card-title"> Job Title : <?php echo $row['title'] ?></h6>
                      <h6 class="card-title"> Type : <?php echo $row['positionType'] ?></h6>
                      <h6 class="card-title"> Gender : <?php echo $row['sex'] ?></h6>
                      <h6 class="card-title"> Requierd Position : <?php echo $row['positionNum'] ?></h6>
                      <h6 class="card-title">Salary : <?php echo $row['salary'] ?></h6>
                      <h6 class="card-title">   <?php echo $row['address'] ?></h6>
                      <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>

          <h6 class="card-title"> Phone: <?php echo $phone ?></h6>

                  </div>

                  </div>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>

                </div>
              </div>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>

                  </div>
          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = time_elapsed_string($row['postedDate']);
            ?>
            <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
              <small class="text-muted"><?php echo $row['view'] ?> Views</small>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- </div> -->
  <?php
}

///////////tender////////
if($_GET['cat'] == 'tender'){
  // to add aview count to this post
  // $type = $_GET['cat'];
  $viewadd = viewAdder($type, $pid);

  ?>
  
<div class="container-fluid"> 
  <div class="  mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-md-4">
    <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                      <ol  class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>

                      </ol>
                      <div  class="carousel-inner">
                          <div class="carousel-item active">
                            <?php 
                              if($row['photoPath1'] == ' '){
                                ?>
                                <img class="d-block w-100" src="admin/assets/img/zumra.png" alt="First slide">
                                <?php
                              }else{
                                ?>
                          <img class="d-block w-100" src="<?php echo $row['photoPath1'] ?>" alt="First slide">
                                <?php
                              }

                            ?>
            
                          </div>

                      </div>

                      </div>  
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class=" text-center"><?php echo $row['title'] ?></h5>
        <div class="card">
                <div class="card-header">
                <!-- <h5 class="card-title"><?php echo $row['companyName'] ?></h5> -->

                  <?php echo $row['type'] ?>
                  <?php 
                    $date = time_elapsed_string($row['postedDate']);
                    // $sdate = time_elapsed_string($row['startingDate']);
                    $dt = new DateTime($row['postedDate']);

                    $dated=date_create($row['postedDate']);
                    $exdate = date_format($dated,"F j, Y ");
                    $st = date_create(($row['startingDate']));
                    $stdate = date_format($dated,"F j, Y ");

                    $now = new DateTime();
                    $future_date = new DateTime($row['postedDate']);

                    $snow = new DateTime();

                    $interval = $future_date->diff($now);

                    $sinterval = $future_date->diff($snow);

                    ;
                  ?>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                    <h6>Starting Date: <span class="text-danger"><?php echo $stdate ?></span></h6>
             
                      <h6>Deadline: <span class="text-danger"><?php echo $exdate ?></span></h6>

                      <h6>Location: <?php echo $row['address'] ?></p></h6>
                     
                      <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p><small class="text-muted">Phone:<?php echo $phone ?></small></p>

                  </div>

                    <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                  </div>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
          
                </div>
              </div>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
 
                  </div>
          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = time_elapsed_string($row['postedDate']);
            ?>
            <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
              <small class="text-muted"><?php echo $row['view'] ?> Views</small>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- </div> -->
  <?php
}


if(isset($_GET['cat'], $_GET['postId'], $_GET['type'], $_GET['label'])){
  if($_GET['type'] == 'homeTutor'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = viewAdder($cat, $pid);

    ?>
    
    <div class="container-fluid"> 
    <div class=" mb-3">
    <div class="row g-0">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Educational Background :</label> <?php echo $row['eduBackground'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Range Grade: </label><?php echo $row['clientRange'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Payment:</label>< <?php echo $row['paymentStatus'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price: </label><?php echo $row['Price'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['companyInfo'] ?></p>

          <p class="card-text"> <?php echo  number_format($row['Price']) ?><small class="text-muted"> Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
    <!-- </div> -->
    <?php

  }


  ////// zebegna
  if($_GET['type'] == 'zebegna'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = viewAdder($cat, $pid);

    ?>
    
    <div class="container-fluid"> 
    <div class=" mb-3">
    <div class="row g-0">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Position: </label><?php echo $row['workStat'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Hour: </label><?php echo $row['workHour'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ?  ANSWER: </label><?php echo $row['bid'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Do you own Lageal Weapon ?  ANSWER: </label><?php echo $row['weapon'] ?></p>

          
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['companyInfo'] ?></p> -->
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p> -->
          <!-- <p class="card-text"> <?php echo $row['Price'] ?><small class="text-muted">Br</small></p> -->
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
    <!-- </div> -->
    <?php

  }

  //////hotel job seeker
  if($_GET['type'] == 'hotelWorker'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = viewAdder($cat, $pid);

    ?>
    
    <div class="container-fluid"> 
    <div class=" mb-3">
    <div class="row g-0">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li> 
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
  <?php 
  $getphone = allPostListerOnColumen('user', 'id', $_SESSION['userId'] );
  $phoneU = $getphone->fetch_assoc();
  
  ?>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Field :</label>< <?php echo $row['field'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['agentInfo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ?  ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
          <p class="card-text"> <?php echo number_format($row['price']) ?><small class="text-muted"> Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
    <!-- </div> -->
    <?php

  }

  /////// house worker
  if($_GET['type'] == 'houseWorker'){
    // echo $_SERVER['REQUEST_URI'];
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = viewAdder($cat, $pid);

    ?>
    
    <div class="container-fluid"> 
    <div class=" mb-3">
    <div class="row g-0">
      <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide w-90" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>

      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Religion :</label>< <?php echo $row['religion'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['agentInfo'] ?></p>
          <p class="card-text"> <?php echo number_format($row['price']) ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ?  ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <?php
          $s = 251;
          $phone = $row['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $row['phone'];
          }else{
            $phone= $row['phone'];
          }
          ?>
          <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>

 
          <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
              <div id="msgDiv">

              <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                  ?>
                  </div>
                  </div>
            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = time_elapsed_string($row['postedDate']);
              ?>
              <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
                <small class="text-muted"><?php echo $row['view'] ?> Views</small>
                </div>

        </div>
      </div>
    </div>
  </div>
    <!-- </div> -->
    <?php

  }

}


////////////////blog
if($_GET['cat'] == 'blog'){
  $tab = $_GET['cat'];
  $pid = $_GET['postId'];



  $blog = allPostListerOnColumen('blog','id',$pid);
  $row = $blog->fetch_assoc();

  $c = date_create($row['postedDate']);
  $PD = date_format($c, "Y/m/d");

  $recent = allPostListerOnTable('blog');
  ?>
  
  <div class="container-fluid">
    <div class="row row-sm-10">
    <div class="col-10 row-col-sm-12">
      <br>

      <small>Posted: <?php echo $PD ?></small>

      <hr>
      <h1><?php echo $row['frontLabel'] ?></h1>
    <div id="carouselExampleControls" class="carousel slide w-90" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="First slide">
    </div>
    <?php if(!empty($p[1])){
      ?>
    <div class="carousel-item">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Second slide">
    </div>  
      <?php
    } ?>

<?php if(!empty($p[2])){
      ?>
    <div class="carousel-item">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Second slide">
    </div>  
      <?php
    } ?>


<?php if(!empty($p[3])){
      ?>
    <div class="carousel-item">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[3] ;?>" alt="Second slide">
    </div>  
      <?php
    } ?>

<?php if(!empty($p[4])){
      ?>
    <div class="carousel-item">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[4] ;?>" alt="Second slide">
    </div>  
      <?php
    } ?>

<?php if(!empty($p[5])){
      ?>
    <div class="carousel-item">
      <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[5] ;?>" alt="Second slide">
    </div>  
      <?php
    } ?>


  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <h2><?php echo $row['title'] ?></h2>

    <p>

    <?php echo $row['content'] ?>
    </p>

    </div>
    <div class="col-2 d-lg-none d-xl-block">
      <br>
      <br>
      <hr>

    <h4 class="text-center" >Recent Posts</h4>
      <?php
        while($r = $recent->fetch_assoc()){
          ?>
          <a href="./Description.php?cat=blog&label=Blog Post&postId=<?php echo $r['id'] ?>&type= "><h6><?php echo $r['title']; ?></h6></a>
          <?php
        }
      
      ?>
      
    </div>
  </div>
  </div>
  
  
  <?php
}

//// sponcer post discription view

///////// realestate/////////////////
if($_GET['type'] == 'rs'){
  // to add aview count to this post
  $viewadd = viewAdder($type, $pid);

  ?>
  
<div class="container-fluid"> 
  <div class="mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-6 col-sm-12 col-md-6">
    <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                      <ol  class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div  class="carousel-inner">
                          <div class="carousel-item active">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                          </div>

                          <?php
                          $p = photoSplit($row['photoPath1']);
                          if(!empty($p[1])){
                              ?>
                          <div class="carousel-item">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                          </div>
                              <?php
                          }
                          ?>

                          <?php
                          $p = photoSplit($row['photoPath1']);
                          if(!empty($p[2])){
                              ?>
                          <div class="carousel-item">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                          </div>
                              <?php
                          }
                          ?>

                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                      </div>  
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>

        <h5 class="card-title text-center"><?php echo $row['company'] ?></h5>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label>  <?php echo $row['forRentOrSell'] ?></p>


        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['city'] ?></span> </p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Sub City: </label><span><?php echo $row['subCity'] ?></span> </p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda: </label><span><?php echo $row['city'] ?></span> </p>


         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area:</label> <?php echo $row['phone'].' metersquare' ?></p>

         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Floor:</label> <?php echo $row['floor'] ?></p>
         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Email:</label> <?php echo $row['email'] ?></p>
 
        <p class="card-text">Price:  <?php echo number_format($row['price']) ?><small class="text-muted"> Brr</small></p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price Type:</label> <?php echo $row['priceType'] ?></p>
        <?php
    $s = 251;
    $phone = $row['phone'];
    if($phone[0] = 0){
      $phone = $s.$phone;
    }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
      $phone= $row['phone'];
    }else{
      $phone= $row['phone'];
    }
    ?>
    <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
    <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
        <div class="btn-group">
        </div>
        <div class="btn-group">
        <?php
        if(isset($_SESSION['userId'])){
        $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
        // $row = $faz->fetch_assoc();
        // echo $row['fav'];
          if($faz->num_rows > 0){
            ?>
            <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
            <?php
          }else{
            ?>
          <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
            <?php
          }

          ?> 

          <?php
        }
        ?>
        </div>
        <div id="msgDiv">

        <?php
              if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                ?>
            <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                <?php
              }elseif(!isset($_SESSION['userId'])){
                ?>
                <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                <?php
              }
            
            ?>
            </div>
            </div>
          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = time_elapsed_string($row['postedDate']);
            ?>
            <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
              <small class="text-muted"><?php echo $row['view'] ?> Views</small>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- </div> -->
  <?php
}

///// bank stocks and insurance post view
if($_GET['type'] == 'ban' || $_GET['type'] == 'ins'){
  // to add aview count to this post
  $viewadd = viewAdder($type, $pid);

  ?>
  
<div class="container-fluid"> 
  <div class="mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-6 col-sm-12 col-md-6">
    <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
                      <ol  class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div  class="carousel-inner">
                          <div class="carousel-item active">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                          </div>

                          <?php
                          $p = photoSplit($row['photoPath1']);
                          if(!empty($p[1])){
                              ?>
                          <div class="carousel-item">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                          </div>
                              <?php
                          }
                          ?>

                          <?php
                          $p = photoSplit($row['photoPath1']);
                          if(!empty($p[2])){
                              ?>
                          <div class="carousel-item">
                          <img class="d-block w-100 " src="<?php $p = photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                          </div>
                              <?php
                          }
                          ?>

                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                      </div>  
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>

        <h5 class="card-title text-center"><?php echo $row['company'] ?></h5>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label>  <?php echo $row['forRentOrSell'] ?></p>


        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['city'] ?></span> </p>
<!-- 
        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Sub City: </label><span><?php echo $row['subCity'] ?></span> </p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda: </label><span><?php echo $row['city'] ?></span> </p>


         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area:</label> <?php echo $row['phone'].' metersquare' ?></p>

         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Floor:</label> <?php echo $row['floor'] ?></p> -->
         <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Email:</label> <?php echo $row['email'] ?></p>
 
        <p class="card-text">Price:  <?php echo number_format($row['price']) ?><small class="text-muted"> Brr</small></p>

        <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price Type:</label> <?php echo $row['phone'] ?></p>
        <?php
    $s = 251;
    $phone = $row['phone'];
    if($phone[0] = 0){
      $phone = $s.$phone;
    }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
      $phone= $row['phone'];
    }else{
      $phone= $row['phone'];
    }
    ?>
    <p class="card-text">Phone :<span class="fw-bolder"> <?php echo $phone ?></span> </p>
    <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
        <div class="btn-group">
        </div>
        <div class="btn-group">
        <?php
        if(isset($_SESSION['userId'])){
        $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
        // $row = $faz->fetch_assoc();
        // echo $row['fav'];
          if($faz->num_rows > 0){
            ?>
            <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
            <?php
          }else{
            ?>
          <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
            <?php
          }

          ?> 

          <?php
        }
        ?>
        </div>
        <div id="msgDiv">

        <?php
              if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                ?>
            <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-dark text-danger" >Send Message</a>
                <?php
              }elseif(!isset($_SESSION['userId'])){
                ?>
                <a id="msgB" href="login.php" class="btn btn-dark text-danger" >Send Message</a>
                <?php
              }
            
            ?>
            </div>
            </div>
          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = time_elapsed_string($row['postedDate']);
            ?>
            <p class="card-text"><small class="text-muted"><?php echo $date; ?></small></p>
              <small class="text-muted"><?php echo $row['view'] ?> Views</small>
              </div>

      </div>
    </div>
  </div>
</div>
<!-- </div> -->
  <?php
}




  }

?>
  </div>
  <div class="col-2 border">
    <?php include "./includes/descriptionAd.php" ?>
  </div>
        </div>
<?php

if($_GET['cat'] != 'vacancy' && $_GET['cat'] != 'tender' && $_GET['cat'] != 'blog'){


?>

<hr>
<h2>Related <?php echo $label ?></h2>
<hr>

 <div class="album py-5 bg-light ">
    <div id="recent" class="container-fluid">
      

      <div class="row ">
       <?php 


       
       if(isset($_GET['cat'])){
          $cat = $_GET['cat'];
          $fetch23 = allPostListerOnTable($cat);
          while($row2 = $fetch23->fetch_assoc()){


              ?>
              
  
        
          <div class="row-col-3">
            <div class="card shadow-sm">
            <?php 
            if(!isset($_GET['type'])){
              ?>            
              <a class="stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $row2['id'];?>&label=<?php echo $label;?>"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
              <?php
            }elseif(isset($_GET['type'])){
              ?>
              <a class="stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $row2['id'];?>&label=<?php echo $label;?>&type=<?php echo $_GET['type'] ?>"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
              <?php
            }
            ?>
              <div class="card-body">
                <?php 
                if($type != 'homeTutor' && $type != 'zebegna' && $type != 'hotelWorker' && $type != 'houseWorker'){

                  ?>
                  <h5 class="card-title text-center">  <?php echo $row2['title'] ?></h5>

                  <?php
                }elseif($type == 'homeTutor' || $type =='zebegna' || $type == 'hotelWorker' || $type ==='houseWorker'){

                  ?> 
                  <h5 class="card-title text-center">  <?php echo $row2['name'] ?></h5>
                  <?php
                }
               
                
                ?>
                <?php 
                if($cat != 'charity' && !isset($_GET['type'])){
                ?>
                <h6 class="card-text"><span class="text-danger small"><?php echo number_format($row2['price']) ?> Birr</span> </h6>
  
                <?php
                }elseif(isset($_GET['type']) && $type == 'house' || $type == 'land'){
                  ?>
                  <h6 class="card-text"><span class="text-danger small"><?php echo  number_format($row2['cost']) ?> Birr</span> </h6>
                  
                  <h6 class="card-text"><i class="bi bi-geo-alt"></i>  <?php echo $row2['city'] ?></h6><?php
                }
                $date = time_elapsed_string($row2['postedDate']);
                $pid = $row2['id'];
                ?>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row['id'] );
              // $row = $faz->fetch_assoc();
              // echo $row['fav'];
                if($faz->num_rows > 0){
                  ?>
                  <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Added to Fav</a>  
                  <?php
                }else{
                  ?>
                <a type="button" id="fav<?php echo $row['id'] ?>" onclick="fav( '<?php echo $row['id'] ?>', '<?php  echo $_SESSION['userId'] ?>', '<?php echo $cat ?>' )"   class="btn btn-sm btn-outline-warning">Add to Fav</a>
                  <?php
                }

                ?> 

                <?php
              }
              ?>
              </div>
 
                  </div>
                <div class="d-flex justify-content-between align-items-center">
                  <?php
                    if(!isset($_GET['type'])){
                      ?>
                      <h6 class="card-text">Location: <?php echo $row2['address'] ?></h6>
                      <?php
                    }
                  
                  ?>
                
                   <!-- <a href="<?php echo './Description.php?cat='.$cat.'&postId='.$row2['id'] ?>">View</a> -->
  
                   <span class="text-danger small"><?php echo $date ?></span><br> <span class="text-right float-right"><?php echo $row2['view'] ?>Views</span>
                </div>
                <span class="text-danger small"><?php echo $date ?></span><br> <span class="text-right float-right"><?php echo $row2['view'] ?>Views</span>
                <a> view</a>
              </div>
            </div>
          </div>
       
      
    
  
              <?php
              }

          
       }
      }
       
       ?>
      </div>
    </div>

  
<?php
include 'includes/footer.php';
?>