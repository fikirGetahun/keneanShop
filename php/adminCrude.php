<?php
    class adminPhp{

        //insert vacancy post
        function addVacancyPost(  $type, $poitionType, $companyName, $positionTitle, $location, $deadLine, $posterId, $positionNum, $info   ){
            include("connect.php");
            $today = date("Y/m/d");
            $q = "INSERT INTO `vacancy`( `type`, `positionType`, `companyName`, `positionTitle`, `location`, `deadLine`, `posterId`, `positionNum`, `info`, `postedDate`) 
            VALUES ( '$type', ' $poitionType', '$companyName', '$positionTitle', '$location', '$deadLine', '$posterId', '$positionNum', '$info', '$today' )";

            $ask = $mysql->query($q);
        }

        //insert tender post
        function addTenderPost($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id, $title ){
            include('connect.php');
            $today = date("Y/m/d");
            $q = "INSERT INTO `tender`( `title`,`tenderType`, `startingDate`, `deadLine`, `location`, `initialCost`, `info`, `posterId`, `postedDate`)
             VALUES ( '$title' ,'$tenderType', '$startingDate', '$deadLine', '$location', '$initialCost', '$info ', '$id', '$date' )";

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
            $date = date('Y/m/d');
            $q = "UPDATE `vacancy` SET 
          `type`='$jobType',`positionType`='$positionType',
            `companyName`='$companyName',`positionTitle`='$jobTitle',
            `location`='$location',`deadLine`='$Deadline',
            `positionNum`='$reqNo',`info`='$info',`postedDate`= '$date' WHERE `vacancy`.`id` = '$id'";

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
            $date = date('Y/m/d');
            $q = "UPDATE `tender` SET `tenderType`='$tenderType',
            `startingDate`='$startingDate',`deadLine`='$deadLine',`location`='$location',
            `initialCost`='$initialCost',`info`='$info',`postedDate`='$date', `title`= '$title' WHERE `tender`.`id` = '$id2' ";

            $ask = $mysql->query($q);
        }


        //USER ADDER AS 'ADMIN' OR 'EDITOR'
        function userAdder($firstName, $lastName, $phone, $username, $password, $auth, $photoPath, $job, $about){
            include "connect.php";
            $date = date('Y/m/d');
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
        function adPostPoster($type, $price, $address, $phone, $for, $title, $posterId, $info, $photoPath1, $photoPath2, $photoPath3){
            include "connect.php";
            $postStatus = 'ACTIVE';
            $q = "INSERT INTO `electronics`( `type`, `price`, `address`, `phone`, `for`,
             `title`, `posterId`, `info`, `photoPath1`, `photoPath2`, `photoPath3`, `postStatus`)
             VALUES ('$type', '$price', '$address', '$phone', '$for', '$title', '$posterId', '$info', '$photoPath1', '$photoPath2', '$photoPath3', '$postStatus')";
            
            $ask = $mysql->query($q);
        }


        //ad photos uploader
        function adPhotoUploader($fName1, $fName2, $fName3, $tmpName1, $tmpName2, $tmpName3){
            include "connect.php";
            $location = "../uploads/postsPhoto/";
            $random = rand(1000, 100000);
            $path1 = $location.'ad'.$random.$fName1;
            $path2 = $location.'ad'.$random.$fName2;
            $path3 = $location.'ad'.$random.$fName3;

            $path = array(' ', ' ', ' ');

            if($fName1 != '' || $fName2 != '' || $fName3 != ''){

                if(move_uploaded_file($tmpName1, $path1)){
                    $path[0] = $path1;
                }
                    elseif(move_uploaded_file($tmpName2, $path2)) {
                        $path[1] = $path2;
                    }
                        elseif(move_uploaded_file($tmpName3, $path3)){
                            $path[2] = $path3;
                            
                        }else{
                            return 'ERROR';
                        }

            }

            return $path;
 
            
        }

            //ad posts data shower and counter

        function postAdShower(){
            include "connect.php";
            $q = "SELECT * FROM `electronics` WHERE 1";

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

    }



    

    $admin = new adminPhp;

?>