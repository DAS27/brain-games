<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN = 1;
const MAX = 100;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function run()
{
    $generateData = function () {
        $question = rand(MIN, MAX);
        $expectedAnswer = (string) isPrime($question) ? 'yes' : 'no';

        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}
