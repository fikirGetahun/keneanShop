<?php

require_once "../php/adminCrude.php";
require_once "../php/fetchApi.php";
require_once "../php/auth.php";





ob_start();
if(!isset($_SESSION)){
  session_start();
}

//to update the current page of memebers list
if(isset($_GET['cSession'])){
  $_SESSION['mbScroll'] =   $_SESSION['mbScroll'] + 2;
  // echo $_SESSION['mbScroll']; 
}

//// webad approver 
if(isset($_POST['webAdId'], $_POST['dis'])){
  $webAdId = $_POST['webAdId'];
  $webAdData = allPostListerOnColumen('webAd', 'id', $webAdId);
  $row = $webAdData->fetch_assoc();

  if($_POST['dis'] == 'approve'){

  

  if($row['position'] == 'Home'){
    $counter = allPostListerOn2Columen('webAd', 'position', 'Home', 'status', 'ACTIVE');
    if($counter->num_rows > 8){
      echo 'You CANT Post any more ads in this position';
    }else{
      $upd = updateOnColomen('webAd', 'status', 'ACTIVE', $webAdId);
      echo 'Disapprove';
    }
  }else  if($row['position'] == 'Post View'){
    $counter = allPostListerOn2Columen('webAd', 'position', 'Post View', 'status', 'ACTIVE');
    if($counter->num_rows > 5){
      echo 'You CANT Post any more ads in this position';
    }else{
      $upd = updateOnColomen('webAd', 'status', 'ACTIVE', $webAdId);
      echo 'Disapprove';
    }
  }elseif($row['position'] == 'Description View'){
    $counter = allPostListerOn2Columen('webAd', 'position', 'Description View', 'status', 'ACTIVE');
    if($counter->num_rows > 5){
      echo 'You CANT Post any more ads in this position';
    }else{
      $upd = updateOnColomen('webAd', 'status', 'ACTIVE', $webAdId);
      echo 'Disapprove';
    }
  }
}elseif($_POST['dis'] == 'disapprove'){
  $upd = updateOnColomen('webAd', 'status', 'DEL', $webAdId);
  echo 'Approve';
}
}


/// to update the current page of allusers
if(isset($_GET['allUser'])){
  $_SESSION['allUser'] =   $_SESSION['allUser'] + 10;
}


////////live post counter
if(isset($_POST['count'], $_POST['table'])){
  $table = $_POST['table'];
  if(isset($_POST['selecter'], $_POST['arg'])){
    $select = $_POST['selecter'];
    $arg = $_POST['arg'];
    $counter = allPostColumenView($select, $table, $arg);
  }else{
    $counter = allPostsLister($table);
  }

  $num = $counter->num_rows;

  if($num > 0){
    echo $num;
  }else{
    echo 'no data';
  }
 
 
}


//// view more system for admin
if(isset($_GET['adminPage'])){
  $_SESSION['adminPage']++;
  echo $_SESSION['adminPage'];
}



/// delete completely a user
if(isset($_GET['completeDel'], $_GET['uid'])){
  $user = $_GET['uid'];

  $dude = completeUserDelete($user);
  echo $dude;
  if($dude){
    echo 'User Deleted!';
  }else{
    
    echo 'ERROR';
  }
}




////////////////post deleter api//////////

if(isset($_POST['delete'],$_POST['table'], $_POST['postId'])){
  require_once "../php/auth.php";
  $tab = $_POST['table'];
  $pid = $_POST['postId'];
  $del = postDeleter($tab, $pid);

  if($del){
    echo 'post deleted';
  }else{
    echo 'error';
  }
}



// echo 'ya in api';

