<?php
  include "../includes/adminSide.php";
?>
<!DOCTYPE html>
<html lang="en">


<?php

// use function PHPSTORM_META\elementType;

require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";

if(isset($_GET['uid'])){
  $uidx = $_GET['uid'];
}





?>

<head>
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
</head>
<script src="assets/jquery.js"></script>
<script>
  $(document).ready(function(){
    // $('#vacancyForm').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'postPage.php',
    //     type: 'post',
    //     data: $('#vacancyForm').serialize(),
    //     success : function(){
    //       $( 'form' ).each(function(){
    //                 this.reset();
    //           });
    //           $('#alertVacancy').text('POST SUCCESSFULL!  ')
    //           $('#alertVacancy').delay(3200).fadeOut(300);    
    //             }
    //   })
    //   return false;

    // })

    // $('#tenderForm').on('submit', function(e){
    //   e.preventDefault()
    //   $.ajax({
    //     url: 'postPage.php',
    //     type: 'post',
    //     data: $('#tenderForm').serialize(),
    //     success : function(){
    //       $( 'form' ).each(function(){
    //                 this.reset();
    //           });
    //           $('#alertVacancy').text('POST SUCCESSFULL!  ')
    //           $('#alertVacancy').delay(3200).fadeOut(300);        }
    //   })
    //   return false;

    // })

    $('form').on('submit', function(e){
          e.preventDefault()
          $.ajax({
            url: 'postHandler.php',
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

    $('#sCar').on('change', function(){
      if(this.value == "OTHER"){
        $('#typeC').load("divTags.php #typeCar")
      }
    })

    
  })

</script>

<body>

  <!-- ======= Header ======= -->


  <!-- ======= Sidebar ======= -->


  <main id="postBox" class="container">
    <br>
    <br>
    <br>
    <br>
    

 <!--  <script src="assets/jquery.js" ></script> -->
 
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
    $('#targetLoader').load('divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }

  if(data == 'Computer and Laptop'){
    $('#computer').load('divTags.php #sizeInch,#proc,#storage,#core,#ram')
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
            url: 'postHandler.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              $('#alertVacancy').delay(5200).fadeOut(1000);
              location.reload()
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

$('#fsell').on('change', function(){
  if(this.value == 'For Sell'){
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
      <!-- <h5><?php echo $lang['carAdPost'] ?></h5> -->
            <div id="carVl" class="modal-body">
            <form  method="POST" enctype="multipart/form-data" >
          <input hidden name="posterId2" value="<?php echo $_SESSION['userId'] ?>">


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-6 " ><?php echo $lang['ownerBroker'] ?></label><br>

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
          <label for="exampleInputEmail1" class="fs-6  " ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="forRentOrSell" value="For Rent">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="fsell" value="For Sell">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>

        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="type2" id="s">
          <option><?php echo $lang['carModel'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc=   allCategoryLister('car');
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


          <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['carTitle'] ?></label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['carPlaceholder'] ?>">
              
            </div>









     

        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="s">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
        <select  class="form-select" aria-label="Default select example" name="rentStatus" id="rentS">
          <option  > <?php echo $lang['rentStatus'] ?></option>
          <option value="With Driver"> <?php echo $lang['withDriver'] ?></option>
          <option selected value="Car Only"><?php echo $lang['carOnly'] ?></option>
        </select>
        </div>

        
        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="forWho" id="forWho">
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
        <select class="form-select" aria-label="Default select example" name="status2" id="inputGroupSelect01">
          <option ><?php echo $lang['yearMade']  ?></option>
          <?php 
            $cYear = date('Y');
            for($y=1990;$y<=$cYear;$y++){
              ?>
              <option value="<?php echo $y ?>"><?php echo $y ?></option>
              <?php
            }
          ?>
          

        </select>
        </div>





        <div class="input-group mb-3">
        <select class="form-select" aria-label="Default select example" name="fuleKind" id="inputGroupSelect01">
          <option selected><?php echo $lang['fuleType'] ?></option>
          <option value="Benzene"><?php echo $lang['benzene'] ?></option>
          <option value="Diesel"><?php echo $lang['diesel'] ?></option>
        </select>
        </div>

        <div class="input-group mb-3">
        <select class="form-select" aria-label="Default select example" name="transmission" id="inputGroupSelect01">
          <option selected><?php echo $lang['Transmission'] ?></option>
          <option value="automatic"><?php echo $lang['Automatic'] ?></option>
          <option value="manual"><?php echo $lang['Manual'] ?></option>
        </select>
        </div>

        <div class="form-group">
 
 
              <select  class="form-select" aria-label="Default select example" name="bodyStatus" id="forWho">
          <option value=" " ><?php echo $lang['bodyStatus'] ?></option>
          <option value="Slightly Good"><?php echo $lang['slightlyGood'] ?></option>
          <option value="Good"><?php echo $lang['Good'] ?></option>
          <option value="Very Good"><?php echo $lang['veryGood'] ?></option>
          <option value="Excellent"><?php echo $lang['Excellent'] ?></option>
         </select>

        </div>

        <div class="form-group">
              <!-- <label for="exampleInputEmail1"> <?php echo $lang['km'] ?>:</label> -->
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="<?php echo $lang['km'] ?>">
        </div>

        <div class="input-group mb-3">
        <select class="form-select" aria-label="Default select example" name="fixidOrN" id="inputGroupSelect01">
          <option selected><?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"> <?php echo $lang['labelPrice'] ?>:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="<?php echo $lang['Price'] ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="<?php echo $lang['Description'] ?>"></textarea>
        </div>
 


        <i class="bi bi-file-plus"> </i>
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
<div class="modal-content"  >
      <div class="modal-header" style="background-color: blue;"  >
        <h5 class="modal-title" style="color: yellow;"  id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
        <!-- <h5><?php echo $lang['postAd'] ?></h5> -->
        <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $_SESSION['userId']?>">
        <input hidden name="big" value="NOT">


        <div class="form-group">
          <label for="exampleInputEmail1" ><?php echo $lang['enterTitle'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
        </div>

<script>
  function cloth(){
    alert('change')
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }
  }

$(document).ready(function(){
$('#selchange').on('change', function(){
  // alert('change')
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }
 
})

// $('#tCategory').on('change', function(){
//   if(this.value == "OTHER"){
//     $('#adTy').load('divTags.php #otherAd')
//   }
 
// })



})

</script>



<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="type" id="selchange">
          <option selected ><?php echo $lang['adsCategory'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= allCategoryLister('ad');
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
          <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
        </div>

        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
          aria-describedby="emailHelp" name="phone" value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <div class="input-group mb-3">
        <select class="form-select" aria-label="Default select example" name="shipping" id="inputGroupSelect01">
          <option selected> <?php echo $lang['offerDelivery'] ?></option>
          <option ><?php echo $lang['no'] ?></option>
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

// big discount post
elseif($_GET['type'] == 'bidAd'){
  ?>
<script>
$(document).ready(function(){
$('#cl').click(function(){
location.reload();

})

})
</script>
<div id="cont" class="modal-dialog">
<div class="modal-content"  >
<div class="modal-header" style="background-color: blue;"  >
  <h5 class="modal-title" style="color: yellow;"  id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
  <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
</div>
<div class="modal-body">
  <!-- <h5><?php echo $lang['postAd'] ?></h5> -->
  <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
  <input hidden name="posterId" value="<?php echo $_SESSION['userId']?>">
  <input hidden name="big" value="ACTIVE">


  <div class="form-group">
    <label for="exampleInputEmail1" ><?php echo $lang['enterTitle'] ?></label>
    <input type="text" class="form-control" id="nameTitle" 
    aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
  </div>

<script>
function cloth(){
alert('change')
if(this.value == "Cloth and Shoe"){
$('#targetLoader').load('divTags.php #targetFor')
}else{
$('#targetLoader').empty()
}
}

$(document).ready(function(){
$('#selchange').on('change', function(){
// alert('change')
if(this.value == "Cloth and Shoe"){
$('#targetLoader').load('divTags.php #targetFor')
}else{
$('#targetLoader').empty()
}

})

// $('#tCategory').on('change', function(){
//   if(this.value == "OTHER"){
//     $('#adTy').load('divTags.php #otherAd')
//   }

// })



})

</script>



<div  class="input-group mb-3" >
  <select  class="form-select" aria-label="Default select example" name="type" id="selchange">
    <option selected ><?php echo $lang['adsCategory'] ?></option>
    <?php 
        require_once '../php/fetchApi.php';
          $locc= allCategoryLister('ad');
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
    <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> :</label>
    <input type="text" class="form-control" id="nameTitle" 
    aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
  </div>

  <div  class="input-group mb-3" >
  <select  class="form-select" aria-label="Default select example" name="address" id="">
    <option><?php echo $lang['city'] ?></option>
    <?php 
        require_once '../php/fetchApi.php';
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
    aria-describedby="emailHelp" name="phone" value="<?php echo $_SESSION['phone'] ?>">
  </div>

  <div class="input-group mb-3">
  <select class="form-select" aria-label="Default select example" name="shipping" id="inputGroupSelect01">
    <option selected> <?php echo $lang['offerDelivery'] ?></option>
    <option ><?php echo $lang['no'] ?></option>
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
          $('#houseTypeLoader').load('divTags.php #houseTypeOther')
        }
      })

      $('#city').on('change',function(){
      if(this.value == "otherCity"){
        $('#cityBox').load('divTags.php #otherCity')
 
      }
   
    })



    // $('#subCity').on('change',function(){
    //   if(this.value == "otherSubCity"){
    //     $('#subCityBox').load('divTags.php #otherSubCity')
    //   }
      
    // })

    $('#HorL').on('change', function(){
      if(this.value == "HOUSE"){
        $('#houseTypeLoader').load("divTags.php #houseType")
        $('#bedOrBath').load('divTags.php #bedBath')
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
      <!-- <h5><?php echo $lang['houseAd'] ?></h5> -->
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">    
             <input hidden name="houseOrLand" value="HOUSE">

             <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5" ><?php echo $lang['ownerBroker'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['owner'] ?></label>
        </div>

        <div class="form-check form-check-inline" style="margin-left: 13%;">
          <input class="form-check-input"   type="radio" name="ownerBroker" id="inlineRadio1" value="Broker">
          <label class="form-check-label"  for="inlineRadio1"><?php echo $lang['broker'] ?></label>
        </div>
        </div>


          <div class="form-group">
          <label for="exampleInputEmail1" class="fs-5" ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="For Rent">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline" style="margin-left: 10%;">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="For Sell">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>


        <!-- <div class="form-group"> -->
              <!-- <label for="exampleInputEmail1"><?php echo $lang['title'] ?></label> -->
              <input type="text" hidden class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
            <!-- </div> -->
            <!-- <script src="../assets/jquery.js"></script> -->

        
<div id="houseTypeLoader"></div>

<div id="houseType" class="input-group mb-3">
  
        <div class="input-group-prepend">
        </div>
        <select class="form-select" aria-label="Default select example" name="type" id="selHouseType">
          <option selected><?php echo $lang['houseType'] ?></option>
<?php
require_once "../php/adminCrude.php";
$tab = $_GET['cat'];
$categorySort = array();
$category = allCategoryLister('housesell');
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

<script>


  // sub city filter api
  function hCity(x){
    // alert(x)
    $.ajax({
        url: 'user/userApi.php',
        type: 'post',
        data: {
          cityH: x
        },
        success: function(data){
          // alert(data)
          $('#subH').empty()
          $('#subH').append(data)
        }
      })
  }
</script>

<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="city" onchange="hCity(this.value)" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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

        
        <div id="subH"   class="input-group mb-3" >
          <?php
        require_once '../php/fetchApi.php';
    $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
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
  }
    ?>
    </select>
        </div>


        

 
      <!-- kebele list -->
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="wereda"  id="inputGroupSelect01">
          <option ><?php echo $lang['Wereda'] ?></option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                 ?>
                 <option value="<?php echo '0'.$y ?>"><?php echo '0'.$y ?></option>
                 <?php
               }else{
                ?>
                <option value="<?php echo $y ?>"><?php echo $y ?></option>
                <?php
               }

            }
          ?>
          

        </select>
        </div>

        <div class="form-group">
              <!-- <label for="exampleInputEmail1"><?php echo $lang['spArea'] ?> : </label> -->
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="spArea" placeholder="<?php echo $lang['enArea'] ?>">
            </div>




            <div class="form-group">
              <!-- <label for="exampleInputEmail1"><?php echo $lang['Area'] ?> : </label> -->
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="<?php echo $lang['Area'] ?>">
            </div>

            <div id="bedOrBath">

            </div>

            <div id="bedBath">
<div class="form-group">
              <!-- <label for="exampleInputEmail1"><?php echo $lang['numberOfBedRoom'] ?> :</label> -->
 
              <select class="form-select" aria-label="Default select example" name="bedRoomNo" id="inputGroupSelect01">
          <option selected > <?php echo $lang['numberOfBedRoom'] ?></option>
          <option value="0" >0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>

        </select>
            </div>

            <div class="form-group">
              <!-- <label for="exampleInputEmail1"><?php echo $lang['bathOfBedRoom'] ?> :</Title></label> -->
    
          <select class="form-select" aria-label="Default select example" name="bathRoomNo" id="inputGroupSelect01">
          <option selected> <?php echo $lang['bathOfBedRoom'] ?></option>
          <option value="0" >0</option>
          <option value="1" >1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>

        </select>
            </div>
</div>

            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="<?php echo $lang['Price'] ?>">
            </div>



        <div class="input-group mb-3">

        <select class="form-select" aria-label="Default select example" name="fixidOrN" id="inputGroupSelect01">
          <option selected> <?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder=""><?php echo $lang['placeHolderDes'] ?>  </textarea>
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
          $('#houseTypeLoader').load('divTags.php #houseTypeOther')
        }
      })

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
<div id="cont" class="modal-dialog">
<div class="modal-content">
      <div class="modal-header" style="background-color: blue;"  >
        <h5 class="modal-title" style="color: yellow;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <!-- <h5>Land Ad Post</h5> -->
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
             <input hidden name="houseOrLand" value="LAND">


             <div class="form-group">
          <label for="exampleInputEmail1" style="color: coral;"  class="fs-6" ><?php echo $lang['ownerBroker'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Owner">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['owner'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="ownerBroker" id="inlineRadio1" value="Broker">
          <label class="form-check-label"   for="inlineRadio1"><?php echo $lang['broker'] ?></label>
        </div>
        </div>


          <div class="form-group">
          <label for="exampleInputEmail1" style="color: coral;" class="fs-6" ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="For Rent">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="inlineRadio1" value="For Sell">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>



        <div class="form-group">
               <input type="text"  class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
            </div>
            <!-- <script src="../assets/jquery.js"></script> -->

        
<div id="houseTypeLoader"></div>


<div id="subCityBox" class="input-group mb-3">
 
<input type="text"  class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="type" placeholder="<?php echo $lang['landType'] ?>">
        </div>


     
<script>


// sub city filter api
function hCity(x){
  // alert(x)
  $.ajax({
      url: 'user/userApi.php',
      type: 'post',
      data: {
        cityH: x
      },
      success: function(data){
        // alert(data)
        $('#subH').empty()
        $('#subH').append(data)
      }
    })
}
</script>

<div  class="input-group mb-3" >
      <select  class="form-select" aria-label="Default select example" name="city" onchange="hCity(this.value)" id="">
        <option><?php echo $lang['city'] ?></option>
        <?php 
            require_once '../php/fetchApi.php';
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

      
      <div id="subH"   class="input-group mb-3" >
        <?php
      require_once '../php/fetchApi.php';
  $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
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
}
  ?>
  </select>
      </div>



      <!-- kebele list -->
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="wereda"  id="inputGroupSelect01">
          <option ><?php echo $lang['Wereda'] ?></option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                 ?>
                 <option value="<?php echo $y ?>"><?php echo '0'.$y ?></option>
                 <?php
               }else{
                ?>
                <option value="<?php echo $y ?>"><?php echo $y ?></option>
                <?php
               }

            }
          ?>
          

        </select>
        </div>


            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Area'] ?> : </label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="<?php echo $lang['Area'] ?>">
            </div>


            <div id="bedOrBath">

            </div>



            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="<?php echo $lang['Price'] ?>">
            </div>



        <div class="input-group mb-3">

        <select class="form-select" aria-label="Default select example" name="fixidOrN" id="inputGroupSelect01">
          <option selected> <?php echo $lang['priceType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Description'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Descriptionmore'] ?>"></textarea>
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
      <div class="modal-header" style="background-color: Navy;"  >
        <h5 class="modal-title" style="color: yellow;"  id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">


       <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

      <div class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="<?php echo $lang['title'] ?>">
        </div>
        <script>
$(document).ready(function(){
$('#sElc').on('change', function(){
  if(this.value == 'Computer and Laptop'){
    $('#computer').load('divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }else{
    $('#computer').empty()
  }
})
})

</script>


<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="type" id="sElc">
          <option><?php echo $lang['elecCat'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= allPostListerOnColumen('adCategory', 'tableName', 'electronics');
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
     </div>
    <select class="form-select" aria-label="Default select example" name="status" id="inputGroupSelect01">
    
    <option selected value="NEW"><?php echo $lang['statusOfItem'] ?></option>
      <option   value="NEW"><?php echo $lang['new'] ?></option>
      <option value="MEDIUM"><?php echo $lang['Medium'] ?></option>
      <option value="OLD"><?php echo $lang['Old'] ?></option>
    </select>
    </div>



    <div id="computer"></div>


    <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?> </option>
          <?php 
              require_once '../php/fetchApi.php';
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
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
        </div>



        <div class="form-group">
      <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?> ">
     </div>


    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo $lang['Description'] ?> </label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Descriptionmore'] ?>"></textarea>
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
      <div class="modal-header" style="background-color: yellow;">
        <h5 class="modal-title" style="color: blue;" id="exampleModalLabel"><?php echo $lang['upload']?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <form  method="POST" enctype="multipart/form-data">

<input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

<div class="form-group">
   <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
</div>

<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
  
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
</div>


<div class="form-group">
      <label for="exampleInputEmail1"><?php echo $lang['Description'] ?> </label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Descriptionmore'] ?>"></textarea>
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
      <div class="modal-header" style="background-color: navy;" >
        <h5 class="modal-title" style="color: yellow;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <section class="section">
          <div class="pagetitle">
       

        </div><!-- End Page Title -->


        <div id="vacancyBox" class="container">
        <form id="vacancyForm" action="postPage.php"  method="POST" >
          <input hidden name="uid" value="<?php echo $_SESSION['userId'] ?>">
        <div class="form-group">
           
          <input type="text" class="form-control" id="companyName" 
          aria-describedby="emailHelp" name="companyName" placeholder="<?php echo $lang['companyName'] ?>">
        </div>
        <!-- <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jt').load('divTags.php #jobType')
                }
                
              })
            })

          </script> -->

  
          <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="jobType" id="">
          <option><?php echo $lang['jobType'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
                $locc= allCategoryLister('vacancy');
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
           <input type="text" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="jobTitle" placeholder="<?php echo $lang['jobTitle'] ?>">
        </div>
        <div class="input-group mb-3">
        <select class="form-select" aria-label="Default select example" name="positionType" id="inputGroupSelect01">
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
        <select class="form-select" aria-label="Default select example" name="sex" id="inputGroupSelect01">
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
           <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="reqNo" placeholder="<?php echo $lang['requierdPositionNo'] ?>">
        </div>

        <div class="form-group">
           <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
        </div>

        <div class="form-group">
          <label><?php echo $lang['Salary'] ?></label>
           <input type="text" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="salary" placeholder=" <?php  echo $lang['salaryLable'] ?>">
        </div>


        <div hidden class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="form-select" hidden aria-label="Default select example" name="salaryStatus" id="inputGroupSelect01">
          <option value=" "><?php echo $lang['salaryType'] ?></option>
          <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
          <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
          <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
        </select>
        </div>



        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="location" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
          aria-describedby="emailHelp" name="description" placeholder="<?php echo $lang['jobDes'] ?>"></textarea>
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
      <div class="modal-header" style="background-color: Navy;" >
        <h6 class="modal-title" style="color: yellow;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h6>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <div class="pagetitle">
      <!-- <h5><?php echo $lang['tenderPost'] ?></h5> -->

    </div><!-- End Page Title -->
    <section class="section">
 

        <div id="vacancyBox" class="container">
        <form id="tenderForm"  method="POST" >
        <input hidden name="uid" value="<?php echo $_SESSION['userId']; ?>">

        <div class="form-group">
           <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
         </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['tenderType'] ?></label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="tenderType" placeholder="<?php echo $lang['tenderTypeW'] ?>">
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

        <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?></label>
        <div class="form-group">
           <input type="number" class="form-control" id="phoneNo" 
          aria-describedby="emailHelp" name="initialCost" placeholder="<?php echo $lang['enterPrice'] ?>">
         </div>

        <!-- phone number  -->
        <div class="form-group">
          <?php
          $s = 251;
          $phone = $_SESSION['phone'];
          if($phone[0] = 0){
            $phone = $s.$phone;
          }elseif($phone[0] == 2 && $phone[1] == 5 && $phone[2] == 1 ){
            $phone= $_SESSION['phone'];
          }else{
            $phone= $_SESSION['phone'];
          }
          ?>
                        <label for="exampleInputEmail1"> <?php echo $lang['phone'] ?> : </label>
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="" value="+<?php 
         echo  $phone?>">
        </div>

        <div  class="form-group" >
        <label for="exampleInputEmail1"><?php echo $lang['tenderLC'] ?></label>

        <select  class="form-select" aria-label="Default select example" name="location2" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
          aria-describedby="emailHelp" name="description2" placeholder="<?php echo $lang['Descriptionmore'] ?>"></textarea>
         </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?> [Optional] </label>
          <input type="file" class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['DescriptionPhoto'] ?></small>
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
      <h5 class="modal-title" style="color: green;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <!-- <h5><?php echo $lang['homeTutor'] ?></h5> -->

<form  method="POST" enctype="multipart/form-data">
<input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['fullName'] ?></label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
 </div>

<div class="input-group mb-3">
 
<select class="form-select" aria-label="Default select example" name="sex" id="inputGroupSelect01">
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
<select class="form-select" aria-label="Default select example" name="clientRange" id="inputGroupSelect01">
  <option value=" "><?php echo $lang['Range'] ?></option>
  <option value="1-8">1-8 <?php echo $lang['Grade'] ?></option>
  <option value="9-12">9-12 <?php echo $lang['Grade'] ?></option>
  <option value="9-10">9-10 <?php echo $lang['Grade'] ?></option>
  <option value="10-11">10-11 <?php echo $lang['Grade'] ?></option>
  <option value="11-12">11-12 <?php echo $lang['Grade'] ?></option>

</select>
</div>

<div class="input-group mb-3">
 
<select class="form-select" aria-label="Default select example" name="paymentStatus" id="inputGroupSelect01">
  <option selected><?php echo $lang['paymentStatus'] ?></option>
  <option value="Hourly"><?php echo $lang['Hourly'] ?></option>
  <option value="Dayly"><?php echo $lang['Dayly'] ?></option>
  <option value="Monthly"><?php echo $lang['Monthly'] ?></option>

</select>
</div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?>:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
 </div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['phone'] ?>:</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
 </div>

<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
  <h6 style="color: coral;" ><?php echo $lang['agentInfoQ'] ?></h6>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="companyInfo" placeholder="<?php echo $lang['agentInfo'] ?>"></textarea>
 </div>

<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['Description'] ?>   </label>
  <textarea type="text" class="form-control" id="des2" name="info" ></textarea>
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhotocv'] ?></small>
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
      <h6 class="modal-title" style="color: green;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h6>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
          <input hidden name="hotelOrHouse" value="HOUSE">
          <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['fullName'] ?></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
           </div>

          <div class="input-group mb-3">
 
        <select class="form-select" aria-label="Default select example" name="sex" id="inputGroupSelect01">
          <option selected><?php echo $lang['Gender'] ?></option>
          <option value="Male"><?php echo $lang['Male'] ?></option>
          <option value="Female"><?php echo $lang['Female'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="<?php echo $lang['Age'] ?>">
         </div>

 
        <div class="input-group mb-3">
        
        <select class="form-select" aria-label="Default select example" name="religion" id="inputGroupSelect01">
          <option selected><?php echo $lang['Religion'] ?></option>
          <option value="Orthodox"><?php echo $lang['Orthodox'] ?></option>
          <option value="Muslim"><?php echo $lang['Muslim'] ?></option>
          <option value="Protestant"><?php echo $lang['Protestant'] ?></option>
          <option value="Other"><?php echo $lang['Other'] ?></option>

        </select>
        </div>


        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
 
        <select class="form-select" aria-label="Default select example" name="workType" id="inputGroupSelect01">
          <option selected><?php echo $lang['workType'] ?></option>
          <option value="Half Day"><?php echo $lang['halfDay'] ?></option>
          <option value="Full Day"><?php echo $lang['fullDay'] ?></option>
          <option value="Monthly"><?php echo $lang['Monthly'] ?></option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"> <?php echo $lang['labelPrice'] ?>:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
         </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Experience'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="<?php echo $lang['Experience'] ?>"></textarea>
         </div>

        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['currentAddress2'] ?></label>
   
          <select  class="form-select" aria-label="Default select example" name="cAddress" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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





        <h6><?php echo $lang['bidingPersonQ'] ?></h6>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['yes'] ?></label>
        </div>
        <div class="form-check form-check-inline" style="margin-left: 10%;" >
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2"><?php echo $lang['no'] ?></label>
        </div>

        <br>
        <div class="form-group">
        <h6 style="color: coral;"> <?php echo $lang['agentInfoQ'] ?></h6>
           <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="<?php echo $lang['agentInfo'] ?>"></textarea>
         </div>

  

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhotocv'] ?></small>
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
      <h5 class="modal-title" style="color: green;" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
          <input hidden name="hotelOrHouse" value="HOTEL">
          <div class="form-group">
          <!-- <label for="exampleInputEmail1"><?php echo $lang['fullName'] ?></label> -->
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
           </div>

          <div class="input-group mb-3">
 
        <select class="form-select" aria-label="Default select example" name="sex" id="inputGroupSelect01">
          <option selected><?php echo $lang['Gender'] ?></option>
          <option value="Male"><?php echo $lang['Male'] ?></option>
          <option value="Female"><?php echo $lang['Female'] ?></option>
        </select>
        </div>

        <div class="form-group">
          <!-- <label for="exampleInputEmail1"><?php echo $lang['Age'] ?></label> -->
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="<?php echo $lang['Age'] ?>">
         </div>

        <div class="form-group">
          <!-- <label for="exampleInputEmail1"><?php echo $lang['Field'] ?></label> -->
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="field" placeholder="<?php echo $lang['Field'] ?>">
         </div>

        <div  class="form-group" >
        <label for="exampleInputEmail1"><?php echo $lang['currentAddress2'] ?></label>
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
 
        <select class="form-select" aria-label="Default select example" name="workType" id="inputGroupSelect01">
          <option selected><?php echo $lang['workType'] ?></option>
          <option value="Half Day"><?php echo $lang['halfDay'] ?></option>
          <option value="Full Day"><?php echo $lang['fullDay'] ?></option>
          <option value="Monthly"><?php echo $lang['Monthly'] ?></option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"> <?php echo $lang['Salary'] ?>:</label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Salary'] ?>">
         </div>

         <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Experience'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="<?php echo $lang['Experience'] ?>"></textarea>
         </div>


        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['currentAddress'] ?></label>
 
          <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="cAddress" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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





 


        <h6><?php echo $lang['bidingPersonQ'] ?></h6>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['yes'] ?></label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2"><?php echo $lang['no'] ?></label>
        </div>
 
        <div class="form-group">
         <h6 style="color: coral;" > <?php echo $lang['agentInfoQ'] ?></h6>

           <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="<?php echo $lang['agentInfo'] ?>"></textarea>
         </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file" required class="form-control" id="photo" name="photo"  >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhotocv'] ?></small>
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
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

          <div class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="name" placeholder="<?php echo $lang['fullName'] ?>">
           </div>

          <div class="input-group mb-3">
          
          <select class="form-select" aria-label="Default select example" name="sex" id="inputGroupSelect01">
            <option selected><?php echo $lang['Gender'] ?></option>
            <option value="Male"><?php echo $lang['Male'] ?></option>
            <option value="Female"><?php echo $lang['Female'] ?></option>
          </select>
          </div>

          <div class="form-group">
            <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="age" placeholder="<?php echo $lang['Age'] ?>">
         </div>

        <div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="address" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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
 
        <select class="form-select" aria-label="Default select example" name="workStat" id="inputGroupSelect01">
          <option selected><?php echo $lang['workPos'] ?></option>
          <option value="All"><?php echo $lang['all'] ?></option>
          <option value="Company"><?php echo $lang['Company'] ?></option>
          <option value="Full Day"><?php echo $lang['private'] ?></option>
          <option value="House"><?php echo $lang['House'] ?></option>
          <option value="Hotel"><?php echo $lang['Hotel'] ?></option>
          <option value="Banks"><?php echo $lang['Banks'] ?></option>

        </select>
        </div>

        <div class="form-group">
           <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="<?php echo $lang['phone'] ?>">
         </div>


         <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['Experience'] ?></label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="experience" placeholder="<?php echo $lang['Experience'] ?>"></textarea>
         </div>

         <div class="input-group mb-3">
 
        <select class="form-select" aria-label="Default select example" name="workType" id="inputGroupSelect01">
          <option selected><?php echo $lang['workHour'] ?></option>
          <option value="Half Day"><?php echo $lang['halfDay'] ?></option>
          <option value="Full Day"><?php echo $lang['fullDay'] ?></option>
          <option value="Monthly"><?php echo $lang['Monthly'] ?></option>

        </select>
        </div>

        <div class="form-group">
           <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Salary'] ?>">
         </div>



        <h6><?php echo $lang['weaponQ'] ?></h6>

<div class="form-check form-check-inline">
  <input class="form-check-input" required type="radio" name="legalWp" id="inlineRadio1" value="YES">
  <label class="form-check-label" for="inlineRadio1"><?php echo $lang['yes'] ?></label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" required type="radio" name="legalWp" id="inlineRadio2" value="NO">
  <label class="form-check-label" for="inlineRadio2"><?php echo $lang['no'] ?></label>
</div>

        <h6><?php echo $lang['bidingPersonQ'] ?></h6>

        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio1" value="YES">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['yes'] ?></label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" required type="radio" name="bidp" id="inlineRadio2" value="NO">
          <label class="form-check-label" for="inlineRadio2"><?php echo $lang['no'] ?></label>
        </div>

        <div class="form-group">
        <h6 style="color: coral;" > <?php echo $lang['agentInfoQ'] ?></h6>

          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="agentInfo" placeholder="<?php echo $lang['agentInfo'] ?>"></textarea>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhotocv'] ?></small>
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

///// real estate posting
if($_GET['type'] == 'real'){
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

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

          <?php
          if(isset($_GET['real']) && $_GET['real'] == 'realEstate'){
            ?>
            <!-- for rent or sell  -->
<div class="form-group">
          <label for="exampleInputEmail1" class="fs-6  " ><?php echo $lang['sellOrRent'] ?></label><br>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="forRentOrSell" value="For Rent">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forRent'] ?></label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input"  type="radio" name="forRentOrSell" id="fsell" value="For Sell">
          <label class="form-check-label" for="inlineRadio1"><?php echo $lang['forSell'] ?></label>
        </div>
        </div>
            <?php
          }
          
          ?>



          <!-- title -->
          <div class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="<?php echo $lang['title'] ?>">
          </div>

          <!-- company name -->
          <div class="form-group">
           <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="company" placeholder="<?php echo $lang['company'] ?>">
          </div>


          <script>


  // sub city filter api
  function hCity(x){
    // alert(x)
    $.ajax({
        url: 'user/userApi.php',
        type: 'post',
        data: {
          cityH: x
        },
        success: function(data){
          // alert(data)
          $('#subH').empty()
          $('#subH').append(data)
        }
      })
  }
</script>


<?php
    if(isset($_GET['real']) && $_GET['real'] == 'realEstate'){
      ?>
    
<script>
  $(document).ready(function(){
    $('#catRs').on('change', function(){
      if(this.value == "Industrial RS" || this.value == "Land For RS" || this.value == "Hotel and Lodging"){
        $('#rsFloor').hide()
      }else{
        $('#rsFloor').show()
      }
    })
  })
</script>

<!-- category  -->
<div  class="input-group mb-3">
 
 <select id="catRs" class="form-select" aria-label="Default select example" name="rsType" id="inputGroupSelect01">
   <option selected><?php echo $lang['CategoryReal'] ?></option>
   <option value="Commercial RS">Commercial RS</option>
   <option value="Hotel and Lodging">Hotel and Lodging</option>
   <option value="Industrial RS">Industrial RS</option>
   <option value="Land For RS">Land For RS</option>
   <option value="Mixed Use">Mixed Use</option>
   <option value="Office Space">Office Space</option>
   <option value="Residential Rs">Residential Rs</option>

 </select>
 </div> 
     <?php
    }
      ?>



<!--  city list -->

<div  class="input-group mb-3" >
        <select  class="form-select" aria-label="Default select example" name="city" onchange="hCity(this.value)" id="">
          <option><?php echo $lang['city'] ?></option>
          <?php 
              require_once '../php/fetchApi.php';
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

        <?php
        // subcity and kebele only for realestate filter block
        if(isset($_GET['real'])){
          if($_GET['real'] == 'realEstate'){
            ?>
            <!-- sub city list -->

        <div id="subH"   class="input-group mb-3" >
          <?php
        require_once '../php/fetchApi.php';
    $locc= allPostListerOn2Columen('adcategory', 'tableName', 'SUBCITY', 'subcityKey', 'Addis Ababa');
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
  }
    ?>
    </select>
        </div>

         
      <!-- kebele list -->
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="wereda"  id="inputGroupSelect01">
          <option ><?php echo $lang['Wereda'] ?></option>
          <?php 
             for($y=1;$y<=30;$y++){
               if($y <= 9 ){
                 ?>
                 <option value="<?php echo '0'.$y ?>"><?php echo '0'.$y ?></option>
                 <?php
               }else{
                ?>
                <option value="<?php echo $y ?>"><?php echo $y ?></option>
                <?php
               }

            }
          ?>
          

        </select>
        </div>

            <!-- area  -->
            <div class="form-group">
              <label for="exampleInputEmail1"><?php echo $lang['Area'] ?> : </label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="<?php echo $lang['Area'] ?>">
            </div>


            <!-- floor  -->
      <div id="rsFloor" class="form-group">
        <select class="form-select" aria-label="Default select example" name="floor"  id="inputGroupSelect01">
          <option ><?php echo $lang['floor'] ?></option>
          <option value="G"> Ground </option>
          <option value="1"> 1 <sup>st</sup> </option>
          <option value="2"> 2 <sup>nd</sup> </option>
          <option value="3"> 3 <sup>rd</sup> </option>
          <?php 
             for($y=4;$y<=20;$y++){
                ?>
                <option value="<?php echo $y ?>"><?php echo $y ?> <sup>th</sup></option>
                <?php
            

            }
          ?>
          

        </select>
        </div>

            <?php
          } 
        }

        ?>





        <!-- phone number  -->
        <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo $lang['phone'] ?> : </label>
           <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder=" " value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <!-- email  -->
        <div class="form-group">
          <label for="exampleInputEmail1"><?php echo $lang['email'] ?></label>
           <input type="email" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="email" placeholder="<?php echo $lang['emailex'] ?>">
        </div>


                
<!-- price  -->
<div class="form-group">
  <label for="exampleInputEmail1"><?php echo $lang['labelPrice'] ?> :</label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="price" placeholder="<?php echo $lang['Price'] ?>">
</div>




<!-- price type  -->
<div class="input-group mb-3">

<select class="form-select" aria-label="Default select example" name="fixidOrN" id="inputGroupSelect01">
  <option selected> <?php echo $lang['priceType'] ?></option>
  <option value="Fixed"><?php echo $lang['Fixed'] ?></option>
  <option value="Negotiatable"><?php echo $lang['Negotiatable'] ?></option>
  <option value="Negotiatable"><?php echo $lang['slightlyNegotiable'] ?></option>
</select>
</div>
        

 

        <div class="form-group">
        <h6 style="color: coral;" > <?php echo $lang['Description'] ?></h6>

          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="<?php echo $lang['Descriptionmore'] ?>"></textarea>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1"><?php echo $lang['up'] ?></label>
          <input type="file"  class="form-control" id="photo" name="photo[]"  multiple>
          <small id="emailHelp" class="form-text text-muted"><?php echo $lang['descriptionPhotocv'] ?></small>
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
  if(isset($_GET['type'])){
      if($_GET['type'] == 'blog'){


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

<form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">

          <div class="form-group">
          <label for="exampleInputEmail1">Front Label Of Blog</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="frontLabel" placeholder="Front Label here">
          <small id="emailHelp" class="form-text text-muted">This is the frontal name of the blog that people see to click on</small>
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Title Of Blog</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Title here">
          <small id="emailHelp" class="form-text text-muted">Title must be clear and simple</small>
          </div>







          <div class="form-group">
          <label for="exampleInputEmail1">Content of Blog.</label>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          <textarea type="text" class="form-control rounded-0" style="width:90%; height:800px;"  id="des2" 
           name="content" placeholder="Copy Paste or write your content here"></textarea>
        </div>


        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file"  class="form-control" id="photo" name="photo[]" multiple>
          <small id="emailHelp" class="form-text text-muted">photos that describe your blog post</small>
        </div>






          


          <input class="btn btn-dark" type="submit" onclick="x()" value="POST">
          <div id="alertVacancy"></div>
          </form>
  </div>
</div>
</div>

<?php


      }
  
 
}



?>


  </main><!-- End #main -->
 

     

</body>
<?php

include "../includes/adminFooter.php";
?>
</html>
