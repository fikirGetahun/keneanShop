<?php
require_once "php/fetchApi.php";

if(isset($_POST['photoPath'], $_POST['tableName'], $_POST['pid'])){
    include "php/connect.php";
    require_once "php/adminCrude.php";
    // echo 'inphoto deleter';
    $pid = $_POST['pid'];
    $tn = $_POST['tableName'];


    if($tn == 'mambership'){
      $out = aSinglePostView($pid, 'mambership');
      $roww = $out->fetch_assoc();
    }


    $dbPath = null;

    $path = $roww['photoPath1'];
    $j=$_POST['photoPath']; // this is the choosen photo to be deleted. its set from the edit photo page somewhere
    $parr = explode(',', $path);
    $count = count($parr);
    // echo 'this count SSSSSS '.$count;
    $amount = 3;
    if($tn == 'blog'){
      $amount = 6;
    }
    if($count <=$amount){
    for($i=0;$i<$count;$i++ ){
      if($parr[$i] == $j){ // then if the list of the photo paths exploded to array matchs the selected or choosen photo to be deleted, then it goes throuh this if block then unsets it
          unlink($parr[$i]); //for deleteing the file //and the . is to execute directory changer like ../ 
          unset($parr[$i]); // unset the photo that is choosen to be deleted,
          $dbPath = implode(',', $parr); /// after unseted, then it implodes it back to string to update it to server.. since all photots are uploaded as string.
          break;
      }
    }
  }else{

  }
  
    

    // to delete the selected photo
   ////////////////////////////////////////////////////// 

    $q = "UPDATE `$tn` SET `photoPath1` = '$dbPath'  WHERE `$tn`.`id` = '$pid' ";
    $ask = $mysql->query($q);
    if(empty($dbPath)){ // if the user deletes all photos, there is no photos to impload. so this means user have to upload new set of photos, so when this  condition meet, then the api returns un input form back to the user to add new photo
      ?>
      <!-- <script>
        $(document).ready(function(){
          $('form').on('submit', function(e){
    e.preventDefault()
    $.ajax({
      url: 'membershipEdit.php',
      type: 'post',
      data:  new FormData( this ),
      success : function(data){
        $( 'form' ).each(function(){
              this.reset();
        });
        $('#alertVacancy').text('Edit SUCCESSFULL!  '+data)
        // $('#alertVacancy').delay(3200).fadeOut(300);
      },
      processData: false,
  contentType: false
    })
    
    return false;

})
        })
        
      </script> -->
      <form method="POST" enctype="multipart/form-data" >
        <!-- this is constatn valu that goes to the user with the form...  -->
        <input hidden name="pid" value="<?php echo $pid; ?>"> 
        <input hidden name="tName" value="<?php echo $tn; ?>">
        <!-- when user changes photo it sends request to the next api so that it updates the new photos  -->
      <div class="row">
      <div id="registerBox">
      <label for="exampleInputEmail1">Upload Photo  </label>
        <input type="file" class="form-control" id="photo" name="photo[]" multiple >
       </div>
      </div>

      <input type="submit" value="Change Photo">
    </form>
      <?php
    }
    // echo $dbPath;
    // echo 'uuu '.$parr[$index];
  }
?>