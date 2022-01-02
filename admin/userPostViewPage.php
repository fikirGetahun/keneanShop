<?php

require_once "../php/auth.php";
require_once "../php/adminCrude.php";
if(isset($_POST['id'])){
  $uid = $_POST['id'];
}

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy');



?>
<!-- <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="../assets/jquery.js"></script>
  <script>
    $(document).ready(function(){

      // $(window).scroll(function(){
      //   // alert(($(window).height() - $(document).height()))
      //   if($(window).scrollTop() == ($(document).height() - $(window).height())){
      //     // alert('scroll')
      //     $.ajax({
      //       url:'scrollView.php',
      //       type: 'GET',
      //       data:'type=vacancy',
      //       success: function(data){
      //         $('#vac1').append(data)
      //       }
      //     })
      //   }
      // })

    })


      function edit(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'editVacancy', pid: uid}))
      }

      function editTender(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'editTender', pid: uid}))
      }

      function adEdit(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'ad', pid: uid}))
      }

      function editCar(pid){
        $('#allin').load('editPost.php?'+$.param({type: 'car', pid: pid}))
      }

      function editHouse(pid){
        $('#postBox').load('editPost.php?'+$.param({type: 'house', pid: pid}))
      }
      function adView(id){
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
<script src="../assets/jquery.js"></script>
    <script>
        function elcView(id){
          $('#allin').load('discriptionPage.php', {type: '<?php echo $posts ?>',pid: id})

        }

        function editElc(id){
          $('#allin').load('editPost.php?'+$.param({type: '<?php echo $posts ?>', pid: id})) 

        }

        
      </script>



<div id="allin" >
<?php

$u = count($dbTables);
$i = 0;
foreach($dbTables as $posts){  
    $oneTablePostList = $auth->userPostsLister($uid, $posts);
    
    ?>

      <div class="row">
        <h2><?php echo $dbTables[$i] ?></h2>
      <?php
      while($row = $oneTablePostList->fetch_assoc()){  
  
        ?>
          <div id="adVieww" class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $row['title'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#viewDiscription" onclick="adView(<?php echo $row['id'] ?>)"  ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                      <button type="button" onclick="adEdit(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
        
        <?php

      }
    
$i++; 
    
}

?>
</div>

    




