<?php
namespace Append;

/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/13/17
 * Time: 12:03 PM
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

/**
 * Реализуйте функцию length, которая считает длину списка;
 */

function length($items)
{
    if ($items == null) {
        return null;
    }
    $lng = function ($items, $acc) use (&$lng) {
        if (cdr($items) == null) {
            return $acc;
        } else {
            return $lng(cdr($items), $acc+1);
        }
    };

    return $lng($items, 1);
}

$list = null;

echo length($list);