<?php

namespace BrainGames\cli;

use function cli\line;
use function cli\prompt;

function greetings(): void
{
    line('Welcome to the Brain Games!');
}

function getName(): string
{
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function verbose(string $str): void
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

function rightAnswer(): void
{
    line('Correct!');
}

function wrongAnswer($useranswer, $correctanswer): void
{
    line("'{$useranswer}' is wrong answer ;(. Correct answer was '{$correctanswer}'.");
}

function getEndMessage(bool $isWin, $name): void
{
    line(($isWin) ? "Congratulations, {$name}!" : "Let's try again, {$name}!");
}