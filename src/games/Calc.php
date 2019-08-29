<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Game\runGame;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const MIN = 0;
const MAX = 100;

function run()
{
    $generateData = function () {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = "$number1 $operator $number2";
        $expectedAnswer = 0;

        switch ($operator) {
            case '+':
                $expectedAnswer = (string) ($number1 + $number2);
                break;
            case '-':
                $expectedAnswer = (string) ($number1 - $number2);
                break;
            case '*':
                $expectedAnswer = (string) ($number1 * $number2);
                break;
        }

        return [$question, $expectedAnswer];
    };

    runGame(DESCRIPTION, $generateData);
}
