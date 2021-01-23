<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\run;

function startGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ATTEMPTS; $i++) {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);

        $operation = getRandomOperation();
        if ($operation === '+') {
            $response = $number1 + $number2;
        } elseif ($operation === '-') {
            $response = $number1 - $number2;
        }
        $questionsAndAnswers[] = ["{$number1} {$operation} {$number2}", $response];
    }

    run('What is the result of the expression?', $questionsAndAnswers);
}

function getRandomOperation(): string
{
    return rand(0, 1) === 0 ? '+' : '-';
}
