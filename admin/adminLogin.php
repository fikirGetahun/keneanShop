<!DOCTYPE html>
<html lang="en">
<?php
    require_once('../includes/header.php');
    require_once('../php/auth.php');


    $login = '';
    if(isset($_POST['username'], $_POST['password'])){
        $us = $_POST['username'];
        $pa = $_POST['password'];
        $check = $auth->loginAuth($us, $pa);
        if($check->num_rows == 0){
            echo 'no';
            $login = 'NOT_USER';

        }else if($check->num_rows > 0){
            

            while($row = $check->fetch_assoc()){
                if($row['username'] == $us && $row['password'] == $pa){
                    $_SESSION['idz'] = $row['id'];
                    
                    header('Location: admin.php');
                }

            }

        }
        
    }

?>
  <script src="../assets/jquery.js" type="text/javascript"></script>
  <script>
      document.getElementById('status').innerHTML = notLoged
    $(document).ready(function(){
      $('#regButton').click(function(){
        $('#allBox').load('register.php')
      })
      var notLoged = '<?php echo $login ?>'
     
        

      $('form').on('submit', function(){
          $.ajax({
              url: 'adminLogin.php',
              type: 'post',
              data: $('form').serialize(),
              success: function(data){
                alert(data)
              }
          })
          return false;
      })
    })

  </script>
<title>Pages / Login - NiceAdmin Bootstrap Template</title>
<body>

  <main>
    <div class="container">
    <h1>ADMIN LOGIN</h1>
      <section id="allBox" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 " action="<?php $_SERVER['SCRIPT_NAME'] ?>" method="POST"  >

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div id="status"></div>
          
                  </form>

                </div>
              </div>
              <div id="regesterLoader"></div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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