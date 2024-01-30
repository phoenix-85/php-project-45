<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'What number is missing in the progression?';
    $generateProblem = __NAMESPACE__ . '\\generateProblem';
    $getCorrectAnswer = __NAMESPACE__ . '\\getCorrectAnswer';
    startGame($startMessage, $generateProblem, $getCorrectAnswer);
}

function generateProblem(): array
{
    $startnum = rand(0, 99);
    $iteration = rand(1, 10);
    $lengthprog = rand(5, 10);
    $position = rand(1, $lengthprog - 2);

    $progression = [$startnum];

    for ($j = 1; $j < $lengthprog; $j++) {
        $progression[] = $progression[$j - 1] + $iteration;
    }
    $progression[$position] = '..';

    return $progression;
}

function getCorrectAnswer(...$progression): string
{
    $position = array_search('..', $progression);
    return ($progression[$position - 1] + $progression[$position + 1]) / 2;
}
