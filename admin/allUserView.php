<?php
  
    require_once "../php/auth.php";
require_once "../php/adminCrude.php";
require "../php/fetchApi.php";

include "../includes/adminSide.php";
if(isset($_POST['id'])){
  $uid = $_POST['id'];
}

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy', 'blog');


$_SESSION['allUser'] = 0; // this automaticaly sets the page session to 0 so that when the page is loaded again, it doesnt resume previous page number


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
<!-- <script src="assets/jquery.js" type="text/javascript"></script> -->

<script>

        
      </script>



<div id="postBox">

<main id="main" class="main">

<h5>Zumra360 </h5>

<div class=" ">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name </th>
      <th scope="col">Phone</th>
      <th scope="col">Auth</th>
      <th scope="col">---</th>
    </tr>
  </thead>
  <tbody>
<?php






if(isset($_GET['user'])){
  $selected= 'user';
  $oneTablePostList = allPostListerOnColumenD('user', 'auth', 'USER', 0 , 10);
}elseif(isset($_GET['editor'])){
  $selected= 'editor';
  $oneTablePostList = allPostListerOnColumenD('user', 'auth', 'EDITOR', 0 , 10);
}elseif(isset($_GET['admin'])){
  $selected= 'admin';
  $oneTablePostList = allPostListerOnColumenD('user', 'auth', 'ADMIN', 0 , 10);
}
    
    ?>
<script>
  function usrScroll(){

    // the firist ajax request is for changing the page number, when the request goes, it adds 10 to the session variable that holds the page no of the 
    $.ajax({
      url: 'editHandler.php',
      type: 'get',
      data:{
        allUser: 'true'
      },
      success: function(){
                $.ajax({
              url: 'allUserScroll.php',
              type : 'get',
              data: {
                listType: '<?php echo $selected ?>'
              },
              success: function(data){
                $('tbody').append(data)
              }
            })
      }
    })




  }
</script>
 
      <?php
      $i = 1;
      while($row = $oneTablePostList[0]->fetch_assoc()){  

  
        ?>
      
      
    <tr>
   
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['firstName'].' '.$row['lastName'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['auth'] ?></td>
      <td><a href="./userInfo.php?poster=<?php echo $row['id'] ?>"  class="btn btn-dark"> View User</a></td>
     </tr>


        <?php
$i++;
      }
    
    


?>
  </tbody>
</table>
<button class="btn btn-dark" onclick="usrScroll()"  >View More</button>
</div>
</main>
</div>

<?php

include "../includes/adminFooter.php";
?>


