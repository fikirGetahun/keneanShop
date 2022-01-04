<?php

  require_once "php/adminCrude.php";

  $url = $_SERVER['REQUEST_URI'];

  $uid = $_SESSION['idz'];

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
  <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <script src="assets/jquery.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
      var currentUrl = '<?php echo $url; ?>'
      $(window).on('hashchange', function(e) {
   // do something...
        if(location.hash == '#content'){
          $('#postBox').load('home.php')
          $('#postBox').load('postPage.php?'+$.param({type: "postVacancy"}))
        }
        if(location.hash == '#tenderPost'){
          $('#postBox').load('postPage.php?'+$.param({type: "tender", uid: '<?php echo $uid; ?>'}))
        }
        if(location.hash == ""){
          $('#postBox').empty()
        }
    });


    $('#homeTutor').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "home", uid: '<?php echo $uid; ?>'}))
      })

    $('#addUser').click(function(){
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('admin/adminRegister.php');
      })

    $('#editTender').click(function(){
      $('#vac1').empty()
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('admin/viewPost.php?'+$.param({type: 'tender'}))
      })

      $('#editVacancy').click(function(){
        $('#vac1').empty()
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('admin/viewPost.php?'+$.param({type: 'vacancy'}))
      })

      $('#viewHomeTutorPerson').click(function(){
        // $('#postBox').load('editPost.php?'+$.param({type: 'viewVacancy', uid: '<?php echo $uid; ?>'}))
        $('#postBox').load('admin/viewPost.php?'+$.param({type: 'homeTutor'}))
      })

      

      $('#postVacancy').click(function(){
        
      
          $('#postBox').load('admin/postPage.php?'+$.param({type: "postVacancy", uid: '<?php echo $uid; ?>'}))
          // history.pushState('vacancy', 'Post Vacancy', currentUrl+'postVacancy')
      })

      $('#postTender').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "tender", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewPtag').click(function(){
        $('#postBox').load('admin/profileViewPanel.php?'+$.param({uid: '<?php echo $uid;  ?>'}))
      })

      $('#postAd').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "ad", uid: '<?php echo $uid; ?>'}))
      })

      $('#houseKeeper').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "houseKeeper", uid: '<?php echo $uid; ?>'}))
      })

      $('#hotelWorker').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "hotel", uid: '<?php echo $uid; ?>'}))
      })

      $('#zebegnaWorker').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "zebegna", uid: '<?php echo $uid; ?>'}))
      })
      
      

      $('#carPost').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "car", uid: '<?php echo $uid; ?>'}))
      })

      $('#postCharity').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "big", uid: '<?php echo $uid; ?>'}))
      })

      $('#postBig').click(function(){
        $('#postBox').load('admin/postPage.php?'+$.param({type: "bigDiscount", uid: '<?php echo $uid; ?>'}))
      })

      $('#housePost').click(function(){
        
        $('#postBox').load('admin/postPage.php?'+$.param({type: "house", uid: '<?php echo $uid; ?>'}))
      })

      $('#postBlog').click(function(){
        
        $('#postBox').load('admin/postPage.php?'+$.param({type: "blog", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewAd').click(function(){
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "ad", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewAd2').click(function(){
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "bigDiscount", uid: '<?php echo $uid; ?>'}))
      })

      $('#houseKeeper').click(function(){
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "houseKeeper", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewCar').click(function(){
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "car", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewHouse').click(function(){
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "house", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewCharity').click(function(e){
        e.preventDefault()
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "charity", uid: '<?php echo $uid; ?>'}))
      })

      $('#viewHotelPerson').click(function(e){
        e.preventDefault()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "hotel", uid: '<?php echo $uid; ?>'}))
      })
      
      $('#zebegnaView').click(function(){
        $('#vac1').empty()
        $('#postBox').load('admin/viewPost.php?'+$.param({type: "zebegna", uid: '<?php echo $uid; ?>'}))
      })

      $('#adCategory').click(function(){
        $('#postBox').load('admin/addCategory.php', {type: 'ad'})
      })

      $('#viewYourPost').click(function(){
        $('#postBox').load('admin/userPostViewPage.php', {id: '<?php echo $uid; ?>' })
      })
      
      $('#elecCategory').click(function(){
        $('#postBox').load('admin/addCategory.php', {type: 'electronics' })
      })



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
    <li class="nav-item d-block" > Last Loged: <?php $out = $admin->userDataShower($uid);
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
            <img src="admin/assets/img/messages-1.jpg" alt="" class="rounded-circle">
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
            <img src="admin/assets/img/messages-2.jpg" alt="" class="rounded-circle">
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
            <img src="admin/assets/img/messages-3.jpg" alt="" class="rounded-circle">
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
      $out6 = $admin->userDataShower($uid);
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
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
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
          <a class="dropdown-item d-flex align-items-center" href="./php/logout.php">
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
        <a class="nav-link " href="index.html">
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
            <a href="#viewProfilePage" id="viewPtag" >
              <i class="bi bi-circle"></i><span>View Profile</span>
            </a>
          </li>
          <li>
            <a href="#" id="viewYourPost" >
              <i class="bi bi-circle"></i><span>View Your Posts</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->  
      <?php
        $out = $admin->userDataShower($uid);
        $row2 = $out->fetch_assoc();
        if($row2['auth'] == 'ADMIN'){
          ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Manage User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  id="addUser" href="#adduser"  >
              <i class="bi bi-circle"></i><span>Add User</span>
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
            <a id="editVacancy" href="#viewVacancyPost">
              <i class="bi bi-circle"></i><span>View Vacancy PostS</span>
            </a>
          </li>
          <li>
            <a id="editTender" href="#viewTenderPost">
              <i class="bi bi-circle"></i><span>View Tender PostS</span>
            </a>
          </li>
          <li>
            <a id="viewAd" href="#viewAdPost">
              <i class="bi bi-circle"></i><span>View AD PostS</span>
            </a>
          </li>

          <script>
            $(document).ready(function(){
              document.addEventListener("DOMContentLoaded", function (){
                if(window.location.href=== "http://localhost/shop2/admin/viewPost/electronics") {

alert('wiork')
}
              });

                $('#elecView').click(function(){

                $('#postBox').load('admin/viewPost.php?'+$.param({type: "electronics", uid: '<?php echo $uid; ?>'}))
                // history.pushState({type: 'electronics'},'', './viewPost.php?type=electronics&uid=<?php echo $uid; ?>')
                })

            })
          </script>

          <li>
            <a id="elecView" href="#viewElectronicsPost">
              <i class="bi bi-circle"></i><span>View Electronics PostS</span>
            </a>
          </li>
          <li>
            <a id="viewCar" href="#viewCarPost">
              <i class="bi bi-circle"></i><span>View Car PostS</span>
            </a>
          </li>
          <li>
            <a id="viewHouse" href="#viewHousePost">
              <i class="bi bi-circle"></i><span>View House PostS</span>
            </a>
          </li>
          <li>
            <a id="viewCharity" href="viewPost.php?type=charity&uid=<?php echo $uid ?>">
              <i class="bi bi-circle"></i><span>View Charity Post</span>
            </a>
          </li>
          <li>
            <a id="viewAd2" href="#">
              <i class="bi bi-circle"></i><span>View BigDiscount Ads Post</span>
            </a>
          </li>

          <li>
            <a id="viewHomeTutorPerson" href="#">
              <i class="bi bi-circle"></i><span>Home Tutor Pepole </span>
            </a>
          </li>

          <li>
            <a id="viewHotelPerson" href="#">
              <i class="bi bi-circle"></i><span>Hotel Worker Pepole </span>
            </a>
          </li>

          <li>
            <a id="houseKeeper" href="#">
              <i class="bi bi-circle"></i><span>House Worker Pepole </span>
            </a>
          </li>

          <li>
            <a id="zebegnaView" href="#">
              <i class="bi bi-circle"></i><span>Security Gaurd Pepole </span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <script>



// document.addEventListener('popstate', (event) => {
//   alert(location)
//     if(location == 'http://localhost/shop2/admin/admin.php/post'){
      
//       $('#postBox').load('postPage.php?type=electronics&uid=89')
//     }
// });

              $(document).ready(function(){
                $('#carCategory').click(function(){
                  $('#postBox').load('addCategory.php', {type: 'car'})
                })
                $('#postElectronics').click(function(e){
                  e.preventDefault()
                  // history.pushState({type: 'electronics'}, '', 'http://localhost/shop2/admin/admin.php/post')
                  // $('#postBox').load('http://localhost/shop2/admin/postPage.php?type=electronics&uid=89')
                  // window.location.href = 'postPage.php?type=electronics&uid=<?php echo $uid ?>'
                  $('#postBox').load('postPage.php?'+$.param({type: "electronics", uid: '<?php echo $uid; ?>'}))
                })
                // window.onpopstate = function (event) {
                  
                //   if(event.state.type == 'electronics'){
                //     $('#postBox').load('http://localhost/shop2/admin/postPage.php?type=electronics&uid=89')
                //   } 
                // }
               
          


                $('#vacancyCategory').click(function(){
                  $('#postBox').load('admin/addCategory.php', {type: 'vacancy'})
                })

                $('#houseCategory').click(function(){
                  $('#postBox').load('admin/addCategory.php', {type: 'house'})
                })




              })



            </script>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Add Posts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a id="postVacancy" href="#content">
              <i class="bi bi-circle "></i><span>Post Vacancy</span>
            </a>
            <a id="vacancyCategory" style="padding-left: 60px;" href="#vacancyCatagory">
              <i class="
              bi bi-circle"></i><span>Add Vacancy Category</span>
            </a>
          </li>
          <li>
            <a id="postTender" href="#tenderPost">
              <i class="bi bi-circle"></i><span>Post Tender</span>
            </a>
          </li>
          <li>
            <a id="postBlog" href="#tenderPost">
              <i class="bi bi-circle"></i><span>Post Blog</span>
            </a>
          </li>
          <li>
            <a id="postElectronics" href='#'>
              <i class="bi bi-circle"></i><span>Post Electronics</span>
            </a>
            <a id="elecCategory" style="padding-left: 60px;" href="#vacancyCatagory">
              <i class="
              bi bi-circle"></i><span>Add Electronics Category</span>
            </a>
          </li>

          <li>
            <a id="postCharity" href='#'>
              <i class="bi bi-circle"></i><span>Post Charity</span>
            </a>
          </li>

          <li>
            <a id="postBig" href='#'>
              <i class="bi bi-circle"></i><span>Post Big Discount Advertisment</span>
            </a>
          </li>

          <li>
            <a id="carPost" href="#carPost">
              <i class="bi bi-circle"></i><span>Post Cars</span>
            </a>



            <a id="carCategory" style="padding-left: 60px;" href="#carCatagory">
              <i class="
              bi bi-circle"></i><span>Add Cars Category</span>
            </a>
          </li>
          <li>
            <a id="housePost" href="#housePost">
              <i class="bi bi-circle"></i><span>Post House</span>
            </a>
            <a id="houseCategory" style="padding-left: 60px;" href="#houseCatagory">
              <i class="
              bi bi-circle"></i><span>Add House Category</span>
            </a>
          </li>
          <li>
            <a id="postAd" href="#adPost">
              <i class="bi bi-circle"></i><span>Post Advertisment</span>
            </a>
            <a id="adCategory" style="padding-left: 60px;" href="#adCatagory">
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
            <a id="homeTutor" href="#viewVacancyPost">
              <i class="bi bi-circle"></i><span>Home Tutor [Upload Your Portoflio]</span>
            </a>
          </li>
          <li>
            <a id="houseKeeper" href="#viewVacancyPost">
              <i class="bi bi-circle"></i><span>House Keeper [Upload Your Portoflio]</span>
            </a>
          </li>
          <li>
            <a id="hotelWorker" href="#viewVacancyPost">
              <i class="bi bi-circle"></i><span>Hotel Worker [Upload Your Portoflio]</span>
            </a>
          </li>

          <li>
            <a id="zebegnaWorker" href="#viewVacancyPost">
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
    <div id="postBox" class="container">
    <div class="row">
                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
<script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user'},
      success: function(data){
        $('#adminC').text(data)
      }
    })
    
  }, 3000);
