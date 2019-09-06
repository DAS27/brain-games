<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_PROGRESSION = 10;
const MIN_VALUE = 0;
const MAX_VALUE = 100;
const MIN_STEP = 1;
const MAX_STEP = 10;

function run()
{
    $generateData = function () {
        $begin = rand(MIN_VALUE, MAX_VALUE);
        $step = rand(MIN_STEP, MAX_STEP);
        $progression = makeProgression($begin, $step, LENGTH_PROGRESSION);
        $missingItemIndex = $progression[array_rand($progression)];
        $progression = str_replace($missingItemIndex, '...', $progression);
        $question = implode(' ', $progression);
        $expectedAnswer = (string) $missingItemIndex;

        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}

function makeProgression($begin, $step, $lengthProgression)
{
    $result = [];
    $firstElement = $begin;
    for ($i = 1; $i <= $lengthProgression; $i++) {
        $result[] = $firstElement;
        $firstElement += $step;
    }
    
    return $result;
}
