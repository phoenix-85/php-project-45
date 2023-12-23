<?php

namespace BrainGames\Games\Brain\Prime;

use function BrainGames\Cli\askQuestion;
use function BrainGames\Engine\startGame;

function run(): void
{
    $startMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $pathToFunction = '\BrainGames\Games\Brain\Prime\\';
    startGame($startMessage, $pathToFunction);
}

function generateProblem(): array
{
    $num = rand(0, 99);

    askQuestion("$num");

    return [$num];
}

function getCorrectAnswer(int $num): string
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}
