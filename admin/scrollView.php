<?php
echo 'scroolll';
  if(isset($_GET['type'])){
    require_once "../php/adminCrude.php";
    if($_GET['type'] == 'vacancy'){
      $data = $admin->vacancyPostLister();
      while($row = $data->fetch_assoc()){
          ?>
          <h6>Vacancy Post</h6>


          <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                  <div class="col-md-4">
                  <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                  <div class="card-body">
                      <h5 class="card-title">Position :<?php echo $row['positionTitle'] ?></h5>
                      <p class="card-text">Job Type :<?php echo $row['positionType'] ?></p>
                      <p class="card-text">Deadline :<?php echo $row['deadLine'] ?></p>
                      <p class="card-text">Requierd Position :<?php echo $row['positionNum'] ?></p>
                      <p class="card-text">Job Type :<?php echo $row['info'] ?></p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                  <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="edit('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                  </div>
              </div>
          </div>

          <?php
          
      }
  
  }
}
?>