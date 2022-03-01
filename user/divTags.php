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



<!-- //// sponser payment modal  -->
<div  class="modal-dialog" role="document">
                            <div id="spId" class="modal-content">
                              <div  class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Fill Bank Info!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                       
                              <div class="modal-body">
                                <form   method="POST">
                                  <!-- this is the post id  -->
                                  <input hidden type="text" name="pid" value="<?php echo $row['id'] ?>"> 
                                <div class="row">
                                  <div  class="form-group col-4" >
                                    <label for="exampleFormControlFile1">Packages</label>
                                    <select  class="form-select" onchange ='pkgHandler(this.value)'  aria-label="Default select example" name="pkg" id="forWho">
                                      <option value="Silver" >Silver</option>
                                      <option value="Gold" >Gold</option>
                                      <option value="Platinum" >Platinum</option>
                                    </select>
                                  </div>
                                  <div id="desc" class="mt-3 col-7 border">
                                  This is the description of the silver pakage
                                  <h5 id="amount" class="text-success">Amount: 300 birr </h5>
                                  </div>
                                </div>

                                <div class="row">
                                  <div  class="form-group" >
                                    <label for="exampleFormControlFile1">Select Bank</label>
                                    <select  class="form-select" onchange ='bankHandler(this.value)'  aria-label="Default select example" name="bankName" id="forWho">
                                      <option value="CBE" >CBE</option>
                                      <option value="AWASH" >AWASH</option>
                                      <option value="BIRHAN" >BIRHAN</option>
                                    </select>
                                    <h5 id="bname" class="mt-2">CBE </h5>
                                    <h6>Account No: </h6> <h6 id="bacc" ></h6>
                                  </div>

                                  <div class="form-group col-9">
                                    <label for="exampleInputEmail1">Transaction Id </label>
                                    <input type="number" class="form-control" name="tid" id="exampleInputEmail1" placeholder="Enter Transaction Id " >
                                    <small id="emailHelp" class="form-text text-muted">Here you insert the transaction id from the bank money transfer.</small>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                              </div>
                                </form>
                              </div>
                
                            </div>
                          </div>