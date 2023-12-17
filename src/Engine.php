<?php

namespace BrainGames\engine;

use function BrainGames\cli\getEndMessage;
use function BrainGames\cli\getName;
use function BrainGames\cli\getUserAnswer;
use function BrainGames\cli\greetings;
use function BrainGames\cli\rightAnswer;
use function BrainGames\cli\verbose;
use function BrainGames\cli\wrongAnswer;
use function BrainGames\game\getCorrectAnswer;
use function BrainGames\game\checkProblem;
use function BrainGames\game\generateProblem;
use function BrainGames\game\startMessage;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

//-----------START GAME------------
greetings();
$name = getName();
verbose(startMessage());
//-------------ROUNDS--------------
$isWin = true;

for ($i = 0; $i < 3; $i++) {
    $problem = generateProblem();
    $useranswer = getUserAnswer();
    $correctanswer = getCorrectAnswer(...$problem);
    if (checkProblem($useranswer, $correctanswer)) {
        rightAnswer();
    } else {
        wrongAnswer($useranswer, $correctanswer);
        $isWin = false;
        break;
    }
}
//-------------END GAME------------
getEndMessage($isWin, $name);
