<?php
class auth{

    //registering a normal user
    function registerUser($username, $password, $firstName, $lastName, $phone  ){
        include('connect.php');
        $q = "INSERT INTO `user`( `username`, `password`, `firstName`, `lastName`, `phone`, `auth`)
         VALUES ( '$username', '$password', '$firstName', '$lastName', '$phone', 'USER' )";

        $ask = $mysql->query($q);
         
    }

    //USER AUTHERIZATION CHECKER
    function checkAuth($uid){
        include('connect.php');
        $q = "SELECT `auth` FROM `user` WHERE `auth` = '$uid' ";

        $ask = $mysql->query($q);
        if($ask->fetch_assoc() == 'ADMIN'){
            return 'ADMIN';
        }else if($ask->fetch_assoc() == 'USER' ){
            return 'USER';
        }
    }

    //FOR CHECKING A USER IS IN DATABASE OR NOT
    function loginAuth($username, $password){
        include('connect.php');
        $q = "SELECT  * FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";

        $ask = $mysql->query($q);

        return $ask;
    }

            //last loged in date
            function lastLoged($uid){
                include "connect.php";
                $date = date('Y/m/d');
                $q = "UPDATE `user` SET `lastLogedIn`= '$date' WHERE `user`.`id` = $uid";
    
                $ask = $mysql->query($q);
            }

    //users post collection lister
    function userPostsLister($uid){
        include "connect.php";
        $q = "SELECT `ad`.id, `car`.id, `electronics`.id,
        `housesell`.id , `tender`.id, `vacancy`.id 
        FROM `ad`, `car`, `electronics`, 
        WHERE `ad`.posterId = '$uid';";
    }


    //compress image
    function compress($tmpLocation, $uploadPath, $qulity){
        $imageInfo = getimagesize($tmpLocation);
        $mime = $imageInfo['mime'];

        switch($mime){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($tmpLocation);
                break;
            case 'image/png':
                $image = imagecreatefrompng($tmpLocation);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($tmpLocation);
            default:
                $image = imagecreatefromjpeg($tmpLocation);
        }

        imagejpeg($image, $uploadPath, $qulity);


        return $uploadPath;

    }

}

$auth = new auth;

?>