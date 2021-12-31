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

  if(isset($_GET['cat'], $_GET['postId'], $_GET['label'])){
    $type = $_GET['cat'];
    $pid = $_GET['postId'];
    $label = $_GET['label'];
    $fetch = $get->aSinglePostView($pid, $type);

    while($row = $fetch->fetch_assoc()){

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
                                <div class="carousel-item w-200 p-3 active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item w-200 p-3">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item w-200 p-3">
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
      if($_GET['cat'] == 'ad' && $_GET['label'] != 'Big Discount Advertisment'){
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
                                <div class="carousel-item w-200 p-3 active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item w-200 p-3">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($row['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item w-200 p-3">
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

    }

  /////////////big discount
  if($_GET['label'] == 'Big Discount Advertisment'){
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
                            <div class="carousel-item w-200 p-3 active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item w-200 p-3">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item w-200 p-3">
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
  if($_GET['type'] == 'house'){
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
                            <div class="carousel-item w-200 p-3 active">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                            </div>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[1])){
                                ?>
                            <div class="carousel-item w-200 p-3">
                            <img class="d-block w-100" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                            </div>
                                <?php
                            }
                            ?>

                            <?php
                            $p = $admin->photoSplit($row['photoPath1']);
                            if(!empty($p[2])){
                                ?>
                            <div class="carousel-item w-200 p-3">
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
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Fixed or Negossioable: </label> <?php echo $row['fixidOrN'] ?></p>
          <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Description : </label><?php echo $row['info'] ?></p>
          <p class="card-text"> <?php echo $row['cost'] ?><small class="text-muted">Br</small></p>
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

  }

?>

<hr>

<h2>Related <?php echo $label ?></h2>
<hr>

 <div class="album py-5 bg-light">
    <div id="recent" class="container-fluid">
      

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
       <?php 


       
       if(isset($_GET['cat'])){
          $cat = $_GET['cat'];
          $fetch23 = $get->allPostListerOnTable($cat);
          while($row2 = $fetch23->fetch_assoc()){


              ?>
              
  
        
          <div class="col-2">
            <div class="card shadow-sm">
            <a > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
  
              <div class="card-body">
                <h5 class="card-title text-center">  <?php echo $row2['title'] ?></h5>
                <?php 
                if($cat != 'charity'){
  ?>
                <h6 class="card-text"><span class="text-danger small"><?php echo $row2['price'] ?> Birr</span> </h6>
  
  <?php
                }
                $date = $get->time_elapsed_string($row2['postedDate']);
                $pid = $row2['id'];
                ?>
                
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-text">Location: <?php echo $row2['address'] ?></h6>
                   <!-- <a href="<?php echo './Description.php?cat='.$cat.'&postId='.$row2['id'] ?>">View</a> -->
  
                  
                </div>
                <span class="text-danger small"><?php echo $date ?></span><br> <span class="text-right float-right"><?php echo $row2['view'] ?>Views</span>
                <a href="./Description.php?cat=<?php echo $cat;?>&postId=<?php echo $pid;?>&label=<?php echo $label;?>"> view</a>
              </div>
            </div>
          </div>
       
      
    
  
              <?php
              }

          
       }
       
       ?>
      </div>
    </div>
  </div>
  
<?php
include 'includes/footer.php';
?>