<?php
    include "../includes/adminSide.php";
    require_once "../php/fetchApi.php";
    require_once "../php/adminCrude.php";

    if(isset($_GET['type'])){
      $t = $_GET['type'];
    }

    //array of post ids that are posted on this current page

    ob_start();
    session_start();
    $_SESSION['scroll'] = array();
    $_SESSION['type'] = $t;
    $_SESSION['adminPage'] = 0;

    
$website = "Description.php";

    
?>
<div id="postBox">

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard x</h1>
  <h4><?php echo $row2['firstName'].''.$row2['lastName']  ?></h4>  <br>
  <h6>AUTHERIZATION: <?php echo $row2['auth'] ?></h6>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div> 
<div  class="container">
<!-- <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  

Favicons -->

  <script>
            $(document).ready(function(){
              $(window).on('hashchange', function(e) {
                if(location.hash == ''){
                  $('#allin').load('userInfo.php', {poster: id})
                }
              })
            })

                window.onpopstate = function (event) {
                  
                  if(event.state.type == 'seeU'){
                    $('#allin').load('http://localhost/shop2/admin.php')
                  } 
                }


                function adminPage(){
                  // alert('bitch')
                  $.ajax({
                    url:'editHandler.php',
                    type: 'GET',
                    data:{
                      adminPage : true   , //echo the type of the post to be viewd
                    }, 
                    success: function(data){
                      // alert(data)
                      $.ajax({
                      url:'scrollView.php',
                      type: 'GET',
                      data:{
                        type : '<?php echo $_SESSION['type']; ?>', //echo the type of the post to be viewd
                      }, 
                      success: function(data){
                        $('#vac1').append(data)
                      }
                    })     
                                   }
                  })


                }


            
        </script>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <script src="../assets/js/scroll.js"></script> -->


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="assets/jquery.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function(){
      window.scrollTo(0, 0);
      

      $(window).scroll(function(){
    if($(window).scrollTop() >= $('#postBox').offset().top + $('#postBox').outerHeight() - window.innerHeight +100 ){
      // alert('scroll')




      // $.ajax({
      //   url:'scrollView.php',
      //   type: 'GET',
      //   data:{
      //     type : '<?php echo $_SESSION['type']; ?>', //echo the type of the post to be viewd
      //   }, 
      //   success: function(data){
      //     $('#vac1').append(data)
      //   }
      // })
    }
  })

    


      $(window).scroll(function() {
   if($(window).scrollTop() >= $('#postBox').offset().top + $('#postBox').outerHeight() - window.innerHeight +100) {
      //  alert($(window).scrollTop());
   }
});

    })


      function edit(uid){
        $('#allin').empty()
        $('#allin').load('editPost.php?'+$.param({type: 'vacancy', pid: uid}))
      }

      function editTender(uid){
        $('#allin').empty()
        $('#allin').load('editPost.php?'+$.param({type: 'tender', pid: uid}))
      }

      function adEdit(uid){
        $('#allin').empty()
        $('#allin').load('editPost.php?'+$.param({type: 'ad', pid: uid}))
      }

      function editCar(pid){
        $('#allin').empty()
        $('#allin').load('editPost.php?'+$.param({type: 'car', pid: pid}))
      }

      function editHouse(pid){
        $('#allin').empty()
        $('#postBox').load('editPost.php?'+$.param({type: 'house', pid: pid}))
      }
      function adView(id){
        $('#allin').empty()
                  $('#allin').load('discriptionPage.php', {type: 'ad',pid: id})
                }

      function viewCar(id){
        $('#allin').load('discriptionPage.php', {type: 'car',pid: id})
                
      }
      function houseView(id){
        $('#allin').load('discriptionPage.php', {type: 'house',pid: id})

      }


  </script>
