<html>
    <!-- <script src="assets/jquery.js"></script>   -->
  
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">  </script>


   <?php
   require_once "../php/adminCrude.php";
include "../includes/header.php";

   if(isset($_GET['pid'])){ //pid is post id to be edited
    $uidx = $_GET['pid'];
  }

   ?>
<script>
  $(document).ready(function(){
  /// this will triger the address list for selecting address for all of the forms
  $('#z').hide()
  $('#ADD').click(function(){
    $('#z').show()
  $('#z').load('user/divTags.php #jiji')
})
  })


</script>
<script>
  // this function sends the selected address to api. that api sets the address to a session then the session will be
  // the input to the database
  function handler(address){
    $('#jiji').hide();
    $('#z').hide()
    $('#dbad').val(address); 
    $('#ADD').text(address);
  }

  function typeHandler(data, apiId, showId, hideId){
    $('#z').hide()
    $('#'+hideId).hide()
    $('#'+apiId).val(data)
    $('#'+showId).text(data)
    if(data == "Cloth and Shoe"){
    $('#targetLoader').load('admin/divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }

  if(data == 'Computer and Laptop'){
    $('#computer').load('admin/divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }else{
    $('#computer').empty()
  }
  }

  // function to load the categoty of post based on the needed div tag from divTags.php provided by onclick event
  function typeLoader(divId){
    $('#z').show()
    $('#z').load('user/divTags.php #'+divId)
  }


</script>
    <script>

  $(document).ready(function(){
  /// this will triger the address list for selecting address for all of the forms
  $('#ADD').click(function(){
  $('#z').load('user/divTags.php #jiji')
})




    // $('#editV').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'admin/editHandler.php',
    //     type: 'post',
    //     data: $('#editV').serialize(),
    //     success : function(){
    //       $('#alertVacancy').text('Edit SUCCESSFULL!  ')
    //     }
    //   })
    //   return false;

    // })

    // $('#editT').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'admin/editHandler.php',
    //     type: 'post',
    //     data: $('#editT').serialize(),
    //     success : function(){
    //       $('#alertVacancy').text('Edit SUCCESSFULL!  ')
    //     }
    //   })
    //   return false;

    // })


    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'admin/editHandler.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              // $('#alertVacancy').delay(3200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          
          return false;

    })

    



  })
  



</script>
    <?php
require_once "../php/adminCrude.php";





?>


    <main id="main" class="main">
    <!-- <div id="contw" class="modal-dialog"> -->
    <!-- <div class="modal-content"> -->
 <!-- /// to select address like jiji style -->
<div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%; z-index:3; " ></div>
<?php
/////////////////////////////////////////////////////////////
  // if post vacancy is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == "vacancy"){
    ?>
 
  <section class="section">
      <div class="pagetitle">
      <h1>Edit Vacancy Post</h1>



    <div id="vacancyBox" class="container">
    <form id="editV" action="editPost.php"  method="POST" >
      <input hidden name="pid" value="<?php echo $uidx; ?>">
    <div class="form-group">
      <label for="exampleInputEmail1">Company Name</label>
      <input type="text" class="form-control" id="companyName" 
      aria-describedby="emailHelp" name="companyName" placeholder="" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['companyName']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Type Of JOBS</label>
      </div>

      <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jobT').load('divTags.php #jobType')
                }
                
              })
            })

          </script>

