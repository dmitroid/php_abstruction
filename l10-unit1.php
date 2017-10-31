<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/12/17
 * Time: 10:00 AM
 */

/*
 * Реализуйте функцию subRat, которая производит вычитание рациональных чисел.
 * При этом (с точки зрения внутренней реализации) функция возвращает в качестве результата новую пару
 * (т.е. исходные пары, являющиеся параметрами функции, не изменяются).
 */

function makeRat($numer, $denom)
{
    return cons($numer, $denom);
}

function printRat ($rat)
{
    printf("%d/%d", numer($rat), denom($rat));
}

function numer($rat)
{
    return car($rat);
}

function denom($rat)
{
    return cdr($rat);
}
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

// BEGIN (write your solution here)

$rat1 = makeRat(1,2);
$rat2 = makeRat(2,5);
printRat($rat1);

function subRat ($rat1, $rat2)
{
    $numer = numer($rat1) * denom($rat2) - numer($rat2) * denom($rat1);
    $denom = denom($rat1) * denom($rat2);

    return makeRat($numer, $denom);
}
printRat(subRat($rat1, $rat2));
// END