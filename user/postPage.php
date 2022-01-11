<!-- <!-- <script src="assets/jquery.js" ></script> -->
 -->
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

  if(data == 'Computer Laptop'){
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
session_start();

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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <h5>Car Ads Post</h5>
            <div id="carVl" class="modal-body">
            <form  method="POST" enctype="multipart/form-data" >
          <input hidden name="posterId2" value="<?php echo $_SESSION['userId'] ?>">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              
            </div>


        <div class="input-group mb-3">
        <select class="custom-select" name="forRentOrSell" id="forRentOrSell">
          <option selected>Rent or sell</option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>


        <div class="input-group mb-3">
            <div class="form-select" id="carShow" onclick="typeLoader('carType')" >Car Type</div>      
            <input id="carApi" name="type2" hidden value=" ">   
        </div>



            <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
            </div>



        <div  class="input-group mb-3" >
        <select  class="custom-select" name="rentStatus" id="rentS">
          <option value=" " >Rent Status</option>
          <option value="With Driver">With Driver</option>
          <option value="Car Only">Car Only</option>
        </select>
        </div>

        
        <div  class="input-group mb-3" >
        <select  class="custom-select" name="forWho" id="forWho">
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
          aria-describedby="emailHelp" name="whyRent" placeholder="Description"></textarea>
          <small id="emailHelp" class="form-text text-muted">Describe where you want to rent this car.</small>
        </div>



            <div class="input-group mb-3">
        <select class="custom-select" name="status2" id="inputGroupSelect01">
          <option >New or old</option>
          <option value="NEW">New</option>
          <option value="OLD">Old</option>
        </select>
        </div>
        
        <div class="input-group mb-3">
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option>Owner Or Broker</option>
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>



        <div class="input-group mb-3">
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected>fule Type</option>
          <option value="Benzene">Benzene</option>
          <option value="Diesel">Diesel</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
          <option selected>Transmission</option>
          <option value="automatic">Automatic</option>
          <option value="manual">Manual</option>
        </select>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Body Status :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bodyStatus" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
              <label for="exampleInputEmail1">Km Range :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="km" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected>Price type</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="Description"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
        <h5>Post Advertisment</h5>
        <form id="adPost" action="postPage.php"   method="POST" enctype="multipart/form-data">
        <input hidden name="posterId" value="<?php echo $_SESSION['userId']?>">
        <input hidden name="big" value="NOT">


        <div class="form-group">
          <label for="exampleInputEmail1">Title</Title></label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
  alert('change')
  if(this.value == "Cloth and Shoe"){
    $('#targetLoader').load('admin/divTags.php #targetFor')
  }else{
    $('#targetLoader').empty()
  }
 
})

$('#tCategory').on('change', function(){
  if(this.value == "OTHER"){
    $('#adTy').load('admin/divTags.php #otherAd')
  }
 
})



})

</script>

        <div class="input-group mb-3">
            <div class="form-select" id="adShow" onclick="typeLoader('adType')" >ADs Categrory</div>      
            <input id="adApi"  name="type" hidden value=" ">   

        </div>


        <div id="targetLoader">

        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Price :</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Offer Shipping</label>
        </div>
        <select class="custom-select" name="shipping" id="inputGroupSelect01">
          <option value="NO" selected>NO</option>
          <option value="YES">YES</option>

        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <h5>House Ad Post</h5>
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">    
             <input hidden name="houseOrLand" value="HOUSE">


        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <script src="../assets/jquery.js"></script>

        
<div id="houseTypeLoader"></div>

<div id="houseType" class="input-group mb-3">
  
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Type : </label>
        </div>
        <select class="custom-select" name="type" id="selHouseType">
          <option selected>Choose...</option>
<?php
    require_once "../php/adminCrude.php";
    $house = $admin->houseCategoryLister();
    while($houseRow = $house->fetch_assoc()){
      ?>
      <option value="<?php echo $houseRow['category'] ?>"><?php echo $houseRow['category'] ?></option>
      <?php
    }

?>
        </select>
</div>


            <div class="input-group mb-3">
                <div class="form-select" id="ADD" >City</div>      
                <input id="dbad" name="city" hidden value="Addis Ababa">   
            </div>
        <div class="input-group mb-3">
            <div class="form-select" id="jijiShow" onclick="typeLoader('jijiSub')" >Select Subcity</div>      
            <input id="jijiApi"  name="subCity" hidden value=" ">   

        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">

            </div>

            <div id="bedBath">
<div class="form-group">
              <label for="exampleInputEmail1">Number Of BedRoom :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bedRoomNo" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Bath Of BedRoom :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="bathRoomNo" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
