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
    $position = rand(0, $lengthprog - 1);
    $progression = [$startnum];
    ($position == 0) ? $progression_string = ".." : $progression_string = "$progression[0]";

    for ($j = 1; $j < $lengthprog; $j++) {
        $progression[] = $progression[$j - 1] + $iteration;
        $progression_string .= ($position == $j) ? " .." : " $progression[$j]";
    }

    $question = "$progression_string";

    return [$question, [$progression, $position]];
}

function getCorrectAnswer(array $progression, int $position): string
{
    return $progression[$position];
}
