<?php

require_once './src/Engine.php';

use function BrainGames\engine\verbose;
use function BrainGames\engine\askQuestion;
use function BrainGames\engine\getUserAnswer;
use function BrainGames\engine\wrongAnswer;


function isCorrectedAnswer(string $useranswer):bool{
    $corranswers = ['yes', 'no'];
    return in_array($useranswer, $corranswers);
}

function getCorrectAnswer(int $num):string{
    if ($num %2 == 0) return 'yes';
    else return 'no';
}

verbose('Answer "yes" if the number is even, otherwise answer "no".');

for ($i = 0; $i < 3; $i++){
    
    $num = rand(0, 99);
    
    askQuestion("{$num}");

    $useranswer = getUserAnswer();
    $correctanswer = getCorrectAnswer($num); 
    
    if ((!isCorrectedAnswer($useranswer))||($useranswer != $correctanswer)){
        wrongAnswer($useranswer, $correctanswer, $name, $endmsg);
        break;    
    }
    
    verbose("Correct!");    
}

verbose($endmsg);
