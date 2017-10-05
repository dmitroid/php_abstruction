<?php
/**
 * Created by PhpStorm.
 * User: bd
 * Date: 15.09.2017
 * Time: 12:34
 */
$square = function($n)
{
    return $n * $n;
};

echo $square(3) . PHP_EOL;

$SumOfSquare = function($num1, $num2) use ($square)
{
    return $square($num1) + $square($num2);
};

$num1 = 4;
$num2 = 5;

echo $SumOfSquare($num1, $num2);
