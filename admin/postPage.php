<!DOCTYPE html>
<html lang="en">


<?php

// use function PHPSTORM_META\elementType;

require_once "../php/adminCrude.php";

if(isset($_GET['uid'])){
  $uidx = $_GET['uid'];
}





?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<script src="../assets/jquery.js"></script>
<script>
  $(document).ready(function(){
    // $('#vacancyForm').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'postPage.php',
    //     type: 'post',
    //     data: $('#vacancyForm').serialize(),
    //     success : function(){
    //       $( 'form' ).each(function(){
    //                 this.reset();
    //           });
    //           $('#alertVacancy').text('POST SUCCESSFULL!  ')
    //           $('#alertVacancy').delay(3200).fadeOut(300);    
    //             }
    //   })
    //   return false;

    // })

    // $('#tenderForm').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'postPage.php',
    //     type: 'post',
    //     data: $('#tenderForm').serialize(),
    //     success : function(){
    //       $( 'form' ).each(function(){
    //                 this.reset();
    //           });
    //           $('#alertVacancy').text('POST SUCCESSFULL!  ')
    //           $('#alertVacancy').delay(3200).fadeOut(300);        }
    //   })
    //   return false;

    // })

    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'postHandler.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              $('#alertVacancy').delay(5200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          

    })

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

    $('#sCar').on('change', function(){
      if(this.value == "OTHER"){
        $('#typeC').load("divTags.php #typeCar")
      }
    })

    
  })

</script>

