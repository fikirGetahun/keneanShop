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
// to view and to edit blockes 
if(isset($_GET['view'])){
  ?>
<h3>Pakages LIst</h3>
 
 <div class="row">
 <?php
    //fetch all the pkgs
    $fetch = allPostListerOnColumen('adcategory', 'tableName', 'pkg');
    if($fetch->num_rows !=0){
    while($row = $fetch->fetch_assoc()){
      $jjf = explode(',', $row['subcityKey']);
      ?>
    <div class="col-4">
      <h5>Pakage Name:</h5>
    <h6><?php echo $row['category'] ?>  </h6>
    <h5>Pakage Info</h4>
    <p><?php var_dump($jjf[0]) ?></p>
    <h5>Price : </h5><h6><?php var_dump($jjf[1]) ?></h6>
</div>  
      <?php
    }
  }else{
    echo '<span class="text-danger">No Pakages here!</span>';
  }
?>

</div>

<hr>
<br>

<h3>Bank LIst</h3>
 
 <div class="row">
 <?php
    //fetch all the pkgs
    $fetch = allPostListerOnColumen('adcategory', 'tableName', 'bank');
    if($fetch->num_rows !=0){
    while($row = $fetch->fetch_assoc()){
      $jjf = explode(',', $row['subcityKey']);
      ?>
    <div class="col-4">
      <h5>Bank Name:</h5>
    <h6><?php echo $row['category'] ?> </h6>
    <h5>Name : </h5><h6><?php var_dump($jjf[1]) ?></h6>
    <h5>Account NO</h5>
    <h6><?php var_dump($jjf[1]) ?></h6>
    
</div>  
      <?php
    }
  }else{
    echo '<span class="text-danger">No Banks here!</span>';
  }
?>

</div>  
  <?php
}


// to edit the pkgs and bank 
if(isset($_GET['edit'], $_GET['id'], $_GET['type'])){
  $id = $_GET['id']; // id of the row of the data
  // to edit pkgs
  if($_GET['type'] == 'pkg'){
    $fetch = allPostListerOn2Columen('adcategory', 'tableName', 'pkg', 'id', $id);
    $jjf = explode(',', $row['subcityKey']);
    ?>
    
    <form action="viewPkg.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Package Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="pkgName" placeholder="pkg name" value="<?php echo $row['category'] ?> " >
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Pakage Info</label>
                    <textarea type="text" class="form-control" name="pkgInfo" id="des2" 
                    aria-describedby="emailHelp" name="info2" placeholder=" "> <?php var_dump($jjf[0]) ?> </textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Package Price</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="pkgPrice" placeholder=" " value="<?php var_dump($jjf[1]) ?>" >
                    
                </div>

                <button class="btn btn-dark" type="submit" >Edit Package</button>
            </form>
            <?php
              if(isset($_POST['pkgName'], $_POST['pkgInfo'], $_POST['pkgPrice'])){
                  $pn = $_POST['pkgName'];
                  $pi = $_POST['pkgInfo'];
                  $pp = $_POST['pkgPrice'];

                  $enter = sponserManageUPDATE($pn, 'pkg', $pi.','.$pp, $id);  // the middle is to selecter key to select the pkg for the viewing and update.
                  if($enter){
                      echo '<span class="text-success">Pakage Edited</span>';
                  }else{
                      echo '<span class="text-danger">error</span>';
                  }
              }

                    ?>
    <?php
  }elseif($_GET['type'] == 'bank'){
    $fetch = allPostListerOn2Columen('adcategory', 'tableName', 'bank', 'id', $id);
    $jjf = explode(',', $row['subcityKey']);
    ?>
         <form action="addPkg.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bank Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="bankName" placeholder="bank name" value="<?php echo $row['category'] ?>">
                    
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Reciver's Name</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="rName" placeholder="bank name" value="<?php var_dump($jjf[1]) ?>">
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Bank Account No:</label>
                <input type="text" class="form-control" id="nameTitle" aria-describedby="emailHelp" name="bankAcc" placeholder="be caryfull dont make a mistake" value="<?php var_dump($jjf[0]) ?>">
                    
                </div>

                <button class="btn btn-dark" type="submit" >Edit Bank</button>
            </form>
            <?php
                        if(isset($_POST['bankName'], $_POST['bankAcc'], $_POST['rName'])){
                            $bn = $_POST['pkgName'];
                            $bacc = $_POST['bankAcc'];
                            $rn = $_POST['rName'];

                            $enter = sponserManageUPDATE($bn, 'bank', $rn.','.$bacc, 'id', $id);  // the middle is to selecter key to select the pkg for the viewing and update.
                            if($enter){
                                echo '<span class="text-success">Bank Edited</span>';
                            }else{
                                echo '<span class="text-danger">error</span>';
                            }
                        }

                    ?>
    <?php
  }
}

?>






              
</main>
</div>
    <?php

include "../includes/adminFooter.php";
?>