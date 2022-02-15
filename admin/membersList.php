<?php
  include "../includes/header.php";
  include "../includes/adminSide.php";
  require_once '../php/fetchApi.php';
?>
<?php
include "../includes/header.php";
  require_once "../php/adminCrude.php";

  $url = $_SERVER['REQUEST_URI'];
ob_start();
if(!isset($_SESSION)){
    session_start();
}
  $uid = $_SESSION['idz'];

?> 

<body>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard x</h1>
  <h4><?php echo $row2['firstName'].''.$row2['lastName']  ?></h4>  <br>
  <h6>AUTHERIZATION: <?php echo $row2['auth'] ?></h6>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div> 
<div id="postBox" class="container">
    <?php

    if(isset($_GET['list'])){
        $member = $get->allPostListerOnTable('membership');

        ?>
        <div class="row">
        <script>

        </script>
        <?php
        while( $row = $member->fetch_assoc()){
            ?>
            <div id="adVieww" class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="img-thumbnail" src="<?php $p = $admin->photoSplit($row['photoPath1']); echo $p[0] ;?>" alt="Card">      
              <div class="card-body">
                <p class="card-text"><?php echo $row['name'] ?></p>
                <!-- <p class="card-text"><?php echo $row['price'] ?> Birr</p> -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="#viewDiscription" onclick="adView(<?php echo $row['id'] ?>)"  ><button type="button"  class="btn btn-sm btn-outline-secondary">View</button></a>
                  </div>
                  <!-- <small class="text-muted">9 mins</small> -->
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
    
    ?>
</div>
      </div>
</main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
</body>

