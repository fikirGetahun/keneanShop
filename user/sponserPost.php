
<?php

include "../includes/header.php";
include "../includes/lang.php";


///// real estate posting
if(isset($_GET['type'])&&$_GET['type'] == 'real'){
  ?>
  
  <script src="assets/jquery.js"  ></script>
<script>
  $(document).ready(function(){
  $('#cl').click(function(){
  location.reload();

  })

  $('sponser').on('submit', function(e){
          

          

    })

  })

  function spon(){
    alert('in the sponser ajax')
    // e.preventDefault()
    // location = './user/paymentPage.php?sub=true'
    $.ajax({
            url: 'paymentPage.php',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              // $('#alertVacancy').delay(5200).fadeOut(1000);
              // location.reload()
            },
            processData: false,
        contentType: false
          })
  }

$(document).ready(function(){
  $('#sponser').on('submit', function(){
    alert('in the sponser ajax')

    $.ajax({
            url: './user/paymentPage.php?sub=true',
            type: 'post',
            data:  new FormData( this ),
            success : function(data){
              $( 'form' ).each(function(){
                    this.reset();
              });
              $('#alertVacancy').text(data)
              $('.modal-dialog').load(data)
              // $('#alertVacancy').delay(5200).fadeOut(1000);
              // location.reload()
            },
            processData: false,
        contentType: false
          })
  })
})

</script>

<div  class="modal-dialog">
  <div  id="contSp"  class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['upload'] ?></h5>
      <button id="cl"   type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"> </button>
    </div>
          <div class="modal-body">

          <form id="sponser" action='./user/paymentPage.php?sub=true'  method="POST" enctype="multipart/form-data">
          <input hidden name="posterId" value="<?php echo $_SESSION['userId']; ?>">

          <?php
            // to set the selectKey to deside the post is realestate, bank or insurance post
            if(isset($_GET['real']) && $_GET['real'] == 'realEstate'){
              ?>
            <input hidden type="text" name="selectKey" value="rs">
              <?php
            }elseif(isset($_GET['real']) && $_GET['real'] == 'insurance'){ 
              ?>
            <input hidden type="text" name="selectKey" value="ins">
              <?php
            }elseif(isset($_GET['real']) && $_GET['real'] == 'bank'){
              ?>
            <input hidden type="text" name="selectKey" value="ban">
              <?php
            }
          
          
          ?>

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
                 $pre = 0;
                 ?>
                 <option value="<?php echo $pre.$y ?>"><?php echo '0'.$y ?></option>
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
?>