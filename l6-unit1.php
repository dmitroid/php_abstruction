<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/6/17
 * Time: 4:12 PM
 */

/**
 * Реализуйте рекурсивную функцию factorial, используя линейно-итеративный процесс.
 *factorial(3); // 6
 */

function factorial($n) {
    $fact = function($n, $acc) use (&$fact) {
        if ($n == 0) { return $acc;}
        return $fact ($n - 1, $acc * $n);
    };

    return $fact($n, 1);
}

echo factorial(1);