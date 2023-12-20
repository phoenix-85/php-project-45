<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;
const START_MESSAGE = 'What is the result of the expression?';
const ACTIONS = ['+', '-', '*'];

function generateProblem(): array
{
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);
    $action = ACTIONS[array_rand(ACTIONS)];

    askQuestion("$num1 $action $num2");

    return [$num1, $num2, $action];
}

function getCorrectAnswer(int $num1, int $num2, string $action): string
{
    return match ($action) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2
    };
}

require_once __DIR__ . '/../Engine.php';