if(isset($_POST['titleElc'],
    $_POST['type'],
    $_POST['status'],
    $_POST['price'],
    $_POST['address'],
    $_POST['info'],
    $_POST['posterId'],
    $_POST['phone']
)){

    $title = $_POST['titleElc'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $info = $_POST['info'];
    $posterId = $_POST['posterId'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $size = " ";
    $processor = " ";
    $storage = " ";
    $core = " ";
    $ram = " ";





    if(isset($_POST['size'], $_POST['processor'], $_POST['core'], $_POST['storage'], $_POST['ram'])){
        $size = $_POST['size'];
        $processor = $_POST['processor'];
        $storage = $_POST['storage'];
        $core = $_POST['core'];
        $ram = $_POST['ram'];
    }


    


    $out = updateElectronicsPost($type, $status, $title, $address, $price,
    $info, $ram, $processor, $size, $storage, $core, $posterId, $phone);

    if($out){
      echo 'Saved Changes!';
    }else{
      echo 'Error';
    }

}
//vacancy edit handler
// echo 'inedit vac';

if(isset(
  $_POST['companyName'], $_POST['jobType'], 
  $_POST['jobTitle'], $_POST['positionType'],
  $_POST['Deadline'], $_POST['reqNo'], $_POST['location'], $_POST['appStart'],
  $_POST['description'],$_POST['pid'], $_POST['sex'], $_POST['phone'], $_POST['salary']
  )){
    $companyName = $_POST['companyName'];
    $jobType =$_POST['jobType'];
    $jobTitle=$_POST['jobTitle'];
    $positionType=$_POST['positionType'];
    $Deadline=$_POST['Deadline'];
    $reqNo=$_POST['reqNo'];
    $location=$_POST['location'];
    $info=$_POST['description']; 
    $id = $_POST['pid'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];
    $appStart = $_POST['appStart'];

    $ask = updateVacancyPost($phone, $jobType, $positionType, $companyName,
     $jobTitle, $location, $Deadline, $id , $reqNo, $info, $salary, $salaryStatus, $appStart  );

    if($ask){
      echo 'Edited Successfully';
    }
    else{
      echo 'errord'.$ask;
    }

  }

  //tender post data handler block
  if(isset($_POST['tenderType'],
   $_POST['startDate'],
    $_POST['Deadline2'],
     $_POST['initialCost'],
     $_POST['location2'],
     $_POST['description2'],$_POST['uid'], $_POST['title']
     )
     ){

      $tenderType = $_POST['tenderType'];
      $startingDate = $_POST['startDate'];
      $deadLine=$_POST['Deadline2'];
      $location=$_POST['location2'];
      $initialCost=$_POST['initialCost'];
      $info = $_POST['description2'];
      $id2 = $_POST['uid'];
      $title = $_POST['title'];

      $db = updateTenderLister($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2, $title   );

      if($db){
        echo 'Saved Changes!';
      }
      else{
        echo 'error';
      }

     }
// echo 'what';
     //ad post edit handler
     if(isset($_POST['type'], $_POST['price'], $_POST['address'], $_POST['phone'], $_POST['title'],
     $_POST['pid'], $_POST['info'],  $_POST['shipping'])){

      //  echo 'in the ad';

      $for = " ";

      if(isset($_POST['for'])){
        $for = $_POST['for']; 
      }

      $type = $_POST['type'];
      $price = $_POST['price'];
      $address =  $_POST['address'];
      $phone = $_POST['phone'];
      
      $title = $_POST['title'];
      $postId = $_POST['pid'];
      $info = $_POST['info'];

      if(isset($_FILES['photo1'])){
        $fName1 = $_FILES['photo1']['name'];
        $tmpName1 = $_FILES['photo1']['tmp_name'];
        $adPhotoE = adPhotoChange('photoPath1', $fName1, $tmpName1, $postId);
      }

      if(isset($_FILES['photo2'])){
        $fName2 = $_FILES['photo2']['name'];
        $tmpName2 = $_FILES['photo2']['tmp_name'];
        $adPhotoE = adPhotoChange('photoPath2', $fName2, $tmpName2, $postId);

      }

      if(isset($_FILES['photo3'])){
        $fName3 = $_FILES['photo3']['name'];
        $tmpName3 = $_FILES['photo3']['tmp_name'];
        $adPhotoE = adPhotoChange('photoPath3', $fName3, $tmpName3, $postId);

      }

      
      

      $adEdit = updateAdPost( $type, $price, $address, $phone, $for, $title, $info, $postId);
      if($adEdit){
        echo 'Saved Changes!';
      }
      else{
        echo 'error';
      }

    }


      //car post handler
      if(isset($_POST['type2'],$_POST['status2'],$_POST['forRentOrSell'],$_POST['fuleKind'],$_POST['fixidOrN'],$_POST['price2'],$_POST['info2'],$_POST['pid'],
       $_POST['title'], $_POST['address'],
       $_POST['transmission'], $_POST['bodyStatus'], $_POST['km'], $_POST['ownerBroker'])){
      echo 'inx';
      $title = $_POST['title'];
      $type = $_POST['type2'];
      $status = $_POST['status2'];
      $forRentOrSell= $_POST['forRentOrSell'];
      $fixidOrN= $_POST['fixidOrN'];
      $fuleKind = $_POST['fuleKind'];
      $price = $_POST['price2'];
      $info = $_POST['info2'];
      $postId = $_POST['pid'];
      $addrr = $_POST['address'];

      $transmission = $_POST['transmission'];
      $bodyStatus = $_POST['bodyStatus'];
      $km = $_POST['km'];
      $ob = $_POST['ownerBroker'];

      $rentStatus = ' ';
      $forWho = ' ';
      $whyRent = ' ';

      if(isset($_POST['rentStatus'], $_POST['forWho'], $_POST['whyRent'])){
        $rentStatus = $_POST['rentStatus'];
        $forWho = $_POST['forWho'];
        $whyRent = $_POST['whyRent'];
      }





      $out12 = updateCarPost($title,$type, $status, $fuleKind, $postId,
       $fixidOrN,$price,$info,$forRentOrSell, $transmission, $bodyStatus, $km, $ob, $rentStatus, $forWho, $whyRent, $addrr);

       if($out12){
        echo 'Saved Changes!';
      }
      else{
        echo 'error';
      }

    }


        //house or land post data inserter
        if(isset(
          $_POST['houseOrLand'], $_POST['city'],$_POST['subCity'], $_POST['wereda'],
           $_POST['forRentOrSell'], $_POST['area'], $_POST['cost'], $_POST['fixidOrN'], 
           $_POST['info'],$_POST['pid'], $_POST['title'], $_POST['ownerBroker'],$_POST['type']
        )){
          // echo 'inn house';

          // these variables will not be set if user choose house so initial value will be empty
          $bedRoomNo = ' ';
          $bathRoomNo = ' ';
          $type = $_POST['type'];
          $spArea = " ";
          if(isset(
            $_POST['bedRoomNo'],
            $_POST['bathRoomNo'],
            $_POST['spArea']
          )){
            $bedRoomNo = $_POST['bedRoomNo'];
            $bathRoomNo = $_POST['bathRoomNo'];
            $type = $_POST['type'];
            $spArea = $_POST['spArea'];
          }
          $title = $_POST['title'];
          $houseOrLand =$_POST['houseOrLand'];
          $city =$_POST['city'];
          $subCity=$_POST['subCity'];
          $wereda= $_POST['wereda'];
          $forRentOrSell=$_POST['forRentOrSell'];
          $area=$_POST['area'];
          $price=$_POST['cost'];
          $fixidOrN=$_POST['fixidOrN'];
          $info=$_POST['info'];
          $postId = $_POST['pid'];
          $ob = $_POST['ownerBroker'];


    
          
          $outH = updateHousePost($title, $type, $houseOrLand, $city, $subCity, $wereda,
          $forRentOrSell, $area, $bedRoomNo, $bathRoomNo, $price, $fixidOrN, $info, $postId, $ob, $spArea );
          
          if($outH){
            echo 'Saved Changes!';
          }
          else{
            echo 'error';
          }

        }

        //deleting photo api
        if(isset($_POST['photoPath'], $_POST['tableName'], $_POST['pid'])){
          include "../php/connect.php";
          require_once "../php/adminCrude.php";
          // echo 'inphoto deleter';
          $pid = $_POST['pid'];
          $tn = $_POST['tableName'];

          if($tn == 'housesell'){
            $out = singleHousePostLister($pid);
            $roww = $out->fetch_assoc();
          }
          
          if($tn == 'ad'){
            $out = adEditDataLister($pid);
            $roww = $out->fetch_assoc();
          }

          if($tn == 'electronics'){
            $out = elecSinglePostViewer($pid);
            $roww = $out->fetch_assoc();
          }

          if($tn == 'car'){
            $out = carPostDataLister($pid);
            $roww = $out->fetch_assoc();
          }

          if($tn == 'tender'){
            $out = tenderEditLister($pid);
            $roww = $out->fetch_assoc();
          }

          if($tn == 'charity'){
            $out = aSinglePostView($pid, 'charity');
            $roww = $out->fetch_assoc();
          }

          if($tn == 'jobhometutor'){
            $out = aSinglePostView($pid, 'jobhometutor');
            $roww = $out->fetch_assoc();
          }

          if($tn == 'hotelhouse'){
            $out = aSinglePostView($pid, 'hotelhouse');
            $roww = $out->fetch_assoc();
          }

          if($tn == 'zebegna'){
            $out = aSinglePostView($pid, 'zebegna');
            $roww = $out->fetch_assoc();
          }

          if($tn == 'blog'){
            $out = aSinglePostView($pid, 'blog');
            $roww = $out->fetch_assoc();
          }
          if($tn == 'realestate'){
            $out = aSinglePostView($pid, 'realestate');
            $roww = $out->fetch_assoc();
          }

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
                unlink('.'.$parr[$i]); //for deleteing the file //and the . is to execute directory changer like ../ 
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
            <script>
              $(document).ready(function(){
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
              $('#alertVacancy').text('Edit SUCCESSFULL!  '+data)
              // $('#alertVacancy').delay(3200).fadeOut(300);
            },
            processData: false,
        contentType: false
          })
          
          return false;

    })
              })
              
            </script>
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

