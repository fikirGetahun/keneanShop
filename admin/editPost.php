<html>
    <head>

    </head>
    <?php
require_once "../php/adminCrude.php";

if(isset($_GET['pid'])){ //pid is post id to be edited
  $uidx = $_GET['pid'];
}

//vacancy edit handler
  if(isset(
    $_POST['companyName'], $_POST['jobType'], 
    $_POST['jobTitle'], $_POST['positionType'],
    $_POST['Deadline'], $_POST['reqNo'], $_POST['location'],
    $_POST['description'],$_POST['pid']
  )){
    $companyName = $_POST['companyName'];
    $jobType =$_POST['jobType'];
    $jobTitle=$_POST['jobTitle'];
    $positionType=$_POST['positionType'];
    $Deadline=$_POST['Deadline'];
    $reqNo=$_POST['reqNo'];
    $location=$_POST['location'];
    $info=$_POST['description']; 
    $id = $_POST['pid'];


    $ask = $admin->updateVacancyPost($jobType, $positionType, $companyName, $jobTitle, $location, $Deadline, $id , $reqNo, $info  );

  }

  //tender post data handler block
  if(isset($_POST['tenderType'],
   $_POST['startDate'],
    $_POST['Deadline2'],
     $_POST['initialCost'],
     $_POST['location2'],
     $_POST['description2'],$_POST['uid'], $_POST['title']
     )
     ){

      $tenderType = $_POST['tenderType'];
      $startingDate = $_POST['startDate'];
      $deadLine=$_POST['Deadline2'];
      $location=$_POST['location2'];
      $initialCost=$_POST['initialCost'];
      $info = $_POST['description2'];
      $id2 = $_POST['uid'];
      $title = $_POST['title'];

      $db = $admin->updateTenderLister($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2, $title   );

     }

     //ad post edit handler
     if(isset($_POST['type'], $_POST['price'], $_POST['address'], $_POST['phone'], $_POST['for'], $_POST['title'],
     $_POST['pid'], $_POST['info'])){
       echo 'in the ad';
      $type = $_POST['type'];
      $price = $_POST['price'];
      $address =  $_POST['address'];
      $phone = $_POST['phone'];
      $for = $_POST['for']; 
      $title = $_POST['title'];
      $postId = $_POST['pid'];
      $info = $_POST['info'];

      if(isset($_FILES['photo1'])){
        $fName1 = $_FILES['photo1']['name'];
        $tmpName1 = $_FILES['photo1']['tmp_name'];
        $adPhotoE = $admin->adPhotoChange('photoPath1', $fName1, $tmpName1, $postId);
      }

      if(isset($_FILES['photo2'])){
        $fName2 = $_FILES['photo2']['name'];
        $tmpName2 = $_FILES['photo2']['tmp_name'];
        $adPhotoE = $admin->adPhotoChange('photoPath2', $fName2, $tmpName2, $postId);

      }

      if(isset($_FILES['photo3s'])){
        $fName3 = $_FILES['photo3']['name'];
        $tmpName3 = $_FILES['photo3']['tmp_name'];
        $adPhotoE = $admin->adPhotoChange('photoPath3', $fName3, $tmpName3, $postId);

      }

      
      

      $adEdit = $admin->updateAdPost( $type, $price, $address, $phone, $for, $title, $info, $postId);


    }

?>
<script src="../assets/jquery.js"></script>
<script>
    $('#editV').on('submit', function(e){
      e.preventDefault()
      $.ajax({
        url: 'editPost.php',
        type: 'post',
        data: $('#editV').serialize(),
        success : function(){
          $('#alertVacancy').text('Edit SUCCESSFULL!  ')
        }
      })
      return false;

    })

    $('#editT').on('submit', function(e){
      e.preventDefault()
      $.ajax({
        url: 'editPost.php',
        type: 'post',
        data: $('#editT').serialize(),
        success : function(){
          $('#alertVacancy').text('Edit SUCCESSFULL!  ')
        }
      })
      return false;

    })
</script>

    <body>
    <main id="main" class="main">

 
<?php
  // if post vacancy is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == "editVacancy"){
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
      <select class="custom-select" name="jobType" id="inputGroupSelect01">
        <option selected>"<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['positionType']; 
      ?>"</option>
        <option value="1">	Management & Business Administration </option>
        <option value="2">	Engineering</option>
        <option value="3">	Medical/Health</option>
        <option value="4">	Marketing/Advertising</option>
        <option value="5">	Accounting</option>
        <option value="6">	Media/Design</option>
        <option value="7">	NGO</option>
        <option value="8">	Hotel Host</option>
        <option value="9">	House Worker</option>
        <option value="10">  Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Job Title</label>
      <input type="text" class="form-control" id="jobTitle" 
      aria-describedby="emailHelp" name="jobTitle" placeholder="Company Name" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['positionTitle']; 
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
      <label for="exampleInputEmail1">Location :</label>
      <textarea type="text" class="form-control" id="location" 
      aria-describedby="emailHelp" name="location" placeholder="location" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['location']; 
      ?>"
      ></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des" 
      aria-describedby="emailHelp" name="description" placeholder="location" 
      value= "<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['info']; 
      ?>"
      
      ></textarea>
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
  
  //if post tender is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == 'editTender'){
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
      <input type="text" class="form-control" id="Deadline2" 
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

    <input type="submit" onclick="x()" value="POST">
    <div id="alertVacancy"></div>
    </form>
    </div>
  
  </section>
                
      
      <?php
    }elseif($_GET['type'] == 'ad'){
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

        <div class="row">
          <script>
            $(document).ready(function(){
              $('#adPB1').click(function(){
                $('#adPC1').load('divTags.php #adP1')
              })

              $('#adPB2').click(function(){
                $('#adPC2').load('divTags.php #adP2')
              })

              $('#adPB3').click(function(){
                $('#adPC3').load('divTags.php #adP3')
              })
            })

          </script>



              <div id="adPC1">
                <img class="img-thumbnail" src="<?php echo $adRow['photoPath1'] ?>" alt="Card">
                <button type="button" id="adPB1" class="btn btn-dark">Change Photo</button>

              </div>

              <div id="adPC2">
                <img class="img-thumbnail" src="<?php echo $adRow['photoPath2'] ?>" alt="Card">
                <button type="button" id="adPB2" class="btn btn-dark">Change Photo</button>
              </div>

              <div id="adPC3">
                <img class="img-thumbnail" src="<?php echo $adRow['photoPath3'] ?>" alt="Card">
                <button type="button" id="adPB3" class="btn btn-dark">Change Photo</button>
              </div>

        </div>

        <input type="submit" onclick="x()" value="POST">

        </form>
        
        <?php
      }
      
      ?>
      
      <?php
    }
  }

?>



</main><!-- End #main -->
    </body>
</html>