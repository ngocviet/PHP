<?php
$a = 5;
$a = floatval($a);
print_r(gettype($a));

$arr = [1,2,3,4,5];
$arr2 = array (1,2,3,4,5,);
echo "<br>";
define('VERSION', '1,5');
echo VERSION;



function ingiatri(){
    $x = 10;
    echo '<br>in ra bien x:'.$x;
}
ingiatri();