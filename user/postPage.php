<!-- <!-- <script src="assets/jquery.js" ></script> -->
 -->
 <?php
 include "../includes/lang.php";
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
  // this function sends the selected address to api. that api sets the address to a session then the session will be
  // the input to the database
  function handler(address){
    $('#jiji').hide();
    $('#dbad').val(address); 
    $('#ADD').text(address);
  }

  function typeHandler(data, apiId, showId, hideId){
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
    $('#z').load('user/divTags.php #'+divId)
  }


</script>
<script>
$(document).ready(function(){

  /// this will triger the address list for selecting address for all of the forms
  $('#ADD').click(function(){
  $('#z').load('user/divTags.php #jiji')
})

        
    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'admin/postHandler.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              // $('#alertVacancy').delay(5200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          

    })

})
</script>

<?php
include "../includes/header.php";
require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";

ob_start();
if(!isset($_SESSION)){
  session_start();
}

$_SESSION['address'] = 'Addis Ababa';

// if(!isset($_SESSION['userId']) && empty($_SESSION['userId'])){
//     echo 'login';
//     header('Location: login.php');
    
// }

if(isset($_GET['type'],$_SESSION['userId'])){


    if($_GET['type'] == 'car' ){
        ?>




<script>

    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })
    $('#rentS').hide()
  $('#forWho').hide()
  $('#whyRent').hide();
$('#forRentOrSell').on('change', function(){
    if(this.value == 'For Rent'){
      $('#rentS').show();
      $('#forWho').show();
      $('#whyRent').show();
    }else{
      $('#rentS').hide()
      $('#forWho').hide()
      $('#whyRent').hide();
    }
  
})


    })


</script>



