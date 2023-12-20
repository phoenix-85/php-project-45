<?php

namespace BrainGames\cli;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function getStartMessage(string $str): void
{
    line($str);
}

function askQuestion(string $str): void
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

function wrongAnswer(string $useranswer, string $correctanswer): void
{
    line("'{$useranswer}' is wrong answer ;(. Correct answer was '{$correctanswer}'.");
}

function getEndMessage(bool $isWin, string $name): void
{
    line(($isWin) ? "Congratulations, {$name}!" : "Let's try again, {$name}!");
}
