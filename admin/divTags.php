


<div id="cBox">
<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
      <?php
      require_once "../php/adminCrude.php";
      $out2 = $admin->adsCategoryLister();
      while($row = $out2->fetch_assoc()){

              ?>
            <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td id="editAd<?php echo $row['id'] ?>">
            <?php echo $row['category'] ?>
             <button onclick="edit(<?php echo $row['id'] ?>)"  class="btn btn-dark">Edit</button> 
            <button class="btn btn-dark">Delete</button>
            </td>

            </tr>
              <?php            
          }
      
      
      ?>


  </tbody>
</table>
</div>