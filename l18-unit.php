<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/30/17
 * Time: 3:35 PM
 */

function newAccount($balance, $password)
{
    $withdraw = function ($amount) use (&$balance) {
        $balance -= $amount;
        return $balance;
    };
    
    $deposit = function ($amount) use (&$balance) {
        $balance += $amount;
        return $balance;
    };
    
    return function ($funcName, $amount, $checkpass) use ($deposit, $withdraw, $password) {
        if ($checkpass === $password) {
            switch ($funcName) {
                case "deposit":
                    return $deposit($amount);
                    break;
        
                case "withdraw":
                    return $withdraw($amount);
                    break;
            }
        } else {
            return "wrong password!";
        }

    };
}

$d = newAccount(100, "secret");
print_r($d);

echo $d("deposit", 20, "nosecret");