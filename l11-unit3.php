<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/13/17
 * Time: 5:25 PM
 */

function cons($x, $y)
{
    return function ($func) use ($x, $y) {
        return $func($x, $y);
    };
}

function car(callable $pair)
{
    // BEGIN (write your solution here)
    $res = function ($x, $y) {
        return $x;
    };
    return $pair($res);
    // END
}

function cdr(callable $pair)
{
    // BEGIN (write your solution here)
    $res = function ($x, $y) {
        return $y;
    };
    return $pair($res);
    // END
}

function reverse($list)
{
    $iter = function ($list, $acc) use (&$iter) {
        if (cdr($list) == null) {
            return cons(car($list),$acc);
        }
        return $iter(cdr($list), cons(car($list), $acc));
    };

    return $iter($list, null);

}

$list = cons(1, cons(2, cons(3, null)));

print_r(reverse($list));