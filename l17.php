<?php
/**
 * Created by PhpStorm.
 * User: dmitroid
 * Date: 10/27/17
 * Time: 11:21 AM
 */

$balance = 100;

// echo $balance;

function debit(&$balance, $amount) {
    return $balance += $amount;
}

// echo debit($balance, 10);

function newDebit($balance) {
    return function ($amount) use ($balance) {
        // TODO: write check
        $balance += $amount;
        
        return $balance;
    };
}

$d = newDebit(10);

echo $d(30);

echo $d(100);