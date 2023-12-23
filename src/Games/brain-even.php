<?php

namespace BrainGames\Games\Brain\Even;

use function BrainGames\Cli\askQuestion;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'Answer "yes" if the number is even, otherwise answer "no".';
    $pathToFunction = __NAMESPACE__;
    startGame($startMessage, $pathToFunction);
}
function generateProblem(): array
{
    $num = rand(1, 99);
    askQuestion("$num");
    return [$num];
}

function getCorrectAnswer(int $num): string
{
    return ($num % 2 == 0) ? 'yes' : 'no';
}
