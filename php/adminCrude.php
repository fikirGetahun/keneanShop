<?php
    class adminPhp{

        //insert vacancy post
        function addVacancyPost(  $type, $poitionType, $companyName, $positionTitle, $location, $deadLine, $posterId, $positionNum, $info, $sex   ){
            include("connect.php");
            $postStatus = 'ACTIVE';
            $today = date('Y-m-d H:i:s');
            $q = "INSERT INTO `vacancy`( `type`, `positionType`, `companyName`, `positionTitle`, `sex`, `location`, `deadLine`, `posterId`, `positionNum`, `info`, `postedDate`, `postStatus`) 
            VALUES ( '$type', ' $poitionType', '$companyName', '$positionTitle', '$sex', '$location', '$deadLine', '$posterId', '$positionNum', '$info', '$today', '$postStatus' )";

            $ask = $mysql->query($q);
        }

        //insert tender post
        function addTenderPost($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id, $title ){
            include('connect.php');
            $postStatus = 'ACTIVE';
            $date = date('Y-m-d H:i:s');
            $q = "INSERT INTO `tender`( `title`,`tenderType`, `startingDate`, `deadLine`, `location`, `initialCost`, `info`, `posterId`, `postedDate`, `postStatus`)
             VALUES ( '$title' ,'$tenderType', '$startingDate', '$deadLine', '$location', '$initialCost', '$info ', '$id', '$date', '$postStatus' )";

             $ask = $mysql->query($q);

        }

        //edit vacancy post placeholder method
        function editVacancyPost($postId){
            include "connect.php";
            $q = "SELECT * FROM `vacancy` WHERE `id` LIKE '$postId' ";

            $ask = $mysql->query($q);
            return $ask;
        }

        //vacancy post lister
        function vacancyPostLister(){
            include "connect.php";
            $q = "SELECT * FROM `vacancy` WHERE 1";
            $ask = $mysql->query($q);
            return $ask;
        }

        //vacancy post counter shower
        function vacancyPostCounter(){
            include "connect.php";
            $q = "SELECT * FROM `vacancy` WHERE 1";
            $ask = $mysql->query($q);

            return $ask;
        }

        //tender post counter shower
        function tenderPostCounter(){
            include "connect.php";
            $q = "SELECT * FROM `tender` WHERE 1";
            $ask = $mysql->query($q);

            return $ask;
        }

        //vacancy edit
        function updateVacancyPost($jobType, $positionType, $companyName, $jobTitle, $location, $Deadline, $id , $reqNo, $info){
            include "connect.php";
            $date = date('Y-m-d H:i:s');
            $edited = 'YES';
            $q = "UPDATE `vacancy` SET 
          `type`='$jobType',`positionType`='$positionType',
            `companyName`='$companyName',`positionTitle`='$jobTitle',
            `location`='$location',`deadLine`='$Deadline',
            `positionNum`='$reqNo',`info`='$info',`postedDate`= '$date', `edited` = '$edited' WHERE `vacancy`.`id` = '$id'";

            $ask = $mysql->query($q);
        }

        //tender post editor lister placeholder method
        function tenderEditLister($postId){
            include "connect.php";
            $q = "SELECT * FROM `tender` WHERE `id` LIKE '$postId' ";

            $ask = $mysql->query($q);
            return $ask;
        }

        // TENDER POST DATA EDITOR
        function updateTenderLister($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2, $title  ){
            include "connect.php";
            $date = date('Y-m-d H:i:s');
            $edited = 'YES';
            $q = "UPDATE `tender` SET `tenderType`='$tenderType',
            `startingDate`='$startingDate',`deadLine`='$deadLine',`location`='$location',
            `initialCost`='$initialCost',`info`='$info',`postedDate`='$date', `title`= '$title', `edited` = '$edited' WHERE `tender`.`id` = '$id2' ";

            $ask = $mysql->query($q);
        }


        //USER ADDER AS 'ADMIN' OR 'EDITOR'
        function userAdder($firstName, $lastName, $phone, $username, $password, $auth, $photoPath, $job, $about){
            include "connect.php";
            $date = date('Y-m-d H:i:s');
            $q ="INSERT INTO `user`( `username`, `password`, `firstName`, `lastName`, `phone`, `auth`,`photoPath`,`lastLogedIn` , `job`, `about`)
             VALUES ('$username', '$password', '$firstName', '$lastName', '$phone', '$auth', '$photoPath', '$date', '$job', '$about' )";

             $ask = $mysql->query($q);

        }

        //user auth identifier
        function userDataShower($uid){
            include "connect.php";
            $q = "SELECT * FROM `user` WHERE `id` = '$uid'";

            $ask = $mysql->query($q);
            return $ask;
        }

        //user number count
        function userNumber($auth){
            include "connect.php";
            $q = "SELECT * FROM `user` WHERE `auth` = '$auth'";

            $ask = $mysql->query($q);

            return $ask;
        }

        //to upload profile photo of user
        function uploadPhoto($fileName, $tempName){
            include "connect.php";
            //to count the files uloaded so that to attach the filename.numberofphoto
            $q = "SELECT * FROM `user` WHERE 1";
            $ask = $mysql->query($q);
            $num = $ask->num_rows;
            $location = "../uploads/adminPhoto/";

            if(move_uploaded_file($tempName, $location.$num.$fileName)){
                echo $location.$fileName.$num;
                return $location.$num.$fileName;
            }else{
                return 'FILE_NOT_UPLOADED';
            }
        }

        //update users data
        function updateUserData($uid, $password, $firstName, $lastName, $phone, $about, $job){
            include "connect.php";
            $q = "UPDATE `user` SET `password`= '$password',`firstName`= '$firstName',
            `lastName`= '$lastName' ,`phone`= '$phone',`about`= '$about' ,`job`= '$job'  WHERE `user`.`id` = '$uid'";

            $ask = $mysql->query($q);
            if($ask){

            }else{
                echo "not workinggg";
            }
        }

        //update userphoto path and file
        function updateUserPhoto($fileName, $tempName, $uid){
            include "connect.php";
            $location = "../uploads/adminPhoto/";
            $x = rand(2, 20000);
            $path = $location.'a'.$x.$fileName;
            move_uploaded_file($tempName, $path);
            $q = "UPDATE `user` SET `photoPath`= '$path' WHERE `user`.`id` = '$uid'";
            $ask = $mysql->query($q);

            return $path;
        }


        // ad post data inserting function
        function adPostPoster($type, $price, $address, $phone, $for, $title, $posterId, $info, $photoPath1, $photoPath2, $photoPath3, $ship){
            include "connect.php";
            $postStatus = 'ACTIVE';
            $q = "INSERT INTO `ad`( `type`, `price`, `address`, `phone`, `for`,
             `title`, `posterId`, `info`, `photoPath1`, `photoPath2`, `photoPath3`, `postStatus`, `shipping`)
             VALUES ('$type', '$price', '$address', '$phone', '$for', '$title', '$posterId', '$info', '$photoPath1', '$photoPath2', '$photoPath3', '$postStatus', '$ship')";
            
            $ask = $mysql->query($q);
        }


        //ad photos uploader
        function adPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3){
            include "connect.php";
            $location = "../uploads/adPostsPhoto/";
            $random = rand(1000, 100000);
            $path1 = $location.'ad'.$random.$fName1;
            $path2 = $location.'ad'.$random.$fName2;
            $path3 = $location.'ad'.$random.$fName3;

            $path = array(' ', ' ', ' ');

            if($fName1 != '' || $fName2 != '' || $fName3 != ''){

                if(move_uploaded_file($tmpName1, $path1)){
                    $path[0] = $path1;
                }
                    if(move_uploaded_file($tmpName2, $path2)) {
                        $path[1] = $path2;
                    }
                        if(move_uploaded_file($tmpName3, $path3)){
                            $path[2] = $path3;
                            
                        }

            }

            return $path;
 
            
        }

            //ad posts data shower and counter

        function postAdShower(){
            include "connect.php";
            $q = "SELECT * FROM `ad` WHERE 1";

            $ask = $mysql->query($q);
            return $ask;
        }


        // ads category adder
        function adsCategoryAdder($data){
            include "connect.php";
            $q = "INSERT INTO `adCategory`( `category`) VALUES ('$data')";

            $ask = $mysql->query($q);
        } 

        //ads category lister
        function adsCategoryLister(){
            include "connect.php";
            $q = "SELECT * FROM `adCategory` WHERE 1";

            $ask = $mysql->query($q);

            return $ask;
        }

        //update ads category
        function updateAdCat($cat, $id){
            include "connect.php";
            $q ="UPDATE `adcategory` SET `category` = '$cat' WHERE `adCategory`.`id` = '$id' ";

            $ask = $mysql->query($q);
            
        }


        //car post data inserter
        function carPostAdder($title, $type, $status, $fuleKind, $posterId, $fixedOrN, $photoPath1, $photoPath2, $photoPath3,$price,$info,$forRentOrSell ){
            include "connect.php";
            $postDate = date('Y-m-d H:i:s');
            $postStatus = 'ACTIVE';
            $q ="INSERT INTO `car`( `title`,`type`, `status`, `fuleKind`, `posterId`, `fixidOrN`,
             `photoPath1`, `photoPath2`, `photoPath3`, `price`, `info`, `forRentOrSell`, `postStatus`, `postedDate`)
             VALUES ( '$title','$type', '$status', '$fuleKind', '$posterId', '$fixedOrN', '$photoPath1', '$photoPath2', '$photoPath3','$price','$info','$forRentOrSell', '$postStatus', '$postDate' )";

            $ask = $mysql->query($q);

            
            
        }

        //car photo uploader
        function carPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3){
            include "connect.php";
            $location = "../uploads/carPostsPhoto/";
            $random = rand(1000, 100000);
            $path1 = $location.'ad'.$random.$fName1;
            $path2 = $location.'ad'.$random.$fName2;
            $path3 = $location.'ad'.$random.$fName3;

            $path = array(' ', ' ', ' ');

            if($fName1 != '' || $fName2 != '' || $fName3 != ''){

                if(move_uploaded_file($tmpName1, $path1)){
                    $path[0] = $path1;
                }
                    if(move_uploaded_file($tmpName2, $path2)) {
                        $path[1] = $path2;
                    }
                        if(move_uploaded_file($tmpName3, $path3)){
                            $path[2] = $path3;
                            
                        }

            }

            return $path;
 
                
        }



        //house or land selles data adder block
        function addHouseOrLandPost($title,$type,$houseOrLand, $city, $subCity, $wereda,
        $forRentOrSell, $area, $bedRoomNo, $bathRoomNo, $price, $fixidOrN, $info, $posterId, $fName1, $fName2, $fName3){
            include "connect.php";
            $postDate = date('Y-m-d H:i:s');
            $postStatus = 'ACTIVE';
            $q = "INSERT INTO `housesell`(`title`,`type`, `houseOrLand`, `city`, `subCity`, `wereda`, `area`,
             `bedRoomNo`, `bathRoomNo`, `cost`, `fixedOrN`, `forRentOrSell`, `info`, `posterId`,
              `photoPath1`, `photoPath2`, `photoPath3`, `postedDate`, `postStatus`)
             VALUES ('$title','$type','$houseOrLand', '$city', '$subCity', '$wereda',
        '$forRentOrSell', '$area', '$bedRoomNo', '$bathRoomNo', '$price', '$fixidOrN', 
        '$info', '$posterId', '$fName1', '$fName2', '$fName3', '$postDate', '$postStatus')";

        $ask = $mysql->query($q);
            
        }


        //house and land photo uploader
        function houseOrLandPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3){
            include "connect.php";
            $location = "../uploads/houseOrLandPhotos/";
            $random = rand(1000, 100000);
            $path1 = $location.'ad'.$random.$fName1;
            $path2 = $location.'ad'.$random.$fName2;
            $path3 = $location.'ad'.$random.$fName3;

            $path = array(' ', ' ', ' ');

            if($fName1 != '' || $fName2 != '' || $fName3 != ''){

                if(move_uploaded_file($tmpName1, $path1)){
                    $path[0] = $path1;
                }
                    if(move_uploaded_file($tmpName2, $path2)) {
                        $path[1] = $path2;
                    }
                        if(move_uploaded_file($tmpName3, $path3)){
                            $path[2] = $path3;
                            
                        }

            }

            return $path;
 
                
        }

        //cars post viewer
        function carPostLister(){
            include "connect.php";
            $q = "SELECT * FROM `car` WHERE 1 ";
            $ask = $mysql->query($q);

            return $ask;
        }

        //house post viewer
        function houseOrLandPostLister(){
            include "connect.php";
            $q = "SELECT * FROM `housesell` WHERE 1 ";
            $ask = $mysql->query($q);

            return $ask;
        }

        //ad edit data lister
        function adEditDataLister($pid){
            include "connect.php";
            $q = "SELECT * FROM `ad` WHERE `id` = '$pid' ";

            $ask = $mysql->query($q);
            return $ask;

        }

        //ad update
        function updateAdPost($type, $price, $address, $phone, $for, $title, $info, $postId){
            include "connect.php";
            $edited = 'YES';
            $q = "UPDATE `ad` SET `type` = '$type',`price`= '$price',`address`= '$address' ,
            `phone` = '$phone',`for`= '$for',`title`= '$title',`info`= '$info', `edited` = '$edited' WHERE `ad`.`id` = '$postId' ";

            $ask = $mysql->query($q);


        }

        //ad photo change
        function adPhotoChange($dbPath, $fName, $tmpName, $pid ){
            include "connect.php";
            $location = "../uploads/adPostsPhoto/";
            $random = rand(1000, 100000);
            $path = $location.'ad'.$random.$fName;

            if(move_uploaded_file($tmpName, $path)){
                $q = "UPDATE `ad` SET `$dbPath`='$path' WHERE `ad`.`id` = '$pid'";
                $ask = $mysql->query($q);
            }
            

           
        }


        //a single car post data lister
        function carPostDataLister($pid){
            include "connect.php";
            $q = "SELECT * FROM `car` WHERE `id` = '$pid'";
            $ask = $mysql->query($q);

            return $ask;
        }

        //car post data edit/update
        function updateCarPost($title,$type, $status, $fuleKind, $postId, $fixidOrN,$price,$info,$forRentOrSell){
            include "connect.php";
            $q = "UPDATE `car` SET `title`= '$title',`type`='$type', `status` = '$status',
             `fuleKind`= '$fuleKind',`fixidOrN`= '$fixidOrN' ,`price`= '$price',`info`= '$info',
             `forRentOrSell`= '$forRentOrSell' WHERE `car`.`id` = '$postId'";

             $ask = $mysql->query($q);
        }


        //car post photo change
        function carPhotoChange($dbPath, $fName, $tmpName, $pid ){
            include "connect.php";
            $location = "../uploads/carPostsPhoto/";
            $random = rand(1000, 100000);
            $path = $location.'ad'.$random.$fName;

            if(move_uploaded_file($tmpName, $path)){
                $q = "UPDATE `car` SET `$dbPath`='$path' WHERE `car`.`id` = '$pid'";
                $ask = $mysql->query($q);
            }
            
        }

        //house update block
        function updateHousePost($title, $type, $houseOrLand, $city, $subCity, $wereda,
        $forRentOrSell, $area, $bedRoomNo, $bathRoomNo, $price, $fixidOrN, $info, $postId ){
            include "connect.php";
            $edited = 'YES';
            $postDate = date('Y-m-d H:i:s');
            $q = "UPDATE `housesell` SET `title`= '$title',`type`= '$type',`houseOrLand`= '$houseOrLand',
            `city`= '$city' ,`subCity`= '$subCity',`wereda`= '$wereda',`area`= '$area',
            `bedRoomNo`= '$bedRoomNo',`bathRoomNo`= '$bathRoomNo',`cost`= '$price',`fixedOrN`= '$fixidOrN',
            `forRentOrSell`= '$forRentOrSell',`info`= '$info',`postedDate`='$postDate', `edited` = '$edited'  WHERE `housesell`.`id` = '$postId'";

            $ask = $mysql->query($q);

        }

        //house photo changer
        function housePhotoChange($dbPath, $fName, $tmpName, $pid ){
            include "connect.php";
            $location = "../uploads/houseOrLandPhotos/";
            $random = rand(1000, 100000);
            $path = $location.'ad'.$random.$fName;

            if(move_uploaded_file($tmpName, $path)){
                $q = "UPDATE `housesell` SET `$dbPath`='$path' WHERE `housesell`.`id` = '$pid'";
                $ask = $mysql->query($q);
            }
            
        }

        //a single house post lister
        function singleHousePostLister($pid){
            include "connect.php";
            $q = "SELECT * FROM `housesell` WHERE `id` = '$pid'";

            $ask = $mysql->query($q);
            return $ask;
        }

        //car catagory inserter
        function carCategoryAdder($cat){
            include "connect.php";
            $q = "INSERT INTO `carcategory`(`category`) VALUES ('$cat')";
            $ask = $mysql->query($q);

        }

        //car catagory list
        function carCategoryLister(){
            include "connect.php";
            $q = "SELECT * FROM `carcategory` WHERE 1";

            
            $ask = $mysql->query($q);
            return $ask;
        }

        //car catagory edit
        function carCategoryEdit($id, $data){
            include "connect.php";
            $q =" UPDATE `carcategory` SET `category`= '$data' WHERE `carcategory`.`id` = '$id'";
            $ask = $mysql->query($q);
        }

                //vacancy catagory inserter
                function vacancyCategoryAdder($cat){
                    include "connect.php";
                    $q = "INSERT INTO `vacancycategory`(`category`) VALUES ('$cat')";
                    $ask = $mysql->query($q);
        
                }

                //vacancy catagory list
                function vacancyCategoryLister(){
                    include "connect.php";
                    $q = "SELECT * FROM `vacancycategory` WHERE 1";
        
                    
                    $ask = $mysql->query($q);
                    return $ask;
                }
        
                //vacancy catagory edit
                function vacancyCategoryEdit($id, $data){
                    include "connect.php";
                    $q =" UPDATE `vacancycategory` SET `category`= '$data' WHERE `vacancycategory`.`id` = '$id'";
                    $ask = $mysql->query($q);
                }

                        //house catagory inserter
        function houseCategoryAdder($cat){
            include "connect.php";
            $q = "INSERT INTO `housecategory`(`category`) VALUES ('$cat')";
            $ask = $mysql->query($q);

        }

                        //house catagory list
        function houseCategoryLister(){
            include "connect.php";
            $q = "SELECT * FROM `housecategory` WHERE 1";

            
            $ask = $mysql->query($q);
            return $ask;
        }

        //house catagory edit
        function houseCategoryEdit($id, $data){
            include "connect.php";
            $q =" UPDATE `housecategory` SET `category`= '$data' WHERE `housecategory`.`id` = '$id'";
            $ask = $mysql->query($q);
        }

        //ad category delete
        function adCategoryDelete($id){
            include "connect.php";
            $q = "DELETE FROM `adcategory` WHERE `id` = '$id'";
            $ask = $mysql->query($q);
        }

        //vacancy category delete
        function vacancyCategoryDelete($id){
            include "connect.php";
            $q = "DELETE FROM `vacancycategory` WHERE `id` = '$id'";
            $ask = $mysql->query($q);
        }

        //car category delete
        function carCategoryDelete($id){
            include "connect.php";
            $q = "DELETE FROM `carcategory` WHERE `id` = '$id'";
            $ask = $mysql->query($q);
        }

        //house category delete
        function houseCategoryDelete($id){
            include "connect.php";
            $q = "DELETE FROM `housecategory` WHERE `id` = '$id'";
            $ask = $mysql->query($q);
        }

        //ad post status changer
        function adPostStatus($pid){
            include "connect.php";
            $q = "UPDATE `ad` SET `postStatus` = 'SOLD'  WHERE `ad`.`id` = '$pid' ";
            $ask = $mysql->query($q);

        }

        //ad post deleter
        function adPostDelete($pid){
            include "connect.php";
            $q = "DELETE FROM `ad` WHERE `id` = '$pid'";
            $ask = $mysql->query($q);
        }

        //car post status changer
        function carPostStatus($pid){
            include "connect.php";
            $q = "UPDATE `car` SET `postStatus` = 'SOLD'  WHERE `car`.`id` = '$pid' ";
            $ask = $mysql->query($q);

        }

        //car post delter
        function carPostDelete($pid){
            include "connect.php";
            $q = "DELETE FROM `car` WHERE `id` = '$pid'";
            $ask = $mysql->query($q);
        }


                //house post status changer
        function housePostStatus($pid){
            include "connect.php";
            $q = "UPDATE `housesell` SET `postStatus` = 'SOLD'  WHERE `housesell`.`id` = '$pid' ";
            $ask = $mysql->query($q);

        }

        //car post delter
        function housePostDelete($pid){
            include "connect.php";
            $q = "DELETE FROM `housesell` WHERE `id` = '$pid'";
            $ask = $mysql->query($q);
        }

    }



    

    $admin = new adminPhp;

?>