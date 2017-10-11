<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/6/17
 * Time: 4:37 PM
 */

/**
 * Реализуйте рекурсивную функцию smallestDivisor, используя линейно-итеративный процесс.
 *  Функция должна находить минимальный делитель переданного числа.
 * Минимальный делитель числа - это наименьшее число, на которое делится исходное без остатка.
 */

function smallestDivisor($n) {
    $divisior = function($acc) use ($n, &$divisior) {
        if ($n < 2) { return 1;}
        if ($n % $acc == 0) {return $acc;}
        return $divisior($acc+1);
    };

      return $divisior(2);
}

echo smallestDivisor(5);