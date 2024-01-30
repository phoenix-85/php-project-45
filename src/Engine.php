<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\{welcomeUser, checkAnswerAndSayCorrect};
use function cli\{line, prompt};

function startGame(string $startMessage, callable $generateProblem, callable $getCorrectAnswer): void
{
//-----------START GAME------------
    $name = welcomeUser();
    line($startMessage);
//-------------ROUNDS--------------
    $rounds = 3;
    for ($i = 0; $i < $rounds; $i++) {
        $problem = call_user_func($generateProblem);
        line("Question: " . implode(" ", $problem));
        $correctAnswer = call_user_func($getCorrectAnswer, ...$problem);
        $userAnswer = prompt('Your answer');
        $isLose = !checkAnswerAndSayCorrect($userAnswer, $correctAnswer);
        if ($isLose) {
            line("Let's try again, $name!");
            return ;
        }
    }
//-------------END GAME------------
    line("Congratulations, $name!");
}
