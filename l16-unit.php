<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/24/17
 * Time: 11:42 AM
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

function map($list, $func)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return reverse($acc);
        }
        
        return $iter(cdr($list), cons($func(car($list)), $acc));
    };
    return $iter($list, null);
}

function filter($list, $func)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return reverse($acc);
        }
        
        $newAcc = $func(car($list)) ? cons(car($list), $acc) : $acc;
        return $iter(cdr($list), $newAcc);
    };
    return $iter($list, null);
}

function length($list)
{
    $iter = function ($list, $acc) use (&$iter) {
        if ($list === null) {
            return $acc;
        }
        
        return $iter(cdr($list), $acc + 1);
    };
    return $iter($list, 0);
}

/*
 * Задание
 * Реализуйте функцию solution, которая принимает на вход список чисел и выполняет следующие действия:
 * удаляет все числа, не кратные трем.
 * возводит оставшиеся числа в квадрат.
 * возвращает среднее арифметическое списка полученного после предыдущей операции.
 */

$list = l(1, 3, 8, 9, 15, 4, -3, -6);

function solution ($list) {
    $result = filter($list, function ($item) {
        return $item % 3 == 0;
    });
    $result1 = map($result, function ($item) {
        return $item ** 2;
    });
    
    $result2 = accumulate($result1, function ($item, $acc) {
        return ($acc + $item);
    }, 0);
    
    return $result2 / length($result1);
    
}
echo solution($list);

