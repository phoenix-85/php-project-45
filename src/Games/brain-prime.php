<?php

require_once './src/Engine.php';

use function BrainGames\engine\verbose;
use function BrainGames\engine\askQuestion;
use function BrainGames\engine\getUserAnswer;
use function BrainGames\engine\wrongAnswer;

function getCorrectAnswer(int $num): string
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return 'no';
    }
    return 'yes';
}

verbose('Answer "yes" if given number is prime. Otherwise answer "no".');

for ($i = 0; $i < 3; $i++) {
    $num = rand(0, 99);

    askQuestion("{$num}");                              //Выводим задание для пользователя

    $useranswer = getUserAnswer();                      //Получаем ответ пользователя
    $correctanswer = getCorrectAnswer($num);            //Получаем правильный ответ

    if ($useranswer != $correctanswer) {
        wrongAnswer($useranswer, $correctanswer, $name, $endmsg);
        break;
    }

    verbose("Correct!");
}

verbose($endmsg);