</head> -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/album.css" rel="stylesheet">
  </head>
  <div id="vac1">
    <?php
    
    if(isset($_GET['type'])){
        if($_GET['type'] == 'vacancy'){
            $data = allPostListerOnTableD('vacancy', 1 , 6);
            while($row = $data[0]->fetch_assoc()){

              
              
              
              
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
                array_push($_SESSION['scroll'], $row['id']) ;
            
            }
        }elseif($_GET['type'] == 'tender'){
          $data = allPostListerOnTableD('tender', 1, 6);
            while($row = $data[0]->fetch_assoc()){
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
            }
            array_push($_SESSION['scroll'], $row['id']) ;

        }
    }elseif($_GET['type'] == 'ad'){
            $ad = allPostListerOnColumenD('ad','bigDiscount', 'NOT' , 1, 6);
            ?>
            <div class="row">
              <script>

              </script>
            <?php
            while($row = $ad[0]->fetch_assoc()){
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
            }
            ?>
            </div>
            <?php
    }elseif($_GET['type'] == 'car'){
        $carOut = allPostListerOnTableD('car', 1, 6);
        ?>
        <div class="row">
        <?php
        
        while($cars = $carOut[0]->fetch_assoc()){
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
        }
        ?>
        </div>
        <?php
    
        
        
        
    }elseif($_GET['type'] == 'house'){
        $hOut = allPostListerOnColumenD('housesell','houseOrLand', 'HOUSE' , 1, 6);
        ?>
        <div class="row">
        <?php
        
        while($cars = $hOut[0]->fetch_assoc()){
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
        }
        ?>
        </div>
        <?php
    }

    /// land post lister
    elseif($_GET['type'] == 'land'){
      $hOut = allPostListerOnColumenD('housesell','houseOrLand', 'LAND' , 1, 6);
      ?>
      <div class="row">
      <?php
      
      while($cars = $hOut[0]->fetch_assoc()){
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
      }
      ?>
      </div>
      <?php
  }
    //////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'electronics'){
      $hOut = allPostListerOnTableD('electronics', 1, 6);
      ?>
 
      <div class="row">
      <?php
      
      while($cars = $hOut[0]->fetch_assoc()){
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
      }
      ?>
      </div>
      <?php
    }

/////////////////////////////////////////////////////////
elseif($_GET['type'] == 'charity'){
  $out = allPostListerOnTableD('charity', 1, 6);
  ?>
 
      <div class="row">
      <?php
      
      while(  $row = $out[0]->fetch_assoc()){
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
}
}
//////////////////////////////////////////
elseif($_GET['type'] == 'bigDiscount'){
  ?>
 
      <div class="row">
      <?php
        $out = allPostListerOnColumenD('ad','bigDiscount', 'ACTIVE' , 1, 6);
      while($row = $out[0]->fetch_assoc()){
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
}
}
//////////////////////////////////////
elseif($_GET['type'] == 'homeTutor'){

  $out = allPostListerOnTableD('jobhometutor', 1, 6);
  
  ?>
  

 
      <div class="row">
      <?php
      while(  $row = $out[0]->fetch_assoc()){
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
}
  
?>

  
  <?php
}
} 
//////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'hotel'){
    $out = allPostListerOnColumenD('hotelOrHouse', 'hotelhouse', 'HOTEL', 1, 6);

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
}

    
    
  }
}
////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'houseKeeper'){

    $out =  allPostListerOnColumenD('hotelOrHouse', 'hotelhouse', 'HOUSE', 1, 6);

    ?>
    
 
      <div class="row">
      <?php
      while(  $row = $out[0]->fetch_assoc()){
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
}


    
    
  }
}

//////////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'zebegna'){

    $out = allPostListerOnTableD('zebegna',1,6);

    ?>
    

      <div class="row">
      <?php
      while(  $row = $out[0]->fetch_assoc()){
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
}
  }
}

