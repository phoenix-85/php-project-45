<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\{welcomeUser, getStartMessage, getEndMessage, getUserAnswer, checkAnswer};

function startGame(string $startMessage, string $pathToFunction): void
{
//-----------START GAME------------
    $name = welcomeUser();
    getStartMessage($startMessage);
//-------------ROUNDS--------------
    for ($i = 0; $i < 3; $i++) {
        $problem = call_user_func($pathToFunction . 'generateProblem');
        $userAnswer = getUserAnswer();
        $correctAnswer = call_user_func($pathToFunction . 'getCorrectAnswer', ...$problem);
        $isLose = checkAnswer($userAnswer, $correctAnswer);
        if ($isLose) {
            break;
        }
    }
//-------------END GAME------------
    getEndMessage($isLose, $name);
}
