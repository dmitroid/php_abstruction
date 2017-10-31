<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/23/17
 * Time: 11:58 AM
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

$removeOdds = function ($list) use (&$removeOdds) {
    if ($list == null) {
        return null;
    } else {
        $curr = car($list);
        
        $rest = $removeOdds(cdr($list));
        if ($curr % 2 === 0) {
            return cons($curr, $rest);
        } else {
            return $rest;
        }
    }
};

$list = makeList(1, 2, 3, 5, 10, 100);
echo listToString($removeOdds($list));