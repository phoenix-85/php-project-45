<?php

namespace BrainGames\Cli;

use function cli\{line, prompt};

function welcomeUser(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function checkAnswer(string $userAnswer, string $correctAnswer): bool
{
    $isCorrectAnswer = ($userAnswer == $correctAnswer);
    $isCorrectAnswer ? line('Correct!') : line("$userAnswer is wrong answer ;(. Correct answer was $correctAnswer.");
    return $isCorrectAnswer;
}