</div>

            <div class="form-group">
              <label for="exampleInputEmail1">Price :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

      
        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <div class="modal-body">
      <h5>Land Ad Post</h5>
             <form id="car" action="postPage.php" method="POST" enctype="multipart/form-data" >
             <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">
             <input hidden name="houseOrLand" value="LAND">


        <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <script src="../assets/jquery.js"></script>

        
<div id="houseTypeLoader"></div>


<div id="subCityBox" class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select id="subCity" class="custom-select" name="type" id="inputGroupSelect01">
          <option value=" ">Land Type</option>
          <option value="women">Jemo</option>
          <option value="men">4 kilo</option>
          <option value="otherSubCity">Other</option>          
        </select>
        </div>


        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >City</div>      
                <input id="dbad" name="city" hidden value="Addis Ababa">   
            </div>



        <div class="input-group mb-3">
            <div class="form-select" id="jijiShow" onclick="typeLoader('jijiSub')" >Select Subcity</div>      
            <input id="jijiApi"  name="subCity" hidden value=" ">   

        </div>




        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Owner Or Broker: </label>
        </div>
        <select class="custom-select" name="ownerBroker" id="inputGroupSelect01">
          <option value="Owner">Owner</option>
          <option value="Broker">Broker</option>
        </select>
        </div>
        

             <div class="form-group">
              <label for="exampleInputEmail1">Wereda :</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="wereda" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> For Rent or Sell: </label>
        </div>
        <select class="custom-select" name="forRentOrSell" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="For Rent">For Rent</option>
          <option value="For Sell">For Sell</option>
        </select>
        </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Area :</Title></label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="area" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div id="bedOrBath">

            </div>



            <div class="form-group">
              <label for="exampleInputEmail1">Price :</label>
              <input type="number" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="cost" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>



        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fixed Or Negotiatable </label>
        </div>
        <select class="custom-select" name="fixidOrN" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

      
        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">


            <h5>Post Electronics Items</h5>
      <form  method="POST" enctype="multipart/form-data" >
      <input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

      <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="titleElc" placeholder="Title of Your Post">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <script>
$(document).ready(function(){
$('#sElc').on('change', function(){
  if(this.value == 'Computer Laptop'){
    $('#computer').load('admin/divTags.php #sizeInch,#proc,#storage,#core,#ram')
  }else{
    $('#computer').empty()
  }
})
})

</script>


        <div class="input-group mb-3">
            <div class="form-select" id="elecShow" onclick="typeLoader('elecType')" >Electronics Category</div>      
            <input id="elecApi"  name="type" hidden value=" ">   

        </div>



        <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01"> Status Of Item: </label>
    </div>
    <select class="custom-select" name="status" id="inputGroupSelect01">
      <option selected value="NEW">New</option>
      <option value="OLD">Old</option>
    </select>
    </div>



    <div id="computer"></div>

    <div class="form-group">
      <label for="exampleInputEmail1">Price : </label>
      <input type="number" class="form-control" id="nameTitle" 
      aria-describedby="emailHelp" name="price" placeholder="Price in Birr">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
    </div>




    <div class="form-group">
      <label for="exampleInputEmail1">Describtion</label>
      <textarea type="text" class="form-control" id="des2" 
      aria-describedby="emailHelp" name="info" placeholder="Detailed Info"></textarea>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
      <h5>Charity Ads Post</h5>
            <div class="modal-body">

            <form  method="POST" enctype="multipart/form-data">

<input hidden name="posterId" value="<?php echo $_SESSION['userId'] ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Charity Title</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="title" placeholder="Title">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
            </div>

<div class="form-group">
  <label for="exampleInputEmail1">Phone no:</label>
  <input type="text" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="Title">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="form-group">
