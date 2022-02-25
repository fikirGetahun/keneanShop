<?php
include "../includes/header.php";

?>

targetFor


<!-- input form jiji -->
<div id="jiji" style="width:100%;" class="modal-dialog">
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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
                $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){
                  ?>
                  
                  <tr>
                  <td class="text-center" ><a id="<?php echo $i ?>" onclick="handler('<?php echo $loc ?>')"  > <?php echo $loc ?></a></td>
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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
                $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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
                $locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'SUBCITY');
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
    <div id="carType" class="modal-content">
      <div  class="modal-header" >
      <table class="table container-fluid"  >
  <thead>
    <tr>
      <th scope="col"><h5 class="text-center" >-Select Model-<h5></th>
    </tr>
  </thead>


<tbody class= "align-middle">

              <?php
              require_once "../php/adminCrude.php";
                $carCat = allCategoryLister('car');
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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
              $out11 = allCategoryLister('ad');
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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


$carCat = allPostListerOnColumen('adCategory', 'tableName', 'electronics');
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
<style>
  tr:hover{
    cursor: pointer;
  }
</style>
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

$vacancyCat = allCategoryLister('vacancy');
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


<div id="carFR">
<div  class="input-group mb-3" >
        <select  class="custom-select" name="rentStatus" id="rentS">
          <option  >Rent Status</option>
          <option value="With Driver">With Driver</option>
          <option selected value="Car Only">Car Only</option>
        </select>
        </div>

        
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="forWho" id="forWho">
          <option value=" " >Rent For ?</option>
          <option value="All">All</option>
          <option value="Private">Private</option>
          <option value="Govormental Offices">Govormental Offices</option>
          <option value="Private Company">Private Company</option>
          <option value="NGO">NGO</option>
        </select>
        </div>

        
        <div class="form-group" id="whyRent">
          <label for="exampleInputEmail1">Where Do you Want to Rent ?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="whyRent" placeholder="Description"></textarea>
          <small id="emailHelp" class="form-text text-muted">Describe where you want to rent this car.</small>
        </div>
</div>