/////// the payment view
if(isset($_GET['type'])){
  if($_GET['type'] == 'sponser'){
    ?>
    <div class="row">
      <div  class="col-5" >
      <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Filter By: </span>
        </div>
  <select  class="form-select" aria-label="Default select example" onchange="location=this.value" name="forWho" id="forWho">
    <option selected >
 
    <?php
    if(isset($_GET['filter']) && $_GET['filter'] == 'mix'){
      echo 'No Filter Selected(Mixed)';
    }elseif(isset($_GET['filter']) && $_GET['filter'] == 'pending_unpaid'){
      echo 'Pending Unpaid';
    }elseif(isset($_GET['filter']) && $_GET['filter'] == 'unapproved_paid'){
      echo 'Unapproved Paid';
    }elseif(isset($_GET['filter']) && $_GET['filter'] == 'approved'){
      echo 'Approved';
    }
    ?>
    
    </option>
    <option value="./viewPost.php?type=sponser&filter=pending_unpaid" >Pending Unpaid</option>
    <option value="./viewPost.php?type=sponser&filter=unapproved_paid" >Unapproved Paid</option>
    <option value="./viewPost.php?type=sponser&filter=approved" >Approved</option>
  </select>
  </div>
    </div>

      <div class="row">
        <?php
        
        if(isset($_GET['filter']) && $_GET['filter'] == 'pending_unpaid'){
          $out = allPostListerOnColumenD('realestate', 'filled', 'NOT',0,6);
        }elseif(isset($_GET['filter']) && $_GET['filter'] == 'unapproved_paid'){
          $out = allPostListerOnColumenD('realestate', 'filled', 'YES',0,6);
        }elseif(isset($_GET['filter']) && $_GET['filter'] == 'approved'){
          $out = allPostListerOnColumenD('realestate', 'status', 'ACTIVE',0,6);
        }else{
          $out = allPostListerOnTableD('realestate',0,6);
        }
        
        ?>
      <?php
      while($row = $out[0]->fetch_assoc()){
        $date = time_elapsed_string($row['postedDate']);
          ?>
            
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">
              <div class="card-body">
                <?php

                ///// paid but not approved posts filter block
                if(isset($_GET['filter']) && $_GET['filter'] == 'unapproved_paid' ||  $_GET['filter'] == 'mix'){
                  if($row['selectKey'] == "rs"){ // this means its realestate post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>RealEstate</h6><br>
                      <span class="text-warning" >Type: </span><br><h6> <?php echo $row['type'] ?></h6>
                      <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6><br>
                    <h5 class="text-success border border-success " >Paid!</h5>
                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6>  <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                  }elseif($row['selectKey'] == "ban"){ // this means its bank stock post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>Bank Stock</h6><br>
                      <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6>
                    <h5 class="text-success border border-success " >Paid!</h5>
                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6>  <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                  }elseif($row['selectKey'] == "ins"){ // this means its bank stock post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>Insurance Stock</h6><br>
                      <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6>
                    <h5 class="text-success border border-success " >Paid!</h5>
                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6>  <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                  }
                }
                
                ////// unpaied but posted posts filter
                elseif(isset($_GET['filter']) && $_GET['filter'] == 'pending_unpaid' ||  $_GET['filter'] == 'mix'){
                  if($row['selectKey'] == "rs"){ // this means its realestate post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>RealEstate</h6><br>
                      <span class="text-warning" >Type: </span><br><h6> <?php echo $row['type'] ?></h6>
                      <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                    <h5 class="text-success border border-danger " >Not Paid!</h5>
                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6> <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                  }elseif($row['selectKey'] == "ban"){ // this means its bank stock post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>Bank Stock</h6><br>
                      <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                      <h5 class="text-success border border-danger " >Not Paid!</h5>                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6> <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                  }elseif($row['selectKey'] == "ins"){ // this means its bank stock post
                    ?>
                    <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                    <span>Insurance Stock</h6><br>
                      <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                      <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                      <h5 class="text-success border border-danger " >Not Paid!</h5>                    <span class="text-danger small"><?php echo $date ?></span>
                    <h6> <?php echo $row['city']  ?> </h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                                <i class="bi-cart-fill me-1"></i>
                                View User 
                            </a>  
                </div>
                    <?php
                }
              }

              //// approved posts filter block
              elseif(isset($_GET['filter']) && $_GET['filter'] == 'approved' ||  $_GET['filter'] == 'mix'){
                if($row['selectKey'] == "rs"){ // this means its realestate post
                  ?>
                  <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                  <span>RealEstate</h6><br>
                    <span class="text-warning" >Type: </span><br><h6> <?php echo $row['type'] ?></h6>
                    <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                    <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                  <h5 class="text-success border border-success" >Approved!</h5>
                  <span class="text-danger small"><?php echo $date ?></span>
                  <h6> <?php echo $row['city']  ?> </h6>
              <div class="d-flex justify-content-between align-items-center">
              <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
              <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                              <i class="bi-cart-fill me-1"></i>
                              View User 
                          </a>  
              </div>
                  <?php
                }elseif($row['selectKey'] == "ban"){ // this means its bank stock post
                  ?>
                  <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                  <span>Bank Stock</h6><br>
                    <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                    <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                    <h5 class="text-success border border-success" >Approved!</h5>                   <span class="text-danger small"><?php echo $date ?></span>
                  <h6> <?php echo $row['city']  ?> </h6>
              <div class="d-flex justify-content-between align-items-center">
              <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
              <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                              <i class="bi-cart-fill me-1"></i>
                              View User 
                          </a>  
              </div>
                  <?php
                }elseif($row['selectKey'] == "ins"){ // this means its bank stock post
                  ?>
                  <h5 class="card-text"> <?php echo $row['pkg'].' Pakage'  ?></h5>
                  <span>Insurance Stock</h6><br>
                    <!-- <span class="text-warning">Bank: </span><br><h6> <?php echo $row['payBank'] ?></h6>
                    <span class="text-warning">Trans' Id: </span><br><h6> <?php echo $row['transId'] ?></h6> -->
                    <h5 class="text-success border border-success" >Approved!</h5>                    <span class="text-danger small"><?php echo $date ?></span>
                  <h6> <?php echo $row['city']  ?> </h6>
              <div class="d-flex justify-content-between align-items-center">
              <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
              <a href="./userInfo.php?poster=<?php echo $row['posterId'] ?>" class="btn btn-outline-dark flex-shrink-0"    >
                              <i class="bi-cart-fill me-1"></i>
                              View User 
                          </a>  
              </div>
                  <?php
              }
            }
                ?>
              </div>
            </div>
          </div>
  
  <?php
}


    
 
  }
}
    
    
    ?>
    </div>
              <button onclick="adminPage()" >View More </button>
      </div>
</main>
<?php
 
include "../includes/adminFooter.php";
?>