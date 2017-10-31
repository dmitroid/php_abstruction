<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 5:54 PM
 */

/**
 * В текущем задании представлен другой способ реализации пар.
 * Допишите функцию car основываясь на том как работает функция cons.
 * Допишите функцию cdr основываясь на том как работает функция cons.
 */

/* Решение учителя
 *     // BEGIN
    return $pair(function ($first, $second) {
        return $first;
    });
    // END    // BEGIN
    return $pair(function ($first, $second) {
        return $second;
    });
    // END
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

$pair = cons(1, 5);


echo cdr($pair);