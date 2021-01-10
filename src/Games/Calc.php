<?php

namespace Brain\Games\Calc;

function getQuestion(): array
{
    $number1 = rand(MIN_NUMBER, MAX_NUMBER);
    $number2 = rand(MIN_NUMBER, MAX_NUMBER);

    $operation = getRandomOperation();
    if ($operation === '+') {
        $response = $number1 + $number2;
    } elseif ($operation === '-') {
        $response = $number1 - $number2;
    }
    return ["{$number1} {$operation} {$number2}", $response];
}

function getRules()
{
    return 'What is the result of the expression?';
}

function getRandomOperation(): string
{
    return rand(0, 1) === 0 ? '+' : '-';
}
