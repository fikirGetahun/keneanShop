
<?php  
ob_start();
session_start();
include "includes/lang.php";

include "includes/header.php";
include "includes/navbar.php";
require_once "php/fetchApi.php";
require_once "php/adminCrude.php";

require_once "php/auth.php";
// require_once "php/adminCrude.php";

if(isLogedIn()){





$dbTables = array('ad', 'car', 'charity', 'electronics',
'housesell', 'tender', 'vacancy', 'zebegna', 'jobhometutor', 'hotelhouse', 'realestate' );

$excluded = array('zebegna', 'jobhometutor', 'hotelhouse', 'housesell' );

$user = aSinglePostView($_SESSION['userId'], 'user');
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
    // to output the number of unseen msgs, we use the outer msgs function
    $seen = outerMsgFetcherSeen($_SESSION['userId']);
    $numUnseen = $seen->num_rows;
  if(isset($_GET['message'])){
    ?>
    <a class="nav-item nav-link active" href="./Account.php?message=true&outter=true">Messages <span class="badge badge-danger"><?php if($numUnseen != 0){ echo ' '.$numUnseen; } ?></span></a>
    <?php
  }else{
    ?>
    <a class="nav-item nav-link" href="./Account.php?message=true&outter=true">Messages <span class="badge badge-danger"><?php if($numUnseen != 0){ echo ' '.$numUnseen; } ?></span></a>
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


/// to show sponcered posts with pending tag, fill bank info to pay tag, and payd post viewing

$sponsered = allPostListerOnColumen('realestate', 'posterId', $_SESSION['userId']);

      if($sponsered->num_rows != 0){
        ?>
        <h5>Sponsered Posts</h5>
        <!-- <div  class="row"> -->
        <?php
        while($row = $sponsered->fetch_assoc()){
          if($row['selectKey']=='rs'){
            $viewLabel = 'RealEstate Posts';
          }elseif($row['selectKey']=='ban'){
            $viewLabel = 'BankStock Posts';
          }elseif($row['selectKey']=='ins'){
            $viewLabel = 'Insurance Posts';
          }
          ?>
                        <div  class="col-md-4 mb-3">
                      <div class="card mb-1 box-shadow">
                  
                  <a class="img-thumbnail stretched-link" href="./Description.php?cat=realestate&type=<?php echo $row['selectKey'] ?>&postId=<?php echo $row['id'] ?>&label=<?php echo $viewLabel ?>" class=""> <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

                    <div class="card-body ">
                      <h5 class="card-title">  <?php echo $row['title'] ?></h5>
                      <?php 
              ?>
                      <h6 class="card-text"><span class="text-danger small"><?php echo $row['price'] ?></span> </h6>

              <?php
                      
                      $date = time_elapsed_string($row['postedDate']);
                      ?>
                      
                      <h6 class="card-text"> <?php echo $row['city'] ?></h6>
                      <div class="d-flex justify-content-between align-items-center">
                      <span class="text-danger small"><?php echo $date ?></span>
                        
                      <br><br><br><br>
         
                      <?php
                      // to show if the post is approved or pending
                      if($row['status'] == 'NOT'){
                        if($row['filled'] == 'YES'){
                          ?>
                          <span class="text-warning" >Waiting Approval!</span>
                          <?php
                        }else{
                          ?>
                          <span class="text-danger" >Pennding</span>
                          <?php
                        }
                  
                      }elseif($row['status'] == 'ACTIVE'){
                        ?>
                        <span class="text-success" >Approved</span>
                        <?php
                      }
                      ?>
                      
    
                      </div>
                    </div>
                      </div>
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
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="edit('true', '<?php echo $row['selectKey']?>', '<?php echo $row['id'] ?>', 'editInput2<?php echo $row['id'] ?>')">Edit</button></p></div>
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', 'realestate')">Delete</button></p></div>
      </div>
                      
      </div>
    </div>
  </div>
</div>
                      <div>
                      <script>
                                $(document).ready(function(){

                                  $('form').on('submit', function(e){
                                    e.preventDefault()
                                    $.ajax({
                                      url: 'user/userApi.php',
                                      type: 'POST',
                                      data:  $('form').serialize(),
                                      success: function(data){
                                        // alert(data)
                                        $('#btnsp').text(data)
                                        location.reload()
                                      }
                                    })
                                  })

                                })


                              </script>
                        <?php
                      //// if they filled the bank info show edit button, or if they didnt filled any thing show fill bank info button
                      if($row['filled'] == 'NOT'){
                        ?>
                                              <!-- Button trigger modal -->
                        <a href="./user/paymentPage.php?pendding=true&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-warning" >
                        <span class="text-black" id="btnsp" >Pay to Sponser</span>
                      </a>

                 

                        <!-- Modal -->
    


                        <?php
                      }else{
                        ?>
                        <div class="btn btn-sm btn-outline-success" >
                        <span class="text-success" id="btnsp" >Payment done</span> 
                        </div>
                        <a href="./user/paymentPage.php?edit=true&id=<?php echo $row['id'] ?>" class="text-warning btn btn-sm btn-outline-success" id="btnspx" >Edit</a>

                        <?php
                      }
                      
                      ?>
                        </div>
                        </div>

          
          <?php
        }
        echo '<hr>';
      }




foreach($dbTables as $posts){  
    $oneTablePostList = userPostsLister($_SESSION['userId'], $posts);
    
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
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Big Discount Ads&type=big" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
<?php
                    }else{
?>
          <a class="img-thumbnail st" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Product Ads&type=product" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 

<?php                     
                    }                    
                  }elseif($posts == 'car' || $posts =='electronics' || $posts == 'charity'){
                    ?>
            <a class="img-thumbnail " 
            href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label= &type= " > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
  
                    <?php
                  }
                }elseif($posts == 'housesell'){
                  if($row['houseOrLand'] == 'HOUSE'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Posts&type=house" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                        <?php
                  }else{
                    // echo 'inelse';
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Land Posts&type=land" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                          <?php                  
                  }

                }elseif($posts == 'jobhometutor' || $posts == 'zebegna'  || $posts == 'hotelhouse' ){
                  // echo 'in jobhome';
                  if($posts == 'jobhometutor'){
                  ?>
                  <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Home Tutor&type=homeTutor" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                        <?php   
                  }if($posts == 'zebegna' ){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Security Gaurd Job Seekers&type=zebegna" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <?php
                  }if($posts == 'hotelhouse' ){
                    if($row['hotelOrHouse'] == 'HOTEL' ){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Hotel Job Seekers&type=hotelWorker" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <?php
                    }else{
                      ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Worker Job Seekers&type=houseWorker" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <?php
                    }
                  }
                }elseif($posts == 'realestate'){
                  if($row['selectKey']== 'rs'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=RealEstate Posts&type=<?php echo $row['selectKey'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <?php
                  }elseif($row['selectKey']== 'ban'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=BankStock Posts&type=<?php echo $row['selectKey'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <?php
                  }elseif($row['selectKey']== 'ins'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Insurance Posts&type=<?php echo $row['selectKey'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <?php
                  }
                }
                ?>

                <div class="card-body">
                  <?php
                  if(!in_array($posts, $excluded)){
                    if($posts == 'vacancy'){
                      ?>
                      <h5>Vacancy Post</h5>
                      <?php
                    }elseif($posts == 'car'){
                      ?>
                      <h5>Car Post</h5>
                      <?php
                    }elseif($posts == 'tender'){
                      ?>
                      <h5>Tender Post</h5>
                      <?php
                    }elseif($posts == 'ad'){
                      ?>
                      <h5>Ad Post</h5>
                      <?php
                    }elseif($posts == 'electronics'){
                      ?>
                      <h5>Electronics Post</h5>
                      <?php
                    }elseif($posts == 'charity'){
                      ?>
                      <h5>Charity Post</h5>
                      <?php
                    }elseif($posts == 'realestate'){
                      ?>
                      <h6>Sponsered!</h6>
                      <?php
                    }

                    
                    ?>
                    <p class="card-text"><?php echo $row['title'] ?></p>
                    <?php
                  }
                  elseif($posts == 'housesell'){
                    if($row['houseOrLand'] == 'HOUSE'){
                      ?>
                      <h5>House Post</h5>
                      <p class="card-text"><?php echo $row['type'] ?></p>
                      <?php
                    }else{
                      ?>
                      <h5>Land Post</h5>
                      <p class="card-text"><?php echo $row['type'] ?></p>
                      <?php                      
                    }
                  }elseif($posts == 'jobhometutor'){
                    ?>
                    <h5>Home Tutor Post</h5>
                    <p class="card-text"><?php echo $row['name'] ?></p> 

                    <?php
                  }elseif($posts == 'zebegna'){
                    ?>
                    <h5>Security Gaurd Post</h5>
                    <p class="card-text"><?php echo $row['name'] ?></p> 

                    <?php
                  }elseif($posts == 'hotelhouse'){
                    if($row['hotelOrHouse'] == 'HOUSE'){
                      ?>
                      <h5>House Jobs Post</h5>
                      <p class="card-text"><?php echo $row['name'] ?></p> 
                      <?php
                    }else{
                      ?>
                      <h5>Hotel Jobs Post</h5>
                      <p class="card-text"><?php echo $row['name'] ?></p> 
                      <?php
                    }
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
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="del('<?php echo $row['id']  ?>', '<?php echo $posts ?>')">Delete</button></p></div>
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
        $ds = deleteFav($_GET['tb'], $_GET['pid'], $_SESSION['userId']);
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
    $oneTablePostList2 = selectFavLister($posts, $_SESSION['userId']);
    
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
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Big Discount Ads&type=big" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
          <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
<?php
                    }else{
?>
          <a class="img-thumbnail " href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Product Ads&type=product" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                    <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>

<?php                     
                    }                    
                  }}
                  if($posts == 'car' || $posts == 'electronics' || $posts == 'charity'){
                    ?>
            <a class="img-thumbnail " 
            href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label= &type= " > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                      <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
  
                    <?php
                  }
                if($posts == 'housesell'){
                  if($row['houseOrLand'] == 'HOUSE'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Posts&type=house" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                              <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                        <?php
                  }else{
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Land Posts&type=land" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                              <!-- favourite deleter button -->
          <a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                          <?php                  
                  }

                }if($posts == 'vacancy'){
          
                  ?>
                  <a class="img-thumbnail" href="./Description.php?cat=vacancy&label=Vacancy Post&postId=<?php echo $row['id'] ?>&type=" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="./assets/img/work-7.jpg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                  <!-- favourite deleter button -->
<a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                  <?php
                }

                if($posts == 'tender'){
                   ?>
                  <a class="img-thumbnail" href="./Description.php?cat=tender&label=Tender Post&postId=<?php echo $row['id'] ?>&type=" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php echo $row['photoPath1'] ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                  <!-- favourite deleter button -->
<a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>
                  <?php
                }

                if($posts == 'realestate'){
                  ?>
                 <a class="img-thumbnail" href="./Description.php?cat=realestate&label=<?php
                 if($row['selectKey'] == 'rs'){ echo 'RealEstate'; }elseif($row['selectKey'] == 'ban'){echo 'Bank Stocks';}elseif($row['selectKey'] == 'ins'){echo 'Insurance Post';}
                 ?>&postId=<?php echo $row['id'] ?>&type=<?php echo $row['selectKey'] ?>" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php echo $row['photoPath1'] ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                 <!-- favourite deleter button -->
<a href="Account.php?fav=true&delFav=true&tb=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>"  class="btn btn-dark">Delete Favourite</a>

                 <?php
               }
                ?>

                <div class="card-body">
                  <?php
                                    if(!in_array($posts, $excluded)){
                                      if($posts == 'vacancy'){
                                        ?>
                                        <h5>Vacancy Post</h5>
                                        <?php
                                      }elseif($posts == 'car'){
                                        ?>
                                        <h5>Car Post</h5>
                                        <?php
                                      }elseif($posts == 'tender'){
                                        ?>
                                        <h5>Tender Post</h5>
                                        <?php
                                      }elseif($posts == 'ad'){
                                        ?>
                                        <h5>Ad Post</h5>
                                        <?php
                                      }elseif($posts == 'electronics'){
                                        ?>
                                        <h5>Electronics Post</h5>
                                        <?php
                                      }elseif($posts == 'charity'){
                                        ?>
                                        <h5>Charity Post</h5>
                                        <?php
                                      }elseif($posts == 'realestate'){
                                        ?>
                                        <h6>Sponsered!</h6>
                                        <?php
                                      }
                  
                                      
                                      ?>
                                      <p class="card-text"><?php echo $row['title'] ?></p>
                                      <?php
                                    }
                                    elseif($posts == 'housesell'){
                                      if($row['houseOrLand'] == 'HOUSE'){
                                        ?>
                                        <h5>House Post</h5>
                                        <p class="card-text"><?php echo $row['type'] ?></p>
                                        <?php
                                      }else{
                                        ?>
                                        <h5>Land Post</h5>
                                        <p class="card-text"><?php echo $row['type'] ?></p>
                                        <?php                      
                                      }
                                    }elseif($posts == 'jobhometutor'){
                                      ?>
                                      <h5>Home Tutor Post</h5>
                                      <p class="card-text"><?php echo $row['name'] ?></p> 
                  
                                      <?php
                                    }elseif($posts == 'zebegna'){
                                      ?>
                                      <h5>Security Gaurd Post</h5>
                                      <p class="card-text"><?php echo $row['name'] ?></p> 
                  
                                      <?php
                                    }elseif($posts == 'hotelhouse'){
                                      if($row['hotelOrHouse'] == 'HOUSE'){
                                        ?>
                                        <h5>House Jobs Post</h5>
                                        <p class="card-text"><?php echo $row['name'] ?></p> 
                                        <?php
                                      }else{
                                        ?>
                                        <h5>Hotel Jobs Post</h5>
                                        <p class="card-text"><?php echo $row['name'] ?></p> 
                                        <?php
                                      }
                                    }           else{
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
        if(isset($_GET['memberId'])){ // if members filter is searched by the admin
          $mid = $_GET['memberId'];
          $outerM = outerMsgFetcherOfUser($_SESSION['userId'], $mid);
        }else{
          $outerM = outerMsgFetcher($_SESSION['userId']);
        }
       
        // echo $_SESSION['userId'];
        ?>
        <script>
          $(document).ready(function(){
            $('input').keyup('submit', function(){
              $.ajax({
                url: 'user/membersSearchList.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(data){
                  $('#outerMsgDiv').empty()
                  $('#outerMsgDiv').append(data)
                }
              })
            })

            $('form').on('submit', function(){
              $.ajax({
                url: 'user/membersSearchList.php',
                type: 'post',
                data: $('form').serialize(),
                success: function(data){
                  $('#outerMsgDiv').empty()
                  $('#outerMsgDiv').append(data)
                }
              })
            })
          })
        </script>
        <!-- this is the search form that only the admin have the access  -->
        <form> 
        <input id="search" class="form-control me-2" name="searchData" type="search" placeholder="Search in " aria-label="Search">
        <button class="btn btn-warning" type="submit">Members Search</button>
      </form>

        <!-- <div  class="card"> -->
        <!-- <div class="card-body"> -->
          <div id="outerMsgDiv" class="row">
        <?php
        if($outerM->num_rows != 0){
        while($o = $outerM->fetch_assoc()){
          $date = time_elapsed_string($o['postedDate']);


          if($o['user1'] == $_SESSION['userId']){
            $otherUser = $o['user2'];
            $you = 'YOU: ';
          }elseif($o['user2'] == $_SESSION['userId']){
            $otherUser = $o['user1'];
            $you = ' ';
          }
          ?>
        <!-- <div class="card"> -->
          <!-- <div class="border"> -->
          <?php 
            // to mark unread msgs
            if($o['seen'] == 'new'){ // if the msg is unseen it will send an unseen request to the inner msg so that it updates it to seen after they click the unread msg
              ?>
        <a class="link"  href="Account.php?message=true&inner=true&tb=<?php echo $o['tableName'] ?>&reciver=<?php echo $otherUser ?>&post=<?php echo $o['postId'] ?>&unseen=true" > 
              <?php
            }else{
              ?>
              <a class="link"  href="Account.php?message=true&inner=true&tb=<?php echo $o['tableName'] ?>&reciver=<?php echo $otherUser ?>&post=<?php echo $o['postId'] ?>" >  
              <?php
            } 
          ?>

        <div class="card-body row border border-warning m-1"> 

            
            <?php 


              
            
if($o['tableName'] != 'ORDER'){
            // to fetch the post photo and title to be displayed 
            $postCrap = allPostListerOnColumen($o['tableName'], 'id', $o['postId'] );
            $rowPostCrap = $postCrap->fetch_assoc();
}

          // to fetch the reciver end user data crap
          $userCrap = allPostListerOnColumen('user', 'id', $otherUser);
          $ur = $userCrap->fetch_assoc(); 


          // to check if any of the users are admin/ editor / user
          $authCH = allPostListerOnColumen('user','id',$otherUser);
          $rowAuth = $authCH->fetch_assoc();

          if($o['tableName'] == 'ORDER'){ // if the table name is 'ORDER' this means the msg type is order so the order msg label must be included
            ?>
             <h6 class="text-warning border border-success" >Order Message From</h6>
            <?php
          }
            ?>

           
            <?php
            if($_SESSION['auth'] == 'ADMIN'  || $_SESSION['auth'] == 'EDITOR'  ){
              ?>
              <img src="assets/img/pp.png" class="img-thumbnail  col-2" alt="...">
              <h5 class="col-2">Admin</h5>
              <?php
            }else{
              ?>
              <img src="<?php  $p = photoSplit($rowPostCrap['photoPath1']); echo $p[0] ; ?>" class="img-thumbnail  col-2" alt="...">
              <h5 class="col-2"><?php echo $rowPostCrap['title'] ?></h5>
              <?php
            }
            ?>

            
            <p class="card-text col-2"><?php echo $you.' '.$o['msg'] ?></p>
            <p class="card-text col-2"><small class="text-muted"></small><?php echo $date ?></p>
            <?php
              if($rowAuth['auth'] == 'USER' ){
                ?>
                  <h5 class="col-2"><?php echo $ur['firstName'] ?> </h5>
                  <img src="<?php  $p = photoSplit($ur['photoPath1']); echo $p[0] ;  ?>" class="img-thumbnail col-2" alt="..."> 

                <?php
              }elseif($rowAuth['auth'] == 'ADMIN'){
                ?>
              <img src="assets/img/pp.png" class="img-thumbnail  col-2" alt="...">
              <h5 class="col-2">Admin</h5>              
                
                <?php
              }
            ?>
          </div>
          </a>
            <?php 
              // to mark unread msgs
              if($o['seen'] == 'new'){
                ?>
                 <span class="badge badge-danger"><?php if($numUnseen != 0){ echo ' New'; } ?></span>
                <?php
              } 

            }
            ?>
           
          <!-- </div> -->
        </a>
          
        <!-- </div> -->
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
        if($tb != 'ORDER'){
        // echo 'post ID '.$postFocus;
        //fetch the posts photo and title of the post
        $postData = allPostListerOnColumen($tb, 'id', $postFocus);
        $rowm = $postData->fetch_assoc();

        //fetch the data of the second user of the msg
        $secUser = allPostListerOnColumen('user', 'id', $reciver);
        $row2 = $secUser->fetch_assoc();


        // fetch the loged user data 
        $logedUser = allPostListerOnColumen('user', 'id', $_SESSION['userId']);
        $row1 = $logedUser->fetch_assoc();

 
        // to check if any of the users are admin/ editor / user
        $authCH = allPostListerOnColumen('user','id',$reciver);
        $rowAuth = $authCH->fetch_assoc();
        }
        ?>
        

        <!-- <link href="assets/css/innerMsg.css" rel="stylesheet" id="bootstrap-css"> -->

        <!-- this is the left side of the message to show the post item, or the admin if its the admin  -->
        <div class="col-md-12 col-xl-12 chat">
					<div class="card">
						<div class="card-header msg_head">
            <?php
                if($tb != 'ORDER'){ /// if the msg is not order this is not set so it will show the noraml inner msg view
            ?>

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
              <img src="<?php $p = photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-3 img-thumbnail">
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
              <img src="<?php $p = photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class="col-2 w-10  ">  <br>
                                <!-- <div class="col-8 h4 text-danger"> -->
									<h6><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?> </h6>
                <!-- HERE the forward get requets will activate the send to member button on the membership list page on the admin panel. -->
                <a class="link col" href="admin/membersList.php?list=true&forward=true&tb=<?php echo $tb?>&post=<?php echo $postFocus ?>&client=<?php echo $reciver ?>"  >Copy Link and Send to Other</a>
 
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
                  <img src="<?php $p = photoSplit($row2['photoPath1']); echo $p[0] ;?> " class="col-3 img-thumbnail">
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
                  <img src="<?php $p = photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class=" col-3 img-thumbnail">
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
              <?php
                }else{ /// else if its an order it only shows the order label
                  ?>
                  <div class="border border-success p-2">
                  <p class="text-success d-flex justify-content-center" > <strong>Welcome </strong> &nbsp;To  &nbsp; <strong> Zumra360</strong> &nbsp; Order Box !!    &nbsp;&nbsp; Please Fill Your Needs Detail below. </p></div>
                  <?php
                }
              ?>
						</div>
						<div class="card-body msg_card_body">
              <?php
              // echo $_SESSION['userId'];
                // to fetch all the messages of this particular user and post
                $innerMsg = innerMsgFetcher($tb, $_SESSION['userId'], $postFocus, $reciver);
                if($innerMsg->num_rows != 0){
                while($rowInnerMsg = $innerMsg->fetch_assoc()){
                  // to change the unseen to seen if there is a seen value of 'new' which is unseen. it has to do this every msg render b/c every new msg will have a 'new' in the seen coloumn
                  if($rowInnerMsg['seen'] == 'new' && $rowInnerMsg['user1'] != $_SESSION['userId'] && isset($_GET['unseen'])){
                    $seeen = seenMsg($rowInnerMsg['id']);
                  }



                  // if the loged user id is in a the user1 colomen, this means its the sender. so the message will be placed in a sendder div, else its the reciver so the msg will be placed in a reciver div
                  if($rowInnerMsg['user1'] == $_SESSION['userId']){
                  ?>
                                <div class="d-flex justify-content-end mb-4">

                    
                      <div class="img_cont_msg ">
                        <img src="<?php $p = photoSplit($row1['photoPath1']); echo $p[0] ;?>" class="rounded-circle user_img_msg">
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
                            $date = time_elapsed_string($rowInnerMsg['postedDate']);
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
                            $date = time_elapsed_string($rowInnerMsg['postedDate']);
                         ?>
                        <span class="text-danger"><?php echo $date ?></span>
                      </div>
                <div class="img_cont_msg">
                  <img src="<?php $p = photoSplit($row2['photoPath1']); echo $p[0] ;?>" class="rounded-circle user_img_msg">
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
                      alert(data)
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
              <!-- <input hidden type="text" name="seen" -->
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


      
    

    if(isset($_GET['setting'])){
      $us = allPostListerOnColumen('user', 'id', $_SESSION['userId']);
      $u = $us->fetch_assoc();
      ?>
      
<form action="Account.php?setting=true" method="POST" enctype="multipart/form-data" >
        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
            <div class="col-md-8 col-lg-9">
              <?php 
              if(isset($_GET['del'])){
                $del = delUserPhoto($_SESSION['userId']);
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
                  $cp = updateUserPhoto($fn, $tm, $_SESSION['userId']);
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

    // $u = loginAuth($username);
    // $num = $u->num_rows;
    // $up = ' ';
    if(isset($_POST['password'])){
    $password =$_POST['password'] ;
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $cp = password($password, $_SESSION['userId']);
    if($cp){
      echo 'password changed';
    }else{
      echo 'no';
    }
    }

    $uu = updateUserDataUSER($uid, $firstName, $lastName, $phoneNumber, $job, $recover);

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

  }else{
    header('Location: login.php');
  }
?>