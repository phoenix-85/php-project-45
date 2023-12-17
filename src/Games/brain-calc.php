<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;

const ACTIONS = ['+', '-', '*'];

function startMessage(): string
{
    return 'What is the result of the expression?';
}

function generateProblem(): array
{
    $num1 = rand(0, 99);
    $num2 = rand(0, 99);
    $action = ACTIONS[array_rand(ACTIONS)];

    askQuestion("$num1 $action $num2");

    return [$num1, $num2, $action];
}

function getCorrectAnswer(int $num1, int $num2, string $action): int
{
    return match ($action) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2
    };
}

function checkProblem($useranswer, $correctanswer): bool
{
    return ((int)$useranswer == $correctanswer);
}

require_once './src/Engine.php';