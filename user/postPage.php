
<script>
    
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
              $('#alertVacancy').delay(5200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          

    })
</script>

<?php
include "../includes/header.php";
require_once "../php/adminCrude.php";



if(isset($_GET['type'])){

    if($_GET['type'] == 'post'){
        ?>
        
        <!-- Modal -->
        <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""> </button>
      </div>
      <div id="realInput" class="modal-body">

        <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm" onclick="nav('house')">House </button></p></div>
       <div class="col"> <p><button type="button" class="btn btn-light btn-sm col">Real Estate </button></p></div>
        <div id="ts" class="col" onclick="nav('car')" ><p><button type="button" class="btn btn-light btn-sm" > car </button></p></div>
          </div>
        <hr>
        <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm">land</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm" >job vacancy</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm">electronics</button></p></div></div>
        <hr>

        <div class="row">
          <div class="col"><p><button type="button" class="btn btn-light btn-sm">product & service ads</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm">charity organization</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm">big discount sponsored</button></p></div>
        <div class="col"><p><button type="button" class="btn btn-light btn-sm">Cv for work and seeker</button></p></div>
        </div>
      </div>
    </div>
  </div>

        <?php
    }

    if($_GET['type'] == 'car' ){
        ?>




<script src="assets/jquery.js"  ></script>
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
        <h5 class="modal-title" id="exampleModalLabel">Uploadv</h5>
        <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
        <!-- <button id="cl" data-bs-dismiss="modal" >Close</button> -->
      </div>
            <div class="modal-body">
            <form action="postPage.php" method="POST" enctype="multipart/form-data" >
          <input hidden name="posterId2" value="<?php echo $uidx; ?>">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="nameTitle" 
              aria-describedby="emailHelp" name="title" placeholder="Company Name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

              <div id="typeC" class="input-group mb-3">
            <div  class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"> Car Type: </label>
            </div>
            <select id="sCar" class="custom-select" name="type2" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <?php
                $carCat = $admin->carCategoryLister();
                while($carCatRow = $carCat->fetch_assoc()){
                  ?>
                  <option value="<?php echo $carCatRow['category'] ?>"><?php echo $carCatRow['category'] ?></option>
                  <?php
                }
              ?>
              
            </select>
            </div>

            <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Status Of Car: </label>
        </div>
        <select class="custom-select" name="status2" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="NEW">New</option>
          <option value="OLD">Old</option>
        </select>
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

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Fule Kind: </label>
        </div>
        <select class="custom-select" name="fuleKind" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="Benzene">Benzene</option>
          <option value="Diesel">Diesel</option>
        </select>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01"> Transmission Type: </label>
        </div>
        <select class="custom-select" name="transmission" id="inputGroupSelect01">
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
          <label for="exampleInputEmail1">Price : </label>
          <input type="number" class="form-control" id="nameTitle" 
          aria-describedby="emailHelp" name="price2" placeholder="Company Name">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Describtion</label>
          <textarea type="text" class="form-control" id="des2" 
          aria-describedby="emailHelp" name="info2" placeholder="location"></textarea>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>



        <div class="row">
        <div id="registerBox">
        <label for="exampleInputEmail1">Upload Photos</label>
          <input type="file" class="form-control" id="photo" name="photo[]" multiple >
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <input type="submit" onclick="x()" value="POST">
        <div id="alertVacancy"></div>
          </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        
<!-- Modal HTML Markup -->
   
        <?php

    }



}

?>