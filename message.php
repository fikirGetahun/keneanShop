<?php

ob_start();
session_start();
include 'includes/header.php';
require_once "php/fetchApi.php";
require_once "php/adminCrude.php";
include 'includes/lang.php';
include "includes/secnav.php";
include "includes/navbar.php";
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
    body{margin-top:20px;}
/*************** 1.Variables ***************/


/* ------------------ Color Pallet ------------------ */


/*************** 2.Mixins ***************/


/************************************************
    ************************************************
                                        Search Box
    ************************************************
************************************************/

.chat-search-box {
    -webkit-border-radius: 3px 0 0 0;
    -moz-border-radius: 3px 0 0 0;
    border-radius: 3px 0 0 0;
    padding: .75rem 1rem;
}

.chat-search-box .input-group .form-control {
    -webkit-border-radius: 2px 0 0 2px;
    -moz-border-radius: 2px 0 0 2px;
    border-radius: 2px 0 0 2px;
    border-right: 0;
}

.chat-search-box .input-group .form-control:focus {
    border-right: 0;
}

.chat-search-box .input-group .input-group-btn .btn {
    -webkit-border-radius: 0 2px 2px 0;
    -moz-border-radius: 0 2px 2px 0;
    border-radius: 0 2px 2px 0;
    margin: 0;
}

.chat-search-box .input-group .input-group-btn .btn i {
    font-size: 1.2rem;
    line-height: 100%;
    vertical-align: middle;
}

@media (max-width: 767px) {
    .chat-search-box {
       /* background-color: none; */
    }
}


/************************************************
    ************************************************
                                    Users Container
    ************************************************
************************************************/

.users-container {
    position: relative;
    padding: 1rem 0;
    border-right: 1px solid #e6ecf3;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
}


/************************************************
    ************************************************
                                            Users
    ************************************************
************************************************/

.users {
    padding: 0;
}

.users .person {
    position: relative;
    width: 100%;
    padding: 10px 1rem;
    cursor: pointer;
    border-bottom: 1px solid #f0f4f8;
}

.users .person:hover {
    background-color: #ffffff;
    /* Fallback Color */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff));
    /* Saf4+, Chrome */
    background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff);
    /* Chrome 10+, Saf5.1+, iOS 5+ */
    background-image: -moz-linear-gradient(right, #e9eff5, #ffffff);
    /* FF3.6 */
    background-image: -ms-linear-gradient(right, #e9eff5, #ffffff);
    /* IE10 */
    background-image: -o-linear-gradient(right, #e9eff5, #ffffff);
    /* Opera 11.10+ */
    background-image: linear-gradient(right, #e9eff5, #ffffff);
}

.users .person.active-user {
    background-color: #ffffff;
    /* Fallback Color */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff));
    /* Saf4+, Chrome */
    background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff);
    /* Chrome 10+, Saf5.1+, iOS 5+ */
    background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff);
    /* FF3.6 */
    background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff);
    /* IE10 */
    background-image: -o-linear-gradient(right, #f7f9fb, #ffffff);
    /* Opera 11.10+ */
    background-image: linear-gradient(right, #f7f9fb, #ffffff);
}

.users .person:last-child {
    border-bottom: 0;
}

.users .person .user {
    display: inline-block;
    position: relative;
    margin-right: 10px;
}

.users .person .user img {
    width: 48px;
    height: 48px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}

.users .person .user .status {
    width: 10px;
    height: 10px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
    background: #e6ecf3;
    position: absolute;
    top: 0;
    right: 0;
}

.users .person .user .status.online {
    background: #9ec94a;
}

.users .person .user .status.offline {
    background: #c4d2e2;
}

.users .person .user .status.away {
    background: #f9be52;
}

.users .person .user .status.busy {
    background: #fd7274;
}

.users .person p.name-time {
    font-weight: 600;
    font-size: .85rem;
    display: inline-block;
}

.users .person p.name-time .time {
    font-weight: 400;
    font-size: .7rem;
    text-align: right;
    color: #8796af;
}

@media (max-width: 767px) {
    .users .person .user img {
        width: 30px;
        height: 30px;
    }
    .users .person p.name-time {
        display: none;
    }
    .users .person p.name-time .time {
        display: none;
    }
}


/************************************************
    ************************************************
                                    Chat right side
    ************************************************
************************************************/

.selected-user {
    width: 100%;
    padding: 0 15px;
    min-height: 64px;
    line-height: 64px;
    border-bottom: 1px solid #e6ecf3;
    -webkit-border-radius: 0 3px 0 0;
    -moz-border-radius: 0 3px 0 0;
    border-radius: 0 3px 0 0;
}

.selected-user span {
    line-height: 100%;
}

.selected-user span.name {
    font-weight: 700;
}

.chat-container {
    position: relative;
    padding: 1rem;
}

.chat-container li.chat-left,
.chat-container li.chat-right {
    display: flex;
    flex: 1;
    flex-direction: row;
    margin-bottom: 40px;
}

.chat-container li img {
    width: 48px;
    height: 48px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
}

.chat-container li .chat-avatar {
    margin-right: 20px;
}

.chat-container li.chat-right {
    justify-content: flex-end;
}

.chat-container li.chat-right > .chat-avatar {
    margin-left: 20px;
    margin-right: 0;
}

.chat-container li .chat-name {
    font-size: .75rem;
    color: #999999;
    text-align: center;
}

.chat-container li .chat-text {
    padding: .4rem 1rem;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background: #ffffff;
    font-weight: 300;
    line-height: 150%;
    position: relative;
}

.chat-container li .chat-text:before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    top: 10px;
    left: -20px;
    border: 10px solid;
    border-color: transparent #ffffff transparent transparent;
}

