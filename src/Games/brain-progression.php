<?php

require_once './src/Engine.php';

use function BrainGames\engine\verbose;
use function BrainGames\engine\askQuestion;
use function BrainGames\engine\getUserAnswer;
use function BrainGames\engine\wrongAnswer;

verbose('What number is missing in the progression?');

for ($i = 0; $i < 3; $i++) {
    $startnum = rand(0, 99);
    $iteration = rand(1, 10);
    $lengthprog = rand(5, 10);
    $position = rand(0, $lengthprog - 1);
    $progression = [$startnum];
    ($position == 0) ? $progression_string = ".." : $progression_string = "{$progression[0]}";

    for ($j = 1; $j < $lengthprog; $j++) {
        $progression[] = $progression[$j - 1] + $iteration;
        ($position == $j) ? $progression_string .= " .." : $progression_string .= " {$progression[$j]}";
    }

    askQuestion("{$progression_string}");                       //Выводим задание для пользователя

    $useranswer = getUserAnswer();                              //Получаем ответ пользователя
    $useranswertoint = (int) $useranswer;                       //Приводим ответ к целому
    $correctanswer = $progression[$position];                   //Получаем правильный ответ

    if ($useranswertoint != $correctanswer) {
        wrongAnswer($useranswer, $correctanswer, $name, $endmsg);
        break;
    }

    verbose("Correct!");
}

verbose($endmsg);
