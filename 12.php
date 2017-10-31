<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/19/17
 * Time: 2:52 PM
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
function car($pair)
{
    return $pair("car");
}
function cdr($pair)
{
    return $pair("cdr");
}

$map = function ($func, $list) use (&$map) {
    if ($list == null) {
        return null;
    } else {
        $rest = $map($func, cdr($list));
        return cons($func(car($list)), $rest);
    }
};
$func = function($i) {return $i * 3; };
echo print_r(($map($func, cons(1, cons(2, cons(3, null))))));
