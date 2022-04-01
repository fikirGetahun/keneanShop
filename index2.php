
<!-- <head> -->
<?php

include "includes/lang.php"; 
include "includes/header.php";
include "includes/secnav.php";
include "includes/navbar.php";
// include "header.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
if(isset($_GET['end']) && $_GET['end'] != 0){
  $_SESSION['pgn'] =  $_GET['end'];
 }
elseif(isset($_GET['end']) && $_GET['end'] > 0 || !isset($_GET['end'])){
  $_SESSION['pgn'] =  1;
} 


$pageLocation = $_SESSION['location'];

?>
<style type="text/css">
  .card-img-top:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.cards-wrapper {
  display: flex;
  background: none;
  justify-content: center;
}
.card img {
  max-width: 100%;
  max-height: 100%;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  background: none;
  border-radius: 0;
}
.carousel-inner {
  padding: 1em;
}
.carousel-control-prev,
.carousel-control-next {
  /* background-color: #e1e1e1; */
  width: 5vh;
  height: 5vh;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
}
@media (min-width: 768px) {
  .card img {
    height: 11em;
  }
}
</style>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
  </script> 
  <script>
         $('.clients-carousel').owlCarousel({
             loop: true,
             nav: false,
             autoplay: true,
             autoplayTimeout: 5000,
             animateOut: 'fadeOut',
             animateIn: 'fadeIn',
             smartSpeed: 450,
             margin: 30,
             responsive: {
                 0: {
                     items: 1
                 },
                 768: {
                     items: 2
                 },
                 991: {
                     items: 2
                 },
                 1200: {
                     items: 2
                 },
                 1920: {
                     items: 2
                 }
             } 
         });
  </script>

  <header>
  <div class="row">
  <section class="col-lg-8 ">
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item active">
      <img src="<?php echo $p[0] ?>" class="d-block mx-auto card-img-top" style="max-height: 450px;" alt="...">
    </div> 
    <?php
    // ad fetcher
$webadd = allPostListerOnColumen('webAd', 'id', 31);
$rx = $webadd->fetch_assoc();
$p = explode(',', $rx['photoPath1']);

      for($i=1;$i<count($p);$i++){
        ?>
      <div class="carousel-item ">
      <img src="<?php echo $p[$i] ?>" class="d-block mx-auto card-img-top" style="max-height: 450px;" alt="...">
    </div>      
        <?php
      }
    
    ?>


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
  <?php
  $webadd = allPostListerOnColumen('webAd', 'id', 32);
  $rxs = $webadd->fetch_assoc();
  ?>
  <div class="card">
  <img src="<?php echo $rxs['photoPath1'] ?>" class="card-img-top" alt="...">
</div>
</div>  
  </div>

<!--section 1 -->
<!--section 1 -->
<!--section 1 -->
<!--section 1 -->

<div class="album py-5 bg-light">
    <div class="container-fluid">

<div id="mainone" class="row">
  <div class="col-sm-3">
    <?php include "./includes/homeAds.php" ?>
  </div>
  <div class="col-sm-9 ">
 <div class="card">
   <br>
   <br>

   <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Post Your Ad in This Website</strong> You should check in on some of those fields below.
  <a class="btn btn-outline-primary" href="./user/webAdForm.php" >Proced</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <!-- <div class="container-fluid">
      <div class="row"> -->

        <!-- <div class="col-md-8">

          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/img/zumra1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/img/salon.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/img/tender.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div> -->
        <!--col-md-8-->

        <!-- <div class="col-md-4">
          <img src="assets/img/final.jpg" class="img-fluid" alt="...">
        </div> -->
        
      <!-- </div>
    </div> -->
  </header>
 

  <!-- image slider starts here -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
  
 
    for($ix=0;$ix<5;$ix++){
  if($pageLocation != 'All'){

    $home = allPostListerOnColumenWW('realestate', 'city', $pageLocation);
  
  }
  else{
    $home = allPostListerOnTableWW('realestate');
  }

  if($home->num_rows != 0){
    if($ix == 0){
      $active = 'active';
    }else{
      $active = '';
    }
    ?>
        <div class="carousel-item <?php echo $active ?>">
      <div class="cards-wrapper">
    <?php
 $innerIndex = 0;

 
  while($row1 = $home->fetch_assoc()){
    

    ?>


         <div class="card shadow-sm">
      
         <a class="stretched-link"   href="./Description.php?cat=realestate&type=<?php echo $row1['selectKey'] ?>&postId=<?php echo $row1['id'] ?>&label= "  ></a>
                  <img class="bd-placeholder-img card-img-top"  src="<?php $p = photoSplit($row1['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary"><?php echo $row1['title'] ?></li>

          <div class="row  border-bottom border-top">
          <li class="list-group-item border-end border-1 col">For Sell</li>
          <li class="list-group-item border-end border-1 col"><small> - &nbsp; <?php echo number_format($row1['price']) ?> ETB </small></li>
          </div>
          <div class="row">
          <li class="list-group-item border-start border-end border-top border-1 col"><small><?php echo $row1['city'] ?></small></li>
          <li class="list-group-item border-end border-1 col"><small class="text-end"><?php echo number_format($row1['view']).' ' ?> Views</small></li>
          </div>
        </div>
 
  
    <?php
    if($innerIndex == 6){
      break;
    }
$innerIndex++;
  }
  ?>
     </div>
    </div>
  <?php
}
}

  ?>


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


