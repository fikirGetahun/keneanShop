<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}

require_once "../php/fetchApi.php";
require_once "../php/adminCrude.php";



        $member = $get->allPostListerOnTableD('mambership', $_SESSION['mbScroll']  , 5);

        ?>
                <!-- <script>
          function scr(){
            $.ajax({
              url: 'memberScroll.php',
              type: 'get',
              data : {x : 's'},
              success: function(dt){
                $('#mb').append(dt)
              }
            })
          }
        </script> -->
        <?php
        while( $row = $member[0]->fetch_assoc()){

            ?>
            <div id="adVieww" class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">      
              <div class="card-body">
                <p class="card-text"><?php echo $row['name'] ?></p>
                <!-- <p class="card-text"><?php echo $row['price'] ?> Birr</p> -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
           
                    <?php
                      if(isset($_GET['forward'], $_GET['tb'], $_GET['post'], $_GET['client']) && $_GET['forward'] == true && $_GET['tb'] == true && $_GET['post']== true && $_GET['client'] == true){
                        $tbb = $_GET['tb'];
                        $pos = $_GET['post'];
                        $client = $_GET['client'];
                        ?>
                      <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>&tb=<?php echo $tbb ?>&post=<?php echo $pos ?>&forward=true&client=<?php echo $client ?>"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                        <a href="../Account.php?message=true&inner=true&tb=<?php echo $tbb ?>&reciver=<?php echo $row['userId'] ?>&post=<?php echo $pos ?>&forwarded=true&client=<?php echo $client ?>" > Send Link</a> 
                        <?php
                      }else{
                        ?>
                      <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                        <?php
                        
                      }
                    ?>
                  </div>
                  <!-- <small class="text-muted">9 mins</small> -->
                </div>
              </div>
            </div>
          </div>

              <?php
         
          }
?>