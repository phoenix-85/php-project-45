<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcomeUser(): string
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
    line("Question: $str");
}

function getUserAnswer(): string
{
    return prompt('Your answer');
}

function checkAnswer(string $userAnswer, string $correctAnswer): bool
{
    $isCorrectAnswer = ($userAnswer == $correctAnswer);
    $isCorrectAnswer ? line('Correct!') : line("$userAnswer is wrong answer ;(. Correct answer was $correctAnswer.");
    return !$isCorrectAnswer;
}

function getEndMessage(bool $isLose, string $name): void
{
    line(($isLose) ? "Let's try again, $name!" : "Congratulations, $name!");
}
