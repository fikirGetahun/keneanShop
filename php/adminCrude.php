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
        function addTenderPost($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id ){
            include('connect.php');
            $today = date("Y/m/d");
            $q = "INSERT INTO `tender`( `tenderType`, `startingDate`, `deadLine`, `location`, `initialCost`, `info`, `posterId`, `postedDate`)
             VALUES ('$tenderType', '$startingDate', '$deadLine', '$location', '$initialCost', '$info ', '$id', '$date' )";

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
        function updateTenderLister($tenderType, $startingDate, $deadLine, $location, $initialCost, $info, $id2  ){
            include "connect.php";
            $date = date('Y/m/d');
            $q = "UPDATE `tender` SET `tenderType`='$tenderType',
            `startingDate`='$startingDate',`deadLine`='$deadLine',`location`='$location',
            `initialCost`='$initialCost',`info`='$info',`postedDate`='$date' WHERE `tender`.`id` = '$id2' ";

            $ask = $mysql->query($q);
        }


        //USER ADDER AS 'ADMIN' OR 'EDITOR'
        function userAdder($firstName, $lastName, $phone, $username, $password, $auth){
            include "connect.php";
            $q ="INSERT INTO `user`( `username`, `password`, `firstName`, `lastName`, `phone`, `auth`)
             VALUES ('$username', '$password', '$firstName', '$lastName', '$phone', '$auth')";

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


    }

    $admin = new adminPhp;

?>