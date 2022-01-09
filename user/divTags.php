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