///////////////////////////////////////////////////////////////////
// echo 'edit handler';  
        //input updated photos to database
        ///THE NEXT API
        if(isset($_FILES['photo'], $_POST['pid'], $_POST['tName'])){
          require_once "../php/adminCrude.php";
          // echo 'photo updater api';

          $p = $_FILES['photo'];
          $pid = $_POST['pid'];
          $tName = $_POST['tName'];
          $upd = photoUpdater($tName, $pid, $p);
          return $upd;
        }


//////////////////////////
//charity update api
if(isset($_POST['title'], $_POST['address'], $_POST['phone'], $_POST['info'], $_POST['posterId'])){
  require_once "../php/adminCrude.php";
  echo 'inzzdfa';
  $title = $_POST['title'];
  $loc = $_POST['address'];
  $phone = $_POST['phone'];
  $info = $_POST['info'];
  $pid = $_POST['posterId'];



  $db = charityUpdate($title, $info, $loc, $phone, $pid);
  if($db){
    echo 'Edit Successfull';
  }else{
    echo 'ERROR';
  }


}


///////////////////////////////////////
// home tutore edit handler api
if(isset(
  $_POST['name'], $_POST['sex'], 
  $_POST['eduBackground'], $_POST['clientRange'],
  $_POST['paymentStatus'],  $_POST['price'],
  $_POST['address'],  $_POST['companyInfo'],
  $_POST['info'], $_POST['phone'], $_POST['posterId'] 
)){

$pid = $_POST['posterId'];
$name =$_POST['name'];
$sex =  $_POST['sex'];
$edu = $_POST['eduBackground'];
$range = $_POST['clientRange'];
$payStatus = $_POST['paymentStatus'];
$price =  $_POST['price'];
$address = $_POST['address'];
$cinfo = $_POST['companyInfo'];
$info = $_POST['info'];
$phone = $_POST['phone'];

$out = homeTutoreUpdate($pid, $name, $sex, $edu, $range, $payStatus, $price, $address,
$phone, $cinfo, $info);

if($out){
  echo 'Saved Changes!';
}
else{
  echo 'error';
}


}