</script>




                <div class="card-body">
                  <h5 class="card-title">Admins <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
         
                      <h6 id="adminC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Normal Users <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user', selecter: 'auth', arg: 'USER' },
      success: function(data){
        $('#userC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="userC"></h6>
                     

                    </div>
                  </div>
                </div>



                <div class="card-body">
                  <h5 class="card-title">Editors <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user', selecter: 'auth', arg: 'EDITOR' },
      success: function(data){
        $('#editorC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="editorC"></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

    
    

    <!-- tender counter -->
    <div class="col-xxl-4 col-md-6">



              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Tender Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'tender' },
      success: function(data){
        $('#tenderC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="tenderC"></h6>
                     

                    </div>
                  </div>
                </div>

                
                <div class="card-body">
                  <h5 class="card-title">Vacancy Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'vacancy'},
      success: function(data){
        $('#vaCC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="vaCC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Advertisment Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'ad'},
      success: function(data){
        $('#adC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="adC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Electronics Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'electronics'},
      success: function(data){
        $('#elccC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="elccC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">House Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'housesell', selecter: 'houseOrLand', arg: 'HOUSE'},
      success: function(data){
        $('#houseC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="houseC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Land Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'housesell', selecter: 'houseOrLand', arg: 'Land'},
      success: function(data){
        $('#landC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="landC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cars Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'car'},
      success: function(data){
        $('#carC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="carC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Home Tutor</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'jobhometutor'},
      success: function(data){
        $('#hometutorC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="hometutorC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Hotel Worker</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'hotelhouse', selecter: 'hotelOrHouse', arg: 'HOTEL'},
      success: function(data){
        $('#hotelcC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="hotelcC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Home Worker</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'hotelhouse', selecter: 'hotelOrHouse', arg: 'HOUSE'},
      success: function(data){
        $('#houseWC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="houseWC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Security Gaurd</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>
  setInterval(() => {
    $.ajax({
      url: 'admin/editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'zebegna'},
      success: function(data){
        $('#zebegnaC').text(data)
      }
    })
    
  }, 3000);
</script>
                      <h6 id="zebegnaC" ></h6>
                     

                    </div>
                  </div>
                </div>

              </div>




            </div><!-- End Revenue Card -->
    </div>
    </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/assets/vendor/chart.js/chart.min.js"></script>
  <script src="admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="admin/assets/vendor/quill/quill.min.js"></script>
  <script src="admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="admin/assets/js/main.js"></script>

</body>

</html>