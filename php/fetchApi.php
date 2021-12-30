<?php 

class fetch{


    ///// to fetch data from a 'table and condition(columen) with the argument
    function allPostListerOnColumen($table, $columen, $args, $limit){
        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` = '$args' ORDER BY RAND() LIMIT '$limit'";

        $ask = $mysql->query($q);

        return $ask;
    }


    ///// to fetch data for a table with out any condition
    function allPostListerOnTable($table, $limit){
        include "connect.php";
        $q = "SELECT * FROM `$table` ORDER BY RAND() LIMIT '$limit'";

        $ask = $mysql->query($q);

        return $ask;
    }


}

$fetch = new $fetch;

?>