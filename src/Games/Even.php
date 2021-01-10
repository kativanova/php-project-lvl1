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

function isEven($number)
{
    return $number % 2 === 0;
}

function getQuestion(): array
{
    $number = rand(MIN_NUMBER, MAX_NUMBER);
    $response = isEven($number) ? 'yes' : 'no';
    return [$number, $response];
}

function describieRules()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}