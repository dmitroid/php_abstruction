<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/19/17
 * Time: 3:23 PM
 */
// Реализуйте map используя итеративный процесс.
// Подсказки:
// Функция reverse переворачивает список. Она доступна в скрипте.

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

function map($func, $list)
{
    // BEGIN (write your solution here)
    $foo = function ($func, $list, $acc) use (&$foo) {
        if ($list == null) {
            return $acc;
        } else {
            return $foo($func, cdr($list), cons(car($list), $acc));
        }
    };
    
    return $foo($func, $list, null);
    // END
}

$func = function($i) {return $i * 3; };
$list = cons(5, cons(2, cons(3, null)));

print_r(map($func, $list));