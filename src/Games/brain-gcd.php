<?php

require_once './src/Engine.php';

use function BrainGames\engine\verbose;
use function BrainGames\engine\askQuestion;
use function BrainGames\engine\getUserAnswer;
use function BrainGames\engine\wrongAnswer;

function getDivisors(int $num): array
{
    $arr = [1];
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i == 0)
            $arr[] = $i;
    }
    $arr[] = $num;
    return $arr;
}

function getCorrectAnswer(int $num1, int $num2): int
{
    $div1 = getDivisors($num1);
    $div2 = getDivisors($num2);
    return max(array_intersect($div1, $div2));
}

verbose('Find the greatest common divisor of given numbers.');

for ($i = 0; $i < 3; $i++) {
    $num1 = rand(0, 99);
    $num2 = rand(0, 99);

    askQuestion("{$num1} {$num2}");                             //Выводим задание для пользователя

    $useranswer = getUserAnswer();                              //Получаем ответ пользователя
    $useranswertoint = (int) $useranswer;                       //Приводим ответ к целому
    $correctanswer = getCorrectAnswer($num1, $num2);            //Получаем правильный ответ

    if ($useranswertoint != $correctanswer) {
        wrongAnswer($useranswer, $correctanswer, $name, $endmsg);
        break;
    }

    verbose("Correct!");
}

verbose($endmsg);