<div  class="input-group mb-3" >
        <select  class="custom-select" name="jobType" id="">
          <option><?php echo $row['type'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $admin->allCategoryLister('vacancy');
                $city = array();
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
        </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Job Title</label>
      <input type="text" class="form-control" id="jobTitle" 
      aria-describedby="emailHelp" name="jobTitle" placeholder="Company Name" 
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['title']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Position Type</label>
    </div>
    <select class="custom-select" name="positionType" id="inputGroupSelect01">
      <option selected>"<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['type']; 
      ?>"</option>
      <option value="1">Full Time</option>
      <option value="2">Part Time</option>
      <option value="3">Temporary</option>
      <option value="3">Contractual </option>
    </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option value=" ">Gender</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
          <option value="Both">Both</option>
        </select>
        </div>


    <div class="form-group">
          <label for="exampleInputEmail1">Application Start Date:</label>
          <input type="date" class="form-control" id="Deadline" 
          aria-describedby="emailHelp" name="appStart" placeholder="Company Name" value="<?php echo $row['type'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Deadline</label>
      <input type="date" class="form-control" id="Deadline" 
      aria-describedby="emailHelp" name="Deadline" placeholder="Company Name"
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['deadLine']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Requierd Position No</label>
      <input type="number" class="form-control" id="jobTitle" 
      aria-describedby="emailHelp" name="reqNo" placeholder="Company Name"
      value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['positionNum']; 
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="phone number"
          value="<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['phone']; 
      ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div  class="input-group mb-3" >
        <select  class="custom-select" name="location" id="">
          <option><?php echo $row['address'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Salary: </label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="salary" placeholder="phone number" value="<?php echo $row['salary'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="salaryStatus" id="inputGroupSelect01">
        <option value=" "><?php echo $row['salaryStatus'] ?></option>
          <option value=" ">Salary Type</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des" 
      aria-describedby="emailHelp" name="description" placeholder="location" 
      value= "<?php 
                $p = $admin->editVacancyPost($uidx);
                $row = $p->fetch_assoc();
                echo $row['info']; 
      ?>"
      
      ></textarea>
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
  //////////////////////////////////////////////////////////////////////////
  //if post tender is selected it loads this if block
  if(isset($_GET['type'])){
    if($_GET['type'] == 'tender'){
      ?>
         <div class="pagetitle">
  <h1>Edit Tender Post</h1>

    <p>
    Here you have to fill the requiered fields inorder to post the Tender.
    </p>

    <div id="vacancyBox" class="container">
    <form id="editT" action="editPost.php" method="POST" >
    <input hidden name="uid" value="<?php echo $uidx; ?>">
    <div class="form-group">

    <div class="form-group">
          <label for="exampleInputEmail1">Tender Title</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name"
          value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['title']
      
      ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

      <label for="exampleInputEmail1">Tender Type</label>
      <input type="text" class="form-control" id="tenderType" 
      aria-describedby="emailHelp" name="tenderType" placeholder="Company Name"
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['type']
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Starting date</label>
      <input type="date" class="form-control" id="startingDate" 
      aria-describedby="emailHelp" name="startDate" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['startingDate'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Deadline</label>
      <input type="date" class="form-control" id="Deadline2" 
      aria-describedby="emailHelp" name="Deadline2" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['deadLine'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Initial Cost</label>
      <input type="number" class="form-control" id="phoneNo" 
      aria-describedby="emailHelp" name="initialCost" placeholder="Company Name" 
      value="<?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['initialCost'];
      
      ?>"
      >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  
    <div  class="input-group mb-3" >
        <select  class="custom-select" name="location" id="">
          <option><?php echo $row['address'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>



    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="description2" placeholder="Describition" 
      value=""
      ><?php
        $out = $admin->tenderEditLister($uidx);
        $row = $out->fetch_assoc();
        echo $row['info']
      
      ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <input type="submit" onclick="x()" value="Save Changes">
    <div id="alertVacancy"></div>
    </form>
    
    <script>
// photo updater and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "tender", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($row['photoPath1']);
if(!empty($row['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="tender">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>


    </div>
  
  </section>
                
      
      <?php
    }
    
    //////////////////////////////////////////////////////
    elseif($_GET['type'] == 'ad'){
      $adEdit = $admin->adEditDataLister($uidx);
      while($adRow = $adEdit->fetch_assoc()){
        ?>
<script>
  $(document).ready(function(){
$('#selchange').on('change', function(){
  // alert('change')
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('admin/divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }
 
})

// $('#tCategory').on('change', function(){
//   if(this.value == "OTHER"){
//     $('#adTy').load('admin/divTags.php #otherAd')
//   }
 
// })



})
</script>
    <form id="car" action="editPost.php" method="POST"   enctype="multipart/form-data">
        <input hidden name="pid" value="<?php  echo $uidx ?>"
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name" 
          value="<?php echo $adRow['title'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div  class="input-group mb-3" >
        <select  class="custom-select" name="type" id="selchange">
          <option selected ><?php echo $adRow['type'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $admin->allCategoryLister('ad');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){

                    ?>
                     <option value="<?php echo $loc ?>" ><?php echo $loc ?></option>
                    <?php
                  
      
                  $i++;
                }
              ?> 
        </select>
        </div>



        <?php
        if($adRow['for'] != " "){
?>

<div id="targetLoader" class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Target For: </label>
        </div>
        <select class="custom-select" name="for" id="inputGroupSelect01">
          <option selected><?php echo $adRow['for'] ?></option>
          <option value="women">Women</option>
          <option value="men">Men</option>
          <option value="both">Both</option>
        </select>
    </div>
<?php
        }
        
        ?>




        <div class="form-group">
          <label for="exampleInputEmail1">Price :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Company Name" 
          value="<?php echo $adRow['price'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>




        <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $adRow['address'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="09..."
          value="<?php echo $adRow['phone'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="shipping" id="inputGroupSelect01">
          <option><?php echo $adRow['shipping'] ?></option>
          <option value="NO">NO</option>
          <option value="YES">YES</option>

        </select>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"><?php echo $adRow['info'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <input type="submit"  value="Save Changes">
                      <div id="alertVacancy"></div>
        </form>

        <script>
// photo updatedr and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "ad", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($adRow['photoPath1']);
if(!empty($adRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="ad">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>

        
        <?php

        ?>

        <?php
      }
      
      ?>


      <?php
    }
    ////////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'car'){
      $carE = $admin->carPostDataLister($uidx);
      $carRow = $carE->fetch_assoc();
      ?>

        <form id="car" action="editPost.php" method="POST" enctype="multipart/form-data" >
          <input hidden name="pid" value="<?php echo $uidx; ?>">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name" 
              value="<?php echo $carRow['title'] ?>"
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

<script>
  $(document).ready(function(){
    // $('#sCar').on('change', function(){
    //   if(this.value == "other"){
    //     $('#typeC').load("divTags.php #typeCar")
    //   }

    // })

$('#forRentOrSell').on('change', function(){
    if(this.value == 'For Rent'){
      $('#cfr').load("divTags.php #carFR");

    }else{
      $('#cfr').hide()

    }
  
})
  })
</script>

        <div class="input-group mb-3">
            <div class="form-select" id="carShow" onclick="typeLoader('carType')" ><?php echo $carRow['type'] ?></div>      
            <input id="carApi" name="type2" hidden value=" ">   
        </div>

        <div  class="input-group mb-3" >
        <select  class="custom-select" name="type2" id="s">
          <option><?php echo $carRow['type'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc=   $admin->allCategoryLister('car');
                $city = array();
                while($rowLoc = $locc->fetch_assoc()){
                    $city[]= $rowLoc['category'];
                }
                sort($city);
                $i = 0;
                foreach($city as $loc){

                    ?>
                     <option value="<?php echo $loc ?>" ><?php echo $loc ?></option>
                    <?php
                  
                  
                  
                  $i++;
                }
              ?> 
        </select>
        </div>



          <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="s">
          <option><?php echo $carRow['address'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option selected value="<?php echo $carRow['ownerBroker'] ?>"><?php echo $carRow['ownerBroker'] ?></option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Status Of Car: </label>
        </div>
        <select class="custom-select" name="status2" id="inputGroupSelect01">
          <option selected><?php echo $carRow['status'] ?></option>
          <option value="NEW">New</option>
          <option value="OLD">Old</option>
        </select>
        </div>

        

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="forRentOrSell">
          <option selected><?php echo $carRow['forRentOrSell'] ?></option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

        <?php
        if($carRow['forRentOrSell'] == 'For Rent'){
            ?>
          <div id="cfr">
          <div  class="input-group mb-3" >
        <select  class="custom-select" name="rentStatus" id="rentS">
        <option selected><?php echo $carRow['rentStatus'] ?></option>
          <option value=" " >Rent Status</option>
          <option value="With Driver">With Driver</option>
          <option value="Car Only">Car Only</option>
        </select>
        </div>

        
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="forWho" id="forWho">
        <option selected><?php echo $carRow['forWho'] ?></option>
          <option value=" " >Rent For ?</option>
          <option value="All">All</option>
          <option value="Private">Private</option>
          <option value="Govormental Offices">Govormental Offices</option>
          <option value="Private Company">Private Company</option>
          <option value="NGO">NGO</option>
        </select>
        </div>

        
        <div class="form-group" id="whyRent">
          <label for="exampleInputEmail1">Where Do you Want to Rent ?</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="whyRent" placeholder="Description"><?php echo $carRow['whyRent'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">Describe where you want to rent this car.</small>
        </div>
          </div>
            <?php
        }
        ?>




        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fule Kind: </label>
        </div>
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected><?php echo $carRow['fuleKind'] ?></option>
          <option value="Benzene">Benzene</option>
          <option value="Diesel">Diesel</option>
        </select>
        </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Transmission Type: </label>
        </div>
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
        <option selected value="<?php echo $carRow['transmission'] ?>"><?php echo $carRow['transmission'] ?></option>
          <option value="automatic">Automatic</option>
          <option value="manual">Manual</option>
        </select>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Body Status :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bodyStatus" placeholder="Company Name"
              value="<?php echo $carRow['bodyStatus'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Km Range :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="Company Name"
              value="<?php echo $carRow['km'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $carRow['fixidOrN'] ?></option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price : </label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="Company Name" 
          value="<?php echo $carRow['price'] ?>"
          >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="location"> <?php echo $carRow['info'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" onclick="x()" value="Save Changes">
        <div id="alertVacancy"></div>

        <script>
//photo updater and deleter
function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "car", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($carRow['photoPath1']);
if(!empty($carRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="car">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>

 <?php
}
?>




          </form>
      <?php
    }
    //////////////////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'housex'){
      $houseOut = $admin->singleHousePostLister($uidx);
      $houseRow = $houseOut->fetch_assoc();
      ?>
      

      <script>
      $(document).ready(function(){

        // $('#city').on('change',function(){
        //   if(this.value == "otherCity"){
        //   $('#cityBox').load('divTags.php #otherCity')
 
        // }
   
        // })

        // $('#subCity').on('change',function(){
        // if(this.value == "otherSubCity"){
        //  $('#subCityBox').load('divTags.php #otherSubCity')
        // }
      
        // })

        $('#HorL').on('change', function(){
          if(this.value == "HOUSE"){
          $('#houseTypeLoader').load("divTags.php #houseType")
          $('#bedOrBath').load('divTags.php #bedBath')
        }
        })
        })
      </script>

<form id="house" action="editPost.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="pid" value="<?php echo $uidx; ?>">
             <input hidden name="houseOrLand" value="HOUSE">

        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name" 
              value="<?php echo $houseRow['title'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

        
<div id="houseTypeLoader">


        <div id="houseType" class="input-group mb-3">
  
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Type : </label>
  </div>
  <select class="custom-select" name="type" id="selHouseType">
    <option selected><?php echo $houseRow['type'] ?> </option>
<?php
require_once "../php/adminCrude.php";
$tab = $_GET['cat'];
$categorySort = array();
$category = $admin->allCategoryLister('housesell');
while($rowc = $category->fetch_assoc()){
$categorySort[] = $rowc['category'];
}
sort($categorySort);
foreach($categorySort as $sorted){
echo $tab;
?>
<option value="<?php echo $sorted ?>"><?php echo $sorted ?></option>

<?php




}

?>
  </select>
</div>
</div>




            
<div  class="input-group mb-3" >
        <select  class="custom-select" name="city" id="">
          <option><?php echo $houseRow['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

 
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="subCity" id="">
          <option><?php echo $houseRow['subCity'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'SUBCITY');
                $city = array();
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
        </div>
        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name"
              value="<?php echo $houseRow['wereda'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option selected value="<?php echo $houseRow['ownerBroker'] ?> " ><?php echo $houseRow['ownerBroker'] ?> </option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['forRentOrSell'] ?> </option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name" 
              value="<?php echo $houseRow['area'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">

              
              <div id="bedBath">
<div class="form-group">
              <label for="exampleInputEmail1">Number Of BedRoom :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bedRoomNo" placeholder="Company Name" 
              value="<?php echo $houseRow['bedRoomNo'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bath Of BedRoom :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bathRoomNo" placeholder="Company Name"
              value="<?php echo $houseRow['bathRoomNo'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>
              

            </div>




            <div class="form-group">
              <label for="exampleInputEmail1">Price :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name"
              value="<?php echo $houseRow['cost'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['fixedOrN'] ?> </option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"><?php echo $houseRow['info'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" value="Save Changes">
        <div id="alertVacancy"></div>

         <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "housesell", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($houseRow['photoPath1']);
           if(!empty($houseRow['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="housesell">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>


             </form>


      <?php
    }

    //////////////////////////////// 
    elseif($_GET['type'] == 'land'){
      $houseOut = $admin->singleHousePostLister($uidx);
      $houseRow = $houseOut->fetch_assoc();
      ?>
      

      <script>
      $(document).ready(function(){

        $('#city').on('change',function(){
          if(this.value == "otherCity"){
          $('#cityBox').load('divTags.php #otherCity')
 
        }
   
        })

        $('#subCity').on('change',function(){
        if(this.value == "otherSubCity"){
         $('#subCityBox').load('divTags.php #otherSubCity')
        }
      
        })

        $('#HorL').on('change', function(){
          if(this.value == "HOUSE"){
          $('#houseTypeLoader').load("divTags.php #houseType")
          $('#bedOrBath').load('divTags.php #bedBath')
        }
        })
        })
      </script>

<form id="house" action="editPost.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="pid" value="<?php echo $uidx; ?>">
             <input hidden name="houseOrLand" value="LAND">



        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name" 
              value="<?php echo $houseRow['title'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

        



            <div class="input-group mb-3">
                <div class="form-select" id="ADD" ><?php echo $houseRow['city'] ?></div>      
                <input id="dbad" name="city" hidden value="<?php echo $houseRow['city'] ?>">   
            </div>
        <div class="input-group mb-3">
            <div class="form-select" id="jijiShow" onclick="typeLoader('jijiSub')" ><?php echo $houseRow['subCity'] ?></div>      
            <input id="jijiApi"  name="subCity" hidden value="<?php echo $houseRow['subCity'] ?> ">   

        </div>
        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name"
              value="<?php echo $houseRow['wereda'] ?> "
              >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option selected value="<?php echo $houseRow['ownerBroker'] ?> " ><?php echo $houseRow['ownerBroker'] ?> </option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['forRentOrSell'] ?> </option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name" 
              value="<?php echo $houseRow['area'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">

            </div>




            <div class="form-group">
              <label for="exampleInputEmail1">Price :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name"
              value="<?php echo $houseRow['cost'] ?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $houseRow['fixedOrN'] ?> </option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"><?php echo $houseRow['info'] ?> </textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" value="Save Changes">
        <div id="alertVacancy"></div>

         <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "housesell", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($houseRow['photoPath1']);
           if(!empty($houseRow['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="housesell">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>


             </form>


      <?php
    }


    //////////////////////////////////////////////////////////
    elseif($_GET['type'] == 'electronics'){
      $elcEdit = $admin->elecSinglePostViewer($uidx);
      $elecRow = $elcEdit->fetch_assoc();

      ?>
        <script>
$(document).ready(function(){
$('#sElc').on('change', function(){
  if(this.value == 'Computer and Laptop'){
    $('#computer').load('admin/divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }else{
    $('#computer').empty()
  }
})
})

</script>
      <h5>Edit Electronics Items</h5>
      <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $uidx; ?>">

      <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="Title of Your Post" 
          value="<?php echo $elecRow['title'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
 
        
<div  class="input-group mb-3" >
        <select  class="custom-select" name="type" id="sElc">
          <option><?php echo $elecRow['type'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumen('adCategory', 'tableName', 'electronics');
                $city = array();
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
        </div>


<div id="computer">
        <?php 
          if($elecRow['ram'] != " " &&
          $elecRow['processor'] != " " &&
          $elecRow['core'] != " " &&
          $elecRow['storage'] != " " &&
          $elecRow['size'] != " " ){

            ?>
            
      <div id="sizeInch" class="form-group">
          <label for="exampleInputEmail1">Size In Inch:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="size" placeholder="Size of Item" 
          value="<?php echo $elecRow['size'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

              <div id="ram" class="form-group">
          <label for="exampleInputEmail1">Ram:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="ram" placeholder="Size of Item" 
          value="<?php echo $elecRow['ram'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="proc" class="form-group">
          <label for="exampleInputEmail1">Processor Type:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="processor" placeholder="Processor Type" 
          value="<?php echo $elecRow['processor'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="storage" class="form-group">
          <label for="exampleInputEmail1">Storage Size:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="storage" placeholder="Storage Size"
          value="<?php echo $elecRow['storage'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div id="core" class="form-group">
          <label for="exampleInputEmail1">Core Count:</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="core" placeholder="Core count"
          value="<?php echo $elecRow['core'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
            <?php

          }
        
        ?>
</div>
        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"> Status Of Item: </label>
    </div>
    <select class="custom-select" name="status" id="inputGroupSelect01">
      <option selected value="<?php echo $elecRow['status'] ?>"><?php echo $elecRow['status'] ?></option>
      <option value="NEW">New</option>
      <option value="OLD">Old</option>
    </select>
    </div>



    <div id="computer"></div>

    <div class="form-group">
      <label for="exampleInputEmail1">Price : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="Price in Birr" 
      value="<?php echo $elecRow['price'] ?>">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

 
    <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $elecRow['address'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="Detailed Info"><?php echo $elecRow['info'] ?></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

        <input type="submit" onclick="x()" value="Save Changes">
    <div id="alertVacancy"></div>

        <script>

function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "electronics", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($elecRow['photoPath1']);
if(!empty($elecRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="electronics">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>




      </form>
      
      <?php
    }
  }
  /////////////////////////////////////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'charity'){
      $out = $admin->aSinglePostView($uidx, 'charity');
      $cRow = $out->fetch_assoc();

      ?>
<form  method="POST" enctype="multipart/form-data">

<input hidden name="posterId" value="<?php echo $uidx; ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Charity Title</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="title" placeholder="Title"
  value="<?php echo $cRow['title'] ?>">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="input-group mb-3">
                <div class="form-select" id="ADD" ><?php echo $cRow['address']; ?></div>      
                <input id="dbad" name="address" hidden value="<?php echo $cRow['address']; ?>">   
    </div>


    <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $cRow['address']; ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone no:</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="phone" value="<?php echo $cRow['phone'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Describtion</label>
<textarea type="text" class="form-control" id="des2" 
aria-describedby="emailHelp" name="info" placeholder="Detailed Info"><?php echo $cRow['info'] ?></textarea>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div id="alertVacancy"></div>
<input type="submit"  value="Save Changes">

<script>

function pUpdate(divz, photo){
 $('#'+divz).empty()
 $.post('admin/editHandler.php', {photoPath: photo, tableName: "charity", pid: "<?php echo $uidx ?>"}, 
   function(returnedData){
     $('#'+divz).append(returnedData)        
 })
}

</script>
<?php
$i = 0;
$pp = $admin->photoSplit($cRow['photoPath1']);
if(!empty($cRow['photoPath1'])){
foreach($pp as $photo){
  ?>
       <div id="<?php echo $i ?>">
       <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
       <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
       </div>
  <?php
  $i ++;
}
}else{
 ?>
       <form method="POST" enctype="multipart/form-data" >
       <input hidden name="pid" value="<?php echo $uidx; ?>">
       <input hidden name="tName" value="charity">
       <div class="row">
       <div id="registerBox">
       <label for="exampleInputEmail1">Upload Photo  </label>
       <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
       </div>
       </div>

       <input type="submit" value="Change Photo">
       </form>
 
 <?php
}
?>





</form>

      <?php
    }
  }

  ///////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'jobhometutor'){

      $out = $admin->aSinglePostView($uidx, 'jobhometutor');
      $row = $out->fetch_assoc();

      ?>
      
      <h5>Home Tutor Job Application</h5>

<form  method="POST" enctype="multipart/form-data">
<input hidden name="posterId" value="<?php echo $uidx; ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Full Name</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="name" placeholder="Full Name"  value="<?php echo $row['Name'] ?>">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Gender</label>
</div>
<select class="custom-select" name="sex" id="inputGroupSelect01">
  <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
  <option value="Male">Mele</option>
  <option value="Female">Female</option>
</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Educational Background:</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="eduBackground" placeholder="location"> <?php echo $row['eduBackground'] ?> </textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Range </label>
</div>
<select class="custom-select" name="clientRange" id="inputGroupSelect01">
  <option value="<?php echo $row['clientRange'] ?>" ><?php echo $row['clientRange'] ?></option>
  <option value="1-8">1-8 Grade</option>
  <option value="9-12">9-10</option>
  <option value="9-10">9-10</option>
  <option value="10-11">10-11</option>
  <option value="11-12">11-12</option>

</select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Payment Status</label>
</div>
<select class="custom-select" name="paymentStatus" id="inputGroupSelect01">
  <option selected value="<?php echo $row['paymentStatus'] ?>" ><?php echo $row['paymentStatus'] ?></option>
  <option value="Horly">Hourly</option>
  <option value="Dayly">Dayly</option>
  <option value="Monthly">Monthly</option>

</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Price:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone </label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="Full Name" value="<?php echo $row['phone'] ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

 

    <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $row['address']; ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>
<div class="form-group">
  <h6>If you are representing  or if you are Agent, please fill the next form.</h6>
  <label for="exampleInputEmail1">Company Info</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="companyInfo" placeholder="location"><?php echo $row['companyInfo'] ?></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Description About You</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="info" placeholder="info"><?php echo $row['info'] ?></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>



<input type="submit" onclick="x()" value="POST">
<div id="alertVacancy"></div>




<script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "jobhometutor", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="jobhometutor">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>
</form>


      <?php
    }
  }
  //////////////////////////////////////////
  if(isset($_GET['type'])){
    if($_GET['type'] == 'hotel'){
      $outp = $admin->aSinglePostView($uidx, 'hotelhouse');
      $row = $outp->fetch_assoc();
      ?>
               <h5>Hotel Worker Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <!-- <input hidden name="hotelOrHouse" value="HOTEL"> -->
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Field </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="field" placeholder="Full Name" value="<?php echo $row['field'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $row['address']; ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workType'] ?>" ><?php echo $row['workType'] ?></option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"><?php echo $row['experience'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"> <?php echo $row['currentAddress'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"> <?php echo $row['agentInfo'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>
        <p>Answer</p>
        <h5><?php echo $row['bidingPerson'] ?></h5>

        <h5>Change Answer</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>

        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "hotelhouse", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="hotelhouse">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>


             </form>


          



      
      <?php
    }
  }
///////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'houseKeeper'){
    $out = $admin->aSinglePostView($uidx, 'hotelhouse');
    $row = $out->fetch_assoc();

    ?>
    
    
    <h5>House Keeper Job Application</h5>
    <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <!-- <input hidden name="hotelOrHouse" value="HOTEL"> -->
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Religion</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="religion" placeholder="Full Name" value="<?php echo $row['religion'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $row['address']; ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= $get->allPostListerOnColumenORDER('adcategory', 'tableName', 'CITY');
                $city = array();
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
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Type</label>
        </div>
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workType'] ?>" ><?php echo $row['workType'] ?></option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name" value="<?php echo $row['price'] ?>" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"><?php echo $row['experience'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"> <?php echo $row['currentAddress'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"> <?php echo $row['agentInfo'] ?></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>
        <p>Answer</p>
        <h5><?php echo $row['bidingPerson'] ?></h5>

        <h5>Change Answer</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          </form>

        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "hotelhouse", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="hotelhouse">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>

<div id="alertVacancy"></div>

             </form>
    <?php
  }
}
////////////////////////////////////////////////
if(isset($_GET['type'])){
  if($_GET['type'] == 'zebegna'){

    $out = $admin->aSinglePostView($uidx, 'zebegna');
    $row = $out->fetch_assoc();
    ?>
    
    <form  method="POST" enctype="multipart/form-data">
          <input hidden name="postId" value="<?php echo $uidx; ?>">
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name" value="<?php echo $row['name'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected value="<?php echo $row['sex'] ?>" ><?php echo $row['sex'] ?></option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name" value="<?php echo $row['age'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
                <div class="form-select" id="ADD" ><?php echo $row['address'] ?></div>      
                <input id="dbad" name="address" hidden value="<?php echo $row['address'] ?>">   
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Work Status</label>
        </div>
        <select class="custom-select" name="workStat" id="inputGroupSelect01">
          <option selected value="<?php echo $row['workStat'] ?>" ><?php echo $row['workStat'] ?></option>
          <option value="Company">Company</option>
          <option value="Full Day">Private</option>
          <option value="House">House</option>
          <option value="Hotel">Hotel</option>
          <option value="Banks">Banks</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Full Name" value="<?php echo $row['phone'] ?>">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
        </form>
        
        <script>
// photo updater and deleter
           function pUpdate(divz, photo){
            $('#'+divz).empty()
            $.post('admin/editHandler.php', {photoPath: photo, tableName: "zebegna", pid: "<?php echo $uidx ?>"}, 
              function(returnedData){
                $('#'+divz).append(returnedData)        
            })
           }

         </script>
           <?php
           $i = 0;
           $pp = $admin->photoSplit($row['photoPath1']);
           if(!empty($row['photoPath1'])){
           foreach($pp as $photo){
             ?>
                  <div id="<?php echo $i ?>">
                  <img class="img-thumbnail" src="<?php  echo $photo ;?>" alt="Card">  
                  <button type="button" onclick="pUpdate('<?php echo $i ?>', '<?php echo $photo ?>')" class="btn btn-dark">Delete Photo</button>
                  </div>
             <?php
             $i ++;
           }
          }else{
            ?>
                  <form method="POST" enctype="multipart/form-data" >
                  <input hidden name="pid" value="<?php echo $uidx; ?>">
                  <input hidden name="tName" value="zebegna">
                  <div class="row">
                  <div id="registerBox">
                  <label for="exampleInputEmail1">Upload Photo  </label>
                  <input type="file" class="form-control" id="photo" name="photo[]" multiple >
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  </div>

                  <input type="submit" value="Change Photo">
                  </form>
            
            <?php
          }
           ?>




          


        
          <div id="alertVacancy"></div>
       
    
    <?php
  }
}


?>


    </div>
    </div>
</main><!-- End #main -->
