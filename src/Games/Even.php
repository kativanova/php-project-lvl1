<?php

namespace Brain\Games\Even;

// Путь который будет использован при глобальной установке пакета
$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
// Путь для локальной работы с проектом
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
}
else {
    require_once $autoloadPath2;
}

use function cli\line;
use function cli\prompt;

define("MIN_NUMBER", 0);
define("MAX_NUMBER", 100);

function startGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $isAnsweredRight = true;
    $countAttempts = 3;

    while ($isAnsweredRight && $countAttempts > 0) {
        $number = getRandoNumber();

        line('Question: %d', $number);

        $responce = prompt('Your answer: ');
        if (isCorrectAnswer($number, $responce)) {
            line("Correct!");
            $countAttempts--;
        }
        else {
            line("\"%s\" is wrong answer ;(. Correct answer was \"%s\"", $responce, getCorrectAnswer($number));
            $isAnsweredRight = false;
        }
    }

    if ($isAnsweredRight) {
        line("Congratulations, %s", $name);
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}

function isCorrectAnswer($number, $responce)
{
    return isEven($number) && $responce === 'yes'
        || !isEven($number) && $responce === 'no';
}

function getCorrectAnswer($number)
{
    return isEven($number) ? 'yes' : 'no';
}

function getRandoNumber()
{
    return rand(MIN_NUMBER, MAX_NUMBER);
}
