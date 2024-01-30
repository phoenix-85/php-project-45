<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'Find the greatest common divisor of given numbers.';
    $generateProblem = __NAMESPACE__ . '\\generateProblem';
    $getCorrectAnswer = __NAMESPACE__ . '\\getCorrectAnswer';
    startGame($startMessage, $generateProblem, $getCorrectAnswer);
}

function generateProblem(): array
{
    $num1 = rand(1, 99);
    $num2 = rand(1, 99);

    return [$num1, $num2];
}

function getCorrectAnswer(int $num1, int $num2): string
{
    $div1 = getDivisors($num1);
    $div2 = getDivisors($num2);
    return max(array_intersect($div1, $div2));
}

function getDivisors(int $num): array
{
    $arr = [1];
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i == 0) {
            $arr[] = $i;
        }
    }
    $arr[] = $num;
    return $arr;
}
