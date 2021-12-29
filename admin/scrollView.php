<?php
  if(isset($_GET['type'])){
      ob_start();
      session_start();
      $idArr = $_SESSION['scroll'];
    
      
    require_once "../php/adminCrude.php";
    if($_GET['type'] == 'vacancy'){
      $data = $admin->vacancyPostLister();
      while($row = $data->fetch_assoc()){
          if(!in_array($row['id'],$idArr)){
            $idArr[]= $row['id'];  
            print_r($idArr);
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
          array_push($_SESSION['scroll'], $row['id'] );
      }
    }
  
  }
  ///////////////////////////////////////////////////////////////
  if($_GET['type'] == 'tender'){

    $data = $admin->tenderPostCounter();
    while($row = $data->fetch_assoc()){
        if(!in_array($row['id'],$idArr)){
            $idArr[]= $row['id']; 
        ?>
        <h6>Tender Post</h6>
        <?php
        $date1 = date('Y/m/d');
        $date2 = $row['deadLine'];
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);
    
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        $difff= abs(round($diff / 86400));
        
        if($difff < 3 ){
            ?>
            <div class="card mb-3" style="max-width: 540px; box-shadow:  10px 10px red; ">
            <div class="row g-0">
                <div class="col-md-4">
                <?php 
                $p = $admin->photoSplit($row['photoPath1']);
                if(!empty($p)){
                  ?>
                  <img src="<?php echo $p[0]; ?>" class="img-fluid rounded-start" alt="...">
                  <?php
                }if(empty($row['photoPath1'])){
                  ?>
                  <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                  <?php
                }
                
                ?> 
                                        </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    <p class="card-text"><?php echo $row['info'] ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                </div>
                <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="editTender('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                </div>
            </div>
            </div>
            <?php
        }else{

        
          
        ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                
                <?php 
                $p = $admin->photoSplit($row['photoPath1']);
                if(!empty($p)){
                  ?>
                  <img src="<?php echo $p[0]; ?>" class="img-fluid rounded-start" alt="...">
                  <?php
                }if(empty($row['photoPath1'])){
                  ?>
                  <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                  <?php
                }
                
                ?> 
                

                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    <p class="card-text"><?php echo $row['info'] ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                </div>
                <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="editTender('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                </div>
            </div>
        </div>

        <?php
        array_push($_SESSION['scroll'], $row['id'] );

        }
    }
    }
        
      
    
    

  }

}


?>