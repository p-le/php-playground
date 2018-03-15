<?php

class A
{
    public function __wakeup() {
        echo "Good morning" . PHP_EOL;
    }
};

class B {}

$a = new A();
$stored = serialize($a);
unset($a);
// this works because the class name is allowed
$a = unserialize($stored, ['allowed_classes' => [A::class]]);
// this creates __PHP_Incomplete_Class because the class doesn't match
$b = unserialize($stored, ['allowed_classes' => [B::class]]);
// this creates __PHP_Incomplete_Class because no classes are allowed
$c = unserialize($stored, ['allowed_classes' => false]);
// this works because all classes are allowed
$d = unserialize($stored, ['allowed_classes' => true]);
// this generates a warning because the parameter type is incorrect
$e = unserialize($stored, ['allowed_classes' => 'Not boolean or array']);