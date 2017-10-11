<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/6/17
 * Time: 12:44 PM
 */

function myPow ($base, $exp) {
    $powIter = function ($base, $exp, $acc) use (&$powIter) {
        if ($exp == 0) { return $acc; }
        return $powIter ($base, $exp - 1, $acc * $base);
    };

    return $powIter ($base, $exp, 1);
}

echo myPow(3, 5); // 243
echo myPow(4, 4); // 256