.chat-container li.chat-right > .chat-text {
    text-align: right;
}

.chat-container li.chat-right > .chat-text:before {
    right: -20px;
    border-color: transparent transparent transparent #ffffff;
    left: inherit;
}

.chat-container li .chat-hour {
    padding: 0;
    margin-bottom: 10px;
    font-size: .75rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 0 0 0 15px;
}

.chat-container li .chat-hour > span {
    font-size: 16px;
    color: #9ec94a;
}

.chat-container li.chat-right > .chat-hour {
    margin: 0 15px 0 0;
}

@media (max-width: 767px) {
    .chat-container li.chat-left,
    .chat-container li.chat-right {
        flex-direction: column;
        margin-bottom: 30px;
    }
    .chat-container li img {
        width: 32px;
        height: 32px;
    }
    .chat-container li.chat-left .chat-avatar {
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
    }
    .chat-container li.chat-left .chat-hour {
        justify-content: flex-end;
    }
    .chat-container li.chat-left .chat-name {
        margin-left: 5px;
    }
    .chat-container li.chat-right .chat-avatar {
        order: -1;
        margin: 0 0 5px 0;
        align-items: center;
        display: flex;
        justify-content: right;
        flex-direction: row-reverse;
    }
    .chat-container li.chat-right .chat-hour {
        justify-content: flex-start;
        order: 2;
    }
    .chat-container li.chat-right .chat-name {
        margin-right: 5px;
    }
    .chat-container li .chat-text {
        font-size: .8rem;
    }
}