<label for="exampleInputEmail1">Describtion</label>
<textarea type="text" class="form-control" id="des2" 
aria-describedby="emailHelp" name="info" placeholder="Detailed Info"></textarea>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="row">
    <div id="registerBox">
    <label for="exampleInputEmail1">Upload Photos</label>
      <input type="file" class="form-control" id="photo" name="photo[]" multiple >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <section class="section">
          <div class="pagetitle">
          <h5>Vacancy Post</h5>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Icons</li>
              <li class="breadcrumb-item active">Bootstrap</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <p>
        Here you have to fill the requiered fields inorder to post the Vacancy Application.
        </p>

        <div id="vacancyBox" class="container">
        <form id="vacancyForm" action="postPage.php"  method="POST" >
          <input hidden name="uid" value="<?php echo $_SESSION['userId'] ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Company Name</label>
          <input type="text" class="form-control" id="companyName" 
          aria-describedby="emailHelp" name="companyName" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <script>
            $(document).ready(function(){
              $('#jobTT').on('change', function(){
                if(this.value == 'OTHER'){
                  $('#jt').load('admin/divTags.php #jobType')
                }
                
              })
            })

          </script>


          <div class="input-group mb-3">
            <div class="form-select" id="vac11Show" onclick="typeLoader('vac11Type')" >Job Category</div>      
            <input id="vac11Api" name="jobType" hidden value=" ">   
        </div>




       
        <div class="form-group">
          <label for="exampleInputEmail1">Job Title</label>
          <input type="text" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="jobTitle" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Position Type</label>
        </div>
        <select class="custom-select" name="positionType" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Full Time">Full Time</option>
          <option value="Part Time">Part Time</option>
          <option value="Temporary">Temporary</option>
          <option value="Contractual">Contractual </option>
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
          aria-describedby="emailHelp" name="appStart" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deadline</label>
          <input type="date" class="form-control" id="Deadline" 
          aria-describedby="emailHelp" name="Deadline" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Requierd Position No</label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="reqNo" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="phone" placeholder="phone number">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Salary: </label>
          <input type="number" class="form-control" id="jobTitle" 
          aria-describedby="emailHelp" name="salary" placeholder="phone number">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" name="salaryStatus" id="inputGroupSelect01">
          <option value=" ">Salary Type</option>
          <option value="Fixed">Fixed</option>
          <option value="Negotiatable">Negotiatable</option>
          <option value="Negotiatable">Slightly Negotiable</option>
        </select>
        </div>



        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="location" hidden value="Addis Ababa">   
        </div>



        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" style="width: 100%; height: 80%;" id="des" 
          aria-describedby="emailHelp" name="description" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
          <input type="submit" value="POST">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        </form>
        </div>
        <div id="alertVacancy"></div>
      
      </section>

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
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
      </div>
            <div class="modal-body">

            <div class="pagetitle">
      <h5>Tender Post</h5>

    </div><!-- End Page Title -->
    <section class="section">
        <p>
        Here you have to fill the requiered fields inorder to post the Tender.
        </p>

        <div id="vacancyBox" class="container">
        <form id="tenderForm"  method="POST" >
        <input hidden name="uid" value="<?php echo $_SESSION['userId']; ?>">

        <div class="form-group">
          <label for="exampleInputEmail1">Tender Title</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="title" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tender Type</label>
          <input type="text" class="form-control" id="tenderType" 
          aria-describedby="emailHelp" name="tenderType" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Starting date</label>
          <input type="date" class="form-control" id="startingDate" 
          aria-describedby="emailHelp" name="startDate" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Deadline</label>
          <input type="date" class="form-control" id="Deadline2" 
          aria-describedby="emailHelp" name="Deadline2" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Initial Cost</label>
          <input type="number" class="form-control" id="phoneNo" 
          aria-describedby="emailHelp" name="initialCost" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="location2" hidden value="Addis Ababa">   
            </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="description2" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photo  [Optional] </label>
          <input type="file" class="form-control" id="photo" name="photo" >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
      <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5>Home Tutor Job Application</h5>

<form  method="POST" enctype="multipart/form-data">
<input hidden name="posterId" value="<?php echo $uidx; ?>">

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
  <label for="exampleInputEmail1">Educational Background:</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="eduBackground" placeholder="location"></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Range </label>
</div>
<select class="custom-select" name="clientRange" id="inputGroupSelect01">
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
  <option selected>Choose...</option>
  <option value="Horly">Hourly</option>
  <option value="Dayly">Dayly</option>
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
  <label for="exampleInputEmail1">Phone </label>
  <input type="number" class="form-control" id="nameTitle" 
  aria-describedby="emailHelp" name="phone" placeholder="Full Name">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="location" hidden value="Addis Ababa">   
            </div>

<div class="form-group">
  <h6>If you are representing  or if you are Agent, please fill the next form.</h6>
  <label for="exampleInputEmail1">Company Info</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="companyInfo" placeholder="location"></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Description About You</label>
  <textarea type="text" class="form-control" id="des2" 
  aria-describedby="emailHelp" name="info" placeholder="info"></textarea>
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="row">
<div id="registerBox">
<label for="exampleInputEmail1">Upload Photos</label>
  <input type="file" class="form-control" id="photo" name="photo" multiple >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
      <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5>House Keeper Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">
          <input hidden name="hotelOrHouse" value="HOUSE">
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
          <label for="exampleInputEmail1">Religion</label>
          <input type="text" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="religion" placeholder="Full Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
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
        <label for="exampleInputEmail1">Upload Photos</label>
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
      <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <h5>House Keeper Job Application</h5>
          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">
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

        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
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
        <label for="exampleInputEmail1">Upload Photos</label>
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
      <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $uidx; ?>">

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

        <div class="input-group mb-3">
                <div class="form-select" id="ADD" >Address</div>      
                <input id="dbad" name="address" hidden value="Addis Ababa">   
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
        <label for="exampleInputEmail1">Upload Photos</label>
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