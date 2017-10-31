<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/13/17
 * Time: 4:16 PM
 */

require_once("l11-unit1.php");

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
 * Реализуйте функцию append, которая соединяет два списка;
 */
function reverse($list)
{
    $iter = function ($list) use (&$iter) {
        if ($list == null) {
            return $iter;
        }
        return cons($iter(cdr($list)), car($list));
    };

    return $iter($list);

}

function append($list1, $list2)
{
    //if (cdr($list1) == null) {
    //    return cons(car($list1),$list2);
    //} else {
    //    return cons(car($list1), append(cdr($list1), $list2));
    //}

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

    $list1 = reverse($list1);

    $foo = function ($list1, $list2, $acc) use (&$foo) {
        if ($list1 == null) {
            return $acc;
        } else {
            return $foo(cdr($list1), $list2, cons(car($list1), $acc));
        }
    };

    return $foo($list1, $list2, $list2);
}

$list = cons(1, cons(2, null));
$list2 = cons(3, cons(4, null));

//echo Append\length($list1);

print_r(append($list, $list2));