<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/30/17
 * Time: 3:24 PM
 */

function newAccaunt ($balance)
{
    $deposit = function ($amount) use ($balance) {
        $balance += $amount;
        return $balance;
    };
    $withdraw = function ($amount) use ($balance) {
        $balance -= $amount;
        return $balance;
    };
    
    return function ($funcName, $amount) use ($deposit, $withdraw) {
        switch ($funcName) {
            case "deposit":
                return $deposit($amount);
                break;
                
            case "withdraw":
                return $withdraw($amount);
                break;
        }
    };
}

$d = newAccaunt(100);

print_r($d);

echo $d("deposit", 20);

echo $d("withdraw", 1000);