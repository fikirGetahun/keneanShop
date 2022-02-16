
<?php  
ob_start();
session_start();
include "includes/lang.php";

include "includes/header.php";
include "includes/navbar.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";
require_once "php/auth.php";
require_once "php/adminCrude.php";

$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy', 'zebegna', 'jobhometutor', 'hotelhouse' );

$excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );

$user = $get->aSinglePostView($_SESSION['userId'], 'user');
$urow = $user->fetch_assoc();
?>
<script src="assets/jquery.js" ></script>
<script>
  $(document).ready(function(){
  /// this will triger the address list for selecting address for all of the forms
  $('#z').hide()
  $('#ADD').click(function(){
    $('#z').show()
  $('#z').load('user/divTags.php #jiji')
})

$('.btn-close').click(function(){
  location.reload()
})

  })


</script>
<script>
  // this function sends the selected address to api. that api sets the address to a session then the session will be
  // the input to the database
  function handler(address){
    $('#jiji').hide();
    $('#z').hide()
    $('#dbad').val(address); 
    $('#ADD').text(address);
  }

  function typeHandler(data, apiId, showId, hideId){
    $('#z').hide()
    $('#'+hideId).hide()
    $('#'+apiId).val(data)
    $('#'+showId).text(data)
    if(data == "Cloth and Shoe"){
    $('#targetLoader').load('admin/divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }

  if(data == 'Computer Laptop'){
    $('#computer').load('admin/divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }else{
    $('#computer').empty()
  }
  }

  // function to load the categoty of post based on the needed div tag from divTags.php provided by onclick event
  function typeLoader(divId){
    $('#z').show()
    $('#z').load('user/divTags.php #'+divId)
  }


</script>
<script>
  $(document).ready(function(){
    // $('form').on('submit', function(e){
    //       e.preventDefault()
    //       $.ajax({
    //         url: 'admin/editHandler.php',
    //         type: 'post',
    //         data:  new FormData( this ),
    //         success : function(data){
    //           $( 'form' ).each(function(){
    //                 this.reset();
    //           });
    //           $('#alertVacancy').text(data)
    //           $('#alertVacancy').delay(3200).fadeOut(300);
    //         },
    //         processData: false,
    //     contentType: false
    //       })
          
    //       return false;

    // })
  })
</script>
<div class="container">
	<div class="row">

		<div class="col-md-2">

			
		</div>
		<!-- middle section-->

		<div class="col-md-8" >

    <div>
      <div class="row">
        <?php
        if($urow['photoPath1'] != 'FILE_NOT_UPLOADED'){
          ?>
        <img class="w-25 h-25" src="<?php echo $urow['photoPath1']?>"pt-2">
          <?php
        }else{
          ?>
          <img src="./admin/assets/img/zumra.png"pt-2">
          <?php
        }
        ?>
      <!-- <img src="<?php echo $urow['photoPath1']?>" class="w-25 h-25 " alt="..."> -->
      <h5 class="col-6">Name : <?php echo $urow['firstName'].' '.$urow['lastName'] ?></h5>

      </div>
  <div class="card-header">
  <nav class="nav nav-pills nav-justified">
    <?php 
      if(isset($_GET['yourPost'])){
        ?>
        <a class="nav-item nav-link active" href="#">Your Posts</a>
        <?php
      }else{
        ?>
        <a class="nav-item nav-link" href="./Account.php?yourPost=true">Your Posts</a>
        <?php
      }
      if(isset($_GET['fav'])){
        ?><a class="nav-item nav-link active" href="#">Favourite</a><?php
      }else{
        ?> <a class="nav-item nav-link" href="./Account.php?fav=true">Favourite</a> <?php
      }
    ?>
  <?php
  if(isset($_GET['message'])){
    ?>
    <a class="nav-item nav-link active" href="./Account.php?message=true&outter=true">Messages</a>
    <?php
  }else{
    ?>
    <a class="nav-item nav-link" href="./Account.php?message=true&outter=true">Messages</a>
    <?php
  }
  
  ?>
  
  <?php 
    if(isset($_GET['setting'])){
      ?>
       <a class="nav-item nav-link active" href="./Account.php?setting=true">Settings</a>
      <?php
    }else{
      ?>
      <a class="nav-item nav-link" href="./Account.php?setting=true">Settings</a>
      <?php
    }
  ?>
 
</nav>
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">  </script> -->

<script>

  function edit(edit, type, pid, loadId){
// alert('here')
    $('#'+loadId).load('user/userEditPost.php?'+$.param({edit: edit, type: type, pid: pid}));
  }

  
  function del(pid, table){ 
          if(confirm("Are You Sure You Want to Delete This Post?") == true){
            $.ajax({
              url: 'admin/editHandler.php',
              type: 'POST',
              data: {delete: true, table: table, postId: pid},
              success: function(data){
                alert(data)
                location.reload()
              }
            })
          }
        }
</script>
</div>
    </div>
  <div id="cont">
  <div class="row">
    <?php 
    
    if(isset($_GET['yourPost'])){

      ?>
      
      <?php


foreach($dbTables as $posts){  
    $oneTablePostList = $auth->userPostsLister($_SESSION['userId'], $posts);
    
    ?>

     
        
      <?php
      while($row = $oneTablePostList->fetch_assoc()){  
  
        ?>
          <div  class="col-md-3">
              <div class="card mb-4 box-shadow ">
                <?php 
                if($posts == 'car' || $posts =='electronics' || $posts == 'charity' || $posts == 'ad'){
                  if($posts == 'ad'){
                    if($row['bigDiscount'] == 'ACTIVE'){
?>
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Big Discount Ads&type=big" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
<?php
                    }else{
?>
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Product Ads&type=product" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

<?php                     
                    }                    
                  }elseif($posts == 'car' || $posts =='electronics' || $posts == 'charity'){
                    ?>
            <a class="img-thumbnail " 
            href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label= &type= " > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
  
                    <?php
                  }
                }elseif($posts == 'housesell'){
                  if($row['houseOrLand'] == 'HOUSE'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Posts&type=house" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                        <?php
                  }else{
                    // echo 'inelse';
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Land Posts&type=land" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                          <?php                  
                  }

                }elseif($posts == 'jobhometutor' || $posts == 'zebegna'  || $posts == 'hotelhouse' ){
                  // echo 'in jobhome';
                  if($posts == 'jobhometutor'){
                  ?>
                  <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Home Tutor&type=homeTutor" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                        <?php   
                  }if($posts == 'zebegna' ){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Security Gaurd Job Seekers&type=zebegna" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <?php
                  }if($posts == 'hotelhouse' ){
                    if($row['hotelOrHouse'] == 'HOTEL' ){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Hotel Job Seekers&type=hotelWorker" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <?php
                    }else{
                      ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Worker Job Seekers&type=houseWorker" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <?php
                    }
                  }
                }
                ?>

                <div class="card-body">
                  <?php
                  if(!in_array($posts, $excluded)){
                    ?>
                    <p class="card-text"><?php echo $row['title'] ?></p>
                    <?php
                  }
                  else{
                    ?>
                    <p class="card-text"><?php echo $row['name'] ?></p> 
                    <?php
                  }
                  ?>
                  
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                   <?php 
                   if($posts == 'hotelhouse'){
                     if($row['hotelOrHouse'] == 'HOUSE'){ 
                      ?>
                          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"  data-bs-target="#editDiv1<?php echo $row['id'] ?>">Manage Post</button>
                          <div class="modal fade" id="editDiv1<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Uploadz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="editInput1<?php echo $row['id'] ?>" class="modal-body">
      <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', 'houseKeeper', '<?php echo $row['id'] ?>', 'editInput1<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">>Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>

                     <?php
                     }elseif($row['hotelOrHouse'] == 'HOTEL'){
                       ?>
                       <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"  data-bs-target="#editDiv22<?php echo $row['id'] ?>">Manage Post</button>
                          <div class="modal fade" id="editDiv22<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Uploadx</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="editInput22<?php echo $row['id'] ?>" class="modal-body">
      <div class="row">
        <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', 'hotel', '<?php echo $row['id'] ?>', 'editInput22<?php echo $row['id'] ?>')">Edit</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>
      
                       <?php
                     }
                   }elseif($posts == 'housesell'){
                      if($row['houseOrLand'] == 'HOUSE' ){
                        ?>

<button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"  data-bs-target="#editDiv2<?php echo $row['id'] ?>">Manage Post</button>
                          <div class="modal fade" id="editDiv2<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="editInput2<?php echo $row['id'] ?>" class="modal-body">
      <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', 'housex', '<?php echo $row['id'] ?>', 'editInput2<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">>Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>
                  

                        <?php
                      }else{
                        ?>
                        
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"  data-bs-target="#editDiv2<?php echo $row['id'] ?>">Manage Post</button>
                          <div class="modal fade" id="editDiv2<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="editInput2<?php echo $row['id'] ?>" class="modal-body">
      <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', 'land', '<?php echo $row['id'] ?>', 'editInput2<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">>Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>
                        
                        <?php
                      }

                   }else{
                    ?>
                    
 
                  <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"  data-bs-target="#editDiv3<?php echo $row['id'] ?>">Manage Post</button>
                          <div class="modal fade" id="editDiv3<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Uploadv</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
      </div>
      <div id="editInput3<?php echo $row['id'] ?>" class="modal-body">
      <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', '<?php echo $posts ?>', '<?php echo $row['id'] ?>', 'editInput3<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>
                    <?php
                  }
                   ?>

                    </div>
                    
                  </div>
                  <small class="text-muted"><?php echo $row['view'] ?> views</small>
                </div>
              </div>
            </div>
        
        <?php

      }
    
    
}

?>
</div>
  </div>


      <?php

    }





    if(isset($_GET['fav'])){
      ///delete fav handler
      if(isset($_GET['delFav'], $_GET['pid'], $_GET['tb'])){
        $ds = $get->deleteFav($_GET['tb'], $_GET['pid'], $_SESSION['userId']);
        if($ds){
          header('Location: Account.php?fav=true');
        }
        else{
          echo 'ERROR';
        }
      }
      ?>
      
      <?php


foreach($dbTables as $posts){  
    $oneTablePostList2 = $get->selectFavLister($posts, $_SESSION['userId']);
    
    ?>

     
        
      <?php
      while($row = $oneTablePostList2->fetch_assoc()){  
  
        ?>
          <div  class="col-md-3">
              <div class="card mb-4 box-shadow ">
                <?php 
                
                if($posts == 'car' || $posts == 'electronics' || $posts == 'charity' || $posts == 'ad'){
                  
                  if($posts == 'ad'){
                    // echo 'kkkkkkkk'.$row['bigDiscount'];
                    if($row['bigDiscount'] == 'ACTIVE'){
                    
?>
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Big Discount Ads&type=big" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
          <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
<?php
                    }else{
?>
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Product Ads&type=product" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>

<?php                     
                    }                    
                  }}
                  if($posts == 'car' || $posts == 'electronics' || $posts == 'charity'){
                    ?>
            <a class="img-thumbnail " 
            href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label= &type= " > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
  
                    <?php
                  }
                if($posts == 'housesell'){
                  if($row['houseOrLand'] == 'HOUSE'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Posts&type=house" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                              <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                        <?php
                  }else{
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Land Posts&type=land" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                              <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                          <?php                  
                  }

                }
                ?>

                <div class="card-body">
                  <?php
                  if(!in_array($posts, $excluded)){
                    ?>
                    <p class="card-text"><?php echo $row['title'] ?></p>
                    <?php
                  }else{
                    ?>
                    <p class="card-text"><?php echo $row['name'] ?></p>        
                    <?php
                  }
                  ?>
                  
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                    </div>
                    <small class="text-muted"><?php echo $row['view'] ?> views</small>
                  </div>
                </div>
              </div>
            </div>
        
        <?php

      }
    
    
}

?>

      
      <?php

    }



    //////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////
    //MESSEGE

    if(isset($_GET['message'])){


      if(isset($_GET['outter'])){
        $outerM = $get->outerMsgFetcher($_SESSION['userId']);
        // echo $_SESSION['userId'];
        if($outerM->num_rows != 0){
        while($o = $outerM->fetch_assoc()){
          $date = $get->time_elapsed_string($o['postedDate']);


          if($o['user1'] == $_SESSION['userId']){
            $otherUser = $o['user2'];
            $you = 'YOU: ';
          }elseif($o['user2'] == $_SESSION['userId']){
            $otherUser = $o['user1'];
            $you = ' ';
          }
          ?>
        <div class="card">
        <a class="link"  href="Account.php?message=true&inner=true&tb=<?php echo $o['tableName'] ?>&reciver=<?php echo $otherUser ?>&post=<?php echo $o['postId'] ?>" ><div class="card-body row">
            
            <?php 
            // to fetch the post photo and title to be displayed 
            $postCrap = $get->allPostListerOnColumen($o['tableName'], 'id', $o['postId'] );
            $rowPostCrap = $postCrap->fetch_assoc();


          // to fetch the reciver end user data crap
          $userCrap = $get->allPostListerOnColumen('user', 'id', $otherUser);
          $ur = $userCrap->fetch_assoc(); 


          // to check if any of the users are admin/ editor / user
          $authCH = $get->allPostListerOnColumen('user','id',$o['user2']);
          $rowAuth = $authCH->fetch_assoc();

            ?>
            <?php
            if($_SESSION['auth'] == 'ADMIN' || $rowAuth['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR' || $rowAuth['auth'] == 'EDITOR'){
              ?>
              <img src="assets/img/pp.png" class="img-thumbnail  col-2" alt="...">
              <h5 class="col-2">Admin</h5>
              <?php
            }else{
              ?>
              <img src="<?php  $p = $admin->photoSplit($rowPostCrap['photoPath1']); echo $p[0] ; ?>" class="img-thumbnail  col-2" alt="...">
              <h5 class="col-2"><?php echo $rowPostCrap['title'] ?></h5>
              <?php
            }
            ?>

            
            <p class="card-text col-2"><?php echo $you.' '.$o['msg'] ?></p>
            <p class="card-text col-2"><small class="text-muted"></small><?php echo $date ?></p>
            <?php
              if( $rowAuth['auth'] == 'USER' ){
                ?>
                  <h5 class="col-2"><?php echo $ur['firstName'] ?></h5>
                  <img src="<?php  $p = $admin->photoSplit($ur['photoPath1']); echo $p[0] ;  ?>" class="img-thumbnail col-2" alt="..."> 

                <?php
              }
            ?>
          </div></a>
        </div>
          <?php
        }
      }else{
        echo 'No messages yet';
      }
        ?>

        
        <?php
      }

// here every time the inner message is opened it has to get the requet of the tabelofpost(which the msg is assoiceatied in), posteId where the msg is associated in, and the reciver of the msg or the second user
      if(isset($_GET['inner'],$_GET['tb'], $_GET['reciver'], $_GET['post'])){
        $tb = $_GET['tb'];
        $reciver = $_GET['reciver'];
        $postFocus = $_GET['post'];
        // echo 'post ID '.$postFocus;
        //fetch the posts photo and title of the post
        $postData = $get->allPostListerOnColumen($tb, 'id', $postFocus);
        $rowm = $postData->fetch_assoc();

        //fetch the data of the second user of the msg
        $secUser = $get->allPostListerOnColumen('user', 'id', $reciver);
        $row2 = $secUser->fetch_assoc();


        // fetch the loged user data 
        $logedUser = $get->allPostListerOnColumen('user', 'id', $_SESSION['userId']);
        $row1 = $logedUser->fetch_assoc();

 
        // to check if any of the users are admin/ editor / user
        $authCH = $get->allPostListerOnColumen('user','id',$reciver);
        $rowAuth = $authCH->fetch_assoc();

        ?>
        

        <!-- <link href="assets/css/innerMsg.css" rel="stylesheet" id="bootstrap-css"> -->

        <!-- this is the left side of the message to show the post item, or the admin if its the admin  -->
        <div class="col-md-12 col-xl-12 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="d-flex justify-content-start mb-4">
                  <?php
                if($_SESSION['auth'] == 'ADMIN' || $rowAuth['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR' || $rowAuth['auth'] == 'EDITOR'){ // if the loged user or the msg reciver user is admin or editor, then the post item will be changed to admin thumnail.
              ?>
              <img src="assets/img/pp.png" class="img-thumbnail  col-3" alt="...">
              <h6 class="col-4">Admin</h6>
              <?php
            }else{ // if the loged user or the msg reciver user is not admin or editor, then the post item will be displayed here
              ?>
              <img src="<?php $p = $admin->photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-3 img-thumbnail">
                                <!-- <div class="col-8 h4 text-danger"> -->
									<h5><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?> </h5>
									<p></p>
							
								<!-- </div> -->
              <?php
            }
            ?>


            <!-- here is to copy users and items info to the membership -->
            <?php
            if($_SESSION['auth'] == 'ADMIN'  || $_SESSION['auth'] == 'EDITOR' ){ 
              // here the session var memberForward will hold the link to be forwarded by the admin to a member of the website
              $_SESSION['memberForward'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              ?>
              <script>

              </script>
              <img src="<?php $p = $admin->photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-2 img-thumbnail">  <br>
                                <!-- <div class="col-8 h4 text-danger"> -->
									<h6><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?> </h6>
                <!-- HERE the forward get requets will activate the send to member button on the membership list page on the admin panel. -->
                <a class="btn btn-dark" href="admin/membersList.php?list=true&forward=true&tb=<?php echo $tb?>&post=<?php echo $postFocus ?>&client=<?php echo $reciver ?>"  >Copy Link and Send to Other</a>
 
              <?php
              
            }
            ?>




                  </div>
<!-- here the right side of the inner message will be displayed  -->
                  <?php
                    if($rowAuth['auth'] == 'USER' ){ // if the reciver is a USER, then the users name and profile photo will be shown on the right side of the inner message
                      ?>
                      
                <div class="d-flex justify-content-end  mb-4">
                  <!-- <div class="col-8 h4 text-danger"> -->
                  <?php
                  if($row2['photoPath1'] != 'FILE_NOT_UPLOADED'){ // if there is no profile pic, then it will be changed to display the website logo pic
                    ?>
                 <h5><?php echo $row2['firstName'].' '.$row2['lastName'] ?></h5>
                  <img src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?> " class="col-3 img-thumbnail">
                    <?php
                  }else{ // if there is a profile pic 
                    ?>
                      <h5><?php echo $row2['firstName'].' '.$row2['lastName'] ?></h5>
                    <img class="col-4"  src="./admin/assets/img/zumra.png" pt-2">
                    <?php
                  }
                  ?>
									<p></p>

								  <!-- </div> -->
                </div>
                      <?php
                    }
                    elseif($rowAuth['auth'] == 'ADMIN' || $rowAuth['auth'] == 'EDITOR'){
                      ?>
                  <div class="d-flex justify-content-end mb-4">
                  <h6><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?> </h6>
                  <img src="<?php $p = $admin->photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-3 img-thumbnail">
                   </div>
                      <?php
                    }

                  ?>

                <!-- </div> -->
								<!-- <div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div> -->
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<!-- <div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div> -->
						</div>
						<div class="card-body msg_card_body">
              <?php
              echo $_SESSION['userId'];
                // to fetch all the messages of this particular user and post
                $innerMsg = $get->innerMsgFetcher($tb, $_SESSION['userId'], $postFocus, $reciver);
                if($innerMsg->num_rows != 0){
                while($rowInnerMsg = $innerMsg->fetch_assoc()){
                  // if the loged user id is in a the user1 colomen, this means its the sender. so the message will be placed in a sendder div, else its the reciver so the msg will be placed in a reciver div
                  if($rowInnerMsg['user1'] == $_SESSION['userId']){
                  ?>
                                <div class="d-flex justify-content-end mb-4">

                    
                      <div class="img_cont_msg ">
                        <img src="<?php $p = $admin->photoSplit($row1['photoPath1']); echo $p[0] ;?>" class="rounded-circle user_img_msg">
                      </div>
                      <div class="msg_cotainer bg-success">
                      <?php

                      $splitMsg = explode(',',$rowInnerMsg['msg'] );
                      
                      // here if the next msg after comma is 'send', then it only show the go to client button so that the website member can automatically go to the client
                      if(isset($splitMsg[1])){
                        ?>
                        <a href="<?php echo $splitMsg[0] ?>" > Go To Client.</a>
                        <?php
                      }else{  // else it only echo out the msg 
                        echo $splitMsg[0];
                      }
                      ?>
                        <?php                        
                            $date = $get->time_elapsed_string($rowInnerMsg['postedDate']);
                         ?>
                        <span class="text-danger"><?php echo $date ?></span>
                      </div>
                    </div>    
                    
                    <?php
                  }else{
                    ?>
<div class="d-flex justify-content-start mb-4">
<div class="msg_cotainer ">
                          <?php

                          $splitMsg = explode(',',$rowInnerMsg['msg'] );

                          // here if the next msg after comma is 'send', then it only show the go to client button so that the website member can automatically go to the client
                          if(isset($splitMsg[1])){       
                            ?>
                            <a href="<?php echo $splitMsg[0] ?>" > Go To Client.</a>
                            <?php
                          }else{  // else it only echo out the msg 
                            echo $splitMsg[0];
                            
                            // echo $splitMsg[1];
                            // var_dump($rowInnerMsg['msg']);
                          }
                          ?>
                        <?php 
                            $date = $get->time_elapsed_string($rowInnerMsg['postedDate']);
                         ?>
                        <span class="text-danger"><?php echo $date ?></span>
                      </div>
                <div class="img_cont_msg">
                  <img src="<?php $p = $admin->photoSplit($row2['photoPath1']); echo $p[0] ;?>" class="rounded-circle user_img_msg">
                </div>
							</div>
                    <?php
                  }
                
                }
              }else{
                echo 'No Messages Yet.';
              }
                
              ?>


						
						</div>
            <script>
              $(document).ready(function(){
                $('form').on('submit', function(e){
                  e.preventDefault()
                  $.ajax({
                    url: "user/userApi.php",
                    type: 'POST',
                    data: $('form').serialize(),
                    success: function(data){
                      // alert(data)
                      location.reload()
                    }
                  })
                })
              })
            </script>
						<div class="card-footer">
            <div class="row">
            <form>
              <input hidden type="text" name="tabel" value="<?php echo $tb ?>" >
              <input hidden type="text" name="reciver" value="<?php echo $reciver ?>" >
              <input hidden type="text" name="postFocus" value="<?php echo $postFocus ?>" >
              <?php
                //if admin sendes forwarded text from admin panel, then it automaticaly will be in the textarea form so that it will send it to the member
                if(isset($_GET['forwarded'], $_GET['client'])){
                  $cl = $_GET['client'];
                  $furl = "./Account.php?message=true&inner=true&tb=".$tb."&reciver=".$cl."&post=".$postFocus;
                  ?>
                  <!-- <a href="<?php echo $furl ?>" >Go To User</a> -->
                <textarea type="text" class="form-control" id="mssg" 
              aria-describedby="emailHelp" name="msg" placeholder="Type Here.."><?php echo $furl.',send'?> </textarea>
                  <?php
                }else{ // empty form if there is no forwarded text 
                  ?>
              <textarea type="text" class="form-control" id="mssg" 
              aria-describedby="emailHelp" name="msg" placeholder="Type Here.."></textarea>
                  <?php
                }
              
              
              ?>

              <div class="d-flex justify-content-end mb-4">
                  <button type="submit" class="btn btn-dark" >Send</button>
              </div>
            </form>
            </div>
						</div>
					</div>
				</div>
        
        
        <?php
      }


      
    }

    if(isset($_GET['setting'])){
      $us = $get->allPostListerOnColumen('user', 'id', $_SESSION['userId']);
      $u = $us->fetch_assoc();
      ?>
      
<form action="Account.php?setting=true" method="POST" enctype="multipart/form-data" >
        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
            <div class="col-md-8 col-lg-9">
              <?php 
              if(isset($_GET['del'])){
                $del = $admin->delUserPhoto($_SESSION['userId']);
                if($del){
                  header('Location: Account.php?setting=true');
                }else{
                  echo 'ERROR';
                }
              }
              
              if($u['photoPath1'] != 'FILE_NOT_UPLOADED'){
                ?>
              <img class="img-thumbnail h-60" src="<?php echo $u['photoPath1'] ?>"pt-2">
              <a href="./Account.php?setting=true&del=true" class="btn btn-danger btn-sm" title="Remove my profile image">Delete</i></a><br>
                <?php

              }else{
                ?>
                <img src="./admin/assets/img/zumra.png"pt-2">
                <?php
              }
              ?>
             
              <input type="file" name="photou" >
              <label>Change Profile Photo</label>
              <input type="submit" value="Change Photo">
              <?php
                if(isset($_FILES['photou'])){
                  $fn = $_FILES['photou']['name'];
                  $tm = $_FILES['photou']['tmp_name'];
                  $cp = $admin->updateUserPhoto($fn, $tm, $_SESSION['userId']);
                  if($cp){
                    header('Location: Account.php?setting=true');
                  }else{
                    echo 'ERROR';
                  }
                }
              
              ?>
              </div>
            </div>
          </div>
          
      </form>
        <form action="./Account.php?setting=true" method="POST" >

          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
            <div class="col-md-8 col-lg-9">
              <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $u['firstName'] ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
            <div class="col-md-8 col-lg-9">
              <input name="lastName" type="text" class="form-control" id="firstName" value="<?php echo $u['lastName'] ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
              <input name="phoneNumber" type="text" class="form-control" id="phone" value="<?php echo $u['phone'] ?>">
            </div>
          </div>

          <a class="btn btn-primary" href="./Account.php?setting=true&pass=true">Change Password</a>
          <?php
          if(isset($_GET['pass'])){
            ?>
          <div class="row mb-3">
            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Change Password</label>
            <div class="col-md-8 col-lg-9">
              <input name="password" type="text" class="form-control" required id="Phone" placeholder="Enter Your New Password Here."   >
            </div>
            <a class="btn btn-primary" href="./Account.php?setting=true>Cancell">Cancell </a>

          </div>
            <?php
          }
          ?>


          <div class="row mb-3">
            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Password Recovery Keyword</label>
            <div class="col-md-8 col-lg-9">
              <input name="recover" type="text" class="form-control" id="Phone" value="<?php echo $u['recover'] ?>">
            </div>
          </div>

          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Save Changes" >
          </div>
        </form><!-- End Profile Edit Form -->

      
    
    <?php



        //// user data edit
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
 $_POST['recover'])){
// echo 'innnxxxxzz';
    $firstName =$_POST['firstName'] ;
    $lastName =$_POST['lastName'] ;
    // $username =$_POST['email'] ;

    $authr ='USER';
    $job = ' ';
    $recover = $_POST['recover'];
    $phoneNumber= $_POST['phoneNumber'];
    // $about =$_POST['address'];
    $uid = $_SESSION['userId'];

    // $u = $auth->loginAuth($username);
    // $num = $u->num_rows;
    // $up = ' ';
    if(isset($_POST['password'])){
    $password =$_POST['password'] ;
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $cp = $admin->password($password, $_SESSION['userId']);
    if($cp){
      echo 'password changed';
    }else{
      echo 'no';
    }
    }

    $uu = $admin->updateUserDataUSER($uid, $firstName, $lastName, $phoneNumber, $job, $recover);

  if($uu){
    echo 'Saved Changes';
  }else{
    echo 'error';
  }
  
  }
    }
    ?>



    
  </div>

		
		<!--right section0-->

		<div class="col-1">
			<!-- <div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul> -->
</div>
			
		</div>
		
	
  </div>
<!-- </div> -->
<?php

include "./includes/footer.php";
?>