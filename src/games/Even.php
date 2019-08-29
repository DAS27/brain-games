<?php

namespace BrainGames\Games\Even;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN = 0;
const MAX = 100;

function run()
{
    $generateData = function () {
        $question = rand(MIN, MAX);
        $expectedAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}

function isEven(int $num):bool
{
    return $num % 2 === 0;
}
