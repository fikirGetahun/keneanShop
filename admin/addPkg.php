<?php
require_once "../php/fetchApi.php";
require_once "../php/auth.php";
require_once "../php/adminCrude.php";
include "../includes/adminSide.php";





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

<!-- /// pkg add handler block  -->
<?php
    if(isset($_POST['pkgName'], $_POST['pkgInfo'], $_POST['pkgPrice'])){
        
    }

?>

<?php
    // to update the pkg and money info of the payment fetching block


?>
 
 <div class="row">
<div class="col-8">
    <?php
        if(isset($_GET['add']) && $_GET['add'] == 'pkg'){
            ?>
                <form action="addPkg.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Package Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="pkgName" placeholder="pkg name">
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Pakage Info</label>
                    <textarea type="text" class="form-control" name="pkgInfo" id="des2" 
                    aria-describedby="emailHelp" name="info2" placeholder=" "></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Package Price</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="pkgPrice" placeholder=" ">
                    
                </div>

                <button class="btn btn-dark" type="submit" >Add Package</button>
                </form>

            <?php
        }
    ?>


    <h5>Silver Package Info</h5>
    <textarea></textarea>
    <h5>Price : </h5><h6></h6>
</div>
</div>





              
</main>
</div>
    <?php

include "../includes/adminFooter.php";
?>