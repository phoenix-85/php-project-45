<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $generateProblem = __NAMESPACE__ . '\\generateProblem';
    $getCorrectAnswer = __NAMESPACE__ . '\\getCorrectAnswer';
    startGame($startMessage, $generateProblem, $getCorrectAnswer);
}
function generateProblem(): array
{
    $num = rand(1, 99);
    return [$num];
}

function getCorrectAnswer(int $num): string
{
    return ($num % 2 == 0) ? 'yes' : 'no';
}
