<?php
include "includes/lang.php"; 
include "includes/header.php";
include "includes/secnav.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
?>
<hr>
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

<div class="container-fluid">

	<div class="row">
  <div class="col-md-8"> 
    <?php
      if(isset($_GET['cat'], $_GET['postId'], $_GET['label'], $_GET['type'])){
        $type = $_GET['cat'];
        $pid = $_GET['postId'];
        $label = $_GET['label'];
        $tt = $_GET['type'];
        $fetch = aSinglePostView($pid, $type);    
            
        $row = $fetch->fetch_assoc();

              /////////////////////////////////////car post description ///////////////
if($_GET['cat'] == 'car'){
        // to add aview count to this post
        $viewadd = viewAdder($type, $pid);
        ?>
        

    <div class="container">
				<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
         <?php  $p = photoSplit($row['photoPath1']) ; ?>
          <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Photo  </h5>
                 </div>
              </div>
        <?php
         $p = photoSplit($row['photoPath1']) ;
         $i=1;
         foreach($p as $x){
           if($i!= 1){
            ?>
            <div class="carousel-item" data-bs-interval="20000">
              <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Photo  </h5>
               </div>
            </div>

           <?php
           }
        $i++;
         }
         
         ?>
          <!-- 

        <div class="carousel-item" data-bs-interval="2000">
          <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div> -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
        </div>
        </div><!--container-->
          <div class="container">
            <div class="card">

            <div class="row">
              <div class="col">
                <?php $date = time_elapsed_string($row['postedDate']); ?>
                <small><?php echo $date ?></small>
              </div>
              <div class="col text-end">
                <small class="text-end"><?php echo $row['view'] ?> Views</small>
              </div>
              
            </div>
          <div class="card-header">
        <?php echo $row['title'] ?>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col">
            <?php
              if($_SESSION['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR'){
                ?>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label> <?php echo $row['ownerBroker'] ?></p> <br>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"> </label><?php echo $row['status'] ?></p>
                <?php
              }else{
                ?>
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"> </label><?php echo $row['status'] ?></p>

                <?php
              }
            ?>
            <p>Owner</p>
            
          </div>
          <div class="col">
            <p><?php echo $row['forRentOrSell'] ?></p>
            
          </div>
          
        </div>
      <div class="row">
        <div class="col">
          <p><?php echo $row['type'] ?></p>
          
        </div>
        <div class="col">
          <p><?php echo $row['address'] ?></p>
          
        </div>
        
          </div>
        <div class="row">
          <div class="col">
            <p><?php echo $row['transmission'] ?></p>
            
          </div>
          <div class="col">
            <p><?php echo $row['km'].' km' ?></p>
            
          </div>
          
        </div>
        <div class="row">
          <div class="col">
            <p><?php echo $row['bodyStatus'] ?></p>
            
          </div>
          <div class="col">
            <p><?php echo $row['fixidOrN'] ?></p> 			
          </div>
        </div>
        <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5>
        <p class="card-text"><?php echo $row['info'] ?> </p>

        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <!-- // favourite button  -->
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
              <!-- // mesageing button  -->
                     <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                      ?>
            <button type="button" class="btn btn-outline-dark">Call</button>
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
          
  
      <div class="container">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <?php  $p = photoSplit($row['photoPath1']) ; ?>
          <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Photo  </h5>
                 </div>
              </div>
          <?php
          
           $i=1;
           foreach($p as $x){
             if($i!= 1){
              ?>
              <div class="carousel-item" data-bs-interval="20000">
                <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Photo  </h5>  
                 </div>
              </div>
  
             <?php
             }
          $i++;
           }
           
           ?>
            <!-- 
  
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
          </div>
          </div><!--container-->
            <div class="container">
              <div class="card">
  
              <div class="row">
                <div class="col">
                  <?php $date = time_elapsed_string($row['postedDate']); ?>
                  <small><?php echo $date ?></small>
                </div>
                <div class="col text-end">
                  <small class="text-end"><?php echo $row['view'] ?> Views</small>
                </div>
                
              </div>
            <div class="card-header">
          <?php echo $row['title'] ?>
        </div>
        <div class="card-body">
  
          <div class="row">
            <div class="col">
            <?php 
              if($row['for'] != ' '){
                ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p> <br> <?php
              }
              ?>
              <p><?php echo $row['type'] ?></p>
              
            </div>
            <div class="col">
              <p><?php echo $row['address'] ?></p>
              
            </div>
            
          </div>
        <div class="row">
 

          
            </div>

          <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5>
          <p class="card-text"><?php echo $row['info'] ?> </p>
  
          <div class="btn-group" role="group" aria-label="Basic outlined example">
            <!-- // favourite button  -->
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
                <!-- // mesageing button  -->
                       <?php
                      if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                        ?>
                    <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                        <?php
                      }elseif(!isset($_SESSION['userId'])){
                        ?>
                        <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                        <?php
                      }
                    
                        ?>
              <button type="button" class="btn btn-outline-dark">Call</button>
            </div>
              </div>
            </div>
  
  
            </div>
  
          
          <?php
}
//////////////////big discount post
if($_GET['type'] == 'big'){
           // to add aview count to this post
           $viewadd = viewAdder($type, $pid);
           ?>
           
   
       <div class="container">
           <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
           <div class="carousel-indicators">
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
           </div>
           <?php  $p = photoSplit($row['photoPath1']) ; ?>
           <div class="carousel-inner">
           <div class="carousel-item active" data-bs-interval="10000">
                 <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                 <div class="carousel-caption d-none d-md-block">
                   <h5>Photo  </h5>
                  </div>
               </div>
           <?php
           
            $i=1;
            foreach($p as $x){
              if($i!= 1){
               ?>
               <div class="carousel-item" data-bs-interval="20000">
                 <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                 <div class="carousel-caption d-none d-md-block">
                   <h5>Photo  </h5>  
                  </div>
               </div>
   
              <?php
              }
           $i++;
            }
            
            ?>
             <!-- 
   
           <div class="carousel-item" data-bs-interval="2000">
             <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>Second slide label</h5>
             </div>
           </div>
           <div class="carousel-item">
             <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>Third slide label</h5>
               <p>Some representative placeholder content for the third slide.</p>
             </div>
           </div> -->
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
           </div>
           </div><!--container-->
             <div class="container">
               <div class="card">
   
               <div class="row">
                 <div class="col">
                   <?php $date = time_elapsed_string($row['postedDate']); ?>
                   <small><?php echo $date ?></small>
                 </div>
                 <div class="col text-end">
                   <small class="text-end"><?php echo $row['view'] ?> Views</small>
                 </div>
                 
               </div>
             <div class="card-header">
           <?php echo $row['title'] ?>
         </div>
         <div class="card-body">
   
           <div class="row">
             <div class="col">
             <?php 
               if($row['for'] != ' '){
                 ?> <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">For :</label> <?php echo $row['for'] ?></p> <br> <?php
               }
               ?>
               <p><?php echo $row['type'] ?></p>
               
             </div>
             <div class="col">
               <p><?php echo $row['address'] ?></p>
               
             </div>
             
           </div>
         <div class="row">
  
 
           
             </div>
 
           <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5>
           <p class="card-text"><?php echo $row['info'] ?> </p>
   
           <div class="btn-group" role="group" aria-label="Basic outlined example">
             <!-- // favourite button  -->
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
                 <!-- // mesageing button  -->
                        <?php
                       if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                         ?>
                     <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                         <?php
                       }elseif(!isset($_SESSION['userId'])){
                         ?>
                         <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                         <?php
                       }
                     
                         ?>
               <button type="button" class="btn btn-outline-dark">Call</button>
             </div>
               </div>
             </div>
   
   
             </div>
   
           
           <?php       
}
/////////////////house post
if($_GET['type'] == 'house'){
            // to add aview count to this post
            $viewadd = viewAdder($type, $pid);
            ?>
            
    
        <div class="container">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
             <?php  $p = photoSplit($row['photoPath1']) ; ?>
              <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                    <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>
                     </div>
                  </div>
            <?php
             $p = photoSplit($row['photoPath1']) ;
             $i=1;
             foreach($p as $x){
               if($i!= 1){
                ?>
                <div class="carousel-item" data-bs-interval="20000">
                  <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Photo  </h5>
                   </div>
                </div>
    
               <?php
               }
            $i++;
             }
             
             ?>
              <!-- 
    
            <div class="carousel-item" data-bs-interval="2000">
              <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div> -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
            </div>
            </div><!--container-->
              <div class="container">
                <div class="card">
    
                <div class="row">
                  <div class="col">
                    <?php $date = time_elapsed_string($row['postedDate']); ?>
                    <small><?php echo $date ?></small>
                  </div>
                  <div class="col text-end">
                    <small class="text-end"><?php echo $row['view'] ?> Views</small>
                  </div>
                  
                </div>
              <div class="card-header">
            <?php echo $row['title'] ?>
          </div>
          <div class="card-body">
    
            <div class="row">
              <div class="col">
                <?php
                  if($_SESSION['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR'){
                    ?>
                  <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label> <?php echo $row['ownerBroker'] ?></p> <br>
            
                    <?php
                  }else{
                    ?>
         
    
                    <?php
                  }
                ?>
                <p>Owner</p>
                
              </div>
              <div class="col">
                <p><?php echo $row['forRentOrSell'] ?></p>
                
              </div>
              
            </div>
          <div class="row">
            <div class="col">
              <p><?php echo $row['type'] ?></p>
              
            </div>
            <div class="col">
              <p><?php echo $row['city'] ?></p>
              
            </div>
            
              </div>
            <div class="row">
              <div class="col">
                <p><?php echo $row['area'] ?> MeterSquare</p>
                
              </div>
              <div class="col">
                <p><?php echo $row['fixedOrN'] ?></p>
                
              </div>
              
            </div>
            <div class="row">
              <div class="col">
               <p><?php echo $row['bedRoomNo'] ?> Bed Room</p>
              </div>
              <div class="col">
              <p><?php echo $row['bathRoomNo'] ?>Bath Room</p>
               </div>
            </div>
            <h5 class="card-title"><?php echo  number_format($row['cost']) ?><small>Brr</small></h5>
            <p class="card-text"><?php echo $row['info'] ?> </p>
    
            <div class="btn-group" role="group" aria-label="Basic outlined example">
              <!-- // favourite button  -->
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
                  <!-- // mesageing button  -->
                         <?php
                        if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                          ?>
                      <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                          <?php
                        }elseif(!isset($_SESSION['userId'])){
                          ?>
                          <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                          <?php
                        }
                      
                          ?>
                <button type="button" class="btn btn-outline-dark">Call</button>
              </div>
                </div>
              </div>
    
    
              </div>
    
            
            <?php
}
//////////////land post
if($_GET['type'] == 'land'){
              // to add aview count to this post
              $viewadd = viewAdder($type, $pid);
              ?>
              
      
          <div class="container">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
               <?php  $p = photoSplit($row['photoPath1']) ; ?>
                <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                      <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Photo  </h5>
                       </div>
                    </div>
              <?php
               $p = photoSplit($row['photoPath1']) ;
               $i=1;
               foreach($p as $x){
                 if($i!= 1){
                  ?>
                  <div class="carousel-item" data-bs-interval="20000">
                    <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>
                     </div>
                  </div>
      
                 <?php
                 }
              $i++;
               }
               
               ?>


            <!-- 

              <div class="carousel-item" data-bs-interval="2000">
                  <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                </div> 
              </div>  
              <div class="carousel-item">
                <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>     
              </div> 

            -->

            
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
              </div>
              </div><!--container-->
                <div class="container">
                  <div class="card">
                  <div class="row">
                    <div class="col">
                      <?php $date = time_elapsed_string($row['postedDate']); ?>
                      <small><?php echo $date ?></small>
                    </div>
                    <div class="col text-end">
                      <small class="text-end"><?php echo $row['view'] ?> Views</small>
                    </div>
                    
                  </div>
                <div class="card-header">
              <?php echo $row['title'] ?>
            </div>
            <div class="card-body">   
      
              <div class="row">
                <div class="col">
                  <?php

                    if($_SESSION['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR'){
                      ?>
                    <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label> <?php echo $row['ownerBroker'] ?></p>  <br> 
              
                      <?php
                    }else{
                      ?>
           
      
                      <?php
                    }
                  ?>
                  <p>Owner</p>
                  
                </div>
                <div class="col">
                  <p><?php echo $row['forRentOrSell'] ?></p>
                  
                </div>
                
              </div>
            <div class="row">
              <div class="col">
                <p><?php echo $row['type'] ?></p>
                
              </div>
              <div class="col">
                <p><?php echo $row['city'] ?></p>
                
              </div>
              
                </div>
              <div class="row">
                <div class="col">
                  <p><?php echo $row['area'] ?> MeterSquare</p>
                </div>
                <div class="col">
                  <p><?php echo $row['fixedOrN'] ?></p>
                  
                </div>
                
              </div>
 
              <h5 class="card-title"><?php echo  number_format($row['cost']) ?><small>Brr</small></h5>
              <p class="card-text"><?php echo $row['info'] ?> </p>
      
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <!-- // favourite button  -->
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
                    <!-- // mesageing button  -->
                           <?php
                          if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                            ?>
                        <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                            <?php  
                          }elseif(!isset($_SESSION['userId'])){
                            ?>
                            <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                            <?php
                          }
                        
                            ?>
                  <button type="button" class="btn btn-outline-dark">Call</button>
                </div>
                  </div>
                </div>
      
      
                </div>
      
              
              <?php      
}
////////////////////////charity post
if($_GET['type'] == 'charity'){
              // to add aview count to this post
              $viewadd = viewAdder($type, $pid);
              ?>
              
      
          <div class="container">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <?php  $p = photoSplit($row['photoPath1']) ; ?>
              <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                    <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>
                     </div>
                  </div>
              <?php
              
               $i=1;
               foreach($p as $x){
                 if($i!= 1){
                  ?>
                  <div class="carousel-item" data-bs-interval="20000">
                    <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>  
                     </div>
                  </div>
      
                 <?php
                 }
              $i++;
               }
               
               ?>
                <!-- 
      
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
              </div>
              </div><!--container-->
                <div class="container">
                  <div class="card">
      
                  <div class="row">
                    <div class="col">
                      <?php $date = time_elapsed_string($row['postedDate']); ?>
                      <small><?php echo $date ?></small>
                    </div>
                    <div class="col text-end">
                      <small class="text-end"><?php echo $row['view'] ?> Views</small>
                    </div>
                    
                  </div>
                <div class="card-header">
              <?php echo $row['title'] ?>
            </div>
            <div class="card-body">
      
              <div class="row">
                <div class=" justify-content-start">

                </div>
                <div class="col ">
                  <p><?php echo $row['address'] ?></p>
                </div>
                
              </div>
            <div class="row">
     
    
              
                </div>
    
              <!-- <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5> -->
              <p class="card-text"><?php echo $row['info'] ?> </p>
      
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <!-- // favourite button  -->
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
                    <!-- // mesageing button  -->
                           <?php
                          if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                            ?>
                        <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                            <?php
                          }elseif(!isset($_SESSION['userId'])){
                            ?>
                            <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                            <?php
                          }
                        
                            ?>
                  <button type="button" class="btn btn-outline-dark">Call</button>
                </div>
                  </div>
                </div>
      
      
                </div>
      
              
              <?php
}
/////////////////// vacancy post
if($_GET['type'] == 'vacancy'){
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
///////////////// tender post
if($_GET['type'] == 'tender' ){
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
/////////// home tutor
if($_GET['type'] == 'homeTutor'){
       // to add aview count to this post
       $viewadd = viewAdder($type, $pid);
       ?>
       

   <div class="container">
       <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
       <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
       </div>
        <?php  $p = photoSplit($row['photoPath1']) ; ?>
         <div class="carousel-inner">
         <div class="carousel-item active" data-bs-interval="10000">
               <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
               <div class="carousel-caption d-none d-md-block">
                 <h5>Photo  </h5>
                </div>
             </div>
       <?php
        $p = photoSplit($row['photoPath1']) ;
        $i=1;
        foreach($p as $x){
          if($i!= 1){
           ?>
           <div class="carousel-item" data-bs-interval="20000">
             <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>Photo  </h5>
              </div>
           </div>

          <?php
          }
       $i++;
        }
        
        ?>
         <!-- 

       <div class="carousel-item" data-bs-interval="2000">
         <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h5>Second slide label</h5>
         </div>
       </div>
       <div class="carousel-item">
         <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h5>Third slide label</h5>
           <p>Some representative placeholder content for the third slide.</p>
         </div>
       </div> -->
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
       </div>
       </div><!--container-->
         <div class="container">
           <div class="card">

           <div class="row">
             <div class="col">
               <?php $date = time_elapsed_string($row['postedDate']); ?>
               <small><?php echo $date ?></small>
             </div>
             <div class="col text-end">
               <small class="text-end"><?php echo $row['view'] ?> Views</small>
             </div>
             
           </div>
         <div class="card-header">
       <?php echo $row['name'] ?>
     </div>
     <div class="card-body">

       <div class="row">
         <div class="col">
           <p> <?php echo $row['sex'] ?></p>
           
         </div>
         <div class="col">
           <p><label class="font-weight-bold" for="exampleInputEmail1">Educational Background :</label> <?php echo $row['eduBackground'] ?></p>
           
         </div>
         
       </div>
     <div class="row">
       <div class="col">
         <p><label class="font-weight-bold" for="exampleInputEmail1">Range Grade: </label><?php echo ' '.$row['clientRange'] ?></p>
         
       </div>
       <div class="col">
         <p><label class="font-weight-bold" for="exampleInputEmail1">Payment:</label> <?php echo $row['paymentStatus'] ?></p>
         
       </div>
       
         </div>
       <div class="row">
         <div class="col">
          <p><?php echo $row['address'] ?></p>
           
         </div>
         <div class="col">
           <p><label class="font-weight-bold" for="exampleInputEmail1">Agent Info: </label> <?php if($row['companyInfo'] == ''){echo 'NONE';}else{
             $row['companyInfo'];
           } ?></p>
           
         </div>
         
       </div>
       <div class="row">

       </div>
       <h5 class="card-title"><?php echo  number_format($row['Price']).' Brr' ?></h5>
       <p class="card-text"><?php echo $row['info'] ?> </p>

       <div class="btn-group" role="group" aria-label="Basic outlined example">
         <!-- // favourite button  -->
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
             <!-- // mesageing button  -->
                    <?php
                   if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                     ?>
                 <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                     <?php
                   }elseif(!isset($_SESSION['userId'])){
                     ?>
                     <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                     <?php
                   }
                 
                     ?>
           <button type="button" class="btn btn-outline-dark">Call</button>
         </div>
           </div>
         </div>


         </div>

       
       <?php
}
/////////// zebegna post
if($_GET['type'] == 'zebegna'){
        // to add aview count to this post
        $viewadd = viewAdder($type, $pid);
        ?>
        
 
    <div class="container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
         <?php  $p = photoSplit($row['photoPath1']) ; ?>
          <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Photo  </h5>
                 </div>
              </div>
        <?php
         $p = photoSplit($row['photoPath1']) ;
         $i=1;
         foreach($p as $x){
           if($i!= 1){
            ?>
            <div class="carousel-item" data-bs-interval="20000">
              <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Photo  </h5>
               </div>
            </div>
 
           <?php
           }
        $i++;
         }
         
         ?>
          <!-- 
 
        <div class="carousel-item" data-bs-interval="2000">
          <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div> -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
        </div>
        </div><!--container-->
          <div class="container">
            <div class="card">
 
            <div class="row">
              <div class="col">
                <?php $date = time_elapsed_string($row['postedDate']); ?>
                <small><?php echo $date ?></small>
              </div>
              <div class="col text-end">
                <small class="text-end"><?php echo $row['view'] ?> Views</small>
              </div>
              
            </div>
          <div class="card-header">
        <?php echo $row['name'] ?>
      </div>
      <div class="card-body">
 
        <div class="row">
          <div class="col">
            <p> <?php echo $row['sex'] ?></p>
            
          </div>
          <div class="col">
            <p><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
            
          </div>
          
        </div>
      <div class="row">
        <div class="col">
          <p><label class="font-weight-bold" for="exampleInputEmail1">Work Position: </label><?php echo $row['workStat'] ?></p>
          
        </div>
        <div class="col">
          <p><label class="font-weight-bold" for="exampleInputEmail1">Work Hour: </label><?php echo $row['workHour'] ?></p>
          
        </div>
        
          </div>
        <div class="row">
          <div class="col">
           <p><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ? <br>  ANSWER: </label><?php echo $row['bid'] ?></p>
            
          </div>
          <div class="col">
            <p><label class="font-weight-bold" for="exampleInputEmail1">Do you own Lageal Weapon ? <br>  ANSWER: </label><?php echo $row['weapon'] ?></p>
            
          </div>
          
        </div>
        <div class="row">
 
        </div>
        <h5 class="card-title"><?php echo  number_format($row['salary']).' Brr' ?></h5>
        <p class="card-text"><?php echo $row['info'] ?> </p>
 
        <div class="btn-group" role="group" aria-label="Basic outlined example">
          <!-- // favourite button  -->
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
              <!-- // mesageing button  -->
                     <?php
                    if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                      ?>
                  <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                      <?php
                    }elseif(!isset($_SESSION['userId'])){
                      ?>
                      <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                      <?php
                    }
                  
                      ?>
            <button type="button" class="btn btn-outline-dark">Call</button>
          </div>
            </div>
          </div>
 
 
          </div>
 
        
        <?php
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
///////// realestate/////////////////
if($_GET['type'] == 'rs'){
              // to add aview count to this post
              $viewadd = viewAdder($type, $pid);
              ?>
              
      
          <div class="container">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <?php  $p = photoSplit($row['photoPath1']) ; ?>
              <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                    <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>
                     </div>
                  </div>
              <?php
              
               $i=1;
               foreach($p as $x){
                 if($i!= 1){
                  ?>
                  <div class="carousel-item" data-bs-interval="20000">
                    <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>  
                     </div>
                  </div>
      
                 <?php
                 }
              $i++;
               }
               
               ?>
                <!-- 
      
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
              </div>
              </div><!--container-->
                <div class="container">
                  <div class="card">
      
                  <div class="row">
                    <div class="col">
                      <?php $date = time_elapsed_string($row['postedDate']); ?>
                      <small><?php echo $date ?></small>
                    </div>
                    <div class="col text-end">
                      <small class="text-end"><?php echo $row['view'] ?> Views</small>
                    </div>
                    
                  </div>
                <div class="card-header">
              <?php echo $row['title'] ?>
            </div>
            <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['company'] ?></h5>
            <div class="row">
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label>  <?php echo $row['forRentOrSell'] ?></p>
               </div>
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
               </div>
            </div>
             
            <div class="row">
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['city'] ?></span> </p>
               </div>
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Sub City: </label><span><?php echo $row['subCity'] ?></span> </p>
               </div>
            </div>
             
            <div class="row">
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda: </label><span><?php echo $row['city'] ?></span> </p>
               </div>
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area:</label> <?php echo $row['phone'].' metersquare' ?></p>
               </div>
            </div>

            <div class="row">
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Floor:</label> <?php echo $row['floor'] ?></p>
               </div>
               <div class="col">
               <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Email:</label> <?php echo $row['email'] ?></p>
               </div>
            </div>

            <div class="row" >
              <div class="justify-content-start">
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price Type:</label> <?php echo $row['priceType'] ?></p>

              </div>
            </div>

    
              <!-- <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5> -->
              <p class="card-text"><?php echo $row['info'] ?> </p>
      
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <!-- // favourite button  -->
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
                    <!-- // mesageing button  -->
                           <?php
                          if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                            ?>
                        <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                            <?php
                          }elseif(!isset($_SESSION['userId'])){
                            ?>
                            <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                            <?php
                          }
                        
                            ?>
                  <button type="button" class="btn btn-outline-dark">Call</button>
                </div>
                  </div>
                </div>
      
      
                </div>
      
              
              <?php 
}
///// bank stocks and insurance post view
if($_GET['type'] == 'ban' || $_GET['type'] == 'ins'){
                // to add aview count to this post
                $viewadd = viewAdder($type, $pid);
                ?>
                
        
            <div class="container">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <?php  $p = photoSplit($row['photoPath1']) ; ?>
                <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                      <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Photo  </h5>
                       </div>
                    </div>
                <?php
                
                 $i=1;
                 foreach($p as $x){
                   if($i!= 1){
                    ?>
                    <div class="carousel-item" data-bs-interval="20000">
                      <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Photo  </h5>  
                       </div>
                    </div>
        
                   <?php
                   }
                $i++;
                 }
                 
                 ?>
                  <!-- 
        
                <div class="carousel-item" data-bs-interval="2000">
                  <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div> -->
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
                </div>
                </div><!--container-->
                  <div class="container">
                    <div class="card">
        
                    <div class="row">
                      <div class="col">
                        <?php $date = time_elapsed_string($row['postedDate']); ?>
                        <small><?php echo $date ?></small>
                      </div>
                      <div class="col text-end">
                        <small class="text-end"><?php echo $row['view'] ?> Views</small>
                      </div>
                      
                    </div>
                  <div class="card-header">
                <?php echo $row['title'] ?>
              </div>
              <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['company'] ?></h5>
              <div class="row">
                 <div class="col">
                 <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1"></label>  <?php echo $row['forRentOrSell'] ?></p>
                 </div>
                 <div class="col">
                 <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Type :</label> <?php echo $row['type'] ?></p>
                 </div>
              </div>
               
              <div class="row">
                 <div class="col">
                 <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['city'] ?></span> </p>
                 </div>
                 <div class="col">
                 <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Sub City: </label><span><?php echo $row['subCity'] ?></span> </p> -->
                 </div>
              </div>
               
              <div class="row">
                 <div class="col">
                 <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Wereda: </label><span><?php echo $row['city'] ?></span> </p> -->
                 </div>
                 <div class="col">
                 <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Area:</label> <?php echo $row['phone'].' metersquare' ?></p> -->
                 </div>
              </div>
  
              <div class="row">
                 <div class="col">
                 <!-- <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Floor:</label> <?php echo $row['floor'] ?></p> -->
                 </div>
                 <div class="col">
                 <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Email:</label> <?php echo $row['email'] ?></p>
                 </div>
              </div>
  
              <div class="row" >
                <div class="justify-content-start">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Price Type:</label> <?php echo $row['priceType'] ?></p>
  
                </div>
              </div>
  
      
                <!-- <h5 class="card-title"><?php echo  number_format($row['price']) ?></h5> -->
                <p class="card-text"><?php echo $row['info'] ?> </p>
        
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <!-- // favourite button  -->
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
                      <!-- // mesageing button  -->
                             <?php
                            if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                              ?>
                          <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                              <?php
                            }elseif(!isset($_SESSION['userId'])){
                              ?>
                              <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                              <?php
                            }
                          
                              ?>
                    <button type="button" class="btn btn-outline-dark">Call</button>
                  </div>
                    </div>
                  </div>
        
        
                  </div>
        
                
                <?php 
}
//////hotel job seeker
if($_GET['type'] == 'hotelWorker'){
           // to add aview count to this post
           $viewadd = viewAdder($type, $pid);
           ?>
           
    
       <div class="container">
           <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
           <div class="carousel-indicators">
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
             <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
           </div>
            <?php  $p = photoSplit($row['photoPath1']) ; ?>
             <div class="carousel-inner">
             <div class="carousel-item active" data-bs-interval="10000">
                   <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                     <h5>Photo  </h5>
                    </div>
                 </div>
           <?php
            $p = photoSplit($row['photoPath1']) ;
            $i=1;
            foreach($p as $x){
              if($i!= 1){
               ?>
               <div class="carousel-item" data-bs-interval="20000">
                 <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                 <div class="carousel-caption d-none d-md-block">
                   <h5>Photo  </h5>
                  </div>
               </div>
    
              <?php
              }
           $i++;
            }
            
            ?>
             <!-- 
    
           <div class="carousel-item" data-bs-interval="2000">
             <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>Second slide label</h5>
             </div>
           </div>
           <div class="carousel-item">
             <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>Third slide label</h5>
               <p>Some representative placeholder content for the third slide.</p>
             </div>
           </div> -->
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
           </div>
           </div><!--container-->
             <div class="container">
               <div class="card">
    
               <div class="row">
                 <div class="col">
                   <?php $date = time_elapsed_string($row['postedDate']); ?>
                   <small><?php echo $date ?></small>
                 </div>
                 <div class="col text-end">
                   <small class="text-end"><?php echo $row['view'] ?> Views</small>
                 </div>
                 
               </div>
             <div class="card-header">
           <?php echo $row['name'] ?>
         </div>
         <div class="card-body">
    
           <div class="row">
             <div class="col">
               <p> <?php echo $row['sex'] ?></p>
               
             </div>
             <div class="col">
             <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
               
             </div>
             
           </div>
         <div class="row">
           <div class="col">
           <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
             
           </div>
           <div class="col">
           <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Field :</label>< <?php echo $row['field'] ?></p>
             
           </div>
           
             </div>
           <div class="row">
             <div class="col">
             <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ? <br> ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
               
             </div>
             <div class="col">
             <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
               
             </div>
             
           </div>

           <div class="row">
           <div class="col">
             <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
               
             </div>
             <div class="col">
         
               
             </div>
           </div>
           <h5 class="card-title"><?php echo  number_format($row['price']).' Brr' ?></h5>
    
           <div class="btn-group" role="group" aria-label="Basic outlined example">
             <!-- // favourite button  -->
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
                 <!-- // mesageing button  -->
                        <?php
                       if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                         ?>
                     <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                         <?php
                       }elseif(!isset($_SESSION['userId'])){
                         ?>
                         <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                         <?php
                       }
                     
                         ?>
               <button type="button" class="btn btn-outline-dark">Call</button>
             </div>
               </div>
             </div>
    
    
             </div>
    
           
           <?php
}
/////// house worker
if($_GET['type'] == 'houseWorker'){
              // to add aview count to this post
              $viewadd = viewAdder($type, $pid);
              ?>
              
       
          <div class="container">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
               <?php  $p = photoSplit($row['photoPath1']) ; ?>
                <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                      <img src="<?php echo $p[0] ?>" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Photo  </h5>
                       </div>
                    </div>
              <?php
               $p = photoSplit($row['photoPath1']) ;
               $i=1;
               foreach($p as $x){
                 if($i!= 1){
                  ?>
                  <div class="carousel-item" data-bs-interval="20000">
                    <img src="<?php echo $x ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Photo  </h5>
                     </div>
                  </div>
       
                 <?php
                 }
              $i++;
               }
               
               ?>
                <!-- 
       
              <div class="carousel-item" data-bs-interval="2000">
                <img src="assets/img/laptop2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/img/laptops.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
              </div>
              </div><!--container-->
                <div class="container">
                  <div class="card">
       
                  <div class="row">
                    <div class="col">
                      <?php $date = time_elapsed_string($row['postedDate']); ?>
                      <small><?php echo $date ?></small>
                    </div>
                    <div class="col text-end">
                      <small class="text-end"><?php echo $row['view'] ?> Views</small>
                    </div>
                    
                  </div>
                <div class="card-header">
              <?php echo $row['name'] ?>
            </div>
            <div class="card-body">
       
              <div class="row">
                <div class="col">
                  <p> <?php echo $row['sex'] ?></p>
                  
                </div>
                <div class="col">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Age :</label> <?php echo $row['age'] ?></p>
                  
                </div>
                
              </div>
            <div class="row">
              <div class="col">
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Work Type: </label><?php echo $row['type'] ?></p>
                
              </div>
              <div class="col">
              <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Field :</label>< <?php echo $row['field'] ?></p>
                
              </div>
              
                </div>
              <div class="row">
                <div class="col">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Can You Provide Biding Person ? <br> ANSWER: </label><?php echo $row['bidingPerson'] ?></p>
                  
                </div>
                <div class="col">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Location: </label><span><?php echo $row['address'] ?></span> </p>
                  
                </div>
                
              </div>
   
              <div class="row">
              <div class="col">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Experience: </label><?php echo $row['experience'] ?></p>
                  
                </div>
                <div class="col">
                <p class="card-text"><label class="font-weight-bold" for="exampleInputEmail1">Religion :</label>< <?php echo $row['religion'] ?></p>
                  
                </div>
              </div>
              <h5 class="card-title"><?php echo  number_format($row['price']).' Brr' ?></h5>
       
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <!-- // favourite button  -->
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
                    <!-- // mesageing button  -->
                           <?php
                          if( isset($_SESSION['userId']) && $_SESSION['userId'] != $row['posterId']){ // since you cant send message to yourself, if the poster id of the post is the same as the loged user, the send message button should not be here 
                            ?>
                        <a id="msgB" href="Account.php?message=true&inner=true&tb=<?php echo $_GET['cat'] ?>&reciver=<?php echo $row['posterId'] ?>&post=<?php echo $row['id'] ?>" class="btn btn-outline-dark " >Send Message</a>
                            <?php
                          }elseif(!isset($_SESSION['userId'])){
                            ?>
                            <a id="msgB" href="login.php" class="btn btn-outline-dark text-danger" >Send Message</a>
                            <?php
                          }
                        
                            ?>
                  <button type="button" class="btn btn-outline-dark">Call</button>
                </div>
                  </div>
                </div>
       
       
                </div>
       
              
              <?php
}



      }
    ?>

	 



            </div>
		

	<div class="col-md-4">
