<?php

function xrange($start, $limit, $step = 1)
{
    if ($start < $limit) {
        if ($step < 0) {
            throw new LogicException("Step must be +ve");
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException("Step must be -ve");
        }
        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

foreach (xrange(1, 9, 2) as $number) {
    echo "$number" . PHP_EOL;
}

function &getValue()
{

}

$myValue = &getValue();

$lambda = function($a, $b) {
    echo $a + $b;
};
echo gettype($lambda); // true
echo (int)is_callable($lambda); // 1
echo get_class($lambda); // Closure