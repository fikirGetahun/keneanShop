<?php

require_once "../php/adminCrude.php";
require_once "../php/auth.php";
require_once "../php/fetchApi.php";
include "../includes/lang.php";

ob_start();
if(!isset($_SESSION)){
  session_start();
}


////////////Register A uSER ///////////////////////
if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
$_POST['password'],$_POST['email'], $_POST['address'], $_POST['recover'])){

    $firstName =$_POST['firstName'] ;
    $lastName =$_POST['lastName'] ;
    $username =$_POST['email'] ;
    $password =$_POST['password'] ;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $authr ='USER';
    $job = ' ';
    $recover = $_POST['recover'];
    $phoneNumber= $_POST['phoneNumber'];
    $about =$_POST['address'];

    $u = loginAuth($username);
    $num = $u->num_rows;
    $up = ' ';
    if($num >= 1){
        echo 'Username alrady exist! please change';
    }







   //to add user data and photo upload if user adds photo since its optional
    elseif(isset($_FILES['photoq']) && $_FILES['photoq']['size'] != 0){
     $tempName = $_FILES['photoq']['tmp_name'];
     $fileName = $_FILES['photoq']['name'];
               //to upload photo
               $up = uploadPhoto($fileName, $tempName);
               $out = userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, $up, $about, $recover ); 

               if($out){
                   echo "Registerd Succesfully!";
               }else{
                   echo 'Register Unsuccesfull db ERROR1';
               }
   }else{
    //to add user data
    $out = userAdder($firstName, $lastName, $phoneNumber, $username, $password, $authr, ' ', $job, $about, $recover); 

    if($out){
        echo "Registerd Succesfully!";
    }else{
        echo 'Register Unsuccesfull db ERROR2';
    }
   }


}


// echo 'in the home';
//// sponsered payment handler api
if(isset($_POST['pkg'], $_POST['bankName'], $_POST['tid'], $_POST['pid'])){

  $pid = $_POST['pid'];
  $pkg = $_POST['pkg'];
  $bname = $_POST['bankName'];
  $tid = $_POST['tid'];

  $send = sponseredPay($pkg, $bname, $tid, $pid);
  if($send){
    echo 'Payment done';
  }else{
    echo 'error';
  }

}


//// SPONSERED BANK AND pkg fetching ajax api
if(isset())




/////// favourites page
  require_once "../php/fetchApi.php";

  if(isset($_GET['postId'], $_GET['uid'], $_GET['table'])){
    $pid = $_GET['postId'];
    $uid = $_SESSION['userId'];
    $table = $_GET['table'];
    $fav = favouritesAdder($pid, $uid, $table);
    if($fav){
      echo "Added to Fav";
    }else{
      echo "error";
    }

  }




/////////////user ban
if(isset($_POST['ban'], $_POST['id'])){
    $uid =$_POST['id'];
    if($_POST['ban'] == 'BAN'){
    $ban = userBan($uid);
    if($ban){
        echo 'USER BANNED!';
    }else{
        echo 'ERROR';
    }
    }elseif($_POST['ban'] == 'UNBAN'){
        $ban = unBanuser($uid);
        if($ban){
            echo 'USER UNBANNED!';
        }else{
            echo 'ERROR';
        }
    }
}

/// subcity lister based on city api calculator
if(isset($_POST['cityH'])){
  ?>

  <?php
  // echo 'what';
  $city = $_POST['cityH'];
   require_once '../php/fetchApi.php';
    $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', $city);
    $city = array();
    if($locc->num_rows != 0){
      ?>
                <select  class="form-select" aria-label="Default select example" name="subCity" >
          <option><?php echo $lang['subCity'] ?></option>
      <?php
    while($rowLoc = $locc->fetch_assoc()){
        $city[]= $rowLoc['category'];
    }
    sort($city);
    $i = 0;
    foreach($city as $loc){
      if($loc == 'Addis Ababa'){
        ?>
        <option selected ><?php echo $loc ?></option>
        <?php
      }else{
        ?>
         <option value="<?php echo $loc ?>" ><?php echo $loc ?></option>
        <?php
      }
      ?>
      
    
      
      <?php
      $i++;
    }
    ?>
    </select>
    <?php
  }else{
?>
<input hidden type="text" name="subCity" value="null">
<?php
  }
 }
  

 // page number changer
 if(isset($_POST['page'])){
   $_SESSION['page'] = $_POST['page'];
 }else{
   $_SESSION['page'] = 1;
 }

//// address selecter jiji style
if(isset($_POST['address'])){
    $add = $_POST['address'];
    $_SESSION['address'] = $add;
}


// message sending api
if(isset($_POST['tabel'], $_POST['reciver'], $_POST['postFocus'], $_POST['msg'])){
  $tb = $_POST['tabel'];
  $msg = $_POST['msg'];
  $reciver = $_POST['reciver'];
  $postFocus = $_POST['postFocus'];

  $send = msgSender($tb, $postFocus, $_SESSION['userId'], $reciver, $msg);
  if($send){
    echo 'msg sent';
  }else{
    echo 'error';
  }

}


//cv work seeker selector modal box

if(isset($_GET['cv'])){
  ?>
  <script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  })
</script>
<div id="contw" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['cvWork'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
             <div class="modal-body  justify-content-center">
  <script>
    function nav(nav){
$('#uploadDiv').load("user/postPage.php?type="+nav)
}
  </script>
            <button class="btn btn-light btn-sm" onclick="nav('homeTutor')"  > <?php echo $lang['homeTutor'] ?> </button> <br><br>
            <button class="btn btn-light btn-sm"onclick="nav('hotelWorker')" ><?php echo $lang['hotelWorker'] ?></button>  <br><br>
            <button class="btn btn-light btn-sm" onclick="nav('houseWorker')" ><?php echo $lang['houseKeeper'] ?></button> <br><br>
            <button class="btn btn-light btn-sm" onclick="nav('zebegna')" ><?php echo $lang['security'] ?></button>  <br>
            <br>
          
</div>
</div>
</div>
  <?php
}


// real estatae
if(isset($_GET['real'])){
  ?>
  <script src="assets/jquery.js"  ></script>

  <script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })
  


  })
</script>
  <div id="contw" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['cvWork'] ?></h5>
          <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
        </div>
               <div class="modal-body  justify-content-center">
    <script>
      function nav2(nav, real){
  $('#uploadDiv').load("user/postPage.php?type="+nav+"&real="+real)
  }
    </script>
              <button class="btn btn-light btn-sm" onclick="nav2('real', 'realEstate')"  > <?php echo $lang['realEstate'] ?> </button> 
              <br><br>
              <button class="btn btn-light btn-sm"onclick="nav2('real', 'bank')" ><?php echo $lang['bankStock'] ?></button>  <br><br>
              <button class="btn btn-light btn-sm" onclick="nav2('real', 'insurance')" ><?php echo $lang['Insurance'] ?></button> <br><br>
              <br>
            
  </div>
  </div>
  </div>
    <?php
}

?>