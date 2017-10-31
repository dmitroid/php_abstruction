<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/27/17
 * Time: 11:45 AM
 */

/*
 * Напишите функцию newWithdraw, которая снимает деньги со счета.
 * При попытке снять больше денег, чем есть на счете, она должна возвращать too much.
 */

function newWithdraw($balance) {
    return function ($amount) use (&$balance) {
        if ($amount > $balance) {
            return 'too much';
        } else {
            $balance = $balance - $amount;
            return $balance;
        }
    };
}

$d = newWithdraw(100);

echo $d(20);
echo $d(20);
echo $d(20);
echo $d(50);