<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/23/17
 * Time: 12:10 PM
 */

/**
 * вводные функции к заданию
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

function reverse($list)
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

function listToString($list)
{
    $arr = [];
    $iter = function ($items) use (&$arr, &$iter) {
        if ($items != null) {
            $arr[] = car($items);
            $iter(cdr($items));
        }
        
    };
    $iter($list);
    
    return "(" . implode(", ", $arr) . ")";
}

function makeList()
{
    return array_reduce(array_reverse(func_get_args()), function ($acc, $item) {
        return cons($item, $acc);
    });
}


/*
 * Задание
 * Реализуйте функцию filter, используя итеративный процесс.
 */
$func = function ($item) {
    return 0 === $item % 2;
};
$list = makeList(1, 2, 3, 5, 10, 100, 102, 103, 104);

function filter($func, $list) {
    if ($list == null) {
        return null;
    }
    $itr = function ($list, $acc) use (&$itr, $func) {
        if ($list == null) {
            return reverse($acc);
        }
        if ($func(car($list))) {
            return $itr(cdr($list), cons(car($list), $acc));
        } else {
            return $itr(cdr($list), $acc);
        }
    };
    return $itr($list, null);
}

echo listToString(filter($func, $list));
