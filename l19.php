<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/30/17
 * Time: 3:52 PM
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