<body>

  <!-- ======= Header ======= -->


  <!-- ======= Sidebar ======= -->


  <main id="main" class="container">

 
    <?php
      // if post vacancy is selected it loads this if block
      if(isset($_GET['type'])){
        if($_GET['type'] == "postVacancy"){
        ?>
     
      <section class="section">
          <div class="pagetitle">
          <h1>Vacancy Post</h1>
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
        <form id="vacancyForm" action="postPage.php"  method="POST" >
          <input hidden name="uid" value="<?php echo $uidx; ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Company Name</label>
          <input type="text" class="form-control" id="companyName" 
          aria-describedby="emailHelp" name="companyName" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jt').load('divTags.php #jobType')
                }
                
              })
            })

          </script>
        <div id="jt" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type Of JOBS</label>
          </div>


          <div id="jobT">
          <select class="custom-select" name="jobType" id="jobTT">
            <option selected>Choose...</option>
            <?php
                $vacancyCat = $admin->vacancyCategoryLister();
                while($vacancyCatRow = $vacancyCat->fetch_assoc()){
                  ?>
                  <option value="<?php echo $vacancyCatRow['category'] ?>"><?php echo $vacancyCatRow['category'] ?></option>
                  <?php
                }
              ?>
          </select>
          </div>


        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Job Title</label>
          <input type="text" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="jobTitle" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Position Type</label>
        </div>
        <select class="custom-select" name="positionType" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Full Time">Full Time</option>
          <option value="Part Time">Part Time</option>
          <option value="Temporary">Temporary</option>
          <option value="Contractual">Contractual </option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
          <option value="Both">Both</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deadline</label>
          <input type="date" class="form-control" id="Deadline" 
          aria-describedby="emailHelp" name="Deadline" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Requierd Position No</label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="reqNo" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Location :</label>
          <textarea type="text" class="form-control" id="location" 
          aria-describedby="emailHelp" name="location" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des" 
          aria-describedby="emailHelp" name="description" placeholder="location"></textarea>
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
        if($_GET['type'] == 'tender'){
          ?>
    <div class="pagetitle">
      <h1>Tender Post</h1>
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
        <form id="tenderForm"  method="POST" >
        <input hidden name="uid" value="<?php echo $uidx; ?>">

        <div class="form-group">
          <label for="exampleInputEmail1">Tender Title</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tender Type</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="tenderType" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Starting date</label>
          <input type="date" class="form-control" id="startingDate" 
          aria-describedby="emailHelp" name="startDate" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deadline</label>
          <input type="date" class="form-control" id="Deadline2" 
          aria-describedby="emailHelp" name="Deadline2" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Initial Cost</label>
          <input type="number" class="form-control" id="phoneNo" 
          aria-describedby="emailHelp" name="initialCost" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Location :</label>
          <textarea type="text" class="form-control" id="location2" 
          aria-describedby="emailHelp" name="location2" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="description2" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photo  [Optional] </label>
          <input type="file" class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
        </form>
        </div>
      
      </section>
                    
          
          <?php
        }
      }

    
    if(isset($_GET['type'])){
      if($_GET['type'] == 'ad'){
        ?>
        <h5>Post Advertisment</h5>
        <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $uidx; ?>">
        <input hidden name="big" value="NOT">


        <div class="form-group">
          <label for="exampleInputEmail1">Title</Title></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<script>

$(document).ready(function(){
$('#tCategory').on('change', function(){
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('divTags.php #targetFor')
  }
 
})

$('#tCategory').on('change', function(){
  if(this.value == "OTHER"){
    $('#adTy').load('divTags.php #otherAd')
  }
 
})



})

</script>

        <div id="adTy"  class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type or Catagory</label>
          </div>
          <select id="tCategory" class="custom-select" name="type" id="inputGroupSelect01">
          <option selected>Choose...</option>
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

        <div id="targetLoader">

        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Price :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Offer Shipping</label>
        </div>
        <select class="custom-select" name="shipping" id="inputGroupSelect01">
          <option value="NO" selected>NO</option>
          <option value="YES">YES</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

    <!-- <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo 2</label>
          <input type="file" class="form-control" id="photo" 
           name="photo2" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo 3</label>
          <input type="file" class="form-control" id="photo" 
           name="photo3" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
        </div> -->

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
        </form>
        <?php
      }
      }if(isset($_GET['type'])){
        if($_GET['type'] == 'car'){
          ?>
          <h5>Post Car Ads</h5>
          <form action="postPage.php" method="POST" enctype="multipart/form-data" >
          <input hidden name="posterId2" value="<?php echo $uidx; ?>">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

              <div id="typeC" class="input-group mb-3">
            <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> Car Type: </label>
            </div>
            <select id="sCar" class="custom-select" name="type2" id="inputGroupSelect01">
              <option selected>Choose...</option>
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
          <option selected>Choose...</option>
          <option value="NEW">New</option>
          <option value="OLD">Old</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fule Kind: </label>
        </div>
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Benzene">Benzene</option>
          <option value="Diesel">Diesel</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Transmission Type: </label>
        </div>
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
          <option value="automatic">Automatic</option>
          <option value="manual">Manual</option>
        </select>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Body Status :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bodyStatus" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Km Range :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price : </label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
          </form>
          
          <?php
        }if(isset($_GET['type'])){
          if($_GET['type'] == 'house'){
            ?>
            <h5>House Ad Post</h5>
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $uidx; ?>">

             <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">House Or Land </label>
        </div>
        <select id="HorL"  class="custom-select" name="houseOrLand" id="inputGroupSelect01">
          <option selected value=" "></option>
          <option value="HOUSE">House</option>
          <option value="LAND">Land</option>
        </select>
        
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <script src="../assets/jquery.js"></script>
  <script>
    $(document).ready(function(){
      $('#selHouseType').on('change',function(){
        alert('inhh')
        if(this.value == 'OTHER'){
          $('#houseTypeLoader').load('divTags.php #houseTypeOther')
        }
      })
    })
  </script>
        
<div id="houseTypeLoader"></div>


        <div id="cityBox" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> City :</label>
        </div>
        <select class="custom-select" name="city" id="city">
          <option selected>Choose...</option>
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
          <option selected>Choose...</option>
          <option value="women">Jemo</option>
          <option value="men">4 kilo</option>
          <option value="otherSubCity">Other</option>          
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">

            </div>



            <div class="form-group">
              <label for="exampleInputEmail1">Price :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

      
        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <input type="submit" value="Post">
        <div id="alertVacancy"></div>
             </form>
            
            
            <?php
          }

        }
      }
