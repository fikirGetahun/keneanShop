<?php
include "includes/header.php";
include "includes/secnav.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
	?>
	<style>
.zoom {
  padding: 50px;
  transition: transform .3s; /* Animation */
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
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
    $fetch = $get->aSinglePostView($pid, $type);

    $row = $fetch->fetch_assoc();

      ?>
      <?php
      ?> 
        <h2><?php echo $label; ?></h2>
      <?php

      /////////////////////////////////////car post description ///////////////
      if($_GET['cat'] == 'car'){
        // to add aview count to this post
        $viewadd = $get->viewAdder($type, $pid);

        ?>
        
      <div class="container"> 
        <div class="card mb-3">
        <div class="row g-0 w-150 p-3">
          <div class="col-md-4">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For Rent or Sell: </label> <?php echo $row['forRentOrSell'] ?></p>

              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Status: </label><?php echo $row['status'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fule Kind:</label>< <?php echo $row['fuleKind'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Transmission: </label><?php echo $row['transmission'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">KM: </label> <?php echo $row['km'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Body Status: </label> <?php echo $row['bodyStatus'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixidOrN'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
              <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
              <p class="card-text">Phone No:<span class="fw-bolder">0910289422</span> </p>
              <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
              </div>

                <div class="d-flex justify-content-between align-items-center">
                  <?php
                  $date = $get->time_elapsed_string($row['postedDate']);
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
        $viewadd = $get->viewAdder($type, $pid);

        ?>
        
      <div class="container"> 
        <div class="card mb-3">
        <div class="row g-0 w-150 p-3">
          <div class="col-md-4">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
              <?php 
              if($row['for'] != ' '){
                ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p><?php
              }
              ?>
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Phone :</label> <?php echo $row['phone'] ?></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
              <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
              <p class="card-text">Phone No:<span class="fw-bolder"><?php echo $row['phone'] ?></span> </p>
              <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
              </div>

                <div class="d-flex justify-content-between align-items-center">
                  <?php
                  $date = $get->time_elapsed_string($row['postedDate']);
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

      
      ?>

      <?php

    // }

  /////////////big discount
  if($_GET['type'] == 'big'){
    // to add aview count to this post
    $viewadd = $get->viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <?php 
          if($row['for'] != ' '){
            ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p><?php
          }
          ?>
           <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Phone :</label> <?php echo $row['phone'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder"><?php echo $row['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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


  //////////////////house post
  if(isset($_GET['type']) && $_GET['type'] == 'house'){
    // to add aview count to this post
    $viewadd = $get->viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For Rent or Sell: </label> <?php echo $row['forRentOrSell'] ?></p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">City: </label><?php echo $row['city'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda:</label>< <?php echo $row['wereda'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area: </label><?php echo $row['area'] ?> MeterSquare</p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Bed Room:</label> <?php echo $row['bedRoomNo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Bath Room: </label> <?php echo $row['bathRoomNo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixedOrN'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['cost'] ?><small class="text-muted">Br</small></p>
          <p class="card-text">Phone No:<span class="fw-bolder">0910289422</span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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


  //////// land post////
  if(isset($_GET['type']) && $_GET['type'] == 'land'){
    // to add aview count to this post
    $viewadd = $get->viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For Rent or Sell: </label> <?php echo $row['forRentOrSell'] ?></p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Item Provider :</label> <?php echo $row['ownerBroker'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">City: </label><?php echo $row['city'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda:</label>< <?php echo $row['wereda'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area: </label><?php echo $row['area'] ?> MeterSquare</p>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixedOrN'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['cost'] ?><small class="text-muted">Br</small></p>
          <p class="card-text">Phone No:<span class="fw-bolder">0910289422</span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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
  ///////////////////////////electronics/////////////
  if($_GET['cat'] == 'electronics'){
    // to add aview count to this post
    $viewadd = $get->viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Status: </label><?php echo $row['status'] ?></p>
        <?php
          if(($row['ram'] != " " && $row['core'] != " " && $row['processor'] != " " && $row['size']  != " " )){
            ?>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Ram: </label><?php echo $row['ram'] ?></p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Core: </label><?php echo $row['core'] ?></p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Processor: </label><?php echo $row['processor'] ?></p>
            <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Size: </label><?php echo $row['size'] ?></p>
            <?php
          }
        
        ?>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder">0910289422</span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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


  ////////////////////////charity bithch
  if($_GET['cat'] == 'charity'){
    // to add aview count to this post
    $viewadd = $get->viewAdder($type, $pid);

    ?>
    
  <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0 w-150 p-3">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[2] ;?>" alt="Third slide">
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
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo $row['title'] ?></h5>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>


          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text">Phone No:<span class="fw-bolder"><?php echo $row['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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

/////////////////vacancy 
if($_GET['cat'] == 'vacancy'){
  // to add aview count to this post
  $viewadd = $get->viewAdder($type, $pid);

  ?>
  
<div class="container"> 
  <div class="card mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-md-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
                  <?php echo $row['type'] ?>
                  <?php 
                    $date = $get->time_elapsed_string($row['postedDate']);
                    // $sdate = $get->time_elapsed_string($row['startingDate']);
                    $dt = new DateTime($row['postedDate']);

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
                      <h5 class="card-title"><?php echo $row['companyName'] ?></h5>
                      
                      <h5>Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></h5>
                      <h5>Location: <?php echo $row['address'] ?></p></h5>
                      <p><small class="text-muted">Phone: <?php echo $row['phone'] ?> </small></p>

                  </div>

                    <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                  </div>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-warning">Fav</a>
                              </div>
                            </div>
                </div>
              </div>

          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = $get->time_elapsed_string($row['postedDate']);
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

///////////tender////////
if($_GET['cat'] == 'tender'){
  // to add aview count to this post
  // $type = $_GET['cat'];
  $viewadd = $get->viewAdder($type, $pid);

  ?>
  
<div class="container"> 
  <div class="card mb-3">
  <div class="row g-0 w-150 p-3">
    <div class="col-md-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
        <h5 class=" text-center"><?php echo $row['title'] ?></h5>
        <div class="card">
                <div class="card-header">
                  <?php echo $row['type'] ?>
                  <?php 
                    $date = $get->time_elapsed_string($row['postedDate']);
                    $sdate = $get->time_elapsed_string($row['startingDate']);
                    $dt = new DateTime($row['postedDate']);
                    $snow = new DateTime();
                    $now = new DateTime();
                    $future_date = new DateTime($row['postedDate']);
                    $future_date2 = new DateTime($row['startingDate']);
                    $sinterval = $future_date2->diff($snow);
                   

                    $interval = $future_date->diff($now);

                    

                    ;
                  ?>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                    <h5>Starting Date: <span class="text-danger"><?php echo $sinterval->format("%a days, %h hours") ?></span></h5>
                      <h5>Deadline: <span class="text-danger"><?php echo $interval->format("%a days, %h hours") ?></span></h5>
                      <h5>Location: <?php echo $row['address'] ?></p></h5>
                      <p><small class="text-muted">Phone: <?php echo $row['phone'] ?> </small></p>

                  </div>

                    <small class="text-muted">Posted: <span class="text-success"><?php echo $date; ?></span></small>
                  </div>
                  
                  <p class="card-text"><span class="fw-bolder">Job Description: </span><?php echo $row['info'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-warning">Fav</a>
                              </div>
                            </div>
                </div>
              </div>

          <div class="d-flex justify-content-between align-items-center">
            <?php
            $date = $get->time_elapsed_string($row['postedDate']);
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


if(isset($_GET['cat'], $_GET['postId'], $_GET['type'], $_GET['label'])){
  if($_GET['type'] == 'homeTutor'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = $get->viewAdder($cat, $pid);

    ?>
    
    <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Educational Background :</label> <?php echo $row['eduBackground'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Range Grade: </label><?php echo $row['clientRange'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Payment:</label>< <?php echo $row['paymentStatus'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price: </label><?php echo $row['Price'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['companyInfo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['Price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder"> <?php echo $row['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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


  ////// zebegna
  if($_GET['type'] == 'zebegna'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = $get->viewAdder($cat, $pid);

    ?>
    
    <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Status: </label><?php echo $row['workStat'] ?></p>
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['companyInfo'] ?></p> -->
          <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p> -->
          <!-- <p class="card-text"> <?php echo $row['Price'] ?><small class="text-muted">Br</small></p> -->
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder"> <?php echo $row['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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

  //////hotel job seeker
  if($_GET['type'] == 'hotelWorker'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = $get->viewAdder($cat, $pid);

    ?>
    
    <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
  <?php 
  $getphone = $get->allPostListerOnColumen('user', 'id', $_SESSION['userId'] );
  $phoneU = $getphone->fetch_assoc();
  
  ?>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Field :</label>< <?php echo $row['field'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['agentInfo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ?  ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder"> <?php echo $phoneU['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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

  /////// house worker
  if($_GET['type'] == 'houseWorker'){
    $cat = $_GET['cat'];
    $type = $_GET['type'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $viewadd = $get->viewAdder($cat, $pid);

    ?>
    
    <div class="container"> 
    <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol  class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div  class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>
                        </div>

      </div>
  </div>
  <?php 
  $getphone = $get->allPostListerOnColumen('user', 'id', $_SESSION['userId'] );
  $phoneU = $getphone->fetch_assoc();
  
  ?>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-center">Full Name: <?php echo $row['name'] ?></h5>

          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Gender :</label> <?php echo $row['sex'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Religion :</label>< <?php echo $row['religion'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php echo $row['agentInfo'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ?  ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
          <p class="card-text"> <?php echo $row['price'] ?><small class="text-muted">Br</small></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
          <p class="card-text">Phone No:<span class="fw-bolder"> <?php echo $phoneU['phone'] ?></span> </p>
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-warning">Add To Fav</button>
          </div>

            <div class="d-flex justify-content-between align-items-center">
              <?php
              $date = $get->time_elapsed_string($row['postedDate']);
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

}


  }

?>

<?php

if($_GET['cat'] != 'vacancy' && $_GET['cat'] != 'tender'){


?>

<hr>
<h2>Related <?php echo $label ?></h2>
<hr>

 <div class="album py-5 bg-light ">
    <div id="recent" class="container-fluid ">
      

      <div class="row  row-cols-md-4 ">
       <?php 


       
       if(isset($_GET['cat'])){
          $cat = $_GET['cat'];
          $fetch23 = $get->allPostListerOnTable($cat);
          while($row2 = $fetch23->fetch_assoc()){


              ?>
              
  
        
          <div class="row-col-sm-12 row-col-md-6 row-col-3">
            <div class="card shadow-sm">
            <?php 
            if(!isset($_GET['type'])){
              ?>            
              <a class="stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $row2['id'];?>&label=<?php echo $label;?>"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
              <?php
            }elseif(isset($_GET['type'])){
              ?>
              <a class="stretched-link" href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $row2['id'];?>&label=<?php echo $label;?>&type=<?php echo $_GET['type'] ?>"> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
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
                <h6 class="card-text"><span class="text-danger small"><?php echo $row2['price'] ?> Birr</span> </h6>
  
  <?php
                }elseif(isset($_GET['type']) && $type == 'house' || $type == 'land'){
                  ?>
                  <h6 class="card-text"><span class="text-danger small"><?php echo $row2['cost'] ?> Birr</span> </h6>
                  
                  <h6 class="card-text">Location: <?php echo $row2['city'] ?></h6><?php
                }
                $date = $get->time_elapsed_string($row2['postedDate']);
                $pid = $row2['id'];
                ?>

                <div class="d-flex justify-content-between align-items-center">
                  <?php
                    if(!isset($_GET['type'])){
                      ?>
                      <h6 class="card-text">Location: <?php echo $row2['address'] ?></h6>
                      <?php
                    }
                  
                  ?>
                
                   <!-- <a href="<?php echo './Description.php?cat='.$cat.'&postId='.$row2['id'] ?>">View</a> -->
  
                  
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
  </div>
  
<?php
include 'includes/footer.php';
?>