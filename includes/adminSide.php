<?php
include "../includes/header.php";
  require_once "../php/adminCrude.php";

  $url = $_SERVER['REQUEST_URI'];
ob_start();
if(!isset($_SESSION)){
    session_start();
}
  $uid = $_SESSION['idz'];

  if(isset($_GET['loc'])){
    $_SESSION['location'] = $_GET['loc'];
    // echo 'in';
  }

  


  


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <script src="assets/jquery.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
      var currentUrl = '<?php echo $url; ?>'
      $(window).on('hashchange', function(e) {
        // alert('change')
   // do something...
        if(location.hash == '#content'){
          $('#postBox').load('home.php')
          $('#postBox').load('postPage.php?'+$.param({type: "postVacancy"}))
        }
        if(location.hash == '#tenderPost'){
          $('#postBox').load('postPage.php?'+$.param({type: "tender", uid: '<?php echo $uid; ?>'}))
        }
        if(location.hash == '#adduser'){
          $('#postBox').load('adminRegister.php');
        }
        if(location.hash == '#viewHomeTutor'){
          // $('#vac1').empty()
          $('#postBox').load('postPage.php?'+$.param({type: "home", uid: '<?php echo $uid; ?>'}))
        }
        if(location.hash == '#viewTenderPost'){
          $('#vac1').empty()
          $('#postBox').load('viewPost.php?'+$.param({type: 'tender'}))
        }
        if(location.hash == '#viewVacancyPost'){
          $('#vac1').empty()
          $('#postBox').load('viewPost.php?'+$.param({type: 'vacancy'}))
        }
        if(location.hash == '#viewAd'){
         $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "ad", uid: '<?php echo $uid; ?>'}))
        }

    });


    $('#homeTutor').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "home", uid: '<?php echo $uid; ?>'}))
      })

    $('#addUser').click(function(){
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('adminRegister.php');
      })

    $('#editTender').click(function(){
      $('#vac1').empty()
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('viewPost.php?'+$.param({type: 'tender'}))
      })

      $('#editVacancy').click(function(){
        $('#vac1').empty()
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('viewPost.php?'+$.param({type: 'vacancy'}))
      })

      $('#viewHomeTutorPerson').click(function(){
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('viewPost.php?'+$.param({type: 'homeTutor'}))
      })

      

      $('#postVacancy').click(function(){
        
      
          $('#postBox').load('postPage.php?'+$.param({type: "postVacancy", uid: '<?php echo $uid; ?>'}))
          // history.pushState('vacancy', 'Post Vacancy', currentUrl+'postVacancy')
      })

      $('#postTender').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "tender", uid: '<?php echo $uid; ?>'}))
      })

      // $('#viewPtag').click(function(){
      //   $('#postBox').load('profileViewPanel.php?'+$.param({uid: '<?php echo $uid;  ?>'}))
      // })

      $('#postAd').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "ad", uid: '<?php echo $uid; ?>'}))
      })

      $('#houseKeeper').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "houseKeeper", uid: '<?php echo $uid; ?>'}))
      })

      $('#hotelWorker').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "hotel", uid: '<?php echo $uid; ?>'}))
      })

      $('#zebegnaWorker').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "zebegna", uid: '<?php echo $uid; ?>'}))
      })
      
      

      $('#carPost').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "car", uid: '<?php echo $uid; ?>'}))
      })

      $('#postCharity').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "big", uid: '<?php echo $uid; ?>'}))
      })

      $('#postBig').click(function(){
        $('#postBox').load('postPage.php?'+$.param({type: "bigDiscount", uid: '<?php echo $uid; ?>'}))
      })

      $('#housePost').click(function(){
        
        $('#postBox').load('postPage.php?'+$.param({type: "house", uid: '<?php echo $uid; ?>'}))
      })

      $('#postBlog').click(function(){
        
        $('#postBox').load('postPage.php?'+$.param({type: "blog", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewAd').click(function(){
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "ad", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewAd2').click(function(){
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "bigDiscount", uid: '<?php echo $uid; ?>'}))
      })

      $('#houseKeeper').click(function(){
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "houseKeeper", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewCar').click(function(){
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "car", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewHouse').click(function(){
        $('#postBox').load('viewPost.php?'+$.param({type: "house", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewCharity').click(function(e){
        e.preventDefault()
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "charity", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewHotelPerson').click(function(e){
        e.preventDefault()
        $('#postBox').load('viewPost.php?'+$.param({type: "hotel", uid: '<?php echo $uid; ?>'}))
      })
      
      $('#zebegnaView').click(function(){
        $('#vac1').empty()
        $('#postBox').load('viewPost.php?'+$.param({type: "zebegna", uid: '<?php echo $uid; ?>'}))
      })

      // $('#adCategory').click(function(){
      //   $('#postBox').load('addCategory.php', {type: 'ad'})
      // })

      $('#viewYourPost').click(function(){
        $('#postBox').load('userPostViewPage.php', {id: '<?php echo $uid; ?>' })
      })
      
      // $('#elecCategory').click(function(){
      //   $('#postBox').load('addCategory.php', {type: 'electronics' })
      // })



    })

  </script>
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Zumra360 Admin Panel</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->
    <li class="nav-item d-block" > Last Loged: <?php $out = userDataShower($uid);
                                                      $row22 = $out->fetch_assoc();
                                                      echo $row22['lastLogedIn']     ?> </li>
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
    <?php 
      $out6 = userDataShower($uid);
      $row6 = $out6->fetch_assoc();
    
    ?>
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?php echo $row6['photoPath']  ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row6['firstName'].' '.$row6['lastName']  ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $row6['firstName'].' '.$row6['lastName']  ?></h6>
          <span><?php echo $row6['job']  ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="../php/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Log Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Account.php?setting=true" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>View Profile</span>
            </a>
          </li>
          <li>
            <a href="../Account.php?yourPost=true" id="" >
              <i class="bi bi-circle"></i><span>View Your Posts</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->  


      <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-credit-card-2-back-fill"></i><span>Manage Sponsered System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="addPkg.php?add=pkg" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>Add Pakage</span>
            </a>
          </li>
          <li>
            <a href="addPkg.php?add=bank" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>Add Bank</span>
            </a>
          </li>
          <li>
            <a href="viewPkg.php?view=true" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>View Sponsered System</span>
            </a>
          </li>
          <li>


        </ul>
      </li><!-- End Components Nav -->  

      <a class="nav-link collapsed" data-bs-target="#components-nav55" data-bs-toggle="collapse" href="#">
          <i class="bi bi-binoculars-fill"></i><span>Sponserd Posts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav55" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="addPkg.php?add=pkg" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>Add Pakage</span>
            </a>
          </li>
          <li>
            <a href="addPkg.php?add=bank" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>Add Bank</span>
            </a>
          </li>
          <li>
            <a href="viewPkg.php?view=true" id="viewPtag" >       

              <i class="bi bi-circle"></i><span>View Sponsered System</span>
            </a>
          </li>
          <li>


        </ul>
      </li><!-- End Components Nav -->  

      <?php
        $out = userDataShower($uid);
        $row2 = $out->fetch_assoc();
        if($row2['auth'] == 'ADMIN'){
          ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Manage User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  id="addUser" href="./adminRegister.php"  >
              <i class="bi bi-circle"></i><span>Add Roles</span>
            </a>
          </li>
          <li>
            <a  id=" " href="./membersList.php?list=true"  >
              <i class="bi bi-circle"></i><span>Members List</span>
            </a>
          </li>
          <li>
            <a  id=" " href="./membersList.php?pending=true"  >
              <i class="bi bi-circle"></i><span>Pending Members Lists</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

          <?php
        }
      ?>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Manage Post</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a id="editVacancy" href="./viewPost.php?type=vacancy&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Vacancy PostS</span>
            </a>
          </li>
          <li>
            <a id="editTender" href="./viewPost.php?type=tender&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Tender PostS</span>
            </a>
          </li>
          <li>
            <a id="viewAd" href="./viewPost.php?type=ad&uid=<?php echo $uid; ?>"> 
              <i class="bi bi-circle"></i><span>View AD PostS</span>
            </a>
          </li>

          <script>
            $(document).ready(function(){
              document.addEventListener("DOMContentLoaded", function (){
                if(window.location.href=== "http://localhost/shop2/viewPost/electronics") {

alert('wiork')
}
              });

                $('#elecView').click(function(){

                $('#postBox').load('viewPost.php?'+$.param({type: "electronics", uid: '<?php echo $uid; ?>'}))
                // history.pushState({type: 'electronics'},'', './viewPost.php?type=electronics&uid=<?php echo $uid; ?>')
                })

            })
          </script>

          <li>
            <a id="elecView" href="./viewPost.php?type=electronics&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Electronics PostS</span>
            </a>
          </li>
          <li>
            <a id="viewCar" href="./viewPost.php?type=car&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Car PostS</span>
            </a>
          </li>
          <li>
            <a id="viewHouse" href="./viewPost.php?type=house&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View House PostS</span>
            </a>
          </li>
          <li>
            <a id="viewHouse" href="./viewPost.php?type=land&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Land PostS</span>
            </a>
          </li>
          <li>
            <a id="viewCharity" href="./viewPost.php?type=charity&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View Charity Post</span>
            </a>
          </li>
          <li>
            <a id="viewAd2" href="./viewPost.php?type=bigDiscount&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>View BigDiscount Ads Post</span>
            </a>
          </li>

          <li>
            <a id="viewHomeTutorPerson" href="./viewPost.php?type=homeTutor&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>Home Tutor Pepole </span>
            </a>
          </li>

          <li>
            <a id="viewHotelPerson" href="./viewPost.php?type=hotel&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>Hotel Worker Pepole </span>
            </a>
          </li>

          <li>
            <a id="houseKeeper" href="./viewPost.php?type=houseKeeper&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>House Worker Pepole </span>
            </a>
          </li>

          <li>
            <a id="zebegnaView" href="./viewPost.php?type=zebegna&uid=<?php echo $uid; ?>">
              <i class="bi bi-circle"></i><span>Security Gaurd Pepole </span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <script>



// document.addEventListener('popstate', (event) => {
//   alert(location)
//     if(location == 'http://localhost/shop2/admin.php/post'){
      
//       $('#postBox').load('postPage.php?type=electronics&uid=89')
//     }
// });

              $(document).ready(function(){
                $('#carCategory').click(function(){
                  $('#postBox').load('addCategory.php', {type: 'car'})
                })
                $('#postElectronics').click(function(e){
                  e.preventDefault()
                  // history.pushState({type: 'electronics'}, '', 'http://localhost/shop2/admin.php/post')
                  // $('#postBox').load('http://localhost/shop2/postPage.php?type=electronics&uid=89')
                  // window.location.href = 'postPage.php?type=electronics&uid=<?php echo $uid ?>'
                  $('#postBox').load('postPage.php?'+$.param({type: "electronics", uid: '<?php echo $uid; ?>'}))
                })
                // window.onpopstate = function (event) {
                  
                //   if(event.state.type == 'electronics'){
                //     $('#postBox').load('http://localhost/shop2/postPage.php?type=electronics&uid=89')
                //   } 
                // }
               
          


                // $('#vacancyCategory').click(function(){
                //   $('#main').load('addCategory.php', {type: 'vacancy'})
                // })

                // $('#houseCategory').click(function(){
                //   $('#main').load('addCategory.php', {type: 'house'})
                // })




              })



            </script>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Add Posts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a id="postVacancy" href="./postPage.php?type=vacancy"> 
              <i class="bi bi-circle "></i><span>Post Vacancy</span>
            </a>
            <a id="vacancyCategory" style="padding-left: 60px;" href="./addCategory.php?type=vacancy">
              <i class="
              bi bi-circle"></i><span>Add Vacancy Category</span>
            </a>
          </li>
          <li>
            <a id="postTender" href="./postPage.php?type=tender">
              <i class="bi bi-circle"></i><span>Post Tender</span>
            </a>
          </li>
          <li>
            <a id="postBlog" href="./postPage.php?type=blog">
              <i class="bi bi-circle"></i><span>Post Blog</span>
            </a>
          </li>
          <li>
            <a id="postElectronics" href='./postPage.php?type=electronics'>
              <i class="bi bi-circle"></i><span>Post Electronics</span>
            </a>
            <a id="elecCategory" style="padding-left: 60px;" href="./addCategory.php?type=electronics">
              <i class="
              bi bi-circle"></i><span>Add Electronics Category</span>
            </a>
          </li>

          <li>
            <a id="postCharity" href='./postPage.php?type=charity'>
              <i class="bi bi-circle"></i><span>Post Charity</span>
            </a>
          </li>



          <li>
            <a id="postBig" href='./postPage.php?type=bidAd'>
              <i class="bi bi-circle"></i><span>Post Big Discount Advertisment</span>
            </a>
          </li>

          <li>
            <a id="carPost" href="./postPage.php?type=car">
              <i class="bi bi-circle"></i><span>Post Cars</span>
            </a>



            <a id="carCategory" style="padding-left: 60px;" href="./addCategory.php?type=car">
              <i class="
              bi bi-circle"></i><span>Add Cars Category</span>
            </a>
          </li>
          <li>
            <a id="housePost" href="./postPage.php?type=house">
              <i class="bi bi-circle"></i><span>Post House</span>
            </a>
            <a id="houseCategory" style="padding-left: 60px;" href="./addCategory.php?type=house">
              <i class="
              bi bi-circle"></i><span>Add House Category</span>
            </a>
          </li>
          <li>
            <a id="postCharity" href='./postPage.php?type=land'>
              <i class="bi bi-circle"></i><span>Post Land</span>
            </a>
          </li>
          <li>
            <a id="postAd" href="./postPage.php?type=ad">
              <i class="bi bi-circle"></i><span>Post Advertisment</span>
            </a>
            <a id="adCategory" style="padding-left: 60px;" href="./addCategory.php?type=ad">
              <i class="
              bi bi-circle"></i><span>Add ADs Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <script>
        $(document).ready(function(){

        })
      </script>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables2-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Job Seeker Upload</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables2-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a id="homeTutor" href="./postPage.php?type=homeTutor">
              <i class="bi bi-circle"></i><span>Home Tutor [Upload Your Portoflio]</span>
            </a>
          </li>
          <li>
            <a id="houseKeeper" href="./postPage.php?type=houseWorker">
              <i class="bi bi-circle"></i><span>House Keeper [Upload Your Portoflio]</span>
            </a>
          </li>
          <li>
            <a id="hotelWorker" href="./postPage.php?type=hotelWorker">
              <i class="bi bi-circle"></i><span>Hotel Worker [Upload Your Portoflio]</span>
            </a>
          </li>

          <li>
            <a id="zebegnaWorker" href="./postPage.php?type=zebegna">
              <i class="bi bi-circle"></i><span>Security Gaurd[Upload Your Portoflio]</span>
            </a>
          </li>
          <li>

        </ul>
      </li><!-- End Tables Nav -->

      <!-- <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->