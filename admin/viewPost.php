<?php
    // include "../includes/adminSide.php";
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

    
$website = "shop2/Description.php";

    
?>
<div id="allin">
<!-- <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  

  <!-- Favicons -->

  <script>
            $(document).ready(function(){
              $(window).on('hashchange', function(e) {
                if(location.hash == '#userSee'){
                  $('#allin').load('admin/userInfo.php', {poster: id})
                }
              })
            })

                window.onpopstate = function (event) {
                  
                  if(event.state.type == 'seeU'){
                    $('#allin').load('http://localhost/shop2/admin.php#userSee')
                  } 
                }


                function adminPage(){
                  // alert('bitch')
                  $.ajax({
                    url:'admin/editHandler.php',
                    type: 'GET',
                    data:{
                      adminPage : true   , //echo the type of the post to be viewd
                    }, 
                    success: function(data){
                      // alert(data)
                      $.ajax({
                      url:'admin/scrollView.php',
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

            function uinfo(id){
                $('#allin').load('admin/userInfo.php', {poster: id})
                history.pushState({type: 'seeU', id:id}, '', 'http://localhost/shop2/admin.php#userSee')

            }
            $
        </script>
  <link href="admin/assets/img/favicon.png" rel="icon">
  <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="admin/assets/css/style.css" rel="stylesheet">
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
      //   url:'admin/scrollView.php',
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
        $('#allin').load('admin/editPost.php?'+$.param({type: 'vacancy', pid: uid}))
      }

      function editTender(uid){
        $('#allin').empty()
        $('#allin').load('admin/editPost.php?'+$.param({type: 'tender', pid: uid}))
      }

      function adEdit(uid){
        $('#allin').empty()
        $('#allin').load('admin/editPost.php?'+$.param({type: 'ad', pid: uid}))
      }

      function editCar(pid){
        $('#allin').empty()
        $('#allin').load('admin/editPost.php?'+$.param({type: 'car', pid: pid}))
      }

      function editHouse(pid){
        $('#allin').empty()
        $('#postBox').load('admin/editPost.php?'+$.param({type: 'house', pid: pid}))
      }
      function adView(id){
        $('#allin').empty()
                  $('#allin').load('admin/discriptionPage.php', {type: 'ad',pid: id})
                }

      function viewCar(id){
        $('#allin').load('admin/discriptionPage.php', {type: 'car',pid: id})
                
      }
      function houseView(id){
        $('#allin').load('admin/discriptionPage.php', {type: 'house',pid: id})

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
    <link href="admin/assets/album.css" rel="stylesheet">
  </head>
  <div id="vac1">
    <?php
    
    if(isset($_GET['type'])){
        if($_GET['type'] == 'vacancy'){
            $data = $get->allPostListerOnTableD('vacancy', 1 , 6);
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
                            <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                                <i class="bi-cart-fill me-1"></i>
                                View User <?php echo $row['posterId'] ?>
                            </a>   
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                array_push($_SESSION['scroll'], $row['id']) ;
            
            }
        }elseif($_GET['type'] == 'tender'){
          $data = $get->allPostListerOnTableD('tender', 1, 6);
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
                }else{

                
                  
                ?>
                <div class="card mb-3" style="max-width: 540px;">
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
            }
        }
    }elseif($_GET['type'] == 'ad'){
            $ad = $get->allPostListerOnTableD('ad', 1, 6);
            ?>
            <div class="row">
              <script>

              </script>
            <?php
            while($row = $ad[0]->fetch_assoc()){
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
            }
            ?>
            </div>
            <?php
    }elseif($_GET['type'] == 'car'){
        $carOut = $get->allPostListerOnTableD('car', 1, 6)
        ?>
        <div class="row">
        <?php
        
        while($cars = $carOut[0]->fetch_assoc()){
            ?>
            
                
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['price'] ?> Birr</p>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=car&postId=<?php echo $cars['id'] ?>&label=Cars%20For%20Sell&type=" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $cars['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $cars['posterId'] ?>
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
        $hOut = $admin->houseOrLandPostLister();
        ?>
        <div class="row">
        <?php
        
        while($cars = $hOut->fetch_assoc()){
            ?>
            
                
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                  <h6><?php echo $cars['cost'] ?> Birr</h6>
                  <div class="d-flex justify-content-between align-items-center">
                  <a href="../<?php echo $website ?>?cat=housesell&type=house&postId=<?php echo $cars['id'] ?>&label=House%20Posts" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $cars['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $cars['posterId'] ?>
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
      $hOut = $admin->electronicsViewLister();
      ?>
      <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'electronics', pid: id}))

        }

      </script>
      <div class="row">
      <?php
      
      while($cars = $hOut->fetch_assoc()){
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($cars['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $cars['title'] ?></p>
                <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                <h6><?php echo $cars['price'] ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center">
                <a href="../<?php echo $website ?>?cat=electronics&postId=<?php echo $cars['id'] ?>&label=Electronics%20Post&type=" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $cars['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $cars['posterId'] ?>
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
  $out = $admin->allPostsLister('charity');
  ?>
        <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'charity', pid: id}))

        }

      </script>
      <div class="row">
      <?php
      
      while(  $row = $out->fetch_assoc()){
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['phone'] ?> </h6>
                <div class="d-flex justify-content-between align-items-center"> 
                <a href="../<?php echo $website ?>?cat=charity&postId=<?php echo $row['id'] ?>&label=Charity%20Post&type=" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
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
        <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'ad', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
        $out = $admin->bigDiscountLister();
      while($row = $out->fetch_assoc()){
          ?>
          
              
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['info'] ?> Birr</p>
                <h6>Phone : <?php echo $row['price']  ?> Birr</h6>
                <div class="d-flex justify-content-between align-items-center"> 
                <a href="../<?php echo $website ?>?cat=ad&postId=<?php echo $row['id'] ?>&label=Big%20Discount%20Advertisment&type=big" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
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

  $out = $admin->allPostsLister('jobhometutor');
  
  ?>
  

  <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'homeTutor', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
      while(  $row = $out->fetch_assoc()){
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
                <a href="../<?php echo $website ?>?cat=jobhometutor&postId=<?php echo $row['id'] ?>&label=Home%20Tutor&type=homeTutor" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
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
    $out = $admin->allPostColumenView('hotelOrHouse', 'hotelhouse', 'HOTEL');

    ?>
    
    <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'hotel', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
      while(  $row = $out->fetch_assoc()){
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
                <a href="../<?php echo $website ?>?cat=hotelhouse&postId=<?php echo $row['id'] ?>&label=Hotel%20Job%20Seeker&type=hotelWorker" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
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

    $out = $admin->allPostColumenView('hotelOrHouse', 'hotelhouse', 'HOUSE');

    ?>
    
    <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'houseKeeper', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
      while(  $row = $out->fetch_assoc()){
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
                <a href="../<?php echo $website ?>?cat=hotelhouse&postId=<?php echo $row['id'] ?>&label=Home%20Keeper%20Seeker&type=houseWorker" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
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

    $out = $admin->allPostsLister('zebegna');

    ?>
    
    <script>
        function elcView(id){
          $('#allin').load('admin/discriptionPage.php', {type: 'electronics',pid: id})

        }

        function editElc(id){
          $('#allin').load('admin/editPost.php?'+$.param({type: 'zebegna', pid: id})) 

        }

      </script>
      <div class="row">
      <?php
      while(  $row = $out->fetch_assoc()){
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
                <a href="../<?php echo $website ?>?cat=zebegna&postId=<?php echo $row['id'] ?>&label=Security%20Gaurd%20Job%20Seeker&type=zebegna" >View</a>
                  <a href="#userSee" class="btn btn-outline-dark flex-shrink-0" onclick="uinfo('<?php echo $row['posterId'] ?>')"   >
                      <i class="bi-cart-fill me-1"></i>
                      View User <?php echo $row['posterId'] ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
  
  <?php
}


    
 
  }
}
    
    
    ?>
    </div>
    ?>
              <button onclick="adminPage()" >View More <?php echo $_SESSION['adminPage'] ?></button>
            
            <?php
 
// include "../includes/adminFooter.php";
?>