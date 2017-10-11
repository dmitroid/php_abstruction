<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/9/17
 * Time: 5:47 PM
 */
/**
 *    // BEGIN
* if ($num1 == $num2) {
* return $num2;
* }
* return $func(product($num1, $num2 - 1, $func), $num2);
*     // END
 */
function product($num1, $num2, $func)
{
    // BEGIN (write your solution here)
    if ($num1 === $num2) {return $num1;}
    $itrFunc = function($num1, $num2, $acc) use (&$func, &$itrFunc) {
        if ($num1 == $num2-1) {return $acc;}
        $current = $num1+1;
        $next = $current+1;
        return $itrFunc($num1+1, $num2, $func($acc, $next));
    };
    return $itrFunc($num1, $num2, $func($num1, $num1+1));
    // END
}

$m = function ($num1, $num2) {
    return $num1 - $num2;
};

$func = function ($num1, $num2) {
    return $num1 * $num2 + $num2;
};

echo product(2,4, $func);