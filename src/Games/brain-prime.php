<?php

namespace BrainGames\game;

use function BrainGames\cli\askQuestion;

const START_MESSAGE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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

require_once __DIR__ . '/../Engine.php';
