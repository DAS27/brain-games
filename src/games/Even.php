<?php

namespace BrainGames\Games\Even;

use function \cli\line;
use function \cli\prompt;

const ROUNDS_COUNT = 3;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 1; $i <= ROUNDS_COUNT;) {
        $number = rand(1, 100);
        line('Question: %s', $number);
        $userAnswer = prompt('Your answer');
        $expectedAnswer = isEven($number) ? 'yes' : 'no';
        if ($expectedAnswer === $userAnswer) {
            $i = $i + 1;
            line('Correct!');
        } else {
            $i = 1;
        }
    }
    
    line('Congratulation %s!', $name);
}

function isEven($number)
{
    return $number % 2 === 0;
}
