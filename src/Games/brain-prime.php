<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;

function startMessage(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateProblem(): array
{
    $num = rand(0, 99);

    askQuestion("$num");

    return [$num];
}

function getCorrectAnswer(int $num): string
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

function checkProblem($useranswer, $correctanswer): bool
{
    return ($useranswer == $correctanswer);
}

require_once './src/Engine.php';