.chat-form {
    padding: 15px;
    width: 100%;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ffffff;
    border-top: 1px solid white;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.card {
    border: 0;
    background: #f4f5fb;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    margin-bottom: 2rem;
    box-shadow: none;
}
</style>


<div class="container">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title"><?php echo $_SESSION['name'] ?></h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">
                <script>
                    $(document).ready(function(){
                    $('input').keyup('submit', function(){
                        $.ajax({
                        url: 'user/membersSearchList.php',
                        type: 'post',
                        data: $('form').serialize(),
                        success: function(data){
                            $('#outerMsgDiv').empty()
                            $('#outerMsgDiv').append(data)
                        }
                        })
                    })

                    $('form').on('submit', function(){
                        $.ajax({
                        url: 'user/membersSearchList.php',
                        type: 'post',
                        data: $('form').serialize(),
                        success: function(data){
                            $('#outerMsgDiv').empty()
                            $('#outerMsgDiv').append(data)
                        }
                        })
                    })
                    })
                </script>
                    <!-- Row start -->
                    <div class="row no-gutters" >
                        <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <?php
                                    if($_SESSION['auth'] == 'ADMIN' || $_SESSION['auth'] == 'EDITOR'){
                                        ?>
                                            <div class="chat-search-box">
                                    <div class="input-group">
                                        <form>
                                            <input class="form-control" name="searchData" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                        <?php
                                    }
                                
                                ?>
                            
                                <?php
                                if(isset($_GET['message'])){
                                    if(isset($_GET['outter'])){
                                    if(isset($_GET['memberId'])){ // if members filter is searched by the admin
                                        $mid = $_GET['memberId'];
                                        $outerM = outerMsgFetcherOfUser($_SESSION['userId'], $mid);
                                    }else{

                                        $outerM = outerMsgFetcher($_SESSION['userId']); 

                                    }
                                     
                                    // echo $_SESSION['userId'];
                                    ?>
                                 
                                <ul id="outerMsgDiv"  class="users">
                                <?php
                                    if($outerM->num_rows != 0){
                                        $m =1;
                                    while($o = $outerM->fetch_assoc()){
                                    $date = time_elapsed_string($o['postedDate']);


                                    if($o['user1'] == $_SESSION['userId']){
                                        $otherUser = $o['user2'];
                                        $you = 'YOU: ';
                                    }elseif($o['user2'] == $_SESSION['userId']){
                                        $otherUser = $o['user1'];
                                        $you = ' ';
                                    }

                           

                                    ?>
                  
                                    <li class="person active-user" data-chat="person<?php echo $m ?>">
                                    <div class="row">
                                        <?php 
                                        // to mark unread msgs
                                        if($o['seen'] == 'new'){ // if the msg is unseen it will send an unseen request to the inner msg so that it updates it to seen after they click the unread msg?>

                                        <a class="stretched-link"  href="message.php?message=true&inner=true&tb=<?php echo $o['tableName'] ?>&reciver=<?php echo $otherUser ?>&post=<?php echo $o['postId'] ?>&unseen=true&outter=true" >   </a>
                                        <?php
                                        }else{
                                            ?>
                                            <a class="stretched-link"  href="message.php?message=true&inner=true&tb=<?php echo $o['tableName'] ?>&reciver=<?php echo $otherUser ?>&post=<?php echo $o['postId'] ?>&outter=true" >  </a>
                                            <?php
                                          } 

                                          if($o['tableName'] != 'ORDER'){ // if the tabel is order there is no data to fetch b/c there is no tabel named ORDER

                                            // to fetch the post photo and title to be displayed 
                                            $postCrap = allPostListerOnColumen($o['tableName'], 'id', $o['postId'] );
                                            $rowPostCrap = $postCrap->fetch_assoc();
                                  
                                            }
                                  
                                            // to fetch the reciver end user data crap
                                            $userCrap = allPostListerOnColumen('user', 'id', $otherUser);
                                            $ur = $userCrap->fetch_assoc(); 
                                  
                                  
                                            // to check if any of the users are admin/ editor / user
                                            $authCH = allPostListerOnColumen('user','id',$otherUser);
                                            $rowAuth = $authCH->fetch_assoc(); 
                                        ?>

                                        <?php
                                        /// condition to set admin
                                        if($_SESSION['auth'] == 'ADMIN'  || $_SESSION['auth'] == 'EDITOR'  ){
                                            ?>
                                            <div class="user col">
                                            <img src="<?php  
                                                $p = photoSplit($rowPostCrap['photoPath1']); 
                                                if(!empty($p[0])){
                                                    echo $p[0];
                                                }else{
                                                    echo "assets/img/pp.png";
                                                }
                                                ?>" alt="">
                                                <!-- <span class="small text-success">Admin</span> -->
                                            </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="user col">
                                                <img src="<?php  
                                                $p = photoSplit($rowPostCrap['photoPath1']); 
                                                if(!empty($p[0])){
                                                    echo $p[0];
                                                }else{
                                                    echo "assets/img/pp.png";
                                                }
                                                ?>" alt="">
                                            <!-- <span class=""></span> -->
                                            </div>
                                            <?php
                                        }
                                        $splitMsg = explode(',',$o['msg'] ); // to split msg to tell its from admin member msgs
                                        ?>

                                     
                                        
                                        <p class="name-time col-6">
                                           
                                            <?php
                                            if($o['tableName'] == 'ORDER'){ // if the table name is 'ORDER' this means the msg type is order so the order msg label must be included
                                                ?>
                                            <span class="text-danger">Ordered Msg Item</span> <br>
                                            <?php 
                                            } 
                                            ?>
                                            <?php
                                              // here if the next msg after comma is 'send', then it only show the go to client button so that the website member can automatically go to the client
                                            if(isset($splitMsg[1])){  
                                                ?>
                                                <span class="name text-warning">From Admin</span>
                                                <?php
                                            }else{  // else it only echo out the msg 
                                               $ms= mb_strimwidth($splitMsg[0], 0, 23, '...');
                                                ?>
                                                
                                                <span class="name"><?php echo $you.' '.$ms ?> </span>
                                                <?php
                                            }
                                            ?>
                                            <span class="time"><?php echo $date ?></span>
                                        </p>
                                        <?php
                                        if($rowAuth['auth'] == 'USER' ){
                                            ?>
                                            <div class="user col">
                                                <img src="<?php  
                                                $p = photoSplit($ur['photoPath1']); 
                                                if(!empty($p[0])){
                                                    echo $p[0];
                                                }else{
                                                    echo "assets/img/pp.png";
                                                }
                                                $su = mb_strimwidth($ur['firstName'], 0, 7, '...')
                                                ?>" alt="">
                                            <span class="small text-primary"><?php echo $su ?> </span>
                                            </div>
                                         <?php
                                        }elseif($rowAuth['auth'] == 'ADMIN' || $rowAuth['auth'] == 'EDITOR' && ($_SESSION['auth'] != 'ADMIN' || $_SESSION['auth'] != 'EDITOR')){
                                            ?>
                                            <div class="user col">
                                                <img src="admin/assets/img/zumra.png"  alt="...">
                                                <span class="small text-success">Admin</span>
                                            </div>
                                            <?php
                                        }
                                        if($o['seen'] == 'new'){
                                            ?>
                                             <span class="badge badge-danger"><?php if($numUnseen != 0){ echo ' New'; } ?></span>
                                            <?php
                                          } 
                                        ?>
                                    
                                    </div>
                                    </li>
                                    <?php
                                    $m++;
                                    }
                                    ?>
                                    
                                </ul>
                                 
                                <?php
                                }else{
                                    echo 'No messages yet';
                                }
                            }
                        }
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9"  style="height: 100%;">
                            <?php
                            // here every time the inner message is opened it has to get the requet of the tabelofpost(which the msg is assoiceatied in), posteId where the msg is associated in, and the reciver of the msg or the second user
                            if(isset($_GET['inner'],$_GET['tb'], $_GET['reciver'], $_GET['post'])){
                                $tb = $_GET['tb'];
                                $reciver = $_GET['reciver'];
                                $postFocus = $_GET['post'];
                                if($tb != 'ORDER'){
                                // echo 'post ID '.$postFocus;
                                //fetch the posts photo and title of the post
                                $postData = allPostListerOnColumen($tb, 'id', $postFocus);
                                $rowm = $postData->fetch_assoc();

                                //fetch the data of the second user of the msg
                                $secUser = allPostListerOnColumen('user', 'id', $reciver);
                                $row2 = $secUser->fetch_assoc();


                                // fetch the loged user data 
                                $logedUser = allPostListerOnColumen('user', 'id', $_SESSION['userId']);
                                $row1 = $logedUser->fetch_assoc();

                        
                                // to check if any of the users are admin/ editor / user
                                $authCH = allPostListerOnColumen('user','id',$reciver);
                                $rowAuth = $authCH->fetch_assoc();
                                
                            ?>
                            <div class="selected-user mb-3"  >
                                <!-- <span>To: <span class="name">Kenean Digital Technology</span></span> -->
                                <div class="row">
                                    <div class="col">
                                    <img src="<?php $p = photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class="img-thumbnail  " style="height: 40%;">  <br>
                                    <span><?php $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
            if(in_array($tb, $excluded)){echo $rowm['name']; } else{ echo $rowm['title']; } ?></span>            
                                    </div>  
                                    <div class="col"> 
                                    <?php
                                    if($_SESSION['auth'] == 'ADMIN'  || $_SESSION['auth'] == 'EDITOR' ){ 
                                    // here the session var memberForward will hold the link to be forwarded by the admin to a member of the website
                                    $_SESSION['memberForward'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                        ?>
                                        <div class="col">
                                        <!-- <img src="<?php $p = photoSplit($rowm['photoPath1']); echo $p[0] ;?> " class="img-thumbnail w-4">    -->
                                        <span> <a class="link" href="admin/membersList.php?list=true&forward=true&tb=<?php echo $tb?>&post=<?php echo $postFocus ?>&client=<?php echo $reciver ?>"  >Copy Link & Send to Member</a></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <?php
                                     
                                    if($rowAuth['auth'] == 'USER' ){ // if the reciver is a USER, then the users name and profile photo will be shown on the right side of the inner message
                                        ?>
                                        <div class="col">
                                        <?php
                                      
                                        if($row2['photoPath1'] != 'FILE_NOT_UPLOADED'){ // if there is no profile pic, then it will be changed to display the website logo pic
                                           ?>
                                            <img src="<?php $p = photoSplit($row2['photoPath1']); echo $p[0] ;?>" class="img-thumbnail " style="height: 40%;"><br>
                                            <span><?php echo $row2['firstName']?></span>
                                           <?php
                                        }else{
                                            ?>
                                            <img src="./admin/assets/img/zumra.png" class="img-thumbnail " style="height: 40%;"><br>
                                            <span><?php echo $row2['firstName']?></span>
                                           <?php
                                        }
                                        ?>
                                        </div>
                                        <?php
                                    }
                            }else{ /// else if its an order it only shows the order label
                                ?>
                                <div class="border border-success p-2">
                                <p class="text-success d-flex justify-content-center" > <strong>Welcome </strong> &nbsp;To  &nbsp; <strong> Zumra360</strong> &nbsp; Order Box !!    &nbsp;&nbsp; Please Fill Your Needs Detail below. </p></div>
                                <?php
                              }
                                    ?>
                                     
                                </div>
                            </div>
                            <div class="chat-container">
                                <?php
                                   // to fetch all the messages of this particular user and post
                                $innerMsg = innerMsgFetcher($tb, $_SESSION['userId'], $postFocus, $reciver);
                                if($innerMsg->num_rows != 0){
                                while($rowInnerMsg = $innerMsg->fetch_assoc()){
                                // to change the unseen to seen if there is a seen value of 'new' which is unseen. it has to do this every msg render b/c every new msg will have a 'new' in the seen coloumn
                                if($rowInnerMsg['seen'] == 'new' && $rowInnerMsg['user1'] != $_SESSION['userId'] && isset($_GET['unseen'])){
                                    $seeen = seenMsg($rowInnerMsg['id']);
                                }



                                // if the loged user id is in a the user1 colomen, this means its the sender. so the message will be placed in a sendder div, else its the reciver so the msg will be placed in a reciver div
                                if($rowInnerMsg['user1'] == $_SESSION['userId']){
                                    $splitMsg = explode(',',$rowInnerMsg['msg'] );
                                    $datem = time_elapsed_string($rowInnerMsg['postedDate']);
                                ?> 

                         
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src=<?php
                                             $p = photoSplit($row1['photoPath1']); 
                                             
                                             if(!empty($p[0]) && isset($p[0])){
                                                echo $p[0];
                                            }else{
                                                echo "assets/img/pp.png";
                                            }
                                             
                                             ?> alt="">
                                            <div class="chat-name"><?php echo $row1['firstName'] ?></div>
                                        </div>
                                        <?php
                                        // here if the next msg after comma is 'send', then it only show the go to client button so that the website member can automatically go to the client
                                        if(isset($splitMsg[1])){
                                            ?>
                                           <div class="chat-text"> <a href="<?php echo $splitMsg[0] ?>" > Go To Client.</a></div>
                                            <?php
                                        }else{  // else it only echo out the msg 
                                            ?>
                                            <div class="chat-text"><?php  echo $splitMsg[0]; ?></div>
                                            <?php 
                                        }
                                       
                                        ?>
                                          
                                        <div class="chat-hour"><?php echo $datem ?> </span></div>
                                    </li>
                                    <?php
                                     }else{
                                        $splitMsg = explode(',',$rowInnerMsg['msg'] ); 
                                        $dateR = time_elapsed_string($rowInnerMsg['postedDate']);
                                        ?>
                                        <li class="chat-right">
                                        <div class="chat-hour"><?php echo $dateR ?></span></div>
                                        <?php
                                        
                                        // here if the next msg after comma is 'send', then it only show the go to client button so that the website member can automatically go to the client
                                        if(isset($splitMsg[1])){       
                                            ?>
                                              <div class="chat-text"> <a href="<?php echo $splitMsg[0] ?>" > Go To Client.</a></div>>
                                            <?php 
                                        }else{  // else it only echo out the msg 
                                            ?>
                                            <div class="chat-text"><?php  echo $splitMsg[0] ?> </div
                                            <?php
       
                                            // echo $splitMsg[1];
                                            // var_dump($rowInnerMsg['msg']);
                                        }
                                        ?>

                                    
                                        
                                        >
                                        <div class="chat-avatar">
                                            <img src="<?php $p = photoSplit($row2['photoPath1']); 
                                           

                                            if(!empty($p[0]) && isset($p[0])){
                                                echo $p[0];
                                            }else{
                                                echo "assets/img/pp.png";
                                            }
                                            ?>" alt="...">
                                            <div class="chat-name"><?php echo $row2['firstName'] ?></div>
                                        </div>
                                    </li>  
                                        <?php


                                     }
                                    }}else{
                                        echo 'No Messages Yet.';
                                      }
                                    ?>
                          
                                </ul>
                                <script>
                                $(document).ready(function(){
                                    $('form').on('submit', function(e){
                                    e.preventDefault()
                                    $.ajax({
                                        url: "user/userApi.php",
                                        type: 'POST',
                                        data: $('form').serialize(),
                                        success: function(data){
                                        alert(data)
                                        location.reload()
                                        }
                                    })
                                    })
                                })
                                </script>
                                <div class="form-group mt-3 mb-0">
                                    <form>
                                <input hidden type="text" name="tabel" value="<?php echo $tb ?>" >
              <input hidden type="text" name="reciver" value="<?php echo $reciver ?>" >
              <input hidden type="text" name="postFocus" value="<?php echo $postFocus ?>" >
              <!-- <input hidden type="text" name="seen" -->
              <?php
                //if admin sendes forwarded text from admin panel, then it automaticaly will be in the textarea form so that it will send it to the member
                if(isset($_GET['forwarded'], $_GET['client'])){
                  $cl = $_GET['client'];
                  $furl = "./Account.php?message=true&inner=true&tb=".$tb."&reciver=".$cl."&post=".$postFocus;
                  ?>
                  <!-- <a href="<?php echo $furl ?>" >Go To User</a> -->
                <textarea type="text" class="form-control" id="mssg"  rows="3"
               name="msg" placeholder="Type Here.."><?php echo $furl.',send'?> </textarea>
                  <?php
                }else{ // empty form if there is no forwarded text 
                  ?>
              <textarea type="text" class="form-control" id="mssg"  rows="3"
               name="msg" placeholder="Type Here.."></textarea>
                    <?php
                }
                    ?>
                        <div class="d-flex justify-content-end mb-4">
                  <button type="submit" class="btn btn-dark" >Send</button>
              </div>
                    </form>
                                    <!-- <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea> -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->
<?php
}
?>
</div>
<?php 
include "includes/footer.php"; ?>