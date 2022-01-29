<?php
  include "../includes/header.php";
  include "../includes/adminSide.php";
  require_once '../php/fetchApi.php';
?>
<body>
    <?php

    if(isset($_GET['list'])){
        $member = $get->allPostListerOnTable('membership');

        ?>
        <div class="row">
        <script>

        </script>
        <?php
        while( $row = $member->fetch_assoc()){
            ?>
            <div id="adVieww" class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">
              <div class="card-body">
                <p class="card-text"><?php echo $row['name'] ?></p>
                <!-- <p class="card-text"><?php echo $row['price'] ?> Birr</p> -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="#viewDiscription" onclick="adView(<?php echo $row['id'] ?>)"  ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>

              <?php
          }
          ?>
          </div>
          <?php
        }
    
    ?>

</body>


<?php

include "../includes/adminFooter.php";
?>