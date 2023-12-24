<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\{welcomeUser, getStartMessage, getEndMessage, getUserAnswer, checkAnswer};

function startGame(string $startMessage, callable $generateProblem, callable $getCorrectAnswer): void
{
//-----------START GAME------------
    $name = welcomeUser();
    getStartMessage($startMessage);
//-------------ROUNDS--------------
    $isLose = true;
    for ($i = 0; $i < 3; $i++) {
        $problem = call_user_func($generateProblem);
        $userAnswer = getUserAnswer();
        $correctAnswer = call_user_func($getCorrectAnswer, ...$problem);
        $isLose = checkAnswer($userAnswer, $correctAnswer);
        if ($isLose) {
            break;
        }
    }
//-------------END GAME------------
    getEndMessage($isLose, $name);
}
