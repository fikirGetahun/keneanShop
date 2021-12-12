<!DOCTYPE html>
<html lang="en">


<?php
require_once "../php/adminCrude.php";

if(isset($_GET['uid'])){
  $uidx = $_GET['uid'];
}

  if(isset(
    $_POST['companyName'], $_POST['jobType'], 
    $_POST['jobTitle'], $_POST['positionType'],
    $_POST['Deadline'], $_POST['reqNo'], $_POST['location'],
    $_POST['description'],$_POST['uid']
  )){
    $companyName = $_POST['companyName'];
    $jobType =$_POST['jobType'];
    $jobTitle=$_POST['jobTitle'];
    $positionType=$_POST['positionType'];
    $Deadline=$_POST['Deadline'];
    $reqNo=$_POST['reqNo'];
    $location=$_POST['location'];
    $info=$_POST['description']; 
    $id = $_POST['uid'];


    $ask = $admin->addVacancyPost($jobType, $positionType, $companyName, $jobTitle, $location, $Deadline, $id , $reqNo, $info  );

  }

  //tender post data handler block
  if(isset($_POST['tenderType'],
   $_POST['startDate'],
    $_POST['Deadline2'],
     $_POST['initialCost'],
     $_POST['location2'],
     $_POST['description2'],$_POST['uid']
     )
     ){

      $tenderType = $_POST['tenderType'];
      $startingDate = $_POST['startDate'];
      $deadLine=$_POST['Deadline2'];
      $location=$_POST['location2'];
      $initialCost=$_POST['initialCost'];
      $info = $_POST['description2'];
      $id2 = $_POST['uid'];

      $db = $admin->addTenderPost($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2   );

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
    $('#vacancyForm').on('submit', function(e){
      e.preventDefault()
      $.ajax({
        url: 'postPage.php',
        type: 'post',
        data: $('#vacancyForm').serialize(),
        success : function(){
          $('#alertVacancy').text('POST SUCCESSFULL!  ')
        }
      })
      return false;

    })

    $('#tenderForm').on('submit', function(e){
      e.preventDefault()
      $.ajax({
        url: 'postPage.php',
        type: 'post',
        data: $('#tenderForm').serialize(),
        success : function(){
          $('#alertVacancy').text('POST SUCCESSFULL!  ')
        }
      })
      return false;

    })
  })

</script>

<body>

  <!-- ======= Header ======= -->


  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

 
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
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type Of JOBS</label>
          </div>
          <select class="custom-select" name="jobType" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="Management & Business Administration">	Management & Business Administration </option>
            <option value="Engineering">	Engineering</option>
            <option value="Medical/Health">	Medical/Health</option>
            <option value="Marketing/Advertising">	Marketing/Advertising</option>
            <option value="Accounting">	Accounting</option>
            <option value="	Media/Design">	Media/Design</option>
            <option value="NGO">	NGO</option>
            <option value="Hotel Host">	Hotel Host</option>
            <option value="House Worker">	House Worker</option>
            <option value="Other">  Other</option>
          </select>
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
        <form id="tenderForm" action="postPage.php" method="POST" >
        <input hidden name="uid" value="<?php echo $uidx; ?>">
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

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
        </form>
        </div>
      
      </section>
                    
          
          <?php
        }
      }

    ?>



  </main><!-- End #main -->


</body>

</html>