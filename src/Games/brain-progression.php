<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;

function startMessage(): string
{
    return 'What number is missing in the progression?';
}

function generateProblem(): array
{
    $startnum = rand(0, 99);
    $iteration = rand(1, 10);
    $lengthprog = rand(5, 10);
    $position = rand(0, $lengthprog - 1);
    $progression = [$startnum];
    ($position == 0) ? $progression_string = ".." : $progression_string = "{$progression[0]}";

    for ($j = 1; $j < $lengthprog; $j++) {
        $progression[] = $progression[$j - 1] + $iteration;
        ($position == $j) ? $progression_string .= " .." : $progression_string .= " {$progression[$j]}";
    }

    askQuestion("$progression_string");

    return [$progression, $position];
}

function getCorrectAnswer(array $progression, int $position): string
{
    return $progression[$position];
}

function checkProblem($useranswer, $correctanswer): bool
{
    return ((int) $useranswer == $correctanswer);
}

require_once './src/Engine.php';
