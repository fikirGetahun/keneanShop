
<!-- <head> -->
<?php
include "includes/header.php";
include "includes/lang.php";
include "includes/secnav.php";
include "includes/navbar.php";
// include "header.php";
require_once "php/fetchApi.php";
require_once "php/adminCrude.php";

require_once "php/auth.php";

if(isset($_SESSION['userId'])){
?>
<style type="text/css">

input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
<?php 
$us = allPostListerOnColumen('user', 'id', $_SESSION['userId']);
$u = $us->fetch_assoc();
?>
<div class="container mt-3">
	<h5 class="text-primary text-start">User Profile</h5>
	<div class="row">
		<div class="col-md-3">
			<div class="card">

			<form action="profile.php?setting=true" method="POST" enctype="multipart/form-data" >
			<?php
              if(isset($_GET['del'])){
                $del = delUserPhoto($_SESSION['userId']);
                if($del){
                  header('Location: profile.php?setting=true');
                }else{
                  echo 'ERROR';
                }
              }
              
              if($u['photoPath1'] != 'FILE_NOT_UPLOADED'){
                ?>
			<img id="blah" src="<?php echo $u['photoPath1'] ?>" class="img-thumbnail rounded-circle mx-auto" alt="...">
              <a class="d-flex justify-content-center text-danger" href="./profile.php?setting=true&del=true"   title="Remove my profile image">Delete</i></a><br>
                <?php

              }else{
                ?>
				<img id="blah" src="./admin/assets/img/zumra.png" class="img-thumbnail rounded-circle mx-auto" alt="...">
		  <!-- <img id="blah" src="" class="img-thumbnail rounded-circle mx-auto" alt="..."> -->
		  <div class="card-body text-center mt-2">
		   <label for="file-upload" class="custom-file-upload text-dark">
                 <span><i class="bi bi-pencil-fill"></i></span>
            </label>
            <input id="file-upload" name="photou" type="file"  onchange="readURL(this);"/>
			<input type="submit" value="Change Photo">
              <?php
                if(isset($_FILES['photou']) && $_FILES['photou']['size'] != 0){
                  $fn = $_FILES['photou']['name'];
                  $tm = $_FILES['photou']['tmp_name'];
                  $cp = updateUserPhoto($fn, $tm, $_SESSION['userId']);
                  if($cp){
                    header('Location: profile.php?setting=true');
                  }else{   
                    echo 'ERROR';
                  }
                }
              
              ?>
		  </div>
                 <?php
              }
              ?>

		</div>
</form>
	</div>
		<div class="col-md-8">
			<div class="container bg-white">
				<h5 class="text-primary">Account Details </h5>
				<hr>
				<form action="profile.php"  method="POST" >
					<div class="row">
						
			  <div class="mb-3 col">
			    <label for="firstname" class="form-label">First Name</label>
			    <input type="text" class="form-control"
				name="firstName" id="firstname" aria-describedby="emailHelp"
				value="<?php echo $u['firstName'] ?>"
				>
			  </div>
			  <div class="mb-3 col">
			    <label for="lastname" class="form-label">Last Name</label>
			    <input type="text" class="form-control" 
				name="lastName"id="lastname" 
				value="<?php echo $u['lastName'] ?>"aria-describedby="emailHelp">
			  </div>
					</div>
					<div class="row">
						
			  <div class="mb-3 col">
			    <label for="email" class="form-label">Email</label>
			    <input type="email" class="form-control" id="email" name="username" aria-describedby="emailHelp" value="<?php echo $u['username'] ?>" >
			  </div>
			  <div class="mb-3 col">
			    <label for="lastname" class="form-label">City</label>
			    <select class="form-select" name="city" aria-label="Default select example">
				<option><?php echo $u['about'] ?></option>
				<?php 
						$locc= allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
						$city = array();
						while($rowLoc = $locc->fetch_assoc()){
							$city[]= $rowLoc['category'];
						}
						sort($city);
						$i = 0;
						foreach($city as $loc){
						if($loc == 'Addis Ababa'){
							?>
							<option ><?php echo $loc ?></option>
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
			  </div>
					</div>
					<div class="row">
			  <div class="mb-3 col">
			    <label for="passwordrecover" class="form-label">Phone Number</label>
			    <input type="text" class="form-control"
				name="phoneNumber"  id="passwordrecover"  value="<?php echo $u['phone'] ?>"aria-describedby="emailHelp">
			  </div>
			  <div class="mb-3 col">
			    <label for="passwordrecover" class="form-label">Password Recovery</label>
			    <input type="text" class="form-control" name="recover" id="passwordrecover" aria-describedby="emailHelp" value="<?php echo $u['recover'] ?>">
			  </div>
			</div>
			<?php
          if(isset($_GET['pass'])){
            ?>
			  <div class="mb-3">
			    <label for="password" class="form-label">Change Password</label>
			    <input type="password" required class="form-control" name="password" id="password" aria-describedby="emailHelp">
			  </div>

			  <a href="./profile.php?setting=true"><small class="text-Primary">Cancel Password Change</small></a><br>
			<?php
		  }
			?>
                <div class="btn-group">
                  <button type="submit" class="btn btn-warning">Update</button>
		<?php
		if(!isset($_GET['pass'])){
			?>
			<a href="./profile.php?setting=true&pass=true"><small class="text-Primary">Change Password</small></a>
			<?php
		}
		?>
                
                </div>

			</form>

			<?php

			        //// user data edit
			if(isset($_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'],
			$_POST['recover'], $_POST['city'], $_POST['username'])){
			// echo 'innnxxxxzz';
			$firstName =$_POST['firstName'] ;
			$lastName =$_POST['lastName'] ;
			$username =$_POST['username'] ;

			$loc = $_POST['city'];
			$authr ='USER';
			$job = ' ';
			$recover = $_POST['recover'];
			$phoneNumber= $_POST['phoneNumber'];
			// $about =$_POST['address'];
			$uid = $_SESSION['userId'];

			// $u = loginAuth($username);
			// $num = $u->num_rows;
			// $up = ' ';
			if(isset($_POST['password'])){
			$password =$_POST['password'] ;
			// $password = password_hash($password, PASSWORD_DEFAULT);
			$cp = password($password, $_SESSION['userId']);
			if($cp){
				echo 'password changed';
			}else{
				echo 'no';
			}
			}

			include "php/connect.php";

			$u = loginAuth($username);
			$num = $u->num_rows;
			$r = $u->fetch_assoc();
			$up = ' ';
			if($num >= 1 && $r['username'] != $username ){
				echo '<span class="text-danger" > Username alrady exist! please change</span>';
			}else{
			// $password = password_hash($password, PASSWORD_DEFAULT);
			$q = "UPDATE `user` SET `firstName`= '$firstName',
			`lastName`= '$lastName', `username` = '$username' ,`phone`= '$phoneNumber',`about`= '$loc', `recover` = '$recover'   WHERE `user`.`id` = '$uid'";

			$uu = $mysql->query($q);


			if($uu){
			echo '<span class="text-success" >Saved Changes</span>';
			}else{
			echo 'error';
			}
			}

			
			}
			?>
				
			</div>
		</div>
		
	</div>
	
</div>




<?php
}else{
    header('Location: login.php');
}
include "includes/footer.php";

?> 
<script type="text/javascript">
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>