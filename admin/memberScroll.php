<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}





require_once "../php/fetchApi.php";
require_once "../php/adminCrude.php";

// this is arry of the location, subcity and wereda imploded to string so that its assinged to 'filter' parameter in the memberslist.php
if(isset($_GET['filter'])){
  $filter = $_GET['filter'];
  $filter = explode(',',$filter); // now we will explode it back to arry so that we can perform the get request for all the location, subcity, and wereda
}

if(isset($_GET['pending'])){
  echo $_GET['pending'];
}

if(isset($filter[0])){
  if(isset($filter[1], $filter[2])){
    $we = $filter[2];
    $su = $filter[1];
    if(isset($_GET['pending'])){
      $member = allPostListerOn4ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', null, 'wereda', $we, 'subCity', $su , $_SESSION['mbScroll'], 5);
    }else{
      $member = allPostListerOn4ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'wereda', $we, 'subCity', $su , $_SESSION['mbScroll'], 5);
    }
  }elseif(isset($filter[1])){
    $subReq = $filter[1];
    if(isset($_GET['pending'])){
      $member = allPostListerOn3ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', null, 'subCity', $subReq , $_SESSION['mbScroll'], 5);
    }else{
      $member = allPostListerOn3ColumenD('mambership', 'city', $_SESSION['location'] ,'approved', 'YES', 'subCity', $subReq , $_SESSION['mbScroll'], 5);
    }
  }elseif(isset($filter[0]) && $filter[0] == 'All'){ // IF THE location is seted to 'ALL'
    if(isset($_GET['pending'])){
      $member = allPostListerOnColumenD('mambership', 'approved', null , $_SESSION['mbScroll'], 5);
    }else{
      $member = allPostListerOnColumenD('mambership', 'approved', 'YES' , $_SESSION['mbScroll'], 5);
    }
  }
 
}else{
  if(isset($_GET['pending'])){
    $member = allPostListerOnColumenD('mambership', 'approved', null, 1, 2);
  }else{
    $member = allPostListerOnColumenD('mambership', 'approved', 'YES', 1, 2);
  }
}

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
       <img class="img-thumbnail" src="<?php $p = photoSplit($row['photoPath1']); echo '../'.$p[0] ;?>" alt="Card">      
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
                        <a href="../Account.php?message=true&inner=true&tb=<?php echo $tbb ?>&reciver=<?php echo $row['userId'] ?>&post=<?php echo $pos ?>&forwarded=true&client=<?php echo $client ?>" > Send Link </a> 
                        <?php
                      }else{
                        ?>
                      <a href="./membersList.php?view=true&mid=<?php echo $row['id'] ?>"   ><button type="button"  class="btn btn-sm btn-outline-secondary">View </button></a>
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