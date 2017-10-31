<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/31/17
 * Time: 12:57 PM
 */

function random($seed) {
    return function () use (&$seed) {
        $a = 45;
        $c = 21;
        $m = 67;
        $seed = ($a * $seed + $c) % $m;
        
        return $seed;
    };
}

$a = random(10);

echo $a();
echo $a();