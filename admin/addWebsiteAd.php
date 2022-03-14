<?php
require_once "../php/fetchApi.php";
require_once "../php/auth.php";
require_once "../php/adminCrude.php";
include "../includes/adminSide.php";
include "../php/connect.php";




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
<script>
  

</script>



<?php
    // to update the pkg and money info of the payment fetching block


?>
 
 <div class="row">
<div class="col-8">
    <?php
    // to add pakages 
            ?>

            <!-- to change the large in the front page  -->
            <form action="addWebsiteAd.php" method="POST" enctype="multipart/form-data">
            <div id="registerBox">
        <label for="exampleInputEmail1">Change Front Page large Photo</label>
          <input type="file" required class="form-control" id="photo" name="photoFL[]"  >
          <small id="emailHelp" class="form-text text-muted"> </small>
        </div>



                <button class="btn btn-dark" type="submit" >Change Ad</button>
            </form>

    <?php
        if(isset($_FILES['photoFL'])){
            $photo = $_FILES['photoFL'];
            $up = uploadPhotos('webAdx', $photo );
            if($up[4] == 'error'){
                foreach($up as $val){
                  echo $val;
                }
              }elseif($up[4] == 'work'){
                $enter = "UPDATE `webAd` SET `photoPath1` = '$up[0]' WHERE `webAd`.`id` = 31 ";
                $ask = $mysql->query($enter);
                if($ask){
                  echo '<span class="text-success">Changed Successfully!</span>';
                }else{
                  echo 'Error';
                }
              }
        }
    ?>


 <!-- to change the small ad in the front page  -->
            <form action="addWebsiteAd.php" method="POST" enctype="multipart/form-data">
            <div id="registerBox">
        <label for="exampleInputEmail1">Change Front Page Small Photo</label>
          <input type="file" required class="form-control" id="photo" name="photoFS[]"  >
          <small id="emailHelp" class="form-text text-muted"> </small>
        </div>



                <button class="btn btn-dark" type="submit" >Change Ad</button>
            </form>

            <?php
        if(isset($_FILES['photoFS'])){
            $photo = $_FILES['photoFS'];
            $up = uploadPhotos('webAd', $photo );
            if($up[4] == 'error'){
                foreach($up as $val){
                  echo $val;
                }
              }elseif($up[4] == 'work'){
                $enter = "UPDATE `webAd` SET `photoPath1` = '$up[0]' WHERE `webAd`.`id` = 32 ";
                $ask = $mysql->query($enter);
                if($ask){
                  echo '<span class="text-success">Changed Successfully!</span>';
                }else{
                  echo 'Error';
                }
              }
        }
    ?>
            <!-- /// to change the default add photo that is shown when there are no ads to show  -->
            <form action="addWebsiteAd.php" method="POST" enctype="multipart/form-data">
            <div id="registerBox">
        <label for="exampleInputEmail1">To change the default add photo that is shown when there are no ads to show</label>
          <input type="file" required class="form-control" id="photo" name="photoD[]"  >
          <small id="emailHelp" class="form-text text-muted"> </small>
        </div>



                <button class="btn btn-dark" type="submit" >Change Ad</button>
            </form>
            <?php
        if(isset($_FILES['photoD'])){
            $photo = $_FILES['photoD'];
            $up = uploadPhotos('webAd', $photo );
            if($up[4] == 'error'){
                foreach($up as $val){
                  echo $val;
                }
              }elseif($up[4] == 'work'){
                $enter = "UPDATE `webAd` SET `photoPath1` = '$up[0]' WHERE `webAd`.`id` = 33 ";
                $ask = $mysql->query($enter);
                if($ask){
                  echo '<span class="text-success">Changed Successfully!</span>';
                }else{
                  echo 'Error';
                }
              }
        }
    ?>
                    <!-- /// pkg add handler block  -->
                    <?php
                        if(isset($_POST['pkgName'], $_POST['pkgInfo'], $_POST['pkgPrice'], $_POST['pkgDate'])){
                            $pn = $_POST['pkgName'];
                            $pi = $_POST['pkgInfo'];
                            $pp = $_POST['pkgPrice'];
                            $pkgdate = $_POST['pkgDate'];

                            $enter = sponserManageADD($pn, 'pkg', $pi.','.$pp.','.$pkgdate );  // the middle is to selecter key to select the pkg for the viewing and update.
                            if($enter){
                                echo '<span class="text-success">Pakage Added</span>';
                            }else{
                                echo '<span class="text-danger">error</span>';
                            }
                        }

                    ?>
     
</div>
</div>





              
</main>
</div>
    <?php

include "../includes/adminFooter.php";
?>