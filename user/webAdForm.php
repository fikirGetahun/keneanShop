<?php
include "../includes/lang.php";

require_once "../php/adminCrude.php";
require_once "../php/auth.php";
?>
<style type="text/css">
  html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<?php


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    
    




<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <?php
  include "../php/connect.php";
  if(isset($_POST['cname'], $_POST['name'], $_POST['phone'], $_POST['web'], $_FILES['photo'], $_POST['position'] )){
      $cname = $_POST['cname'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $web = $_POST['web'];
      $fileVarx = $_FILES['photo'];
      $position = $_POST['position'];


        
    $up = uploadPhotos('webAd', $fileVarx);
    if($up[4] == 'error'){
        foreach($up as $val){
        echo $val;
        }
    }elseif($up[4] == 'work'){
        $uu = $_SESSION['userId'];
        $postDate = date('Y-m-d H:i:s');
        $q = "INSERT INTO `webAd`( `company`, `name`, `phone`, `website`, `photoPath1` , `posterId`, `status`, `position`, `postedDate`) VALUES ( '$cname','$name','$phone','$web','$up[0]', '$uu', 'PEND', '$position', '$postDate' )";

        $ask = $mysql->query($q);
    
        echo $mysql->error;


        if($ask){
        ?>
        <div class="alert alert-warning alert-dismissible fade show text-primary" role="alert">
            <strong>We Will Call You</strong> You are in the pending List now!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        }else{
        echo 'Error';
        }
    }


  }
      
  
  
  ?>

  <body class="text-center">
    
<main class="form-signin border">

    <form action="webAdForm.php" method="POST" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="exampleInputEmail1">Company Name:</Title></label>
            <input type="text" class="form-control" id="nameTitle" 
            aria-describedby="emailHelp" name="cname" placeholder=" Company Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Name:</Title></label>
            <input type="text" class="form-control" id="nameTitle" 
            aria-describedby="emailHelp" name="name" placeholder="  Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Phone:</Title></label>
            <input type="number" class="form-control" id="nameTitle" 
            aria-describedby="emailHelp" name="phone" placeholder="  Phone">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Website Link:</Title></label>
            <input type="text" class="form-control" id="nameTitle" 
            aria-describedby="emailHelp" name="web" placeholder="  Website Link">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Select where should your ad will be posted.:</Title></label>
        <select class="form-select" aria-label="Default select example" name="position" id="inputGroupSelect01">
           <option value="Home">Home</option>
          <option value="Post View">Post View</option>
          <option value="Description View">Description View</option>
        </select>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">You are allowed one ad photo only.</small>
        </div>

        <input type="submit" value="submit">
      </form>
        
        
        
  
 
    </div>
</main>
  </body>