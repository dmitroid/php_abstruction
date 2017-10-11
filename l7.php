<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/9/17
 * Time: 3:32 PM
 */
$cube = function($num) {
  return ($num * $num * $num);
};

echo $cube(5);

$sumInt = function($a, $b) use (&$sumInt){
  if ($a > $b) {return 0;}
  return $a + $sumInt($a + 1, $b);
};
echo '<br>';

echo $sumInt(2, 5);

echo '<br>';

$sumCubes = function($a, $b) use (&$sumCubes) {
  if ($a > $b) {return 0;}

  return ($a * $a * $a) + $sumCubes($a+1, $b);
};
echo $sumCubes(2, 3);

echo '<br>';

function sum($a, $b, $func) {
    if ($a > $b) {return 0;}

    return $func($a) + sum($a+1, $b, $func);
}

$quatro = function($x) {
    return ($x * $x * $x *$x);
};

echo sum(2, 4, $quatro);