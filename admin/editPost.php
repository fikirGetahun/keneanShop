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
     if(isset($_POST['type'], $_POST['price'], $_POST['address'], $_POST['phone'], $_POST['title'],
     $_POST['pid'], $_POST['info'])){
       echo 'in the ad';

      $for = " ";

      if(isset($_POST['for'])){
        $for = $_POST['for']; 
      }

      $type = $_POST['type'];
      $price = $_POST['price'];
      $address =  $_POST['address'];
      $phone = $_POST['phone'];
      
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


      //car post handler
      if(isset($_POST['type2'],$_POST['status2'],$_POST['forRentOrSell'],$_POST['fuleKind'],$_POST['fixidOrN'],$_POST['price2'],$_POST['info2'],$_POST['pid'],
       $_POST['title'])){
      echo 'inx';
      $title = $_POST['title'];
      $type = $_POST['type2'];
      $status = $_POST['status2'];
      $forRentOrSell= $_POST['forRentOrSell'];
      $fixidOrN= $_POST['fixidOrN'];
      $fuleKind = $_POST['fuleKind'];
      $price = $_POST['price2'];
      $info = $_POST['info2'];
      $postId = $_POST['pid'];

      if(isset($_FILES['x1'])){
        $fName1 = $_FILES['x1']['name'];
        $tmpName1 = $_FILES['x1']['tmp_name'];
        $adPhotoE = $admin->carPhotoChange('photoPath1', $fName1, $tmpName1, $postId);
      }

      if(isset($_FILES['x2'])){
        $fName2 = $_FILES['x2']['name'];
        $tmpName2 = $_FILES['x2']['tmp_name'];
        $adPhotoE = $admin->carPhotoChange('photoPath2', $fName2, $tmpName2, $postId);

      }

      if(isset($_FILES['x3'])){
        $fName3 = $_FILES['x3']['name'];
        $tmpName3 = $_FILES['x3']['tmp_name'];
        $adPhotoE = $admin->carPhotoChange('photoPath3', $fName3, $tmpName3, $postId);

      }      




      $out12 = $admin->updateCarPost($title,$type, $status, $fuleKind, $postId, $fixidOrN,$price,$info,$forRentOrSell );
    }


        //house or land post data inserter
        if(isset(
          $_POST['houseOrLand'], $_POST['city'],$_POST['subCity'], $_POST['wereda'],
           $_POST['forRentOrSell'], $_POST['area'], $_POST['cost'], $_POST['fixidOrN'], 
           $_POST['info'],$_POST['pid'], $_POST['title']
        )){
          echo 'inn house';

          // these variables will not be set if user choose house so initial value will be empty
          $bedRoomNo = ' ';
          $bathRoomNo = ' ';
          $type = " ";
          if(isset(
            $_POST['bedRoomNo'],
            $_POST['bathRoomNo'],
            $_POST['type']
          )){
            $bedRoomNo = $_POST['bedRoomNo'];
            $bathRoomNo = $_POST['bathRoomNo'];
            $type = $_POST['type'];
          }
          $title = $_POST['title'];
          $houseOrLand =$_POST['houseOrLand'];
          $city =$_POST['city'];
          $subCity=$_POST['subCity'];
          $wereda= $_POST['wereda'];
          $forRentOrSell=$_POST['forRentOrSell'];
          $area=$_POST['area'];
          $price=$_POST['cost'];
          $fixidOrN=$_POST['fixidOrN'];
          $info=$_POST['info'];
          $postId = $_POST['pid'];

          if(isset($_FILES['xy1'])){
            $fName1 = $_FILES['xy1']['name'];
            $tmpName1 = $_FILES['xy1']['tmp_name'];
            $adPhotoE = $admin->housePhotoChange('photoPath1', $fName1, $tmpName1, $postId);
          }
    
          if(isset($_FILES['xy2'])){
            $fName2 = $_FILES['xy2']['name'];
            $tmpName2 = $_FILES['xy2']['tmp_name'];
            $adPhotoE = $admin->housePhotoChange('photoPath2', $fName2, $tmpName2, $postId);
    
          }
    
          if(isset($_FILES['xy3'])){
            $fName3 = $_FILES['xy3']['name'];
            $tmpName3 = $_FILES['xy3']['tmp_name'];
            $adPhotoE = $admin->housePhotoChange('photoPath3', $fName3, $tmpName3, $postId);
    
          }      


    
          
          $outH = $admin->updateHousePost($title, $type, $houseOrLand, $city, $subCity, $wereda,
          $forRentOrSell, $area, $bedRoomNo, $bathRoomNo, $price, $fixidOrN, $info, $postId );
          
    
        }

?>
<script src="../assets/jquery.js"></script>
<script>
  $(document).ready(function(){

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


    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'editPost.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text('Edit SUCCESSFULL!  ')
              $('#alertVacancy').delay(3200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          
          return false;

    })
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
        <div id="alertVacancy"></div>
        </form>
        
        <?php
      }
      
      ?>
      
      <?php
    }elseif($_GET['type'] == 'car'){
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
<script>
  $(document).ready(function(){

    $('#carPB1').click(function(){
      $('#carF1').load('divTags.php #carCform1')
    })
    
    $('#carPB2').click(function(){
      $('#carF2').load('divTags.php #carCform2')
    })

    $('#carPB3').click(function(){
      $('#carF3').load('divTags.php #carCform3')
    })

  })

</script>

   
          <div id="carF1">
          <img class="img-thumbnail" src="<?php echo $carRow['photoPath1'] ?>" alt="Card">
                <button type="button" id="carPB1" class="btn btn-dark">Change Photo</button>
          </div>
          <div id="carF2">
          <img class="img-thumbnail" src="<?php echo $carRow['photoPath2'] ?>" alt="Card">
                <button type="button" id="carPB2" class="btn btn-dark">Change Photo</button>
          </div>
          <div id="carF3">
          <img class="img-thumbnail" src="<?php echo $carRow['photoPath3'] ?>" alt="Card">
                <button type="button" id="carPB3" class="btn btn-dark">Change Photo</button>
          </div>
        



        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
          </form>
      <?php
    }elseif($_GET['type'] == 'house'){
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


        <script>
  $(document).ready(function(){

    $('#hPB1').click(function(){
      $('#hF1').load('divTags.php #hform1')
    })
    
    $('#hPB2').click(function(){
      $('#hF2').load('divTags.php #hform2')
    })

    $('#hPB3').click(function(){
      $('#hF3').load('divTags.php #hform3')
    })

  })

</script>

   
          <div id="hF1">
          <img class="img-thumbnail" src="<?php echo $houseRow['photoPath1'] ?>" alt="Card">
                <button type="button" id="hPB1" class="btn btn-dark">Change Photo</button>
          </div>
          <div id="hF2">
          <img class="img-thumbnail" src="<?php echo $houseRow['photoPath2'] ?>" alt="Card">
                <button type="button" id="hPB2" class="btn btn-dark">Change Photo</button>
          </div>
          <div id="hF3">
          <img class="img-thumbnail" src="<?php echo $houseRow['photoPath3'] ?>" alt="Card">
                <button type="button" id="hPB3" class="btn btn-dark">Change Photo</button>
          </div>
        



        <input type="submit" value="Post">
        <div id="alertVacancy"></div>
             </form>


      
      <?php
    }
  }

?>



</main><!-- End #main -->
    </body>
</html>