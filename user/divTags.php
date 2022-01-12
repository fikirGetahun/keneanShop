<?php
include "../includes/header.php";

?>



<!-- input form jiji -->
<div id="jiji" style="width:100%;" class="modal-dialog">

    <div class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select Address-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">


              <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){
                  ?>
                  
                  <tr>
                  <td class="text-center"><a id="<?php echo $i ?>" onclick="handler('<?php echo $loc ?>')"  > <?php echo $loc ?></a></td>
                  </tr>
                
                  <?php
                  $i++;
                }
              ?>                
</tbody>
</table>
              <div class="invalid-feedback">
                Please select a valid country. 
              </div>

            
      </div>
    </div>
</div>



<!-- this is location changer lister, it lists the location -->
<div id="jiji2" style="width:100%;" class="modal-dialog">

    <div class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select Address-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">


              <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){
                  ?>
                  
                  <tr>
                  <td class="text-center"><a  href="index.php?loc=<?php echo $loc ?>"  > <?php echo $loc ?></a></td>
                  </tr>
                
                  <?php
                  $i++;
                }
              ?>                
</tbody>
</table>
              <div class="invalid-feedback">
                Please select a valid country. 
              </div>

            
      </div>
    </div>
</div>




<!-- ///sub city input tag for house and land -->
<div id="jijiSub" style="width:100%;" class="modal-dialog">

    <div class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select SubCity-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">


              <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'SUBCITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){
                  ?>
                  
                  <tr>
                  <td class="text-center"><a id="<?php echo $i ?>" onclick="typeHandler('<?php echo $loc ?>', 'jijiApi', 'jijiShow', 'jijiSub' )"   > <?php echo $loc ?></a></td>
                  </tr>
                
                  <?php
                  $i++;
                }
              ?>                
</tbody>
</table>
              <div class="invalid-feedback">
                Please select a valid country. 
              </div>

            
      </div>
    </div>
</div>





<!-- ///car type category lister divtags-->
<div  style="width:100%;" class="modal-dialog">

    <div id="carType" class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select Address-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">

              <?php
              require_once "../php/adminCrude.php";
                $carCat = $admin->carCategoryLister();
                while($carCatRow = $carCat->fetch_assoc()){
                  ?>
                  <tr>
                  <td class="text-center"><a id="<?php echo $i ?>" onclick="typeHandler('<?php echo $carCatRow['category'] ?>', 'carApi', 'carShow', 'carType' )"  > <?php echo $carCatRow['category'] ?></a></td>
                  </tr>
                  <?php
                }
              ?>
              
</tbody>
</table>


            
      </div>
    </div>
</div>





<!-- //// divtag for ad type lister -->
<div  style="width:100%;" class="modal-dialog">

    <div id="adType" class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select AD Category-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">

<?php
require_once "../php/adminCrude.php";
              $out11 = $admin->adsCategoryLister();
              while($r = $out11->fetch_assoc()){
              ?>
            <tr>
            <td class="text-center"><a id="<?php echo $i ?>" onclick="typeHandler('<?php echo $r['category'] ?>', 'adApi', 'adShow', 'adType' )"  > <?php echo $r['category'] ?></a></td><br>
            </tr>
            <?php
              }
            ?>


              
</tbody>
</table>


            
      </div>
    </div>
</div>




<!-- ///// electronics type -->
<div  style="width:100%;" class="modal-dialog">

    <div id="elecType" class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select Electronics Category-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">

<?php
require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";


$carCat = $get->allPostListerOnColumen('adCategory', 'tableName', 'electronics');
while($carCatRow = $carCat->fetch_assoc()){
  ?>


            <tr>
            <td class="text-center"><a id="<?php echo $i ?>" onclick="typeHandler('<?php echo $carCatRow['category'] ?>', 'elecApi', 'elecShow', 'elecType' )"  > <?php echo $carCatRow['category'] ?></a></td><br>
            </tr>


<?php
}
?>

              
</tbody>
</table>


            
      </div>
    </div>
</div>




<!-- ///vacancy type manager -->

<div  style="width:100%;" class="modal-dialog">

    <div id="vac11Type" class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select JOB Category-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">

<?php
require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";

$vacancyCat = $admin->vacancyCategoryLister();
while($vacancyCatRow = $vacancyCat->fetch_assoc()){
  ?>
  <tr>
            <td class="text-center"><a id="<?php echo $i ?>" onclick="typeHandler('<?php echo $vacancyCatRow['category'] ?>', 'vac11Api', 'vac11Show', 'vac11Type' )"  > <?php echo $vacancyCatRow['category'] ?></a></td><br>
            </tr>
  <?php
}
?>

              
</tbody>
</table>


            
      </div>
    </div>
</div>
