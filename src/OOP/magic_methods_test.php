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

    public static function __callStatic($method, $aguments)
    {
        echo __CLASS__ . "has no static $method method\n";
    }
}

$myAccount = new BankBalance();
$myAccount->balance = 100;
echo $myAccount->nonExistingProperty;

// trigger __call method
$myAccount->getBalance();
// trigger __callStatic method
BankBalance::getBankList();

class Invoker 
{
    public function __invoke($num)
    {
        return $num ** 2;
    }
}

$invoker = new Invoker();
var_dump($invoker(2));

class DebugInfoTest{
    private $wmd    = 'Nuke';
    public $oil     = 'Lots';
    
    public function __debugInfo()
    {
        return [
            'oil' => $this->oil
        ];
    }
}

var_dump(new DebugInfoTest());