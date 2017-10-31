<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/23/17
 * Time: 5:59 PM
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

function treeMap($list, $func, $acc) {
    $iter = function ($list, $acc) use (&$iter, $func) {
      if ($list === null) {
          return $acc;
      }
      
      $element = car($list);
      if (isPair($element)) {
          $newAcc = treeMap($element, $func, $acc);
      } else {
          $newAcc = $func($element, $acc);
      }
      return $iter(cdr($list), $newAcc);
    };
    return $iter($list, $acc);
}


$list = l(1, 3, l(1, l(2, 3), 2), 9 );

$result = treeMap($list, function ($item, $acc) { return $acc+1;}, 0);

echo listToString($result);