<div class="container-fluid"><!--- main div--->
		<div class="row">
			<div class="col-lg-3 border-end border-5">
				<?php include "includes/homeAds.php";?>
			</div>

			<div class="col-lg-9">          
          <h5 class="py-3 text-center text-primary"> Best selling Products</h5>
          <hr>
        <div class="container fluid">
        <script>
      function view(){
        $.ajax({
          url: 'homeScroll.php',
          type: 'get',
          success: function(dt){
            $('#homeS').append(dt)
          }
        })
      }
    </script>
     <div class="row">
     <?php

$dbTables = array('ad', 'car', 'electronics',
'housesell');

if(isset($_GET['search'])){
  $R =count($dbTables);
  $postShow = $R;
}else{
  $postShow = 20;
}


for($z=0;$z<$postShow;$z++){
    if(isset($_GET['search'])){
     $tab = $dbTables[$z]; 
    }else{
      $r = rand(0,3); 
      $tab = $dbTables[$r];// to choose random table to fetch data off
      // echo $tab;
    }
  if($pageLocation != 'All'){
    if($tab == 'housesell'){
      if(isset($_GET['search'])){
        $search = $_GET['search'];
        $home = search1C($tab, 'city', $pageLocation, $search,0,30 );
      }else{
        $home = allPostListerOnColumenD($tab,'city', $pageLocation,$_SESSION['pgn'],$postShow); // if city is not all, then a city is selected so it always fetch data based on a city
      }
    
    }else{
      if(isset($_GET['search'])){
        $search = $_GET['search'];
        $home = search1C($tab, 'address', $pageLocation, $search,0,30 );
      }else{
        $home = allPostListerOnColumenD($tab,'address', $pageLocation,$_SESSION['pgn'],$postShow); // if city is not all, then a city is selected so it always fetch data based on a city
      }

    }
  }else{
    if(isset($_GET['search'])){
      $search = $_GET['search'];
      $home = searchC($tab, $search,0,30);
    }else{
    $home = allPostListerOnTableD($tab,$_SESSION['pgn'],$postShow ); // it fetches data from all city
    }
  }
  // if( $home[0]->num_rows != 0 ){
  //   $home = $home[0];
  //   echo 'bithc';
  // }else{
  //   $home =$home;
  //   echo 'll';
  // }
$noResult = array();
  if( $home[0]->num_rows != 0){  // if only a result occurs
  $i1= 1;
  while($row12 = $home[0]->fetch_assoc()){
    // if the post id ad
    if($tab == 'ad'){
      ?>
          <div class="col-lg-3 col-6">
          <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Advertisment%20Post&type=product"  ></a>

            <div class="card shadow-sm">
        
                    <img class="bd-placeholder-img card-img-top"  src="<?php $p = photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?php echo mb_strimwidth($row12['title'], 0, 28, '...');  ?></title><rect width="100%" height="100%" fill="#55595c"/></svg>
              
                        <ul class="list-group list-group-flush border-bottom">
            <li class="list-group-item text-primary"><?php echo $row12['type'] ?></li>

            <div class="row  border-bottom border-top border-end">
            <!-- <li class="list-group-item border-end border-1 col">For Sell</li> -->
            <li class="list-group-item  col"> <small><?php echo number_format($row12['price']) ?> ETB</small> </li><a>  </a>
            </div>
            
            <li class="list-group-item  col"><small><?php echo $row12['address'] ?></small></li>
            <li class="list-group-item border-1 col"><small class="text-end"><?php echo number_format($row12['view']).' ' ?> Views</small></li>
             
          </ul>
            </div>
          </div>  
      <?php
    }

    // if the post is car
    if($tab == 'car'){
      ?>

<div class="col-lg-3 col-6 ">
         <div class="card shadow-sm ">
         <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Cars%20Post%20&type="  ></a>
                  <img class="bd-placeholder-img card-img-top"  src="<?php $p = photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary"><?php echo $row12['type'] ?>(<?php echo $row12['status'] ?>)</li>
          <li class="list-group-item border-end border-1 col"><small><?php echo $row12['forRentOrSell'] ?> &nbsp; - &nbsp; <?php echo number_format($row12['price']) ?> ETB </small></li>
         
          <li class="list-group-item border-start border-end border-top border-1 col"><small><?php echo $row12['address'] ?></small></li>
          <li class="list-group-item border-end border-1 col"><small class="text-end"><?php echo number_format($row12['view']).' ' ?> Views</small></li>
        
        </ul>
         </div>
        </div>
      <?php
    }

    //if charity post 
    if($tab == 'electronics'){
      ?>

      <div class="col-lg-3 col-6 ">
         <div class="card shadow-sm">
         <a href="Description.php?cat=<?php echo $tab ?>&postId=<?php echo $row12['id'] ?>&label=Advertisment%20Post&type=product"  ></a>
                  <img class="bd-placeholder-img card-img-top"  src="<?php $p = photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary"><?php echo $row12['title'] ?> </li>
          <li class="list-group-item border-end border-1 col"><small> <?php echo number_format($row12['price']) ?> ETB </small></li>
       
          <li class="list-group-item border-start border-end border-top border-1 col"><small><?php echo $row12['address'] ?></small></li>
          <li class="list-group-item border-end border-1 col"><small class="text-end"><?php echo number_format($row12['view']).' ' ?> Views</small></li>
       
        </ul>
         </div>
        </div>
      <?php
    }

    // house post
    if($tab == 'housesell'){
      ?>

      <div class="col-lg-3 col-6">
         <div class="card shadow-sm">
         <a href="Description.php?cat=<?php echo $tab ?>&type=house&postId=<?php echo $row12['id'] ?>&label=House%20Posts"  ></a>
                  <img class="bd-placeholder-img card-img-top"  src="<?php $p = photoSplit($row12['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg> 
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary"><?php echo $row12['type'] ?> </li>
          <li class="list-group-item border-end border-1 col"><small><?php echo $row12['forRentOrSell'] ?> &nbsp; - &nbsp; <?php echo number_format($row12['cost']) ?> ETB </small></li>
          
          <li class="list-group-item border-start border-end border-top border-1 col"><small><?php echo $row12['city'] ?></small></li>
          <li class="list-group-item border-end border-1 col"><small class="text-end"><?php echo number_format($row12['view']).' ' ?> Views</small></li>
        
        </ul>
         </div>
        </div>
      <?php
    }


    ?>
      <!-- <div class="col-lg-3 col-6">
        <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top"  src="assets/img/house2.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                    <ul class="list-group list-group-flush border-bottom">
        <li class="list-group-item text-primary">House Types</li>

        <div class="row  border-bottom border-top border-end">
        <li class="list-group-item border-end border-1 col">For Sell</li>
        <li class="list-group-item border-1 col">2,500 ETB</li>
        </div>
        <div class="row">
        <li class="list-group-item border-end border-1 col"><small>Addis Abeba</small></li>
        <li class="list-group-item border-1 col"><small class="text-end"><a href=""  >2,500 View</a></small></li>
        </div>
      </ul>
        </div>
      </div> -->
        <?php
            if($i1 == 2){break;}
            $i1++;
  }
}
}
        ?>

           <!-- <div class="col-lg-3 col-6">
         <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top"  src="assets/img/house2.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary">House Types</li>

          <div class="row  border-bottom border-top">
          <li class="list-group-item border-end border-1 col">For Sell</li>
          <li class="list-group-item border-1 col">2,500 ETB</li>
          </div>
          <div class="row">
          <li class="list-group-item border-end border-1 col"><small>Addis Abeba</small></li>
          <li class="list-group-item border-1 col"><small class="text-end">2,500 View</small></li>
          </div>
        </ul>
         </div>
        </div>
          <div class="col-lg-3 col-6">
         <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top"  src="assets/img/house2.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary">House Types</li>

          <div class="row  border-bottom border-top">
          <li class="list-group-item border-end border-1 col">For Sell</li>
          <li class="list-group-item border-1 col">2,500 ETB</li>
          </div>
          <div class="row">
          <li class="list-group-item border-end border-1 col"><small>Addis Abeba</small></li>
          <li class="list-group-item border-1 col"><small class="text-end">2,500 View</small></li>
          </div>
        </ul>
         </div>
        </div>
         <div class="col-lg-3 col-6">
         <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top"  src="assets/img/house2.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary">House Types</li>

          <div class="row  border-bottom border-top">
          <li class="list-group-item border-end border-1 col">For Sell</li>
          <li class="list-group-item border-1 col">2,500 ETB</li>
          </div>
          <div class="row">
          <li class="list-group-item border-end border-1 col"><small>Addis Abeba</small></li>
          <li class="list-group-item border-1 col"><small class="text-end">2,500 View</small></li>
          </div>
        </ul>
         </div>
        </div>

          <div class="col-lg-3 col-6">
         <div class="card shadow-sm">
                  <img class="bd-placeholder-img card-img-top"  src="assets/img/house2.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
                     <ul class="list-group list-group-flush border-bottom">
          <li class="list-group-item text-primary">House Types</li>

          <div class="row  border-bottom border-top">
          <li class="list-group-item border-end border-1 col">For Sell</li>
          <li class="list-group-item border-1 col">2,500 ETB</li>
          </div>
          <div class="row">
          <li class="list-group-item border-end border-1 col"><small>Addis Abeba</small></li>
          <li class="list-group-item border-1 col"><small class="text-end">2,500 View</small></li>
          </div>
        </ul>
         </div>
        </div> -->

      </div>
    </div>
    <?php
    ///page number calculation
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}



