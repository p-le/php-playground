<?php


class BankBalance {
    private $balance;

    public function __get($propertyName)
    {
        return "No value\n";
    }

    public function __set($propertyName, $value)
    {
        echo "Cannot set $propertyName to $value\n";
    }

    public function __call($method, $arguments)
    {
        echo __CLASS__ . "has no $method method\n";
    }
}

$myAccount = new BankBalance();
$myAccount->balance = 100;
echo $myAccount->nonExistingProperty;
// trigger __call method
$myAccount->getBalance();