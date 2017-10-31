<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/23/17
 * Time: 5:58 PM
 */

function cons($x, $y)
{
    return function ($method) use ($x, $y) {
        switch ($method) {
            case "car":
                return $x;
            case "cdr":
                return $y;
        }
    };
}

function car(callable $pair)
{
    return $pair("car");
}

function cdr(callable $pair)
{
    return $pair("cdr");
}

function listToString($list)
{
    if (!isPair($list)) {
        return $list;
    }
    
    $arr = [];
    $iter = function ($items) use (&$arr, &$iter) {
        if ($items != null) {
            $arr[] = listToString(car($items));
            $iter(cdr($items));
        }
        
    };
    $iter($list);
    
    return "(" . implode(", ", $arr) . ")";
}

function l()
{
    return array_reduce(array_reverse(func_get_args()), function ($acc, $item) {
        return cons($item, $acc);
    });
}

function accumulate($list, $func, $acc)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return $acc;
        }
        
        return $iter(cdr($list), $func(car($list), $acc));
    };
    return $iter($list, $acc);
}

function isPair($item)
{
    return is_callable($item);
}
function rev($list)
{
    $iter = function ($items, $acc) use (&$iter) {
        if ($items === null) {
            return $acc;
        } else {
            return $iter(cdr($items), cons(car($items), $acc));
        }
    };
    
    return $iter($list, null);
}
/*
 * Реализуйте функцию reverse, которая переворачивает переданный на вход список рекурсивно.
 */
$list = l(1, l(3, 2), 5, l(6, l(5, 4)));

//       ((6, (5, 4)), 5, (3, 2), 1)
function reverse($list)
{
    // BEGIN (write your solution here)
   // if (isPair(car($list))) {
   //     return l(reverse(cdr($list)));
   // }
    
    $itr = function ($list, $acc) use (&$itr) {
            if ($list == null) {
                return $acc;
            }
            return $itr(cdr($list),cons(car($list), $acc));
        };
    
    return $itr($list, null);
    // END
}
echo listToString(reverse($list));