//edit hotel and house worker api
if(isset(
  $_POST['name'], $_POST['sex'], 
  $_POST['age'],$_POST['address'],$_POST['workType'],
  $_POST['price'], $_POST['experience'], $_POST['cAddress'],
  $_POST['bidp'], $_POST['agentInfo'],$_POST['postId'])){

$pid = $_POST['postId'];
$name =$_POST['name'];
$sex =  $_POST['sex'];
$price =  $_POST['price'];
$experience = $_POST['experience'];
$bid = $_POST['bidp'];
$address = $_POST['address'];
$age =  $_POST['age'];
$cAddress = $_POST['cAddress'];
$wType = $_POST['workType'];
$agentInfo = $_POST['agentInfo'];

$religion = " ";
$field = " ";

if(isset($_POST['religion'])){
  $religion = $_POST['religion'];
}
if(isset( $_POST['field'])){
  $field =  $_POST['field'] ;
}

$out = hotelHouseDataUpdater($name, $sex, $age, $religion, $field, $address, $wType,
$price, $experience, $bid, $cAddress, $agentInfo, $pid);

if($out){
  echo 'Edit Succesfull';
}else{
  echo 'error';
}
echo 'inhottellz';

}


///////////////////////////////////////////////////////////
//zebegna edit handler api
if(isset(
  $_POST['name'], $_POST['sex'], $_POST['age'],
   $_POST['address'], $_POST['workStat'], $_POST['phone'], $_POST['postId'], $_POST['experience'], $_POST['workType'], $_POST['price'], $_POST['bidp'], $_POST['legalWp'], $_POST['agentInfo'] 
)){

  $name =$_POST['name'];
  $sex=$_POST['sex'];
  $age=$_POST['age'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $pid = $_POST['postId'];
  $workStat=$_POST['workStat'];
  $exp = $_POST['experience'];
  $workType = $_POST['workType'];
  $bidp = $_POST['bidp'];
  $legalWp = $_POST['legalWp'];
  $agentInfo = $_POST['agentInfo'];
  

    $out = zebegnaPostUpdate($name, $sex, $age, $address, $phone, $workStat, $pid, $exp, $workType, $bidp, $legalWp, $agentInfo   );
    if($out){
      echo 'Saved Changes!';
    }else{
      echo 'Error on posting';
    }

  

}


////////////BLOG
if(isset($_POST['frontLabel'], $_POST['title'], $_POST['content'], $_POST['postId'])){
  $frontLabel = $_POST['frontLabel'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $postId = $_POST['postId']; 

  // $up = uploadPhotos('blog', $fileVar);

  $enter = blogUpdater($title, $frontLabel, $content, $postId);
  
  if($enter){
    echo 'Saved Changes';
  }else{
    echo 'Error';
  }

}

// echo 'in api is';


//// to accept and decline members in to the website
if(isset($_GET['accOrdec'], $_GET['pid'])){
  $accOrDec = $_GET['accOrdec'];
  $p = $_GET['pid'];
  if($accOrDec == 'accept'){
    $ass = updateOnColomen('mambership', 'approved', 'YES', $p);
    // echo $ass;
  }elseif($accOrDec == 'del' ){
    $dell = postDeleter('mambership', $p );
  }
}



//////////all sponcered post edit
if(isset($_POST['postId'], $_POST['title'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['price'], $_POST['fixidOrN'], $_POST['info'],$_POST['city'])){


  // $selectKey = $_POST['selectKey'];
  $posterId = $_POST['postId'];
  $title = $_POST['title'];
 $company = $_POST['company'];
 $phonem = $_POST['phone'];
$email = $_POST['email'];
$price = $_POST['price'];
$fixidOrN = $_POST['fixidOrN'];
$info = $_POST['info'];
// $fileVar = $_FILES['photo'];
$city = $_POST['city'];


  if(isset($_POST['forRentOrSell'], $_POST['wereda'], $_POST['floor'] , $_POST['area'])){
    echo 'realz';
    $forRentOrSell = $_POST['forRentOrSell'];
    $rsType= $_POST['rsType'];
   

    //so that there are cities which doesnot have subcity
    if(isset($_POST['subCity'])){
      $subCity = $_POST['subCity'];
    }
   
    $wereda = $_POST['wereda'];
    $floor = $_POST['floor'];
    $area = $_POST['area'];
  }else{
    echo 'else rel';
      // null data entery if real estate is not selected
  $forRentOrSell = " ";
  $rsType = " ";

  $subCity = " ";
  $wereda = 0;
  $floor = 0;
  $area = 0;
  }


  

    $enter = realestateUpdateReal($posterId,$rsType, $title, $company, $phonem, $city, $wereda, $floor, $forRentOrSell, $subCity, $area  , $email, $price, $fixidOrN, $info);
    if($enter){
      echo 'Posted Successfully.';
    }else{
      echo 'Error';
    }
  

}


?>