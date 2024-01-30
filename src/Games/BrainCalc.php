<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'What is the result of the expression?';
    $generateProblem = __NAMESPACE__ . '\\generateProblem';
    $getCorrectAnswer = __NAMESPACE__ . '\\getCorrectAnswer';
    startGame($startMessage, $generateProblem, $getCorrectAnswer);
}

function generateProblem(): array
{
    $actions = ['+', '-', '*'];
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);
    $action = $actions[array_rand($actions)];

    return [$num1, $action, $num2];
}

function getCorrectAnswer(int $num1, string $action, int $num2): string
{
    return match ($action) {
        "+" => $num1 + $num2,
        "-" => $num1 - $num2,
        "*" => $num1 * $num2,
        default => throw new \Exception('Ошибка!')
    };
}
