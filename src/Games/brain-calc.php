<?php

namespace BrainGames\Games\Brain\Calc;

use function BrainGames\Cli\askQuestion;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'What is the result of the expression?';
    $pathToFunction = __NAMESPACE__;
    startGame($startMessage, $pathToFunction);
}

function generateProblem(): array
{
    $actions = ['+', '-', '*'];
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);
    $action = $actions[array_rand($actions)];

    askQuestion("$num1 $action $num2");

    return [$num1, $num2, $action];
}

function getCorrectAnswer(int $num1, int $num2, string $action): string
{
    return match ($action) {
        "+" => $num1 + $num2,
        "-" => $num1 - $num2,
        "*" => $num1 * $num2,
        default => ""
    };
}
