<?php

namespace Brain\Games\Engine;

define('NUMBER_OF_ATTEMPTS', 3);
define('MIN_NUMBER', 0);
define('MAX_NUMBER', 100);

use function cli\line;
use function cli\prompt;

function run(string $rules, array $questionsAndAnswers)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($rules);

    $isAnsweredRight = true;

    foreach ($questionsAndAnswers as $item) {
        [$question, $correctAnswer] = $item;
        line('Question: %s', $question);
        $responce = prompt('Your answer');
        if ($responce == $correctAnswer) {
            line("Correct!");
        } else {
            line("\"%s\" is wrong answer ;(. Correct answer was \"%s\"", $responce, $correctAnswer);
            $isAnsweredRight = false;
            break;
        }
    }

    if ($isAnsweredRight) {
        line("Congratulations, %s", $name);
    } else {
        line("Let's try again, %s", $name);
    }
}
