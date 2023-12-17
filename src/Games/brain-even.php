<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;

function startMessage(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generateProblem(): array
{
    $num = rand(0, 99);

    askQuestion("$num");

    return [$num];
}

function getCorrectAnswer(int $num): string
{
    return ($num % 2 == 0) ? 'yes' : 'no';
}

function checkProblem($useranswer, $correctanswer): bool
{
    return ($useranswer == $correctanswer);
}

require_once './src/Engine.php';