<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 11:05 AM
 */
/**
 * Реализуйте функцию factor, которая принимает на вход число (множитель) и возвращает функцию.
 * Получившаяся функция принимает на вход один аргумент и возвращает результат умножения этого аргумента на множитель.
 */

function factor($multiplier) {
    return function ($num) use ($multiplier) {
        return $num * $multiplier;
    };
}

$multiTwo = factor(2); // 2 - множитель

echo $multiTwo(2);
echo "<br />";
echo $multiTwo(10);
