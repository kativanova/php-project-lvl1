<?php

namespace Brain\Games\Engine;

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

use Brain\Games\Even;
use function cli\line;
use function cli\prompt;

define('MAX_NUMBER_OF_ATTEMPTS', 3);

function startGame(string $game){
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    Even\describieRules();
    
    $isAnsweredRight = true;
    $numberOfAttempts = 0;

    while ($isAnsweredRight && $numberOfAttempts < MAX_NUMBER_OF_ATTEMPTS) {
        [$question, $correctAnswer] = Even\getQuestion();
        
        line('Question: %d', $question);
        $responce = prompt('Your answer');

        if ($responce === $correctAnswer) {
            line("Correct!");
            $numberOfAttempts++;
        } else {
            line("\"%s\" is wrong answer ;(. Correct answer was \"%s\"", $responce, $correctAnswer);
            $isAnsweredRight = false;            
        }
    }

    if ($isAnsweredRight) {
        line("Congratulations, %s", $name);
    }
}