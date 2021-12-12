<?php
    require_once "../php/adminCrude.php";

?>
<div id="allin">
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
  <script src="../assets/jquery.js"></script>
  <script>
      function edit(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'editVacancy', pid: uid}))
      }

      function editTender(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'editTender', pid: uid}))
      }
  </script>
</head>
<body>
    <?php

    if(isset($_GET['type'])){
        if($_GET['type'] == 'vacancy'){
            $data = $admin->vacancyPostLister();
            while($row = $data->fetch_assoc()){
                ?>
                <h6>Vacancy Post</h6>
                <div class="bg-light col-2" style="border: 1px black solid; float: left; margin:15px; ">
                <label for="exampleInputEmail1"><?php echo $row['companyName'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['positionType'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['positionTitle'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['location'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['deadLine'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['positionNum'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['info'] ?></label><br>
                <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="edit('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                </div>
                <?php
                
            }
        }elseif($_GET['type'] == 'tender'){
            $data = $admin->tenderPostCounter();
            while($row = $data->fetch_assoc()){
                ?>
                <h6>Tender Post</h6>
                <div class="bg-light col-2" style="border: 1px black solid; float: left; margin:15px; ">
                <label for="exampleInputEmail1"><?php echo $row['tenderType'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['startingDate'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['deadLine'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['location'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['initialCost'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['postedDate'] ?></label><br>
                <label for="exampleInputEmail1"><?php echo $row['info'] ?></label><br>
                <button class="btn btn-dark" onclick="editTender('<?php echo $row['id']; ?>')" >Edit</button>
                </div>
                <?php
        }
    }
}
    


    
    
    ?>
    </div>
</body>