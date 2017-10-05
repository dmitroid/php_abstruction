<?php
/**
 * Created by PhpStorm.
 * User: bd
 * Date: 15.09.2017
 * Time: 15:38
 */

// echo pow(2, 4);

function MyPow($base, $exp)
{
    while ($exp > 1) {
        return $base * MyPow($base, $exp-1);
    }
    return $base;
}
echo MyPow(5, 4);
echo PHP_EOL;

function factorial($n) {
    if ($n >= 1) {
        return $n * factorial($n-1);
    }
        elseif ($n == 1 || $n == 0)
        {
        return 1;
    }
}
echo factorial(10);
