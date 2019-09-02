<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_PROGRESSION = 10;
const MIN_VALUE = 0;
const MAX_VALUE = 100;
const MIN_STEP = 1;
const MAX_STEP = 10;

function makeProgressive()
{
    $begin = rand(MIN_VALUE, MAX_VALUE);
    $step = rand(MIN_STEP, MAX_STEP);
    $progressive = [];

    for ($i = 1; $i <= LENGTH_PROGRESSION; $i++) {
        $progressive[] = $begin + $step * $i;
    }
    
    return $progressive;
}

function run()
{
    $generateData = function () {
        $progression = makeProgressive();
        $missNumber = $progression[array_rand($progression)];
        $progression = str_replace($missNumber, '...', $progression);
        $question = implode(' ', $progression);
        $expectedAnswer = (string) $missNumber;

        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}
