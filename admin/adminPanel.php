<?php
  include "../includes/header.php";
  include "../includes/adminSide.php";

  


?>




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
    <div class="row">
                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
<script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user', selecter: 'auth', arg: 'ADMIN'},
      success: function(data){
        $('#adminC').text(data)
      }
    })
    
  
</script>




                <div class="card-body">
                  <h5 class="card-title"><a href="./allUserView.php?admin=true"> Admins <span>| Today</a></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
         
                      <h6 id="adminC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><a href="./allUserView.php?user=true"> Normal Users <span>| Today</a></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user', selecter: 'auth', arg: 'USER' },
      success: function(data){
        $('#userC').text(data)
      }
    })
    
  
</script>
                      <h6 id="userC"></h6>
                     

                    </div>
                  </div>
                </div>



                <div class="card-body">
                  <h5 class="card-title"> <a href="./allUserView.php?editor=true"> Editors <span>| Today</a></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'user', selecter: 'auth', arg: 'EDITOR' },
      success: function(data){
        $('#editorC').text(data)
      }
    })
    
  
</script>
                      <h6 id="editorC"></h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

    
    

    <!-- tender counter -->
    <div class="col-xxl-4 col-md-6">



              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">All</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Tender Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'tender' },
      success: function(data){
        $('#tenderC').text(data)
      }
    })
    
  
</script>
                      <h6 id="tenderC"></h6>
                     

                    </div>
                  </div>
                </div>

                
                <div class="card-body">
                  <h5 class="card-title">Vacancy Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'vacancy'},
      success: function(data){
        $('#vaCC').text(data)
      }
    })
    
  
</script>
                      <h6 id="vaCC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Advertisment Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'ad'},
      success: function(data){
        $('#adC').text(data)
      }
    })
    
  
</script>
                      <h6 id="adC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Electronics Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'electronics'},
      success: function(data){
        $('#elccC').text(data)
      }
    })
    
  
</script>
                      <h6 id="elccC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">House Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'housesell', selecter: 'houseOrLand', arg: 'HOUSE'},
      success: function(data){
        $('#houseC').text(data)
      }
    })
    
  
</script>
                      <h6 id="houseC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Land Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'housesell', selecter: 'houseOrLand', arg: 'Land'},
      success: function(data){
        $('#landC').text(data)
      }
    })
    
  
</script>
                      <h6 id="landC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cars Posts <span>| All</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'car'},
      success: function(data){
        $('#carC').text(data)
      }
    })
    
  
</script>
                      <h6 id="carC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Home Tutor</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'jobhometutor'},
      success: function(data){
        $('#hometutorC').text(data)
      }
    })
    
  
</script>
                      <h6 id="hometutorC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Hotel Worker</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'hotelhouse', selecter: 'hotelOrHouse', arg: 'HOTEL'},
      success: function(data){
        $('#hotelcC').text(data)
      }
    })
    
  
</script>
                      <h6 id="hotelcC" ></h6>
                     

                    </div>
                  </div>
                </div>


                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Home Worker</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'hotelhouse', selecter: 'hotelOrHouse', arg: 'HOUSE'},
      success: function(data){
        $('#houseWC').text(data)
      }
    })
    
  
</script>
                      <h6 id="houseWC" ></h6>
                     

                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Cv Work Seekers Posts <span>| Security Gaurd</span></h5>

                  <div class="d-flex align-items-center">
                  <div class="ps-3">
                  <script>

    $.ajax({
      url: 'editHandler.php',
      type: 'POST',
      data: {count: 'true', table: 'zebegna'},
      success: function(data){
        $('#zebegnaC').text(data)
      }
    })
    
  
</script>
                      <h6 id="zebegnaC" ></h6>
                     

                    </div>
                  </div>
                </div>

              </div>




            </div><!-- End Revenue Card -->
    </div>
    </div>

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
