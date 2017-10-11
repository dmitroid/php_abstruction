<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/11/17
 * Time: 10:22 AM
 */
// визначення функція яка свій аргумент приводить до степення через замикання і пряме визначення лямбди
$exponent = 3;
$func = function ($num) use ($exponent) {
  return $num ** $exponent;
};

echo $func(2);
echo "<br/>";
// та ж функція без замиканням сама на себе. лямбда вираховується в середині неї самої
function power ($exponent) {
    return function ($num) use ($exponent) {
      return $num ** $exponent;
    };
}

$foo = power(4);
echo $foo(2);