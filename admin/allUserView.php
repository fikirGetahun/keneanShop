<?php
  
    require_once "../php/auth.php";
require_once "../php/adminCrude.php";
include "../includes/adminSide.php";
if(isset($_POST['id'])){
  $uid = $_POST['id'];
}

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy', 'blog');



?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- <!-- Favicons
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- <script src="../assets/jquery.js"></script> -->
  <!-- <script>
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


  </script> -->
</head> -->
<script src="assets/jquery.js" type="text/javascript"></script>

<script>
        function allView(id, tb){
          alert('sdfsdf')
          $('#allin').load('admin/discriptionPage.php?', {type: tb,pid: id})

        }

        function allEdit(id,tb){
          alert('sdfsdf')
          $('#allin').load('admin/editPost.php?'+$.param({type: tb, pid: id})) 

        }

        function del(pid, table){
          
          if(confirm("Are You Sure You Want to Delete This Post?") == true){
            $.ajax({
              url: 'admin/editHandler.php',
              type: 'POST',
              data: {delete: true, table: table, postId: pid},
              success: function(data){
                alert(data)
              }
            })
          }
        }

        
      </script>



<div id="postBox">

<main id="main" class="main">
<div class="row">
<?php


foreach($dbTables as $posts){  
    $oneTablePostList = $auth->userPostsLister($uid, $posts);
    
    ?>

<?php echo $posts ?>

      <?php
      while($row = $oneTablePostList->fetch_assoc()){  
  
        ?>
      
      <!-- <h2></h2> -->
          <div  class="col-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $row['title'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#viewDiscription" onclick="allView('<?php echo $row['id'] ?>', '<?php echo $posts ?>')"  ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                      <button type="button" onclick="allEdit('<?php echo $row['id'] ?>', '<?php echo $posts ?>')" class="btn btn-sm btn-outline-secondary">Edit</button>
                      <button type="button" onclick="del('<?php echo $row['id'] ?>', '<?php echo $posts ?>')" class="btn btn-sm btn-outline-secondary">Delete</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
        


            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name </th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        <?php

      }
    
    
}

?>
</div>
</main>
</div>

<?php

include "../includes/adminFooter.php";
?>


