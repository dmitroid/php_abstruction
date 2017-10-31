<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 5:11 PM
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

$pair = cons(1, 5);
print_r($pair);
echo cdr($pair);