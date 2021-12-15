<?php
    require_once "../php/adminCrude.php";

?>
<div id="allin">
<!-- <head>
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

      function adEdit(uid){
        $('#allin').load('editPost.php?'+$.param({type: 'ad', pid: uid}))

      }
  </script>
</head> -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Album example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/album.css" rel="stylesheet">
  </head>
<body>
    <?php

    if(isset($_GET['type'])){
        if($_GET['type'] == 'vacancy'){
            $data = $admin->vacancyPostLister();
            while($row = $data->fetch_assoc()){
                ?>
                <h6>Vacancy Post</h6>


                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Position :<?php echo $row['positionTitle'] ?></h5>
                            <p class="card-text">Job Type :<?php echo $row['positionType'] ?></p>
                            <p class="card-text">Deadline :<?php echo $row['deadLine'] ?></p>
                            <p class="card-text">Requierd Position :<?php echo $row['positionNum'] ?></p>
                            <p class="card-text">Job Type :<?php echo $row['info'] ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="edit('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                        </div>
                    </div>
                </div>

                <?php
                
            }
        }elseif($_GET['type'] == 'tender'){
            $data = $admin->tenderPostCounter();
            while($row = $data->fetch_assoc()){
                ?>
                <h6>Tender Post</h6>
                <?php
                $date1 = date('Y/m/d');
                $date2 = $row['deadLine'];
                // Calculating the difference in timestamps
                $diff = strtotime($date2) - strtotime($date1);
            
                // 1 day = 24 hours
                // 24 * 60 * 60 = 86400 seconds
                $difff= abs(round($diff / 86400));
                
                if($difff < 3 ){
                    ?>
                    <div class="card mb-3" style="max-width: 540px; box-shadow:  10px 10px red; ">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo $row['info'] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                        </div>
                        <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="editTender('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                        </div>
                    </div>
                    </div>
                    <?php
                }else{

                
                  
                ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="./assets/img/zumra.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo $row['info'] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row['deadLine'] ?></small></p>
                        </div>
                        <a href="#vacancyPost"+'<?php echo $row['id']; ?>'" onclick="editTender('<?php echo $row['id']; ?>')" ><button class="btn btn-dark"  >Edit</button></a>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
    }elseif($_GET['type'] == 'ad'){
            $ad = $admin -> postAdShower();
            ?>
            <div class="row">
            <?php
            while($row = $ad->fetch_assoc()){
                ?>

                
                <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php echo $row['photoPath1'] ?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $row['title'] ?></p>
                  <p class="card-text"><?php echo $row['price'] ?> Birr</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" onclick="adEdit(<?php echo $row['id'] ?>)" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

                <?php
            }
            ?>
            </div>
            <?php
    }elseif($_GET['type'] == 'car'){
        $carOut = $admin->carPostLister();
        ?>
        <div class="row">
        <?php
        
        while($cars = $carOut->fetch_assoc()){
            ?>
            
                
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php echo $cars['photoPath1'] ?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['type'] ?></p>
                  <p class="card-text"><?php echo $cars['price'] ?> Birr</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    
        
        
        
    }elseif($_GET['type'] == 'house'){
        $hOut = $admin->houseOrLandPostLister();
        ?>
        <div class="row">
        <?php
        
        while($cars = $hOut->fetch_assoc()){
            ?>
            
                
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="img-thumbnail" src="<?php echo $cars['photoPath1'] ?>" alt="Card">
                <div class="card-body">
                  <p class="card-text"><?php echo $cars['title'] ?></p>
                  <p class="card-text"><?php echo $cars['info'] ?> Birr</p>
                  <h6><?php echo $cars['cost'] ?> Birr</h6>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
}
    


    
    
    ?>
    </div>
</body>