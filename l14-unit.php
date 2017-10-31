<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/23/17
 * Time: 4:07 PM
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

function map(callable $func, $list)
{
    $map = function ($items, $acc) use (&$map, $func) {
        if (is_null($items)) {
            return reverse($acc);
        }
        return $map(cdr($items), cons($func(car($items)), $acc));
    };
    return $map($list, null);
}
/**
 * Filters list $list using callable function $func
 * @param  callable $func function
 * @param  callable $list list
 * @return callable list
 */
function filter(callable $func, $list)
{
    $map = function ($func, $items) use (&$map) {
        if ($items === null) {
            return null;
        } else {
            $curr = car($items);
            $rest = $map($func, cdr($items));
            // filter
            return $func($curr) ? cons($curr, $rest) : $rest;
        }
    };
    return $map($func, $list);
}
/**
 * Collapses the list $list using callable function $func
 * @param  callable $func function
 * @param  callable $list list
 * @param  mixed   $acc
 * @return mixed
 */
function reduce(callable $func, $list, $acc = null)
{
    $iter = function ($items, $acc) use (&$iter, $func) {
        return is_null($items) ? $acc : $iter(cdr($items), $func(car($items), $acc));
    };
    return $iter($list, $acc);
}

$list = makeList(1, 2, 3, 4, 5);

function solution($list) {
    $rnd = function($item) {
        return ceil($item);
    };
    $isOdd = function($item) {
        return (($item % 2) == 0);
    };
    $pzvd = function($item1, $item2) {
        return ($item1 * $item2);
    };
    
    return reduce($pzvd, filter($isOdd, map($rnd, $list)), 1);
}

echo listToString(makeList(solution($list)));

/*
 * Решение учителя
 function solution($list)
{
    $r1 = map(function ($item) {
        return ceil($item);
    }, $list);

    $r2 = filter(function ($item) {
        return $item % 2 === 0;
    }, $r1);

    $r3 = reduce(function ($item, $acc) {
        return $acc * $item;
    }, $r2, 1);

    return $r3;
}
 */