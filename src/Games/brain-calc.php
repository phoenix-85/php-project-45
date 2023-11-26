<?php

require_once './src/Engine.php';

use function BrainGames\engine\verbose;
use function BrainGames\engine\askQuestion;
use function BrainGames\engine\getUserAnswer;
use function BrainGames\engine\wrongAnswer;

function getCorrectAnswer(int $num1, int $num2, string $action):int{
    switch ($action){
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
    }
}

$actions = ['+', '-', '*'];

verbose('What is the result of the expression?');

for ($i = 0; $i < 3; $i++){
    
    $num1 = rand(0, 99);
    $num2 = rand(0, 99);
    $action = $actions[array_rand($actions)];
    
    askQuestion("{$num1} {$action} {$num2}");                   //Выводим задание для пользователя
    
    $useranswer = getUserAnswer();                              //Получаем ответ пользователя
    $useranswertoint = (int) $useranswer;                       //Приводим ответ к целому
    $correctanswer = getCorrectAnswer($num1, $num2, $action);   //Получаем правильный ответ
    
    if ($useranswertoint != $correctanswer){
        wrongAnswer($useranswer, $correctanswer, $name, $endmsg); 
        break;
    }
    
    verbose("Correct!");    
}

verbose($endmsg);