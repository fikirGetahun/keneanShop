<?php  
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

  })


</script>

<div class="container">
	<div class="row">

		<div class="col-md-2">

			
		</div>
		<!-- middle section-->

		<div class="col-md-8" >

    <div style="background-image: url(admin/assets/img/zumra.png);">
      <div class="card w-25 float-left ">
      <img src="<?php echo $urow['photoPath']?>" class="card-img-top" alt="...">
    
      </div>
      <h5 class="float-left">Name : <?php echo $urow['firstName'].' '.$urow['lastName'] ?></h5>
  <div class="card-header">
  <nav class="nav nav-pills nav-justified">
    <?php 
      if(isset($_GET['yourPost'])){
        ?>
        <a class="nav-item nav-link active" href="#">Your Posts</a>
        <?php
      }else{
        ?>
        <a class="nav-item nav-link" href="#">Your Posts</a>
        <?php
      }
    
    ?>
  <a class="nav-item nav-link" href="#">Favourite</a>
  <a class="nav-item nav-link" href="#">Messages</a>
  <a class="nav-item nav-link" href="#">Settings</a>
 
</nav>
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
                }if($posts == 'housesell'){
                  if($row['houseOrLand'] == 'HOUSE'){
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=House Posts&type=house" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
                        <?php
                  }else{
                    ?>
                    <a class="img-thumbnail" href="./Description.php?cat=<?php echo $posts;?>&postId=<?php echo $row['id'];?>&label=Land Posts&type=land" > <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></img></a> 
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
                   <?php 
                   if($posts == 'hotelhouse'){
                     if($row['hotelOrHouse'] == 'HOUSE'){
                      ?>
                      <a href= "Account.php?edit=true&type=house&pid=<?php echo $row['id'] ?>">   <button type="button"  class="btn btn-sm btn-outline-secondary">Edit</button></a>
                     <?php
                     }elseif($row['hotelOrHouse'] == 'HOTEL'){
                       ?>
                      <a href= "Account.php?edit=true&type=hotel&pid=<?php echo $row['id'] ?>">   <button type="button"  class="btn btn-sm btn-outline-secondary">Edit</button></a> 
                       <?php
                     }
                   }else{
                    ?>
                  <a href="Account.php?edit=true&type=<?php echo $posts ?>&pid=<?php echo $row['id'] ?>">   <button type="button"  class="btn btn-sm btn-outline-secondary">Edit</button></a>
                    <?php
                  }
                   ?>
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
</div>
      
      <?php

    }

    if(isset($_GET['edit'])){

      ?>
      
      
      
      <html>
    <script src="assets/jquery.js"></script>  
  
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> -->


   <!-- </script> -->
   <?php


   if(isset($_GET['pid'])){ //pid is post id to be edited
    $uidx = $_GET['pid'];
  }

   ?>
    <script>

  $(document).ready(function(){

    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'admin/editHandler.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              // $('#alertVacancy').delay(3200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          
          return false;

    })


  })
  


</script>
    <?php
require_once "php/adminCrude.php";





?>


    <main id="main" class="main">

 
