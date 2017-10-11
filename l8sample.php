<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 10:36 AM
 */
//генератор сум, повернення функції як значення

function sumGenerator($func) {
    return function ($a, $b) use ($func) {
        return sum($a, $b, $func);
    };
}

function sum($a, $b, $func) {
    if ($a > $b) {return 0;}
    return $func($a) + sum($a+1, $b, $func);
}

$sumIntegers = sumGenerator(function ($x) {return $x * $x;});
echo $sumIntegers(1, 5);