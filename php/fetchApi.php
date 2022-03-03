<?php 



    ///// to fetch data from a 'table and condition(columen) with the argument
    function allPostListerOnColumen($table, $columen, $args){
        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' ORDER BY RAND() LIMIT 10";

        $ask = $mysql->query($q);
        echo $mysql->error;

        return $ask;
    }

        ///// to fetch data from a 'table and condition(columen) with the argument
        function allPostListerOnColumenD($table, $columen, $args, $limitStart, $limitEnd){
            include "connect.php";
            $q2 = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";
            

            $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
        }

    /// order by accending
        ///// to fetch data from a 'table and condition(columen) with the argument
        function allPostListerOnColumenORDER($table, $columen, $args){
            include "connect.php";
            $q = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' ORDER BY `$columen` DESC ";
    
            $ask = $mysql->query($q);
            echo $mysql->error;

            return $ask;
        }


    ///// to fetch data for a table with out any condition
    function allPostListerOnTable($table){
        include "connect.php";
        $q = "SELECT * FROM `$table` ORDER BY RAND() LIMIT 5 ";

        $ask = $mysql->query($q);
        echo $mysql->error;

        return $ask;
    }

        ///// to fetch data for a table with out any condition
        function allPostListerOnTableD($table, $limitStart, $limitEnd){
            include "connect.php";
            $q1 = "SELECT `postedDate` FROM `$table` ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` ORDER BY `postedDate` DESC LIMIT $limitStart , $limitEnd ";
            $ask1 = $mysql->query($q1);
            $ask = $mysql->query($q);
            echo $mysql->error;
            // echo 'ss'.$mysql->;
            return array($ask, $ask1);
        }



    ////to fetch data from a tabel and 2 coloumen condition
    function allPostListerOn2Columen($table, $columen, $args, $columen2, $args2){

        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' ORDER BY RAND() LIMIT 10 ";

        $ask = $mysql->query($q);
        echo $mysql->error;

        return $ask;

    }

        ////to fetch data from a tabel and 2 coloumen condition
        function allPostListerOn2ColumenD($table, $columen, $args, $columen2, $args2, $limitStart, $limitEnd){

            include "connect.php";
            $q2 = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";

    $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
    
        }


    //// to fetch data from a tabel and 3 colomen condition
    function allPostListerOn3Columen($table, $columen, $args, $columen2, $args2, $columen3, $args3){
        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' ORDER BY RAND() LIMIT 12 ";

        $ask = $mysql->query($q);
        echo $mysql->error;

        return $ask;
    }


    function allPostListerOn3ColumenD($table, $columen, $args, $columen2, $args2, $columen3, $args3, $limitStart, $limitEnd){
        include "connect.php";
        $q2 = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd  ";

        $ask2 = $mysql->query($q2);
        $ask = $mysql->query($q);
        echo $mysql->error;

        return array($ask, $ask2);
    }



        //// to fetch data from a tabel and 4 colomen condition
        function allPostListerOn4Columen($table, $columen, $args, $columen2, $args2, $columen3, $args3, $columen4, $args4){
            include "connect.php";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4'   ORDER BY RAND() LIMIT 12 ";
    
            $ask = $mysql->query($q);
    echo $mysql->error;

            return $ask;
        }


        function allPostListerOn4ColumenD($table, $columen, $args, $columen2, $args2, $columen3, $args3, $columen4, $args4, $limitStart, $limitEnd){
            include "connect.php";
            $q2 = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4'   ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4'   ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
    
            $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
        }




        /// 5 columemn
        function allPostListerOn5ColumenD($table, $columen, $args, $columen2, $args2, $columen3, $args3, $columen4, $args4, $columen5, $args5, $limitStart, $limitEnd){
            include "connect.php";
            $q2 = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4' AND `$columen5` = '$args5'  ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4' AND `$columen5` = '$args5'    ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
    
            $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
        }


        /// 5 columemn
        function allPostListerOn6ColumenD($table, $columen, $args, $columen2, $args2, $columen3, $args3, $columen4, $args4, $columen5, $args5, $columen6, $args6, $limitStart, $limitEnd){
            include "connect.php";
            $q2 = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4' AND `$columen5` = '$args5' AND `$columen6` = '$args6' ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4' AND `$columen5` = '$args5' AND `$columen6` = '$args6'   ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
    
            $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
        }



        //// to fetch data from a tabel and 5 colomen condition
        function allPostListerOn5Columen($table, $columen, $args, $columen2, $args2,
         $columen3, $args3, $columen4, $args4, $columen5, $args5  ){
            include "connect.php";
            $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' AND `$columen2` = '$args2' AND `$columen3` = '$args3' AND `$columen4` = '$args4' AND `$columen5` = '$args5'   ORDER BY RAND() LIMIT 12 ";
    
            $ask = $mysql->query($q);
    
            return $ask;
        }





    //// time ago string outputer
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }


    ///// view adder of a post
    function viewAdder($table, $pid){
        include "connect.php";
        $q = "SELECT `view` FROM `$table` WHERE `id` = '$pid'";
        $ask = $mysql->query($q);
        $count = $ask->fetch_assoc();
        $count = $count['view'] + 1;
        $q2 = "UPDATE `$table` SET `view` = '$count' WHERE `$table`.`id` = '$pid'";

        $ask2 = $mysql->query($q2);

        return $ask2;
    }


    //all posts single post viewing api dynamicaly
    function aSinglePostView($pid, $tableName){
        include "connect.php";
        $q = "SELECT * FROM `$tableName` WHERE `id` = '$pid'";

        $ask = $mysql->query($q);

        return $ask;
    }


    //select category from tabels
    function categorySelecter($table, $columen){
        include "connect.php";
        $q = "SELECT DISTINCT `$columen` FROM `$table` WHERE 1";

        $ask = $mysql->query($q);

        return $ask;        
    }


    /// favourites adder
    function favouritesAdder($postId, $uid, $table){
        include "connect.php";
        $fav = $uid.',';
        $q2 ="SELECT `fav`
        FROM `$table`
        WHERE `id` = '$postId'  ";
        $ask2 = $mysql->query($q2);
        $row = $ask2->fetch_assoc();
        $pre = $row['fav'];
        $new = $pre.','.$uid;

        $q = "UPDATE `$table` SET `fav` = '$new'  WHERE `$table`.`id` = '$postId'";
        $ask = $mysql->query($q);

        return $ask; 
        
    }


    //// favouites selecter for a user
    function favouritesSelector($table, $uid, $pid){
        include "connect.php";
        $sl = ','.$uid;
        $q = "SELECT `fav` FROM `$table` WHERE `fav` LIKE  '%$sl%' AND `id` = '$pid' ";

        $ask = $mysql->query($q);

        // if($ask){
        //     return true;
        // }else{
        //     return false;
        // }
        return $ask;
    }

    /// select faverite post list for a user
    function selectFavLister($table, $uid){
        include "connect.php";
        $sl = ','.$uid;
        $q = "SELECT * FROM `$table` WHERE `fav` LIKE  '%$sl%' ";

        $ask = $mysql->query($q);

        return $ask; 
    }


    ///delete favourites
    function deleteFav($table, $pid, $uid){
        include "connect.php";
        $q = "SELECT `fav` FROM  `$table` WHERE `id` = '$pid' ";
        $ask = $mysql->query($q); // get all the fav list from the db
        $row = $ask->fetch_assoc();
        $all = $row['fav'];
        $all = explode(',', $all); // explode it to an array
        $key = array_search($uid, $all); //find the user id in the array to be deleted from the list
        unset($all[$key]); //unseet the value that matched the userid
        $all = implode(',', $all); // collect it back to a string with commas
        $q2 = "UPDATE `$table` SET `fav` = '$all' WHERE `id` = '$pid'"; // put it back to db
        $ask = $mysql->query($q2);

        return $ask;

    }






    ////// user ban
    function userBan($id){
        include "connect.php";
        $q = "UPDATE `user` SET `userStatus` = 'BAN' WHERE `user`.`id` = '$id'";
        $ask = $mysql->query($q);

        return $ask; 
    }


    ///// unban user
    function unBanuser($id){
        include "connect.php";
        $q = "UPDATE `user` SET `userStatus` = ' ' WHERE `user`.`id` = '$id'";
        $ask = $mysql->query($q);

        return $ask; 
    }



    function searchC($table, $sarg, $limitStart, $limitEnd){
        include "connect.php";
        $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
        if(in_array($table, $excluded)){
        $q2 = "SELECT `postedDate` FROM `$table` WHERE  `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE  `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";    
        }else{
        $q2 = "SELECT `postedDate` FROM `$table` WHERE  `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE  `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
        }


        $ask2 = $mysql->query($q2);
        $ask = $mysql->query($q);
        echo $mysql->error;

        return array($ask, $ask2);
    }



    ///// search output based on one colomun that match one search condition with tobe searched columen 
    function search1C($table, $columen, $carg, $sarg, $limitStart, $limitEnd){
        include "connect.php";
        $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
        if(in_array($table, $excluded)){
            $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen` = '$carg' AND  `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$carg' AND  `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";    
        }else{
            $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen` = '$carg' AND  `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$carg' AND  `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
        }


        $ask2 = $mysql->query($q2);
        $ask = $mysql->query($q);
        echo $mysql->error;

        return array($ask, $ask2);
    }


    ///// search output based on 2colomun that match one search condition with tobe searched columen 
    function search2C($table, $columen1, $arg1, $columen2, $arg2, $sarg, $limitStart, $limitEnd){
        include "connect.php";
        $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
        if(in_array($table, $excluded)){
            $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";    
        }else{
            $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
        $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";
        }


        $ask2 = $mysql->query($q2);
        $ask = $mysql->query($q);
        echo $mysql->error;

        return array($ask, $ask2);
    }



        ///// search output based on 3colomun that match one search condition with tobe searched columen 
        function search3C($table, $columen1, $arg1, $columen2, $arg2, $columen3, $arg3, $sarg, $limitStart, $limitEnd){
            include "connect.php";
            $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
            if(in_array($table, $excluded)){
                $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC ";
                $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";    
            }else{
                $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
            $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";
            }
    
    
            $ask2 = $mysql->query($q2);
            $ask = $mysql->query($q);
            echo $mysql->error;
    
            return array($ask, $ask2);
        }



                ///// search output based on 4colomun that match one search condition with tobe searched columen 
                function search4C($table, $columen1, $arg1, $columen2, $arg2, $columen3, $arg3, $columen4, $arg4, $sarg, $limitStart, $limitEnd){
                    include "connect.php";
                    $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                    if(in_array($table, $excluded)){
                        $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4'   AND `name` LIKE '%$sarg%'  ORDER BY `postedDate` DESC";
                    $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4'   AND `name` LIKE '%$sarg%'  ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd";    
                    }else{
                        $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4'     AND `title` LIKE '%$sarg%'  ORDER BY `postedDate` DESC";
                    $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4'     AND `title` LIKE '%$sarg%'  ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd ";
                    }
            
            
            
                    $ask2 = $mysql->query($q2);
                    $ask = $mysql->query($q);
                    echo $mysql->error;
            
                    return array($ask, $ask2);
                }

            ///// search output based on 5colomun that match one search condition with tobe searched columen 
            function search5C($table, $columen1, $arg1, $columen2, $arg2, $columen3, $arg3, $columen4, $arg4, $columen5, $arg5, $sarg, $limitStart, $limitEnd){
                include "connect.php";
                $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                if(in_array($table, $excluded)){
                    $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4' AND `$columen5` = '$arg5'   AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC ";
                $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4' AND `$columen5` = '$arg5'   AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd  ";    
                }else{
                    $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4' AND `$columen5` = '$arg5'      AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
                $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4' AND `$columen5` = '$arg5'      AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd  ";
                }
        
        
        
                $ask2 = $mysql->query($q2);
                $ask = $mysql->query($q);
                echo $mysql->error;
        
                return array($ask, $ask2);
            }
                

                        ///// search output based on 5colomun that match one search condition with tobe searched columen 
                        function search6C($table, $columen1, $arg1, $columen2, $arg2, $columen3, $arg3, $columen4, $arg4, $columen5, $arg5, $sarg, $columen6, $arg6, $limitStart, $limitEnd){
                            include "connect.php";
                            $excluded = array('zebegna', 'jobhometutor', 'hotelhouse' );
                            if(in_array($table, $excluded)){
                                $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4' AND `$columen5` = '$arg5' AND `$columen6` = '$arg6'  AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC ";
                            $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND `$columen2` = '$arg2' AND `$columen3` = '$arg3' AND `$columen4` = '$arg4' AND `$columen5` = '$arg5' AND `$columen6` = '$arg6'  AND `name` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd  ";    
                            }else{
                                $q2 = "SELECT `postedDate` FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4' AND `$columen5` = '$arg5' AND `$columen6` = '$arg6'     AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC";
                            $q = "SELECT * FROM `$table` WHERE `$columen1` = '$arg1' AND  `$columen2` = '$arg2' AND `$columen3` = '$arg3'  AND `$columen4` = '$arg4' AND `$columen5` = '$arg5' AND `$columen6` = '$arg6'      AND `title` LIKE '%$sarg%' ORDER BY `postedDate` DESC LIMIT $limitStart,$limitEnd  ";
                            }
                    
                    
                    
                            $ask2 = $mysql->query($q2);
                            $ask = $mysql->query($q);
                            echo $mysql->error;
                    
                            return array($ask, $ask2);
                        }



            //message sender api
            function msgSender($tableOfPost, $postId ,$senderId, $receiverId, $msg ){
                include "connect.php";
                $date = date('Y-m-d H:i:s');
                $q = "INSERT INTO `msg`(  `tableName`, `postId`, `user1`, `user2`, `msg`, `postedDate`, `seen`) VALUES ('$tableOfPost' , '$postId', '$senderId', '$receiverId', '$msg', '$date', 'new' )";

                $ask = $mysql->query($q);
                echo $mysql->error;
                return $ask;

            }


            //inner message fetcher for a loged user
            function innerMsgFetcher($tableOfPost, $LogedUserId, $postId, $secondUser){
                include "connect.php";
                $q = "SELECT * FROM `msg` WHERE (( `user1` = '$LogedUserId' AND `user2` = '$secondUser') OR (`user1` = '$secondUser' AND `user2` = '$LogedUserId')) AND ( `tableName` = '$tableOfPost' AND `postId` = '$postId')  ORDER BY `postedDate` ASC  "; // the query is the  0 1, 1 0 all posibel probablity of the sender and recever  

                $ask = $mysql->query($q);
                echo $mysql->error;
                return $ask;
            }


            /// outer message fetcher for loged user
            function outerMsgFetcher($userx){
                include "connect.php";

                // the ' where or ' will only let us select the messages associated with a single user with sending and reciveing end, so the distict key word will filter only ones that are linked with one post in a single table
                $q = "SELECT `postedDate`, `tableName`,`postId`,`user1`,`user2`,`msg`,`seen`  FROM `msg` WHERE (`user1` = '$userx' OR `user2` = '$userx') AND `id` IN (
                    SELECT max(`id`) FROM `msg` GROUP BY `tableName`,`postId`  DESC
                ) ORDER BY `postedDate` DESC "; // the IN() function is to select the top one msg from all of msgs asscosiated, the GROUP BY will group all msgs by table name separetlly and the IN() function will let us sellect the most recent or the top or the last msg on that particular table(which also contains the post id to)

                $ask = $mysql->query($q);
                echo $mysql->error;

                return $ask;
            } 

            // to query unseen msgs
       
            function outerMsgFetcherSeen($userx){
                include "connect.php";

                // the ' where or ' will only let us select the messages associated with a single user with sending and reciveing end, so the distict key word will filter only ones that are linked with one post in a single table
                $q = "SELECT `postedDate`, `tableName`,`postId`,`user1`,`user2`,`msg`,`seen`  FROM `msg` WHERE (  `user2` = '$userx') AND `id` IN (
                    SELECT max(`id`) FROM `msg` GROUP BY `tableName`,`postId`  DESC
                ) AND `seen` = 'new'    ORDER BY `postedDate` DESC  "; // the IN() function is to select the top one msg from all of msgs asscosiated, the GROUP BY will group all msgs by table name separetlly and the IN() function will let us sellect the most recent or the top or the last msg on that particular table(which also contains the post id to)

                $ask = $mysql->query($q);
                echo $mysql->error;

                return $ask;
            } 

            //update the unseen msg to seen
            function seenMsg($msgId){
                include "connect.php";
                $q = "UPDATE `msg` SET  `seen`= 'SEEN'  WHERE `id` = '$msgId'";
                $ask = $mysql->query($q);
                echo $mysql->error;

                return $ask;
            }

            ///distnict



            /// membership register
            function member($name, $city, $wereda, $phone1, $phone2, $what_does_initiate, $do_you_have_other_job, $photoPath1, $broker_before, $business_license, $commission_type, $question, $userId, $subcity ){
                include "connect.php";
              

                $q = "INSERT INTO `mambership`( `name`, `city`, `subcity`, `wereda`, `phone1`, `phone2`, `what_does_initiate`, `do_you_have_other_job`, `photoPath1`, `broker_before`, `business_license`, `commission_type`, `question`,  `userId`) VALUES ( '$name', '$city', '$subcity' ,'$wereda', '$phone1', '$phone2', '$what_does_initiate', '$do_you_have_other_job', '$photoPath1', '$broker_before', '$business_license', '$commission_type', '$question', '$userId ' )";

            


                $ask = $mysql->query($q);


                return $ask;
            }

            /// update the members status from not acepted to accepted
            function updateOnColomen($table, $colomn1, $arg1, $pid ){
                include 'connect.php';
                $q = "UPDATE `$table` SET `$colomn1` = '$arg1' WHERE `id` = '$pid'";
                $ask = $mysql->query($q);

                echo $mysql->error;
                return $ask;
            }



            /// sponsered payment integration
            function sponseredPay($pkg, $bname, $tid, $pid){
                include "connect.php";
                $q = "UPDATE `realestate` SET `pkg` = '$pkg', `filled` = 'YES', `payBank` = '$bname', `transId` = '$tid', `filled` = 'YES' WHERE `realestate`.`id` = '$pid' ";


                $ask = $mysql->query($q);

                echo $mysql->error;
                return $ask;
            }



    ////// search from
    // function 



?>