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



<?php
    // to update the pkg and money info of the payment fetching block


?>
 
 <div class="row">
<div class="col-8">
    <?php
    // to add pakages 
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
                    <!-- /// pkg add handler block  -->
                    <?php
                        if(isset($_POST['pkgName'], $_POST['pkgInfo'], $_POST['pkgPrice'])){
                            $pn = $_POST['pkgName'];
                            $pi = $_POST['pkgInfo'];
                            $pp = $_POST['pkgPrice'];

                            $enter = sponserManageADD($pn, 'pkg', $pi.','.$pp);  // the middle is to selecter key to select the pkg for the viewing and update.
                            if($enter){
                                echo '<span class="text-success">Pakage Added</span>';
                            }else{
                                echo '<span class="text-danger">error</span>';
                            }
                        }

                    ?>
            <?php
        }

        // to add banks and account with new bank
        if(isset($_GET['add']) && $_GET['add'] == 'bank'){
            ?>
            <form action="addPkg.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bank Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="bankName" placeholder="bank name">
                    
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Reciver's Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="rName" placeholder="bank name">
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Bank Account No:</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="bankAcc" placeholder="be caryfull dont make a mistake">
                    
                </div>

                <button class="btn btn-dark" type="submit" >Add Bank</button>
            </form>
                    <!-- /// pkg add handler block  -->
                    <?php
                        if(isset($_POST['bankName'], $_POST['bankAcc'], $_POST['rName'])){
                            $bn = $_POST['pkgName'];
                            $bacc = $_POST['bankAcc'];
                            $rn = $_POST['rName'];

                            $enter = sponserManageADD($bn, 'bank', $rn.','.$bacc);  // the middle is to selecter key to select the pkg for the viewing and update.
                            if($enter){
                                echo '<span class="text-success">Bank Added</span>';
                            }else{
                                echo '<span class="text-danger">error</span>';
                            }
                        }

                    ?>
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