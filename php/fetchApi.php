<?php 

class fetch{


    ///// to fetch data from a 'table and condition(columen) with the argument
    function allPostListerOnColumen($table, $columen, $args){
        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' ORDER BY RAND() LIMIT 7 ";

        $ask = $mysql->query($q);

        return $ask;
    }


    ///// to fetch data for a table with out any condition
    function allPostListerOnTable($table){
        include "connect.php";
        $q = "SELECT * FROM `$table` ORDER BY RAND() LIMIT 8 ";

        $ask = $mysql->query($q);

        return $ask;
    }

    ////to fetch data from a tabel and 2 coloumen condition
    function allPostListerOn2Columen($table, $columen, $args, $columen2, $args2){

        include "connect.php";
        $q = "SELECT * FROM `$table` WHERE `$columen` LIKE '$args' AND `$columen2` LIKE '$args2' ORDER BY RAND() LIMIT 7 ";

        $ask = $mysql->query($q);

        return $ask;

    }


}

$get = new fetch;

?>