<?php include "includes/descriptionAd.php";?>
	</div>
	
</div>

<?php

if($_GET['cat'] != 'vacancy' && $_GET['cat'] != 'tender' && $_GET['cat'] != 'blog'){


}

?>

	<div class="container-fluid">
		<h4 class="text-primary text-center">Related Items</h4>
		<hr>
  <div class="row">

  <?php 


       
if(isset($_GET['cat'])){
   $cat = $_GET['cat'];
   $fetch23 = allPostListerOnTable($cat);
   while($row2 = $fetch23->fetch_assoc()){
      ?>
    <div class="col-lg-3 col-6 ">
    <div class="card" >
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
                if($_GET['type'] != 'homeTutor' && $type != 'zebegna' && $_GET['type'] != 'hotelWorker' && $_GET['type'] != 'houseWorker'){        

                  ?>
                  <p class="card-title text-center">  <?php echo $row2['title'] ?></p>

                  <?php
                }elseif($_GET['type'] == 'homeTutor' || $type =='zebegna' || $_GET['type'] == 'hotelWorker' || $_GET['type'] =='houseWorker'){

                  ?> 
                  <p class="card-title text-center">  <?php echo $row2['name'] ?></p>
                  <?php
                }
                ?>
                                <?php 
                if($cat != 'charity' && !isset($_GET['type'])){
                ?>
                <p class="card-text"><span class="text-danger small"><?php echo number_format($row2['price']) ?> Birr</span> </p>
  
                <?php
                }
                if($type == 'realestate'){
                  ?>
                  <p class="card-text"><i class="bi bi-geo-alt"></i>  <?php echo $row2['city'] ?></p>
                  <?php
                }else
                
                if($_GET['type'] == 'house' || $type == 'land'  ){
                  ?>
                  <p class="card-text"><span class="text-danger small"><?php echo  number_format($row2['cost']) ?> Birr</span> </p>
                  
                  <p class="card-text"><i class="bi bi-geo-alt"></i>  <?php echo $row2['city'] ?></p><?php
                }else 
                  if($_GET['cat'] != 'charity' && $_GET['cat'] != 'jobhometutor' && $cat != 'zebegna'){
                    ?>
                        <p class="card-text"><span class="text-danger small"><?php echo  number_format($row2['price']) ?> Birr</span> </p>
                    <?php
                  }else if($cat == 'jobhometutor'){
                    ?>
                    <p class="card-text"><span class="text-danger small"><?php echo  number_format($row2['Price']) ?> Birr</span> </p>
                <?php
                  }elseif($cat == 'zebegna'){
                    ?>
                    <p class="card-text"><span class="text-danger small"><?php echo  number_format($row2['salary']) ?> Birr</span> </p>
                <?php
                  }else{
                    ?>
                    <p class="card-text"><i class="bi bi-geo-alt"></i>  <?php echo $row2['address'] ?></p><?php 
                  }
                
                 
                $date = time_elapsed_string($row2['postedDate']);
                $pid = $row2['id'];
                ?>
              <div class="btn-group">
              <?php
              if(isset($_SESSION['userId'])){
              $faz = favouritesSelector($cat, $_SESSION['userId'], $row2['id'] );
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
                      <h6 class="card-text"><i class="bi bi-geo-alt"><?php echo $row2['address'] ?></h6>
                      <?php
                    }
                  
                  ?>
                
                   <!-- <a href="<?php echo './Description.php?cat='.$cat.'&postId='.$row2['id'] ?>">View</a> -->
  
                   <span class="text-danger small"><?php echo $date ?></span><br> <span class="text-right float-right"><?php echo $row2['view'] ?>Views</span>
                </div>
        <!-- <div class="card" style="width: 18rem;"> -->
          <!-- <img src="assets/img/house.jpg" class="card-img-top" alt="..."> -->
          <!-- <div class="card-body"> -->
            <!-- <h5 class="card-title">Card title</h5> -->
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
    <!-- </div> -->

      <?php
   }
}


       ?>

 
</div>

</div>


<?php
include 'includes/footer.php';
?>