<?php
    require_once "../php/adminCrude.php";

    if(isset($_POST['uid2'])){
        $uid2 = $_POST['uid2'];
    }

    $outt = $admin->userDataShower($uid2);
    $row5 = $outt->fetch_assoc();

    if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
    $_POST['password'], $_POST['jobt'], $_POST['about'], $_POST['uid'])){
        $firstName =$_POST['firstName'] ;
        $lastName =$_POST['lastName'] ;
        $phone =$_POST['phoneNumber'] ;
        $password =$_POST['password'] ;
        $job = $_POST['jobt'];
        $about =$_POST['about'];
        $uid2 = $_POST['uid'];

        $out = $admin->updateUserData($uid2, $password, $firstName, $lastName, $phone, $about, $job);
        if(isset($_FILES['photoq'])){
            $fname = $_FILES['photoq']['name'];
            $tmpName = $_FILES['photoq']['tmp_name'];
            $out3 = $admin->updateUserPhoto($fname, $tmpName, $uid2);
            $ask = $admin->updateUserData($uid2, $password, $firstName, $lastName, $phone, $about, $job);
        }
    }

?>
<div id="allin">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Icons / Bootstrap - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="admin/assets/img/favicon.png" rel="icon">
  <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="assets/jquery.js"></script>
  <script>
      $(document).ready(function(){
        $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'admin/editProfile.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(){
                $('#alert').text('Saved Changes SUCCESSFULL!  ')
            },
            processData: false,
        contentType: false
          })
          
          return false;

    })

    $('#cp').click(function(){
        $('#photoChange').load('admin/divTags.php #changeProfile')
    })

      })
  </script>
</head>
<body>
    <div class="container">
    <form id="registerBox1" action="editProfile.php" method="POST" enctype="multipart/form-data" >
        <input hidden id="uid" name="uid" value="<?php echo $uid2 ?>">
    <div id="registerBox2">
    <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" id="firstName" 
          aria-describedby="emailHelp" name="firstName" placeholder="First Name" value="<?php echo $row5['firstName'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" id="lastName" 
          aria-describedby="emailHelp" name="lastName" placeholder="Last Name" value="<?php echo $row5['lastName'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div id="registerBox">
    <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="phoneNumber" 
          aria-describedby="emailHelp" name="phoneNumber" placeholder="phoneNumber"  value="<?php echo $row5['phone'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

 


    <div id="registerBox">
    <label for="exampleInputEmail1">Change Password</label>
          <input type="text" class="form-control" id="password" 
          aria-describedby="emailHelp" name="password" placeholder="password" value="<?php echo $row5['password'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">

        
        
        <div id="registerBox">
    <label for="exampleInputEmail1">Job</label>
          <input type="text" class="form-control" id="lastName" 
          aria-describedby="emailHelp" name="jobt" placeholder="Job" value="<?php echo $row5['job'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


          <label for="exampleInputEmail1">About</label>
          <textarea type="text" class="form-control" id="location2" 
          aria-describedby="emailHelp" name="about" placeholder="About Your Self"> <?php echo $row5['about'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     
          <button id="cp" type="button" class="btn btn-light">Change Profile Photo</button>
        <div id="photoChange"></div>

    <div id="uploadStat"></div>


      <input class="btn btn-light" type="submit" value="Save Changes">
 
  </form>
  <div id="alert"></div>
    </div>
</body>