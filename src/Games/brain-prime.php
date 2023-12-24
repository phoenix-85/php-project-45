<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $generateProblem = __NAMESPACE__ . '\\generateProblem';
    $getCorrectAnswer = __NAMESPACE__ . '\\getCorrectAnswer';
    startGame($startMessage, $generateProblem, $getCorrectAnswer);
}

function generateProblem(): array
{
    $num = rand(0, 99);

    line("Question: $num");

    return [$num];
}

function getCorrectAnswer(int $num): string
{
    if (($num == 0) || ($num == 1)) {
        return  'no';
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}
