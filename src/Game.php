<?php

namespace BrainGames\Game;

use function \cli\line;
use function \cli\prompt;

const ROUNDS_COUNT = 3;

function runGame($description, $getDataGame)
{
    line('Welcome to the Brain Game!');
    line($description);
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $expectedAnswer] = $getDataGame();
        line('Question: %s!', $question);
        $userAsnwer = prompt('Your answer');
        if ($userAsnwer === $expectedAnswer) {
            line('Correct!');
        } else {
            line("{$userAsnwer} is wrong answer ;(. Correct answer was {$expectedAnswer}");
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line('Congratulations %s!', $userName);
}