<?php
/////////////////////////////////////////////////////////////
  // if post vacancy is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == "vacancy"){
    ?>
 
  <section class="section">
      <div class="pagetitle">
      <h1>Edit Vacancy Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Icons</li>
          <li class="breadcrumb-item active">Bootstrap</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <p>
    Here you have to fill the requiered fields inorder to post the Vacancy Application.
    </p>


    <div id="vacancyBox" class="container">
    <form id="editV" action="editPost.php"  method="POST" >
      <input hidden name="pid" value="<?php echo $uidx; ?>">
    <div class="form-group">
      <label for="exampleInputEmail1">Company Name</label>
      <input type="text" class="form-control" id="companyName" 
      aria-describedby="emailHelp" name="companyName" placeholder="" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['companyName']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Type Of JOBS</label>
      </div>

      <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jobT').load('divTags.php #jobType')
                }
                
              })
            })

          </script>

      <select class="custom-select" name="jobType" id="jobTT">
        <option selected>"<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['positionType']; 
      ?>"</option>
        <option value="Management & Business Administration ">	Management & Business Administration </option>
        <?php
                $vacancyCat = $admin->vacancyCategoryLister();
                while($vacancyCatRow = $vacancyCat->fetch_assoc()){
                  ?>
                  <option value="<?php echo $vacancyCatRow['category'] ?>"><?php echo $vacancyCatRow['category'] ?></option>
                  <?php
                }
              ?>
        <option value="OTHER">  Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Job Title</label>
      <input type="text" class="form-control" id="jobTitle" 
      aria-describedby="emailHelp" name="jobTitle" placeholder="Company Name" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['title']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Position Type</label>
    </div>
    <select class="custom-select" name="positionType" id="inputGroupSelect01">
      <option selected>"<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['type']; 
      ?>"</option>
      <option value="1">Full Time</option>
      <option value="2">Part Time</option>
      <option value="3">Temporary</option>
      <option value="3">Contractual </option>
    </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Deadline</label>
      <input type="date" class="form-control" id="Deadline" 
      aria-describedby="emailHelp" name="Deadline" placeholder="Company Name"
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['deadLine']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Requierd Position No</label>
      <input type="number" class="form-control" id="jobTitle" 
      aria-describedby="emailHelp" name="reqNo" placeholder="Company Name"
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['positionNum']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="phone number"
          value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['phone']; 
      ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Location :</label>
      <textarea type="text" class="form-control" id="location" 
      aria-describedby="emailHelp" name="location" placeholder="location" 
      value=""
      ><?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['address']; 
      ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des" 
      aria-describedby="emailHelp" name="description" placeholder="location" 
      value= ""
      
      ><?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['info']; 
      ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
      <input type="submit" onclick="x()" value="POST">
    <!-- <button type="submit" onclick="x()" class="btn btn-primary">Submit</button> -->
    </form>
    </div>
    <div id="alertVacancy"></div>
  
  </section>
    
    <?php
    }
  }
  //////////////////////////////////////////////////////////////////////////
  //if post tender is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == 'tender'){
      ?>
         <div class="pagetitle">
  <h1>Edit Tender Post</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Icons</li>
      <li class="breadcrumb-item active">Bootstrap</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
    <p>
    Here you have to fill the requiered fields inorder to post the Tender.
    </p>

    <div id="vacancyBox" class="container">
    <form id="editT" action="editPost.php" method="POST" >
    <input hidden name="uid" value="<?php echo $uidx; ?>">
    <div class="form-group">

    <div class="form-group">
          <label for="exampleInputEmail1">Tender Title</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name"
          value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['title']
      
      ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

      <label for="exampleInputEmail1">Tender Type</label>
      <input type="text" class="form-control" id="tenderType" 
      aria-describedby="emailHelp" name="tenderType" placeholder="Company Name"
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['tenderType']
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Starting date</label>
      <input type="date" class="form-control" id="startingDate" 
      aria-describedby="emailHelp" name="startDate" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['startingDate'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Deadline</label>
      <input type="date" class="form-control" id="Deadline2" 
      aria-describedby="emailHelp" name="Deadline2" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['deadLine'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Initial Cost</label>
      <input type="number" class="form-control" id="phoneNo" 
      aria-describedby="emailHelp" name="initialCost" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['initialCost'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Location :</label>
      <textarea type="text" class="form-control" id="location2" 
      aria-describedby="emailHelp" name="location2" placeholder="location" 

      >
      <?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['location']
      
      ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="description2" placeholder="Describition" 
      value=""
      ><?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['info']
      
      ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <input type="submit" onclick="x()" value="Save Changes">
    <div id="alertVacancy"></div>
    </form>
    
    <script>
// photo updater and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "tender", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<div class="row">
<?php
$i = 0;
$pp = $admin->photoSplit($row['photoPath1']);
if(!empty($row['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>" class="col-1" >
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
?></div><?php
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="tender">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>


    </div>
  
  </section>
                
      
      <?php
    }
    //////////////////////////////////////////////////////
    elseif($_GET['type'] == 'ad'){
      $adEdit = $admin->adEditDataLister($uidx);
      while($adRow = $adEdit->fetch_assoc()){
        ?>
        <form id="adPost" action="editPost.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="pid" value="<?php  echo $uidx ?>"
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name" 
          value="<?php echo $adRow['title'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type or Catagory</label>
          </div>
          <select class="custom-select" name="type" id="inputGroupSelect01">
          <option selected><?php echo $adRow['type'] ?></option>
            ?><?php
              $out11 = $admin->adsCategoryLister();
              while($r = $out11->fetch_assoc()){
              ?>
            
            <option value="<?php echo $r['category'] ?>">	<?php echo $r['category'] ?> </option>
            <?php
              }
            ?>

              
          </select>
        </div>

        <?php
        if($adRow['for'] != " "){
?>

<div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Target For: </label>
        </div>
        <select class="custom-select" name="for" id="inputGroupSelect01">
          <option selected><?php echo $adRow['for'] ?></option>
          <option value="women">Women</option>
          <option value="men">Men</option>
          <option value="both">Both</option>
        </select>
        </div>
<?php
        }
        
        ?>




        <div class="form-group">
          <label for="exampleInputEmail1">Price :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Company Name" 
          value="<?php echo $adRow['price'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Company Name"
          value="<?php echo $adRow['address'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Company Name"
          value="<?php echo $adRow['phone'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"><?php echo $adRow['info'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <input type="submit" onclick="x()" value="Save Changes">
        <div id="alertVacancy"></div>
        </form>

        <script>
// photo updatedr and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "ad", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($adRow['photoPath1']);
if(!empty($adRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="ad">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>

        
        <?php
      }
      
      ?>
      
      <?php
    }
    ////////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'car'){
      $carE = $admin->carPostDataLister($uidx);
      $carRow = $carE->fetch_assoc();
      ?>
        <form id="car" action="editPost.php" method="POST" enctype="multipart/form-data" >
          <input hidden name="pid" value="<?php echo $uidx; ?>">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name" 
              value="<?php echo $carRow['title'] ?>"
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

<script>
  $(document).ready(function(){
    $('#sCar').on('change', function(){
      if(this.value == "other"){
        $('#typeC').load("divTags.php #typeCar")
      }

    })
  })
</script>

              <div id="typeC" class="input-group mb-3">
            <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> Car Type: </label>
            </div>
            <select id="sCar" class="custom-select" name="type2" id="inputGroupSelect01">
              <option selected><?php echo $carRow['type'] ?></option>
              <?php
                $carCat = $admin->carCategoryLister();
                while($carCatRow = $carCat->fetch_assoc()){
                  ?>
                  <option value="<?php echo $carCatRow['category'] ?>"><?php echo $carCatRow['category'] ?></option>
                  <?php
                }
              ?>
              
            </select>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option selected value="<?php echo $carRow['ownerBroker'] ?>"><?php echo $carRow['ownerBroker'] ?></option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Status Of Car: </label>
        </div>
        <select class="custom-select" name="status2" id="inputGroupSelect01">
          <option selected><?php echo $carRow['status'] ?></option>
          <option value="NEW">New</option>
          <option value="OLD">Old</option>
        </select>
        </div>

        

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected><?php echo $carRow['forRentOrSell'] ?></option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fule Kind: </label>
        </div>
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected><?php echo $carRow['fuleKind'] ?></option>
          <option value="Benzene">Benzene</option>
          <option value="Diesel">Diesel</option>
        </select>
        </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Transmission Type: </label>
        </div>
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
        <option selected value="<?php echo $carRow['transmission'] ?>"><?php echo $carRow['transmission'] ?></option>
          <option value="automatic">Automatic</option>
          <option value="manual">Manual</option>
        </select>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Body Status :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bodyStatus" placeholder="Company Name"
              value="<?php echo $carRow['bodyStatus'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Km Range :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="Company Name"
              value="<?php echo $carRow['km'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $carRow['fixidOrN'] ?></option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price : </label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="Company Name" 
          value="<?php echo $carRow['price'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="location"> <?php echo $carRow['info'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" onclick="x()" value="Save Changes">
        <div id="alertVacancy"></div>

        <script>
//photo updater and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "car", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($carRow['photoPath1']);
if(!empty($carRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="car">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>




          </form>
      <?php
    }
    //////////////////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'housesell'){
      $houseOut = $admin->singleHousePostLister($uidx);
      $houseRow = $houseOut->fetch_assoc();
      ?>
      

      <script>
      $(document).ready(function(){

        $('#city').on('change',function(){
          if(this.value == "otherCity"){
          $('#cityBox').load('divTags.php #otherCity')
 
        }
   
        })

        $('#subCity').on('change',function(){
        if(this.value == "otherSubCity"){
         $('#subCityBox').load('divTags.php #otherSubCity')
        }
      
        })

        $('#HorL').on('change', function(){
          if(this.value == "HOUSE"){
          $('#houseTypeLoader').load("divTags.php #houseType")
          $('#bedOrBath').load('divTags.php #bedBath')
        }
        })
        })
      </script>

<form id="house" action="editPost.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="pid" value="<?php echo $uidx; ?>">

             <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">House Or Land </label>
        </div>
        <select id="HorL"  class="custom-select" name="houseOrLand" id="inputGroupSelect01">
          <option selected value="<?php echo $houseRow['houseOrLand'] ?> "></option>
          <option value="HOUSE">House</option>
          <option value="LAND">Land</option>
        </select>
        
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name" 
              value="<?php echo $houseRow['title'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

        
<div id="houseTypeLoader">
        <?php
        if($houseRow['houseOrLand'] != " " ){
          ?>
          <div id="houseType" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Type : </label>
        </div>
        <select class="custom-select" name="type" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['type'] ?> </option>
          <option value="women">Villa</option>
          <option value="men">Gojo</option>
        </select>
        </div>
          <?php
        }
        ?>
</div>


        <div id="cityBox" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> City :</label>
        </div>
        <select class="custom-select" name="city" id="city">
          <option selected><?php echo $houseRow['city'] ?> </option>
          <option value="women">Addis Ababa</option>
          <option value="men">Gonder</option>
          <option value="both">BahirDar</option>
          <option value="otherCity">Other</option>
        </select>
        </div>

        <div id="subCityBox" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> SubCity : </label>
        </div>
        <select id="subCity" class="custom-select" name="subCity" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['subCity'] ?> </option>
          <option value="women">Jemo</option>
          <option value="men">4 kilo</option>
          <option value="otherSubCity">Other</option>          
        </select>
        </div>

        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name"
              value="<?php echo $houseRow['wereda'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option selected value="<?php echo $houseRow['ownerBroker'] ?> " ><?php echo $houseRow['ownerBroker'] ?> </option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['forRentOrSell'] ?> </option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name" 
              value="<?php echo $houseRow['area'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">
              <?php
            if($houseRow['bedRoomNo'] != " " && $houseRow['bathRoomNo'] != " "  ){
              ?>
              
              <div id="bedBath">
<div class="form-group">
              <label for="exampleInputEmail1">Number Of BedRoom :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bedRoomNo" placeholder="Company Name" 
              value="<?php echo $houseRow['bedRoomNo'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bath Of BedRoom :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bathRoomNo" placeholder="Company Name"
              value="<?php echo $houseRow['bathRoomNo'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>
              
              <?php
            }
            ?>
            </div>




            <div class="form-group">
              <label for="exampleInputEmail1">Price :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name"
              value="<?php echo $houseRow['cost'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['fixedOrN'] ?> </option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"><?php echo $houseRow['info'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" value="Save Changes">
        <div id="alertVacancy"></div>

         <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "housesell", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($houseRow['photoPath1']);
           if(!empty($houseRow['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="housesell">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>


             </form>
             

      <?php
    }
    //////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'electronics'){
      $elcEdit = $admin->elecSinglePostViewer($uidx);
      $elecRow = $elcEdit->fetch_assoc();

      ?>
      
      <h5>Edit Electronics Items</h5>
      <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $uidx; ?>">

      <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="Title of Your Post" 
          value="<?php echo $elecRow['title'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



          <div id="typeC" class="input-group mb-3">
        <div  class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01"> Electronics Type: </label>
        </div>
        <select id="sElc" class="custom-select" name="type" id="inputGroupSelect01">
          <option selected><?php echo $elecRow['type'] ?></option>
          <option value="Computer Laptop">Computer Laptop</option>
          <?php
            $carCat = $admin->carCategoryLister();
            while($carCatRow = $carCat->fetch_assoc()){
              ?>
              <option value="<?php echo $carCatRow['category'] ?>"><?php echo $carCatRow['category'] ?></option>
              <?php
            }
          ?>
          
        </select>
        </div>

        <?php 
          if($elecRow['ram'] != " " &&
          $elecRow['processor'] != " " &&
          $elecRow['core'] != " " &&
          $elecRow['storage'] != " " &&
          $elecRow['size'] != " " ){

            ?>
            
      <div id="sizeInch" class="form-group">
          <label for="exampleInputEmail1">Size In Inch:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="size" placeholder="Size of Item" 
          value="<?php echo $elecRow['size'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

              <div id="ram" class="form-group">
          <label for="exampleInputEmail1">Ram:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="ram" placeholder="Size of Item" 
          value="<?php echo $elecRow['ram'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="proc" class="form-group">
          <label for="exampleInputEmail1">Processor Type:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="processor" placeholder="Processor Type" 
          value="<?php echo $elecRow['processor'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="storage" class="form-group">
          <label for="exampleInputEmail1">Storage Size:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="storage" placeholder="Storage Size"
          value="<?php echo $elecRow['storage'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="core" class="form-group">
          <label for="exampleInputEmail1">Core Count:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="core" placeholder="Core count"
          value="<?php echo $elecRow['core'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
            <?php

          }
        
        ?>

        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"> Status Of Item: </label>
    </div>
    <select class="custom-select" name="status" id="inputGroupSelect01">
      <option selected value="<?php echo $elecRow['status'] ?>"><?php echo $elecRow['status'] ?></option>
      <option value="NEW">New</option>
      <option value="OLD">Old</option>
    </select>
    </div>



    <div id="computer"></div>

    <div class="form-group">
      <label for="exampleInputEmail1">Price : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="Price in Birr" 
      value="<?php echo $elecRow['price'] ?>">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Address :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Your Address" 
          value="<?php echo $elecRow['address'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <input type="submit" onclick="x()" value="Save Changes">
    <div id="alertVacancy"></div>

        <script>

function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "electronics", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($elecRow['photoPath1']);
if(!empty($elecRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="electronics">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>




      </form>
      
      <?php
    }
  }
  /////////////////////////////////////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'charity'){
      $out = $admin->aSinglePostView($uidx, 'charity');
      $cRow = $out->fetch_assoc();

      ?>
<form  method="POST" enctype="multipart/form-data">

<input hidden name="posterId" value="<?php echo $uidx; ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Charity Title</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="title" placeholder="Title"
  value="<?php echo $cRow['title'] ?>">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1"> Address  </label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="location" placeholder="address"
  value="<?php echo $cRow['location'] ?>">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone no:</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="phone" value="<?php echo $cRow['phone'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Describtion</label>
<textarea type="text" class="form-control" id="des2" 
aria-describedby="emailHelp" name="info" placeholder="Detailed Info"><?php echo $cRow['info'] ?></textarea>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="alertVacancy"></div>
<input type="submit"  value="Save Changes">

<script>

function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "charity", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($cRow['photoPath1']);
if(!empty($cRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="charity">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>





</form>

      <?php
    }
  }

  ///////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'jobhometutor'){

      $out = $admin->aSinglePostView($uidx, 'jobhometutor');
      $row = $out->fetch_assoc();

      ?>
      
      <h5>Home Tutor Job Application</h5>

<form  method="POST" enctype="multipart/form-data">
<input hidden name="posterId" value="<?php echo $uidx; ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Full Name</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="name" placeholder="Full Name"  value="<?php echo $row['Name'] ?>">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Gender</label>
</div>
<select class="custom-select" name="sex" id="inputGroupSelect01">
  <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
  <option value="Male">Mele</option>
  <option value="Female">Female</option>
</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Educational Background:</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="eduBackground" placeholder="location"> <?php echo $row['eduBackground'] ?> </textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Range </label>
</div>
<select class="custom-select" name="clientRange" id="inputGroupSelect01">
  <option value="<?php echo $row['clientRange'] ?>" ><?php echo $row['clientRange'] ?></option>
  <option value="1-8">1-8 Grade</option>
  <option value="9-12">9-10</option>
  <option value="9-10">9-10</option>
  <option value="10-11">10-11</option>
  <option value="11-12">11-12</option>

</select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Payment Status</label>
</div>
<select class="custom-select" name="paymentStatus" id="inputGroupSelect01">
  <option selected value="<?php echo $row['paymentStatus'] ?>" ><?php echo $row['paymentStatus'] ?></option>
  <option value="Horly">Hourly</option>
  <option value="Dayly">Dayly</option>
  <option value="Monthly">Monthly</option>

</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Price:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone </label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="Full Name" value="<?php echo $row['phone'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Address</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="address" placeholder="location"><?php echo $row['address'] ?></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <h6>If you are representing  or if you are Agent, please fill the next form.</h6>
  <label for="exampleInputEmail1">Company Info</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="companyInfo" placeholder="location"><?php echo $row['companyInfo'] ?></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Description About You</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="info" placeholder="info"><?php echo $row['info'] ?></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>



<input type="submit" onclick="x()" value="POST">
<div id="alertVacancy"></div>




<script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "jobhometutor", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="jobhometutor">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>
</form>


      <?php
    }
  }
  //////////////////////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'hotel'){
      $outp = $admin->aSinglePostView($uidx, 'hotelhouse');
      $row = $outp->fetch_assoc();
      ?>
               <h5>Hotel Worker Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <!-- <input hidden name="hotelOrHouse" value="HOTEL"> -->
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Field </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="field" placeholder="Full Name" value="<?php echo $row['field'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name" value="<?php echo $row['address'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workType'] ?>" ><?php echo $row['workType'] ?></option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"><?php echo $row['experience'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"> <?php echo $row['currentAddress'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"> <?php echo $row['agentInfo'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>
        <p>Answer</p>
        <h5><?php echo $row['bidingPerson'] ?></h5>

        <h5>Change Answer</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>

        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "hotelhouse", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="hotelhouse">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>


             </form>


          



      
      <?php
    }
  }
///////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'houseKeeper'){
    $out = $admin->aSinglePostView($uidx, 'hotelhouse');
    $row = $out->fetch_assoc();

    ?>
    
    
    <h5>House Keeper Job Application</h5>
    <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <!-- <input hidden name="hotelOrHouse" value="HOTEL"> -->
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Religion</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="religion" placeholder="Full Name" value="<?php echo $row['religion'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name" value="<?php echo $row['address'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workType'] ?>" ><?php echo $row['workType'] ?></option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"><?php echo $row['experience'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"> <?php echo $row['currentAddress'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"> <?php echo $row['agentInfo'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>
        <p>Answer</p>
        <h5><?php echo $row['bidingPerson'] ?></h5>

        <h5>Change Answer</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          </form>

        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "hotelhouse", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="hotelhouse">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>

<div id="alertVacancy"></div>

             </form>
    <?php
  }
}
////////////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'zebegna'){

    $out = $admin->aSinglePostView($uidx, 'zebegna');
    $row = $out->fetch_assoc();
    ?>
    
    <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name" value="<?php echo $row['address'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Status</label>
        </div>
        <select class="custom-select" name="workStat" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workStat'] ?>" ><?php echo $row['workStat'] ?></option>
          <option value="Company">Company</option>
          <option value="Full Day">Private</option>
          <option value="House">House</option>
          <option value="Hotel">Hotel</option>
          <option value="Banks">Banks</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Full Name" value="<?php echo $row['phone'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
        </form>
        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "zebegna", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="zebegna">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>




          


        
          <div id="alertVacancy"></div>
       
    
    <?php
  }
}


?>



</main><!-- End #main -->



      
      <?php

    }
    
    ?>



    
  </div>
    </div>
		
		<!--right section0-->

		<div class="col-md-2">
			<div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
</div>
			
		</div>
		
	
  </div>
</div>
<?php

include "./includes/footer.php";
?>