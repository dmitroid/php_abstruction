<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 12:21 PM
 */

/**
 * Реализуйте функцию double, которая принимает как аргумент функцию с одним аргументом и возвращает функцию,
 * которая применяет исходную функцию дважды.
 *  Решение учителя
// BEGIN
return function ($arg) use ($func) {
return $func($func($arg));
};
// END
 */

function double($func) {
    return function ($arg) use ($func) {
        return twice($arg, $func);
    };
}
function twice($arg, $func) {
    return $func($func($arg));
}

$inc = function ($arg) {
    return $arg + 1;
};
$inc2 = double($inc);
$inc4 = double($inc2);
echo $inc4(2);