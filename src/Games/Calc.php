<?php

namespace Brain\Games\Calc;

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

function getQuestion(): array
{
    $number1 = rand(MIN_NUMBER, MAX_NUMBER);
    $number2 = rand(MIN_NUMBER, MAX_NUMBER);

    $operation = getRandomOperation();
    if ($operation === '+') {
        $response = $number1 + $number2;
    }
    elseif ($operation === '-') {
        $response = $number1 - $number2;
    }
    return ["{$number1} {$operation} {$number2}", $response];
}

function describieRules()
{
    line('What is the result of the expression?');
}

function getRandomOperation(): string
{
    return rand(0, 1) === 0 ? '+' : '-';

}