$content_per_page = 8;

$startPage = ($page * $content_per_page) - $content_per_page;
// echo $startPage.'z';
$endPage =  $content_per_page;
// echo $endPage;
    // this condition will dictate the pageination 
if($home[1]->num_rows != 0){
            ?>
      <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <?php
    $pageNumberPerPAGE = 2; 
    
    //   if(isset($_GET['end']) && $_GET['end'] != 0){
    //   $_SESSION['pgn'] =  $_GET['end'];
    //  }
    // elseif(isset($_GET['end']) && $_GET['end'] > 0 || !isset($_GET['end'])){
    //   $_SESSION['pgn'] =  1;
    // } 
    
    ?>
    <li class="page-item">
      <?php

      if($_SESSION['pgn']!= 1){
        $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
        $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
        unset($params['page']);
        unset($params['end']);
        $string = http_build_query($params);
        ?>
        <a class="page-link" href="index2.php?<?php echo $string ?>&end=<?php echo $_SESSION['pgn']-$pageNumberPerPAGE ?>"  >Previous</a>
        <?php
      }
      ?>
    </li>
            <?php
            // echo $home[1]->num_rows;

            $pageCount = ceil($home[1]->num_rows/$content_per_page);
            for($j= $_SESSION['pgn'];$j<=$pageCount;$j++){
              $urll = parse_url($_SERVER['REQUEST_URI']);  // to prase all the url parameter in the 'query' key
              if(isset($urll['query'])){
                $urll = parse_str($urll['query'], $params); // to make an assoc array of all the parameter key with the value
                unset($params['page']);
              unset($params['end']);
              $string = http_build_query($params);
              }else{
                $string = ' ';
              }
            
              
             
              // var_dump($string);
              // $string = str_replace('+', '%20', $string);
       

              if(isset($_GET['page'])){
                if($_GET['page'] == $j){
                  ?>
                  <li class="page-item active"><a class="page-link" href="index2.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }else{
                  ?>
                  <li class="page-item"><a class="page-link " href="index2.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                  <?php
                }
              }elseif($j == 1 ){
                ?>
                <li class="page-item active"><a class="page-link" href="index2.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php    
              }else{
                ?>
                <li class="page-item"><a class="page-link " href="index2.php?<?php echo $string ?>&page=<?php echo $j ?>&end=0"><?php echo $j ?></a></li>
                <?php               
              }


              // this is to show the max page numbers displayed on page.. then it will break.
              if($j == $pageNumberPerPAGE + $_SESSION['pgn'] - 1){
                break;
              }
            }
            ?>
            <?php

            // this is a limit condition so that it doesent show the next button if there is not more page numbers are available
            if($j + 1 < $pageCount){
              ?>
              <a class="page-link" href="index2.php?<?php echo $string ?>&page=<?php echo $j+1 ?>&end=<?php echo $j+1 ?>">Next</a>
              <?php
            }
            ?>
    </li>


  </ul>
</nav>
            <?php
          }
?>
</div>
</div>




<?php
include "includes/footer.php";
?>