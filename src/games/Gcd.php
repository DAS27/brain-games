<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN = 1;
const MAX = 100;

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function run()
{
    $generateData = function () {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);

        $question = "$number1 $number2";
        $expectedAnswer = (string) gcd($number1, $number2);

        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}
