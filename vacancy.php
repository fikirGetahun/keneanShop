<?php
$array = Array(
  'foo' => 5,
  'bar' => 12,
  'baz' => 8
);

// $norm = array("ss","efd", "sdfq", "sdfw");
// function array_map_assoc($array){
//   $r = array();
//   foreach ($array as $key=>$value)
//     $r[$key] = "$key ($value)";
//   return $r;
// }

// $x = implode(' , ', array_map_assoc($array));
// // 
// $y = explode(' , ',$x);
// var_dump(array_map_assoc($array));

// echo "ddddddddddd";
// var_dump($y);


// echo $y[0]

// var_dump($norm)


function implodeAssoc($glue,$arr)
{
   $keys=array_keys($arr);
   $values=array_values($arr);

   return(implode($glue,$keys).$glue.implode($glue,$values));

   
};

//


/**
 * @name explodeAssoc($glue,$arr)
 * @description makes an assiciative array from a string
 * @parameter glue: the string to glue the parts of the array with
 * @parameter arr: array to explode
 */
function explodeAssoc($glue,$str)
{
   $arr=explode($glue,$str);

   $size=count($arr);

   for ($i=0; $i < $size/2; $i++)
       $out[$arr[$i]]=$arr[$i+($size/2)];  // here the out array key is the left side of the string which is determined by the loop counter being the half of the object count and the value of a key is always 1 shift after the half of the count.. this is clever

   return($out);
};


$imp = implodeAssoc("%", $array);

echo $imp;

/// out put of $imp = foo%bar%baz%5%12%8  it separites the key at the left and values at right

$exp = explodeAssoc("%", $imp);

var_dump($exp)

/// out put of $exp = array(3) { ["foo"]=> string(1) "5" ["bar"]=> string(2) "12" ["baz"]=> string(1) "8" } this is the constrarcted back associated array from string

// echo $exp['foo']




?>