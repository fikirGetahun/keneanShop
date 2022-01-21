
<?php  
ob_start();
session_start();
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
      <div class="card w-25">
      <img src="<?php echo $urow['photoPath']?>" class="card-img-top" alt="...">
    
      </div>
      <h5 class="">Name : <?php echo $urow['firstName'].' '.$urow['lastName'] ?></h5>
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
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">  </script>

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
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', 'hotel ', '<?php echo $row['id'] ?>', 'editInput22<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">>Delete</button></p></div>
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
        ?>
        
        
        <?php
        echo 'in outer message';
      }


      if(isset($_GET['inner'],$_GET['tb'], $_GET['reciver'], $_GET['post'])){
        $tb = $_GET['tb'];
        $reciver = $_GET['reciver'];
        $postFocus = $_GET['post'];
        //fetch the posts photo and title
        $postData = $get->allPostListerOnColumen($tb, 'id', $postFocus);
        $rowm = $postData->fetch_assoc();

        ?>
        

        <!-- <link href="assets/css/innerMsg.css" rel="stylesheet" id="bootstrap-css"> -->

        <div class="col-md-12 col-xl-12 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="row">
									<img src="<?php $p = $admin->photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-3 img-thumbnail">
									<span class="online_icon"></span>
                  <div class="col-8 h4 text-danger">
									<span><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?> </span>
									<p></p>
								</div>
								</div>

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
							<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
									Hi, how are you samim?
									<span class="msg_time">8:40 AM, Today</span>
								</div>
							</div>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Hi Khalid i am good tnx how about you?
									<span class="msg_time_send">8:55 AM, Today</span>
								</div>
								<div class="img_cont_msg">
							<img src="" class="rounded-circle user_img_msg">
								</div>
							</div>
						
						</div>
						<div class="card-footer">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
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