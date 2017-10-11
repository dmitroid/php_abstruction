<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/9/17
 * Time: 4:41 PM
 */

/** Реализуйте функцию sum из видео, используя итеративный процесс
*/

function sumFunc($a, $b, $func) {
    $itrSum = function($a, $b, $acc) use (&$itrSum, &$func){
        if ($a == $b) {return $acc;}
        return $itrSum($a+1, $b, $acc + $func($a+1));
    };

    return $itrSum($a, $b, $func($a));
}

$double = function($x) {
    return ($x * $x);
};

echo sumFunc(1, 3, $double);