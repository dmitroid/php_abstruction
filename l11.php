<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/12/17
 * Time: 11:16 AM
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
 * @param $list список пар
 * @param $n номер позиции в списке
 * @return mixed
 */
function listRef($list, $n)
{
    if ($n == 0) {
        return car($list);
    } else {
        return listRef(cdr($list), $n - 1);
    }
}

$list = cons(1, cons(2, cons(3, cons(4, null))));

echo listRef($list, 1);


