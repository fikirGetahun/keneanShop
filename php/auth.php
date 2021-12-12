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

}

$auth = new auth;

?>