//////////////////////////////////////////////////////////////////////    
    if(isset($_GET['type'])){
      if($_GET['type'] == 'electronics'){
        ?>
      <h5>Post Electronics Items</h5>
      <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $uidx; ?>">

      <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="Title of Your Post">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <script>
$(document).ready(function(){
$('#sElc').on('change', function(){
  if(this.value == 'Computer Laptop'){
    $('#computer').load('divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }
})
})

</script>
          <div id="typeC" class="input-group mb-3">
        <div  class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01"> Electronics Type: </label>
        </div>
        <select id="sElc" class="custom-select" name="type" id="inputGroupSelect01">
          <option selected>Choose...</option>
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

        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"> Status Of Item: </label>
    </div>
    <select class="custom-select" name="status" id="inputGroupSelect01">
      <option selected value="NEW">New</option>
      <option value="OLD">Old</option>
    </select>
    </div>



    <div id="computer"></div>

    <div class="form-group">
      <label for="exampleInputEmail1">Price : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="Price in Birr">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Address :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Your Address">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>




    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="Detailed Info"></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <input type="submit" onclick="x()" value="POST">
    <div id="alertVacancy"></div>
      </form>

        <?php
      }
    }

/////////////////////////////////////////////////////////////////
    if(isset($_GET['type'])){
      if($_GET['type'] == 'big' ){
        ?>
        <form  method="POST" enctype="multipart/form-data">

        <input hidden name="posterId" value="<?php echo $uidx; ?>">

        <div class="form-group">
          <label for="exampleInputEmail1">Charity Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Title">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"> Address  </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="location" placeholder="Title">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone no:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Title">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="Detailed Info"></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>


        <div class="row">
            <div id="registerBox">
            <label for="exampleInputEmail1">Upload Photos</label>
              <input type="file" class="form-control" id="photo" name="photo[]" multiple >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div id="alertVacancy"></div>
        <input type="submit"  value="POST">

        </form>
        
        <?php
      }
    
    }
///////////////////////////////////////
    if(isset($_GET['type'])){
      if($_GET['type'] == 'bigDiscount'){
        ?>
        <h5>Big Discount Post Advertisment</h5>
        <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $uidx; ?>">
        <input hidden name="big" value="ACTIVE">

        <div class="form-group">
          <label for="exampleInputEmail1">Title</Title></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<script>

$(document).ready(function(){
$('#tCategory').on('change', function(){
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('divTags.php #targetFor')
  }
 
})

$('#tCategory').on('change', function(){
  if(this.value == "OTHER"){
    $('#adTy').load('divTags.php #otherAd')
  }
 
})



})

</script>

        <div id="adTy"  class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type or Catagory</label>
          </div>
          <select id="tCategory" class="custom-select" name="type" id="inputGroupSelect01">
          <option selected>Choose...</option>
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

        <div id="targetLoader">

        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Price :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Offer Shipping</label>
        </div>
        <select class="custom-select" name="shipping" id="inputGroupSelect01">
          <option value="NO" selected>NO</option>
          <option value="YES">YES</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

    <!-- <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo 2</label>
          <input type="file" class="form-control" id="photo" 
           name="photo2" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Upload Profile Photo 3</label>
          <input type="file" class="form-control" id="photo" 
           name="photo3" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
        </div> -->

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
        </form>
        
        
        <?php
      }
      //////////////////////////////////////////////////////
    }if(isset($_GET['type'])){
      if($_GET['type'] == 'home'){
        ?>
        <h5>Home Tutor Job Application</h5>

        <form  method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $uidx; ?>">

        <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Educational Background:</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="eduBackground" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Range </label>
        </div>
        <select class="custom-select" name="clientRange" id="inputGroupSelect01">
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
          <option selected>Choose...</option>
          <option value="Horly">Hourly</option>
          <option value="Dayly">Dayly</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone </label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="address" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <h6>If you are representing  or if you are Agent, please fill the next form.</h6>
          <label for="exampleInputEmail1">Company Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="companyInfo" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Description About You</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        


        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
        </form>
        <?php
      }
      /////////////////////////////////////////////
    }if(isset($_GET['type'])){
      if($_GET['type'] == 'houseKeeper'){
        ?>
           <h5>House Keeper Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">
          <input hidden name="hotelOrHouse" value="HOUSE">
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Religion</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="religion" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file"  class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>
        <?php
        /////////////////////////////////////////////////////////////////////////
      }if(isset($_GET['type'])){
        if($_GET['type'] == 'hotel'){
          ?>
            <h5>House Keeper Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">
          <input hidden name="hotelOrHouse" value="HOTEL">
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Field </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="field" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file"  class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>

          <?php
        }
      }
    }

    /////////////////////////////////////////////
    if(isset($_GET['type'])){
      if($_GET['type'] == 'zebegna'){
        ?>
        

        <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">

          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="address" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Status</label>
        </div>
        <select class="custom-select" name="workStat" id="inputGroupSelect01">
          <option selected>Choose...</option>
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
          aria-describedby="emailHelp" name="phone" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file"  class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>
        
        
        
        <?php
      }
    }
?>


  </main><!-- End #main -->


</body>

</html>