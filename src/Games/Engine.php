<?php

namespace Brain\Games\Engine;

// Путь который будет использован при глобальной установке пакета
$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
// Путь для локальной работы с проектом
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Brain\Games\Even;
use Brain\Games\Calc;
use Brain\Games\GCD;

use function cli\line;
use function cli\prompt;

define('MAX_NUMBER_OF_ATTEMPTS', 3);
define("MIN_NUMBER", 0);
define("MAX_NUMBER", 100);

function startGame(string $game)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    if ($game === 'Even') {
        $rules = Even\getRules();
    } elseif ($game === 'Calc') {
        $rules = Calc\getRules();
    } elseif ($game === 'GCD') {
        $rules = GCD\getRules();
    }
    line($rules);

    $isAnsweredRight = true;
    $numberOfAttempts = 0;

    while ($isAnsweredRight && $numberOfAttempts < MAX_NUMBER_OF_ATTEMPTS) {
        if ($game === 'Even') {
            [$question, $correctAnswer] = Even\getQuestion();
        } elseif ($game === 'Calc') {
            [$question, $correctAnswer] = Calc\getQuestion();
        } elseif ($game === 'GCD') {
            [$question, $correctAnswer] = GCD\getQuestion();
        }

        line('Question: %s', $question);
        $responce = prompt('Your answer');

        if ($responce == $correctAnswer) {
            line("Correct!");
            $numberOfAttempts++;
        } else {
            line("\"%s\" is wrong answer ;(. Correct answer was \"%s\"", $responce, $correctAnswer);
            $isAnsweredRight = false;
        }
    }

    if ($isAnsweredRight) {
        line("Congratulations, %s", $name);
    } else {
        line("Let's try again, %s", $name);
    }
}