<div id="contw" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <h5><?php echo $lang['carAdPost'] ?></h5>
            <div id="carVl" class="modal-body">
            <form  method="POST" enctype="multipart/form-data" >
          <input hidden name="posterId2" value="<?php echo $_SESSION['userId'] ?>">


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['ownerBroker'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['owner'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['broker'] ?></label>
        </div>
        </div>


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>



          <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
              
            </div>






        <div  class="input-group mb-3" >
        <select  class="custom-select" name="type2" id="s">
          <option><?php echo $lang['carModel'] ?></option>
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
          <option><?php echo $lang['city'] ?></option>
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
        <select  class="custom-select" name="rentStatus" id="rentS">
          <option  > <?php echo $lang['rentStatus'] ?></option>
          <option value="With Driver"> <?php echo $lang['withDriver'] ?></option>
          <option selected value="Car Only"><?php echo $lang['carOnly'] ?></option>
        </select>
        </div>

        
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="forWho" id="forWho">
          <option value=" " ><?php echo $lang['rentFor'] ?></option>
          <option value="All"><?php echo $lang['all'] ?></option>
          <option value="Private"><?php echo $lang['private'] ?></option>
          <option value="Govormental Offices"><?php echo $lang['govormentalOffices'] ?></option>
          <option value="Private Company"><?php echo $lang['privateCompany'] ?></option>
          <option value="NGO"><?php echo $lang['ngo'] ?></option>
        </select>
        </div>

        
        <div class="form-group" id="whyRent">
          <label for="exampleInputEmail1"><?php echo $lang['whyRent'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="whyRent" placeholder="Description"></textarea>
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descWhyRent'] ?></small>
        </div>



            <div class="input-group mb-3">
        <select class="custom-select" name="status2" id="inputGroupSelect01">
          <option ><?php echo $lang['yearMade']  ?></option>
          <?php 
            $cYear = date('Y');
            for($y=1980;$y<=$cYear;$y++){
              ?>
              <option value="<?php echo $y ?>"><?php echo $y ?></option>
              <?php
            }
          ?>
          

        </select>
        </div>





        <div class="input-group mb-3">
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected><?php echo $lang['fuleType'] ?></option>
          <option value="Benzene"><?php echo $lang['benzene'] ?></option>
          <option value="Diesel"><?php echo $lang['diesel'] ?></option>
        </select>
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
          <option selected><?php echo $lang['Transmission'] ?></option>
          <option value="automatic"><?php echo $lang['Automatic'] ?></option>
          <option value="manual"><?php echo $lang['Manual'] ?></option>
        </select>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['bodyStatus'] ?>:</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bodyStatus" placeholder="<?php echo $lang['bodyStatus'] ?>">
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1"> <?php echo $lang['km'] ?>:</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="<?php echo $lang['km'] ?>">
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"> <?php echo $lang['Price'] ?>:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="<?php echo $lang['Price'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
        </div>

        <input type="submit" value="POST">
        <div id="alertVacancy"></div>
          </form>
            </div>
        </div><!-- /.modal-content -->
      <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>


      
      </div><!-- /.modal-dialog -->
        
<!-- Modal HTML Markup -->

    

        <?php

    }
/////////////////////////////////////ad post/////////////////////////
    elseif($_GET['type'] == 'ad'){
        ?>
<script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>
<div id="cont" class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
        <h5><?php echo $lang['postAd'] ?></h5>
        <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $_SESSION['userId']?>">
        <input hidden name="big" value="NOT">


        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
        </div>

<script>
  function cloth(){
    alert('change')
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('admin/divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }
  }

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



<div  class="input-group mb-3" >
        <select  class="custom-select" name="type" id="selchange">
          <option selected ><?php echo $lang['adsCategory'] ?></option>
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


        <div id="targetLoader">

        </div>



        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Price'] ?> :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
        </div>

        <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
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
          <label for="exampleInputEmail1"><?php echo $lang['phone'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="shipping" id="inputGroupSelect01">
          <option> <?php echo $lang['offerDelivery'] ?></option>
          <option selected><?php echo $lang['no'] ?></option>
          <option value="YES"><?php echo $lang['yes'] ?></option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
        </div>



        <input type="submit" value="POST">
        <div id="alertVacancy"></div>
        </form>
      </div>
</div>
      <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
</div>
        
        <?php
    }

///////////////house//////////////
elseif($_GET['type'] == 'house'){
    ?>
    

    <script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<script>
    $(document).ready(function(){
      $('#selHouseType').on('change',function(){
        // alert('inhh')
        if(this.value == 'OTHER'){
          $('#houseTypeLoader').load('admin/divTags.php #houseTypeOther')
        }
      })

      $('#city').on('change',function(){
      if(this.value == "otherCity"){
        $('#cityBox').load('admin/divTags.php #otherCity')
 
      }
   
    })

    // $('#subCity').on('change',function(){
    //   if(this.value == "otherSubCity"){
    //     $('#subCityBox').load('admin/divTags.php #otherSubCity')
    //   }
      
    // })

    $('#HorL').on('change', function(){
      if(this.value == "HOUSE"){
        $('#houseTypeLoader').load("admin/divTags.php #houseType")
        $('#bedOrBath').load('admin/divTags.php #bedBath')
      }
    })

    })
  </script>
<div id="cont" class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <h5><?php echo $lang['houseAd'] ?></h5>
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">    
             <input hidden name="houseOrLand" value="HOUSE">

             <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['ownerBroker'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['owner'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['broker'] ?></label>
        </div>
        </div>


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>


        <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
            </div>
            <script src="../assets/jquery.js"></script>

        
<div id="houseTypeLoader"></div>

<div id="houseType" class="input-group mb-3">
  
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="type" id="selHouseType">
          <option selected><?php echo $lang['houseType'] ?></option>
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


<div  class="input-group mb-3" >
        <select  class="custom-select" name="city" id="">
          <option><?php echo $lang['city'] ?></option>
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
          <option><?php echo $lang['subCity'] ?></option>
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
              <label for="exampleInputEmail1"><?php echo $lang['Wereda'] ?> :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="<?php echo $lang['Wereda'] ?> ">
            </div>



            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Area'] ?> : </label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="<?php echo $lang['Area'] ?>">
            </div>

            <div id="bedOrBath">

            </div>

            <div id="bedBath">
<div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['numberOfBedRoom'] ?> :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bedRoomNo" placeholder="<?php echo $lang['numberOfBedRoom'] ?>">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['bathOfBedRoom'] ?> :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bathRoomNo" placeholder="<?php echo $lang['bathOfBedRoom'] ?>">
            </div>
</div>

            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Price'] ?> :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="<?php echo $lang['Price'] ?>">
            </div>



        <div class="input-group mb-3">

        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected> <?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>

      
        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
        </div>


        <input type="submit" value="Post">
        <div id="alertVacancy"></div>
             </form>
      </div>
</div>
      <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
</div>


    <?php
}elseif($_GET['type'] == 'land'){
  ?>
  
  <script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<script>
    $(document).ready(function(){
      $('#selHouseType').on('change',function(){
        alert('inhh')
        if(this.value == 'OTHER'){
          $('#houseTypeLoader').load('admin/divTags.php #houseTypeOther')
        }
      })

      $('#city').on('change',function(){
      if(this.value == "otherCity"){
        $('#cityBox').load('admin/divTags.php #otherCity')
 
      }
   
    })

    $('#subCity').on('change',function(){
      if(this.value == "otherSubCity"){
        $('#subCityBox').load('admin/divTags.php #otherSubCity')
      }
      
    })

    $('#HorL').on('change', function(){
      if(this.value == "HOUSE"){
        $('#houseTypeLoader').load("admin/divTags.php #houseType")
        $('#bedOrBath').load('admin/divTags.php #bedBath')
      }
    })

    })
  </script>
<div id="cont" class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <h5>Land Ad Post</h5>
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
             <input hidden name="houseOrLand" value="LAND">


             <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['ownerBroker'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['owner'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['broker'] ?></label>
        </div>
        </div>


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5 fw-bold" ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="Broker">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>



        <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
            </div>
            <script src="../assets/jquery.js"></script>

        
<div id="houseTypeLoader"></div>


<div id="subCityBox" class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select id="subCity" class="custom-select" name="type" id="inputGroupSelect01">
          <option value=" "><?php echo $lang['landType'] ?></option>
          <option value="women">Jemo</option>
          <option value="men">4 kilo</option>
          <option value="otherSubCity">Other</option>          
        </select>
        </div>


        <div  class="input-group mb-3" >
        <select  class="custom-select" name="city" id="">
          <option><?php echo $lang['city'] ?></option>
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
          <option><?php echo $lang['subCity'] ?></option>
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
              <label for="exampleInputEmail1"><?php echo $lang['Wereda'] ?> :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="<?php echo $lang['Wereda'] ?> ">
            </div>



            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Area'] ?> : </label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="<?php echo $lang['Area'] ?>">
            </div>


            <div id="bedOrBath">

            </div>



            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Price'] ?> :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="<?php echo $lang['Price'] ?>">
            </div>



        <div class="input-group mb-3">

        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected> <?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
        </div>


        <input type="submit" value="Post">
        <div id="alertVacancy"></div>
             </form>
      </div>
</div>
      <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
</div>

  
  <?php
}

///////// electronics/////////////

if($_GET['type'] == 'electronics'){
    ?>
  
  
  



<!-- <script src="assets/jquery.js"  ></script> -->
<script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<div id="cont" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">


            <h5><?php echo $lang['electronicsPost'] ?></h5>
      <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

      <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="<?php echo $lang['title'] ?>">
        </div>
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


<div  class="input-group mb-3" >
        <select  class="custom-select" name="type" id="sElc">
          <option><?php echo $lang['elecCat'] ?></option>
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









        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"> <?php echo $lang['statusOfItem'] ?>: </label>
    </div>
    <select class="custom-select" name="status" id="inputGroupSelect01">
      <option selected value="NEW"><?php echo $lang['new'] ?></option>
      <option value="MEDIUM"><?php echo $lang['Medium'] ?></option>
      <option value="OLD"><?php echo $lang['Old'] ?></option>
    </select>
    </div>



    <div id="computer"></div>

    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo $lang['Price'] ?> : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?> ">
     </div>

    <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $lang['city'] ?> </option>
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
      <label for="exampleInputEmail1"><?php echo $lang['Description'] ?> </label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?>"></textarea>
    </div>

    <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
    </div>

    <input type="submit" value="POST">
    <div id="alertVacancy"></div>
      </form>


            </div>
        </div><!-- /.modal-content -->
              <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
    </div><!-- /.modal-dialog -->
    
    
    <?php
}

//////////// charity ad post////////////////
if($_GET['type'] == 'charity'){
    ?>
    
    
<!-- <script src="assets/jquery.js"  ></script> -->
<script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<div id="cont" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload']?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <h5>Charity Ads Post</h5>
            <div class="modal-body">

            <form  method="POST" enctype="multipart/form-data">

<input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
</div>

<div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
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
  <label for="exampleInputEmail1"><?php echo $lang['phone'] ?>:</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
</div>


<div class="form-group">
      <label for="exampleInputEmail1"><?php echo $lang['Description'] ?> </label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?>"></textarea>
    </div>

    <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
    </div>


<input type="submit"  value="POST">
<div id="alertVacancy"></div>
</form>

            </div>
        </div><!-- /.modal-content -->
              <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
    </div><!-- /.modal-dialog -->
        
    
    <?php
}

////////vacancy post form //////////////////

if($_GET['type'] == 'vacancy'){
    ?>
    
    <!-- <script src="assets/jquery.js"  ></script> -->
<script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<div id="cont" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <section class="section">
          <div class="pagetitle">
          <h5><?php echo $lang['vacancyPost'] ?></h5>

        </div><!-- End Page Title -->


        <div id="vacancyBox" class="container">
        <form id="vacancyForm" action="postPage.php"  method="POST" >
          <input hidden name="uid" value="<?php echo $_SESSION['userId'] ?>">
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['companyName'] ?></label>
          <input type="text" class="form-control" id="companyName" 
          aria-describedby="emailHelp" name="companyName" placeholder="<?php echo $lang['companyName'] ?>">
        </div>
        <!-- <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jt').load('admin/divTags.php #jobType')
                }
                
              })
            })

          </script> -->

  
          <div  class="input-group mb-3" >
        <select  class="custom-select" name="jobType" id="">
          <option><?php echo $lang['jobType'] ?></option>
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



  



       
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['jobTitle'] ?></label>
          <input type="text" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="jobTitle" placeholder="<?php echo $lang['jobTitle'] ?>">
        </div>
        <div class="input-group mb-3">
        <select class="custom-select" name="positionType" id="inputGroupSelect01">
          <option selected><?php echo $lang['positionType'] ?></option>
          <option value="Full Time"><?php echo $lang['fullTime'] ?></option>
          <option value="Part Time"><?php echo $lang['partTime'] ?></option>
          <option value="Temporary"><?php echo $lang['Temporary'] ?></option>
          <option value="Contractual"> <?php echo $lang['Contractual'] ?></option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option value=" "><?php echo $lang['Gender'] ?></option>
          <option value="Male"><?php echo $lang['Male'] ?></option>
          <option value="Female"><?php echo $lang['Female'] ?></option>
          <option value="Both"><?php echo $lang['Both'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['appStart'] ?>:</label>
          <input type="date" class="form-control" id="Deadline" 
          aria-describedby="emailHelp" name="appStart" placeholder="<?php echo $lang['appStart'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['appDead'] ?></label>
          <input type="date" class="form-control" id="Deadline" 
          aria-describedby="emailHelp" name="Deadline" placeholder="<?php echo $lang['appDead'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['requierdPositionNo'] ?></label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="reqNo" placeholder="<?php echo $lang['requierdPositionNo'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['phone'] ?></label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Salary'] ?>: </label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="salary" placeholder="<?php echo $lang['Salary'] ?>">
        </div>


        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="salaryStatus" id="inputGroupSelect01">
          <option value=" "><?php echo $lang['salaryType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>



        <div  class="input-group mb-3" >
        <select  class="custom-select" name="location" id="">
          <option><?php echo $lang['city'] ?></option>
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
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="description" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>


        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>

            </div>
        </div><!-- /.modal-content -->
              <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
    </div><!-- /.modal-dialog -->
    
    <?php
}

//////////////////tender post////////////////////
if($_GET['type'] == 'tender'){
    ?>
    
    <!-- <script src="assets/jquery.js"  ></script> -->
<script>
    $(document).ready(function(){
    $('#cl').click(function(){
    location.reload();

    })

    })
</script>

<div id="cont" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <div class="pagetitle">
      <h5><?php echo $lang['tenderPost'] ?></h5>

    </div><!-- End Page Title -->
    <section class="section">
 

        <div id="vacancyBox" class="container">
        <form id="tenderForm"  method="POST" >
        <input hidden name="uid" value="<?php echo $_SESSION['userId']; ?>">

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
         </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['tenderType'] ?></label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="tenderType" placeholder="<?php echo $lang['Tender Type'] ?>">
         </div>


        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['startingDate'] ?></label>
          <input type="date" class="form-control" id="startingDate" 
          aria-describedby="emailHelp" name="startDate" placeholder="<?php echo $lang['startingDate'] ?> ">
         </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['appDead'] ?></label>
          <input type="date" class="form-control" id="Deadline2" 
          aria-describedby="emailHelp" name="Deadline2" placeholder="<?php echo $lang['appDead'] ?>">
         </div>
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['initialCost'] ?></label>
          <input type="number" class="form-control" id="phoneNo" 
          aria-describedby="emailHelp" name="initialCost" placeholder="<?php echo $lang['initialCost'] ?>">
         </div>
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="location2" id="">
          <option><?php echo $lang['city'] ?></option>
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
          <label for="exampleInputEmail1"><?php echo $lang['description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="description2" placeholder="<?php echo $lang['description'] ?>"></textarea>
         </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?> [Optional] </label>
          <input type="file" class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhoto'] ?></small>
        </div>

        <input type="submit" value="POST">
        <div id="alertVacancy"></div>
        </form>
        </div>
      
      </section>
                    

            </div>
        </div><!-- /.modal-content -->
              <!-- /// to select address like jiji style -->
      <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
    </div><!-- /.modal-dialog -->
        
    
    
    <?php
}


/////////////// home tutore job
if($_GET['type'] == 'homeTutor'){
  ?>
  
  <!-- <script src="assets/jquery.js"  ></script> -->
<script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  })
</script>

<div id="cont" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5><?php echo $lang['homeTutor'] ?></h5>

<form  method="POST" enctype="multipart/form-data">
<input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['fullName'] ?></label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
 </div>

<div class="input-group mb-3">
 
<select class="custom-select" name="sex" id="inputGroupSelect01">
  <option selected><?php echo $lang['Gender'] ?></option>
  <option value="Male"><?php echo $lang['Male'] ?></option>
  <option value="Female"><?php echo $lang['Female'] ?></option>
</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['educationalBackground'] ?>:</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="eduBackground" placeholder="<?php echo $lang['educationalBackground'] ?>"></textarea>
 </div>


<div class="input-group mb-3">
<select class="custom-select" name="clientRange" id="inputGroupSelect01">
  <option value=" "><?php echo $lang['Range'] ?></option>
  <option value="1-8">1-8 <?php echo $lang['Grade'] ?></option>
  <option value="9-12">9-12 <?php echo $lang['Grade'] ?></option>
  <option value="9-10">9-10 <?php echo $lang['Grade'] ?></option>
  <option value="10-11">10-11 <?php echo $lang['Grade'] ?></option>
  <option value="11-12">11-12 <?php echo $lang['Grade'] ?></option>

</select>
</div>

<div class="input-group mb-3">
 
<select class="custom-select" name="paymentStatus" id="inputGroupSelect01">
  <option selected><?php echo $lang['paymentStatus'] ?></option>
  <option value="Hourly"><?php echo $lang['Hourly'] ?></option>
  <option value="Dayly"><?php echo $lang['Dayly'] ?></option>
  <option value="Monthly"><?php echo $lang['Monthly'] ?></option>

</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['Price'] ?>:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
 </div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['phone'] ?>:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
 </div>

<div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
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
  <h6><?php echo $lang['agentInfoQ'] ?></h6>
  <label for="exampleInputEmail1"><?php echo $lang['agentInfo'] ?></label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="companyInfo" placeholder="<?php echo $lang['agentInfo'] ?>"></textarea>
 </div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['Description'] ?>   </label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Description'] ?> "></textarea>
</div>

<div class="row">
<div id="registerBox">
<label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
  <input type="file" class="form-control" id="photo" name="photo" multiple >
</div>



<input type="submit" value="POST">
<div id="alertVacancy"></div>
</form>

          </div>
      </div><!-- /.modal-content -->
            <!-- /// to select address like jiji style -->
            <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
  </div><!-- /.modal-dialog -->
      
  
  
  <?php
}


////// House WORKER////
if($_GET['type'] == 'houseWorker'){
  ?>
  
  <!-- <script src="assets/jquery.js"  ></script> -->
<script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  })
</script>

<div id="cont" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5><?php echo $lang['houseKeeper '] ?></h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
          <input hidden name="hotelOrHouse" value="HOUSE">
          <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['fullName'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
           </div>

          <div class="input-group mb-3">
 
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected><?php echo $lang['Gender'] ?></option>
          <option value="Male"><?php echo $lang['Male'] ?></option>
          <option value="Female"><?php echo $lang['Female'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Age'] ?></label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="<?php echo $lang['Age'] ?>">
         </div>

 
        <div class="input-group mb-3">
        
        <select class="custom-select" name="religion" id="inputGroupSelect01">
          <option selected><?php echo $lang['Religion'] ?></option>
          <option value="Orthodox"><?php echo $lang['Orthodox'] ?></option>
          <option value="Muslim"><?php echo $lang['Muslim'] ?></option>
          <option value="Protestant"><?php echo $lang['Protestant'] ?></option>
        </select>
        </div>


        <div  class="input-group mb-3" >
        <select  class="custom-select" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
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
 
        <select class="custom-select" name="workType" id="inputGroupSelect01">
          <option selected><?php echo $lang['workType'] ?></option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" value="POST">
          <div id="alertVacancy"></div>
          </form>
   

          </div>
      </div><!-- /.modal-content -->
            <!-- /// to select address like jiji style -->
            <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
  </div><!-- /.modal-dialog -->
      
  
  
  <?php
}


////// hotel worker
if($_GET['type'] == 'hotelWorker'){
  ?>
  
  <!-- <script src="assets/jquery.js"  ></script> -->
<script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  })
</script>

<div id="cont" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5>House Keeper Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
          <input hidden name="hotelOrHouse" value="HOTEL">
          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Field </label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="field" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div  class="input-group mb-3" >
        <select  class="custom-select" name="location" id="">
          <option>Address</option>
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
          <option selected>Choose...</option>
          <option value="Half Day">Half Day</option>
          <option value="Full Day">Full Day</option>
          <option value="Monthly">Monthly</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Price:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Experience</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Current Address</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="cAddress" placeholder="info"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="form-group">
        <h6>If you are an agent, then fill your discription</h6>
          <label for="exampleInputEmail1">Agent Info</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

<br>
        <h5>Can You Provide Biding Person</h5>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2">No</label>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" value="POST">
          <div id="alertVacancy"></div>
          </form>

          </div>
      </div><!-- /.modal-content -->
            <!-- /// to select address like jiji style -->
            <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
  </div><!-- /.modal-dialog -->
      
  
  
  <?php
}
//////// zebegna 
if($_GET['type'] == 'zebegna'){
  ?>
  
  <!-- <script src="assets/jquery.js"  ></script> -->
<script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  })
</script>

<div id="cont" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

          <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Gender</label>
        </div>
        <select class="custom-select" name="sex" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Male">Mele</option>
          <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Age</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div  class="input-group mb-3" >
        <select  class="custom-select" name="location" id="">
          <option>Address</option>
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
          <label class="input-group-text" for="inputGroupSelect01">Work Status</label>
        </div>
        <select class="custom-select" name="workStat" id="inputGroupSelect01">
          <option selected>Choose...</option>
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
          aria-describedby="emailHelp" name="phone" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>






          


          <input class="btn btn-dark" type="submit" value="POST">
          <div id="alertVacancy"></div>
          </form>

          </div>
      </div><!-- /.modal-content -->
            <!-- /// to select address like jiji style -->
            <div id="z"  class="modal-dialog" style="position: absolute; top: 3%; width: 100%;" ></div>
  </div><!-- /.modal-dialog -->
      
  
  
  <?php
}

}

?>