<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function verbose(string $str)
{
    line($str);
}

function askQuestion(string $str)
{
    line("Question: {$str}");
}

function getUserAnswer(): string
{
    return prompt('Your answer');
}

function wrongAnswer($useranswer, $correctanswer, $name, &$endmsg)
{
    line("'{$useranswer}' is wrong answer ;(. Correct answer was '{$correctanswer}'.");
    $endmsg = "Let's try again, {$name}!";
}

//------------START GAME----------------
line('Welcome to the Brain Games!');
$name = prompt('May I have your name?');
line('Hello, %s!', $name);

$endmsg = "Congratulations, {$name}!";
