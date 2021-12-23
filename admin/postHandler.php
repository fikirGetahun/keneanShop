<?php

require_once "../php/adminCrude.php";

if(isset($_POST['titleElc'],
    $_POST['type'],
    $_POST['status'],
    $_POST['price'],
    $_POST['address'],
    $_POST['info'],
    $_FILES['photo'],
    $_POST['posterId']
)){

    $title = $_POST['titleElc'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $info = $_POST['info'];
    $posterId = $_POST['posterId'];
    $address = $_POST['address'];

    $size = " ";
    $processor = " ";
    $storage = " ";
    $core = " ";
    $ram = " ";



    $fName1 = $_FILES['photo'];


    if(isset($_POST['size'], $_POST['processor'], $_POST['core'], $_POST['storage'], $_POST['ram'])){
        $size = $_POST['size'];
        $processor = $_POST['processor'];
        $storage = $_POST['storage'];
        $core = $_POST['core'];
        $ram = $_POST['ram'];
    }
    
    // $photo = $admin->electronicsPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3);

    $up = $admin->uploadPhotos('car', $fName1);

    if($up[1] == 'error'){
      echo $up[0];
    }else{
      $out = $admin->elecPostAdder($type, $status, $posterId, $title, $address, $price,
      $info, $up[0], $ram, $processor, $size, $storage, $core);
            
      echo 'Post Succesfully!';
    }




}

// vacancy post handler block
if(isset(
    $_POST['companyName'], $_POST['jobType'], 
    $_POST['jobTitle'], $_POST['positionType'],
    $_POST['Deadline'], $_POST['reqNo'], $_POST['location'],
    $_POST['description'],$_POST['uid'], $_POST['sex']
  )){
    $companyName = $_POST['companyName'];
    $jobType =$_POST['jobType'];
    $jobTitle=$_POST['jobTitle'];
    $positionType=$_POST['positionType'];
    $Deadline=$_POST['Deadline'];
    $reqNo=$_POST['reqNo'];
    $location=$_POST['location'];
    $info=$_POST['description']; 
    $id = $_POST['uid'];
    $sex = $_POST['sex'];


    $ask = $admin->addVacancyPost($jobType, $positionType, $companyName, $jobTitle, $location, $Deadline, $id , $reqNo, $info, $sex  );

  }

  //tender post data handler block
  elseif(isset($_POST['tenderType'],
   $_POST['startDate'],
    $_POST['Deadline2'],
     $_POST['initialCost'],
     $_POST['location2'],
     $_POST['description2'],$_POST['uid'], $_POST['title'], $_FILES['photo']
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
      $fileName1 = $_FILES['photo'];

      $up = $admin->uploadPhotos('tender', $fileName1);


      if($up[1] == 'error'){
        echo $up[0];
      }else{
        $db = $admin->addTenderPost($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2, $title, $up[0]   );
        echo 'Post Succesfully!';
      }

     }


    //car post handler
    if(isset($_POST['type2'],$_POST['status2'],$_POST['forRentOrSell'],$_POST['fuleKind'],$_POST['fixidOrN'],$_POST['price2'],$_POST['info2'],$_POST['posterId2'],
      $_FILES['photo'], $_POST['title'],
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

      $transmission = $_POST['transmission'];
      $bodyStatus = $_POST['bodyStatus'];
      $km = $_POST['km'];
      $ob = $_POST['ownerBroker'];

      $posterId = $_POST['posterId2'];
      $fName1 = $_FILES['photo'];

      $up = $admin->uploadPhotos('car', $fName1);

      if($up[1] == 'error'){
        echo $up[0];
      }else{
        $out12 = $admin->carPostAdder($title,$type, $status,
        $fuleKind, $posterId, $fixidOrN, $up[0],$price,$info,$forRentOrSell, $transmission, $bodyStatus, $km, $ob );
        
        echo 'Post Succesfully!';
      }



      // $carPhoto = $admin->carPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3 );


    }


     //ad post handler block
     if(isset($_POST['type'], $_POST['price'], $_POST['address'], $_POST['phone'], $_POST['title'],
     $_POST['posterId'], $_POST['info'], $_FILES['photo'], $_POST['shipping'])){
      $for = " ";
      if(isset($_POST['for'])){
        $for = $_POST['for'];
      }
      $ship = $_POST['shipping'];
      $type = $_POST['type'];
      $price = $_POST['price'];
      $address =  $_POST['address'];
      $phone = $_POST['phone'];
      $title = $_POST['title'];
      $posterId = $_POST['posterId'];
      $info = $_POST['info'];
      $fName1 = $_FILES['photo'];




      // $adOut = $admin->adPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3  );
      $up = $admin->uploadPhotos('ad', $fName1);

      if($up[1] == 'error'){
        echo $up[0];
      }else{
        $out7 = $admin->adPostPoster($type, $price, $address, $phone, $for, $title, $posterId, $info, $up[0], $ship);
        echo 'Post Succesfully!';
      }



    
    }

    //house or land post data inserter
    if(isset(
      $_POST['houseOrLand'], $_POST['city'],$_POST['subCity'], $_POST['wereda'],
       $_POST['forRentOrSell'], $_POST['area'], $_POST['cost'], $_POST['fixidOrN'], 
       $_POST['info'], $_FILES['photo'],$_POST['posterId'],
        $_POST['title'], $_POST['ownerBroker']
    )){
      echo 'inn house';

      // these variables will not be set if user choose house so initial value will be empty
      $bedRoomNo = ' ';
      $bathRoomNo = ' ';
      $type = " ";
      
      if(isset(
        $_POST['bedRoomNo'],
        $_POST['bathRoomNo'],
        $_POST['type']
      )){
        $bedRoomNo = $_POST['bedRoomNo'];
        $bathRoomNo = $_POST['bathRoomNo'];
        $type = $_POST['type'];
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
      $posterId = $_POST['posterId'];
      $fName1 = $_FILES['photo'];

      $ob = $_POST['ownerBroker'];

      $up = $admin->uploadPhotos('housesell', $fName1);

      if($up[1] == 'error'){
        echo $up[0];
      }else{
        $outH = $admin->addHouseOrLandPost($title, $type, $houseOrLand, $city, $subCity, $wereda,
        $forRentOrSell, $area, $bedRoomNo, $bathRoomNo, $price, $fixidOrN, $info,
         $posterId, $up[0], $ob );
        
         echo 'Post Succesfully!';
      }
      
      // $houseUpload = $admin->houseOrLandPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3);
      

      

    }

?>