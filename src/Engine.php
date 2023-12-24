<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\{welcomeUser, checkAnswer};
use function cli\{line, prompt};

function startGame(string $startMessage, callable $generateProblem, callable $getCorrectAnswer): void
{
//-----------START GAME------------
    $name = welcomeUser();
    line($startMessage);
//-------------ROUNDS--------------
    $isLose = true;
    $rounds = 3;
    for ($i = 0; $i < $rounds; $i++) {
        $problem = call_user_func($generateProblem);
        $correctAnswer = call_user_func($getCorrectAnswer, ...$problem);
        $userAnswer = prompt('Your answer');
        $isLose = !checkAnswer($userAnswer, $correctAnswer);
        if ($isLose) {
            break;
        }
    }
//-------------END GAME------------
    line(($isLose) ? "Let's try again, $name!" : "Congratulations, $name!");
}
